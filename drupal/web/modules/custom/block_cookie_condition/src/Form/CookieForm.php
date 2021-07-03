<?php
/**
 * @file
 * Contains \Drupal\block_cookie_condition\Form\CookieForm
 */
namespace Drupal\block_cookie_condition\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\InvokeCommand;

/**
 * Provides a UserType Cookie Form
 */
class CookieForm extends FormBase {
	/**
	 * (@inheritdoc)
	 */
	public function getFormId() {
		return 'usertype_cookie_form';
	}
	/**
	 * (@inheritdoc)
	 */
	public function buildForm(array $form, FormStateInterface $form_state){
		// $form['example_select'] = [
		// 	'#type' => 'radios',
		// 	'#title' => $this->t('Select element'),
		// 	'#options' => [
		// 	  '1' => $this->t('One'),
		// 	  '2' => $this->t('Two'),
		// 	  '3' => $this->t('Three'),
		// 	  '4' => $this->t('From New York to Ger-ma-ny!'),
		// 	],
		// 	'#ajax' => [
		// 		'callback' => '::myAjaxCallback', // don't forget :: when calling a class method.
		// 		//'callback' => [$this, 'myAjaxCallback'], //alternative notation
		// 		'disable-refocus' => FALSE, // Or TRUE to prevent re-focusing on the triggering element.
		// 		'event' => 'change',
		// 		'wrapper' => 'edit-output', // This element is updated with this AJAX callback.
		// 		'progress' => [
		// 		  'type' => 'throbber',
		// 		  'message' => $this->t('Verifying entry...'),
		// 		],
		// 	]
		//   ];

		$form['advisor_button'] = [
			'#type' => 'button',
			'#value' => $this->t('I am an Advisor'),
			'#name' => 'advisor_type',
			'#ajax' => [
				'callback' => '::setUserTypeCookie',
				'disable-refocus' => FALSE, // Or TRUE to prevent re-focusing on the triggering element.
				'event' => 'click',
				'progress' => [
				  'type' => 'throbber',
				  'message' => $this->t('Verifying entry...'),
				],
			]
		];
	  
		$form['investor_button'] = [
			'#type' => 'button',
			'#value' => $this->t('I am an Investor'),
			'#name' => 'investor_type',
			'#ajax' => [
				'callback' => '::setUserTypeCookie',
				'disable-refocus' => FALSE, // Or TRUE to prevent re-focusing on the triggering element.
				'event' => 'click',
				'progress' => [
				  'type' => 'throbber',
				  'message' => $this->t('Verifying entry...'),
				],
			]
		];
		
		  // Create a textbox that will be updated
		  // when the user selects an item from the select box above.
		//   $form['output'] = [
		// 	'#type' => 'textfield',
		// 	'#size' => '60',
		// 	'#disabled' => TRUE,
		// 	'#value' => 'Hello, Drupal!!1',      
		// 	'#prefix' => '<div id="edit-output">',
		// 	'#suffix' => '</div>',
		//   ];
	  
		  // Create the submit button.
		//   $form['submit'] = [
		// 	'#type' => 'submit',
		// 	'#value' => $this->t('Submit'),
		//   ];
		// \Drupal::service('page_cache_kill_switch')->trigger();

		  return $form;
	}
	/**
	 * {@inheritdoc}
	 */
	public function validateForm(array &$form, FormStateInterface $form_state) {
		parent::validateForm($form, $form_state);
		// \Drupal::service('page_cache_kill_switch')->trigger();
	}

	/**
	 * {@inheritdoc}
	 */
	public function submitForm(array &$form, FormStateInterface $form_state) {
		// Display result.
		foreach ($form_state->getValues() as $key => $value) {
		\Drupal::messenger()->addStatus($key . ': ' . $value);
		// \Drupal::service('page_cache_kill_switch')->trigger();
		}
	}

	/**
	* An Ajax callback.
	*/
	public function setUserTypeCookie(array &$form, FormStateInterface $form_state) {
		if ($selectedValue = $form_state->getUserInput()) {
			// Get the text of the selected option.
			$selectedText = $selectedValue['_triggering_element_name'];
		}
		$response = new AjaxResponse();
		// \Drupal::service('page_cache_kill_switch')->trigger();
		$response->addCommand(new InvokeCommand(NULL, 'setUserTypeCookie', [$selectedText]));
		return $response;
	}
}