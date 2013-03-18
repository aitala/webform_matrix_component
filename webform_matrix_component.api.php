<?php

/**
 * Validate hook for matrix component.
 * You can define custom validation for this.
 *
 * @param $element
 *   element
 * @param $form_state
 *   form_state
 */
function hook_webform_matrix_validate($element, $form_state) {
  
}

/**
 * Validate textfield Numeric validation.
 * @see webform_render_matrix_textfield_Numeric()
 */
function webform_render_matrix_textfield_Numeric($element, $form_state) {
  $value = $element['#value'];
  if (!empty($value)) {
    if (!is_numeric($value)) {
      form_error($element, t('Only Numeric value is allowed'));
    }
  }
}

/**
 * Validate textfield Numeric validation.
 * @see webform_render_matrix_textfield_Numeric()
 */
function webform_render_matrix_textfield_Alphabet($element, $form_state) {
  
}

/**
 * Implements hook_webform_edit_matrix_alter().
 * Webform_edit_matrix_alter for alter matrix edit form.
 * Like add helptext textfield.
 * @see hook_webform_render_matrix_alter
 * 
 * @param $element
 * @param $element_values
 * @param $element_id
 * 
 */
function hook_webform_edit_matrix_alter(&$element, &$element_values, $element_id) {
  $helptext = $element_values['helptext'];
  $element['helptext'] = array(
    '#type' => 'textfield',
    '#title' => 'Help Text',
    '#size' => 15,
    '#default_value' => $helptext,
    '#parents' => array('extra', 'element', $element_id, 'helptext'),
    '#weight' => 1,
  );
}

/**
 * Webform_render_matrix_alter for alter webform_render_matrix .
 * @see hook_webform_edit_matrix_alter
 * 
 * @param $component
 * @param $value
 * @param $element
 */
function hook_webform_render_matrix_alter(&$component, &$value, &$element) {
  $helptext = $value['helptext'];
  if (!empty($helptext)) {
    $element['#field_suffix'] = $helptext;
  }
}


