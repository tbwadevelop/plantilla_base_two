<?php

/**
 * Menu callback: Event Calendar configuration.
 */
function uniandes_calendario_content($form, $form_state) {
  $form['#prefix'] = t('<p>Select a range of dates to export events.</p>');
  $form['start_date'] = array(
    '#type' => 'date_popup',
    '#title' => t('Start Date'),
    '#date_label_position' => 'within',
  );
  $form['end_date'] = array(
    '#type' => 'date_popup',
    '#title' => t('End date'),
    '#date_label_position' => 'within',
  );
  $form['actions'] = array(
    '#type' => 'actions',
  );
  $form['actions']['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Submit'),
  );
  return $form;
}
