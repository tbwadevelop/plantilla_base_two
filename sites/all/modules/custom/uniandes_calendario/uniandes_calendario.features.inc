<?php
/**
 * @file
 * uniandes_calendario2.features.inc
 */

/**
 * Implements hook_node_info().
 */
function uniandes_calendario_node_info() {
  $items = array(
    'eventos' => array(
      'name' => t('Eventos'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Titulo'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
