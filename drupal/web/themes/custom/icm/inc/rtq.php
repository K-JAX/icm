<?php
function icm_preprocess_webform_confirmation(&$variables)
{
    if ($variables['webform']->getOriginalId() === 'risk_tolerance_questionnaire') {

        $variables['score_max']    = 10; // the cap value for both time horizon and risk tolerance
        $variables['time_horizon'] = get_scaled_value('time_horizon', $variables);
        $variables['risk_level']   = get_scaled_value('risk_tolerance', $variables);

        $vocab_id = 'risk_tolerance_strategy_type';
        $terms    = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree($vocab_id);
        foreach ($terms as $term) {
            $term_data[] = array(
                'id'      => $term->tid,
                'name'    => $term->name,
                '#markup' => $term->description__value,
                'weight'  => $term->weight,
            );
        }

        $variables['strategy_score'] = get_curve_position($variables['risk_level'], $variables['time_horizon'], $variables['score_max']);

        $variables['strategy'] = $term_data[$variables['strategy_score'] - 1];

        $variables['#attached'] = [
            'drupalSettings' => [
                'myLibrary' => [
                    'time_horizon' => $variables['time_horizon'],
                    'risk_level'   => $variables['risk_level'],
                    'strat_score'  => $variables['strategy_score'],
                ],
            ],
        ];

        return $variables;
    }
}

function get_scaled_value($name, $variables)
{
    $questions = $variables['webform']->getElement($name)['#webform_children'];
    $score     = 0;
    $max       = 0;
    $val       = 0;
    foreach ($questions as $question) {
        $score += $variables['webform_submission']->getRawData()[$question];
        $max += count($variables['webform']->getElementsDecoded()[$name . '_page'][$name][$question]['#options']) - 1;
    }
    $val = round($score * 10 / $max, 1);
    return $val;
}

function get_curve_position($risk, $time, $max)
{
    $strat_info = 1;
    $nudge      = 2;
    for ($i = 0; $i < ($max + $nudge); $i++) {
        // check if risk and time coordinates fall within a circle positioned at
        // the top-right of graph with a radius of $i (the current iteration)
        if (
            // formula for calculating whether coordinates all within a circle
            ceil(pow($risk - $max, 2) + pow($time - $max, 2)) <= pow($i, 2)
        ) {
            $strat_info = $max + $nudge - $i;
            break;
        }
    }
    return $strat_info;

}