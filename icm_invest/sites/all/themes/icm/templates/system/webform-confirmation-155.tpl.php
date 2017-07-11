<?php

/**
 * @file
 * Customize confirmation screen after successful submission.
 *
 * This file may be renamed "webform-confirmation-[nid].tpl.php" to target a
 * specific webform e-mail on your site. Or you can leave it
 * "webform-confirmation.tpl.php" to affect all webform confirmations on your
 * site.
 *
 * Available variables:
 * - $node: The node object for this webform.
 * - $progressbar: The progress bar 100% filled (if configured). This may not
 *   print out anything if a progress bar is not enabled for this node.
 * - $confirmation_message: The confirmation message input by the webform
 *   author.
 * - $sid: The unique submission ID of this submission.
 * - $url: The URL of the form (or for in-block confirmations, the same page).
 */
?>
<?php print $progressbar; ?>

<div class="webform-confirmation">
  <?php if ($confirmation_message): ?>
    <?php print $confirmation_message ?>
  <?php else: ?>
      <h2>Results</h2>
  <?php endif; ?>
</div>
<h5><a href="<?php print url('node/'. $node->nid . '/submission/'. $sid .'/edit')?>">Update Questionaire</a></h5>

<div id="Quiz Results">
<?php 

include_once(drupal_get_path('module', 'webform') .'/includes/webform.submissions.inc');
$nid = arg(1); // need to hard-code nid if this is a custom page
$sid = $_GET['sid'];
$submission = webform_get_submission($nid, $sid);
$dataArray = json_decode(json_encode($submission), true);
$questions = $dataArray['data'];
$questionNumber = 1;
$sum = 0;
$horizon = 0;
$strategy_id = 0;


foreach ($questions as $question) {
    if($questionNumber == 1){
//    echo '<h2>Time Horizon</h2>';
    }
    if($questionNumber <= 3){
//    echo $questionNumber . ') ';
//    echo $question[0]. '<br/>' ;
    $horizon += $question[0]; 
    }
    if($questionNumber == 4){
//    echo '<h2>Risk Tolerance</h2>';
    }
    if($questionNumber >= 4 && $questionNumber <= 13){
//    echo $questionNumber-3 . ') ';
//    echo $question[0]. '<br/>' ; 
    $sum += $question[0]; 
    }
        $questionNumber ++;
        
}

// echo 'Horizon Score: ' . $horizon . '<br />';
// echo 'Risk Score: ' . $sum . '<br />';

switch(true){
    case ($horizon >= 0 && $horizon <= 3):
    switch(true){
        case ($sum >= 0 && $sum <= 15):
        $strategy = 'Fixed Income Completion';
        $strategy_id = 1;
        break;
    
        case ($sum >= 16 && $sum <= 21):
        $strategy = 'Fixed Income Completion & Inflation Hedge';
        $strategy_id = 2;
        break;
    
        case ($sum >= 22 && $sum <= 28):
        $strategy = 'Income & Inflation Hedge';
        $strategy_id = 3;
        break;
    
        case ($sum >= 29 && $sum <= 34):
        $strategy = 'Defensive Growth';
        $strategy_id = 4;
        break;
    
        case ($sum >= 35 && $sum <= 40):
        $strategy = 'Balanced Growth';
        $strategy_id = 5;  
        break;
    
    
    }
    break;
    
    
    case ($horizon >= 3 && $horizon <= 6): 
    switch(true){
        case ($sum >= 0 && $sum <= 12):
        $strategy = 'Fixed Income Completion';
        $strategy_id = 1;    
        break;
    
        case ($sum >= 13 && $sum <= 16):
        $strategy = 'Fixed Income Completion & Inflation Hedge';
        $strategy_id = 2;
        break;
    
        case ($sum >= 17 && $sum <= 22):
        $strategy = 'Income & Inflation Hedge';
        $strategy_id = 3;
        break;
    
        case ($sum >= 23 && $sum <= 26):
        $strategy = 'Defensive Growth';
        $strategy_id = 4;
        break;
    
        case ($sum >= 27 && $sum <= 30):
        $strategy = 'Balanced Growth'; 
        $strategy_id = 5; 
        break;
    
        case ($sum >= 31 && $sum <= 35):
        $strategy = ' Risk Controlled Growth';
        $strategy_id = 6;
        break;
    
        case ($sum >= 36 && $sum <= 40):    
        $strategy = 'Conservative Capital Appreciation';
        $strategy_id = 7;
        break;
    
    
    }
    break;
    
    case ($horizon >= 7 && $horizon <= 9): 
    switch(true){
        case ($sum >= 0 && $sum <= 11):
        $strategy = 'Fixed Income Completion';
        $strategy_id = 1;
        break;
    
        case ($sum >= 12 && $sum <= 15):
        $strategy = 'Fixed Income Completion & Inflation Hedge';
        $strategy_id = 2;
        break;
    
        case ($sum >= 16 && $sum <= 20):
        $strategy = 'Income & Inflation Hedge';
        $strategy_id = 3;
        break;
    
        case ($sum >= 21 && $sum <= 23):
        $strategy = 'Defensive Growth';
        $strategy_id = 4;
        break;
    
        case ($sum >= 24 && $sum <= 28):
        $strategy = 'Balanced Growth';
        $strategy_id = 5;  
        break;
    
        case ($sum >= 29 && $sum <= 32):
        $strategy = ' Risk Controlled Growth';
        $strategy_id = 6;
        break;
    
        case ($sum >= 33 && $sum <= 36):    
        $strategy = 'Conservative Capital Appreciation';
        $strategy_id = 7;        
        break;
    
        case ($sum >= 37 && $sum <= 40):    
        $strategy = 'Moderate Capital Appreciation';
        $strategy_id = 8;
        break;
    
    
    }
    break;
    
    case ($horizon >= 10): 
    switch(true){
        case ($sum >= 0 && $sum <= 10):
        $strategy = 'Fixed Income Completion';
        $strategy_id = 1;
        break;
    
        case ($sum >= 11 && $sum <= 13):
        $strategy = 'Fixed Income Completion & Inflation Hedge';
        $strategy_id = 2;
        break;
    
        case ($sum >= 14 && $sum <= 16):
        $strategy = 'Income & Inflation Hedge';
        $strategy_id = 3;
        break;
    
        case ($sum >= 17 && $sum <= 20):
        $strategy = 'Defensive Growth';
        $strategy_id = 4;
        break;
    
        case ($sum >= 21 && $sum <= 24):
        $strategy = 'Balanced Growth';  
        $strategy_id = 5;
        break;
    
        case ($sum >= 25 && $sum <= 27):
        $strategy = ' Risk Controlled Growth';
        $strategy_id = 6;
        break;
    
        case ($sum >= 28 && $sum <= 31):    
        $strategy = 'Conservative Capital Appreciation';
        $strategy_id = 7;
        break;
    
        case ($sum >= 32 && $sum <= 35):    
        $strategy = 'Moderate Capital Appreciation';
        $strategy_id = 8;
        break;
    
        case ($sum >= 36 && $sum <= 38):    
        $strategy = 'Aggressive Capital Appreciation';
        $strategy_id = 9;
        break;
    
        case ($sum >= 39 && $sum <= 40):    
        $strategy = 'Equity Completion';
        $strategy_id = 10;
        break;
    
    }
    break;
    
}
    
    
    

            

echo 'Based on your Time Horizon and Risk Tolerance you may belong in the ' . $strategy . '.';

//print_r($dataArray);
//$strategy_id = 10;
//$horizon = 10;
//int_r($submission); ?>

<div style="position:relative">
<img style="position:absolute; width:8%; bottom:<?php echo (16+ 13/3*$horizon).'%'; ?>; left:<?php echo (10/3*$strategy_id+13).'%'; ?>;"  src="/sites/all/themes/icm/images/icmlogo.png" />
<img src="/sites/all/themes/icm/images/risk-matrix.jpg" />
</div>
<p><em>All data presented in this matrix is prepared using information we believe to be correct at the time of production, but may be subject to revision and/or adjustment. Graphs, charts, formulas and other data should not be used alone to determine investment decisions without considering all disclosure information, offering documents and other relevant data. </em></p>



<p>The Risk Tolerance Questionnaire’s sole purpose is to assist you, along with your financial advisor, in determining your general attitude towards investment risk. This questionnaire does not consider all factors necessary in making an investment decision (e.g., personal and financial information and investment objective). In no way should this questionnaire be viewed as advice or establishing any kind of advisory relationship with Integrated Capital Management (iCM). iCM does not endorse or maintain soft dollar relationships with any financial product or service that may be used in conjunction with the asset allocation models that are presented. Please consult with your Financial Professional and obtain the financial prospectus (or its equivalent) and read it carefully prior to investing.</p>
<p>By using this website, you accept our <a href="http://icm-invest.com/disclaimer" target="_blank">Terms of Use and Privacy Policy</a>. Past performance is no guarantee of future results. Different types of investments involve varying degrees of risk and there can be no assurance that the future performance of any specific investment or investment strategy will be profitable.  You should understand that investment decisions made for the account are subject to various market, currency, economic, political and business risks and that those investment decisions will not always be profitable.  It is important to note that the information contained herein is subject to deviations that may occur due to market conditions and fluctuations, or as a result of client-directed cash flows. Any historical returns, expected returns, or probability projections may not reflect actual future performance. All securities involve risk and may result in loss of all amounts invested. </p>
<p>iCM’s Risk Tolerance Questionnaire is  not designed  to be used alone, rather in conjunction with a comprehensive evaluation of a client's entire personal portfolio. While the data iCM uses from third parties is believed to be reliable, iCM cannot ensure the accuracy or completeness of data provided by clients or third parties. All data is subject to change.</p>
<p>iCM does not provide tax advice, and does not represent in any manner that the outcomes described herein will result in any particular tax consequence. Prospective investors should confer with their personal tax advisors regarding the tax consequences based on their particular circumstances. iCM assumes no responsibility for the tax consequences for any investor.</p>


</div>