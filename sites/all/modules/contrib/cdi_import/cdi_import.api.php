<?php

/**
 * @file
 * Hooks provided by CDI Import.
 */

/**
 * @addtogroup hooks
 * @{
 */

/**
 * Implements hook_cdi_import_info().
 *
 * Return info for bundle copy. The first key is
 * the name of the entity_type.
 */
function hook_cdi_import_info() {
  return array(
    'node' => array(
      'bundle_export_callback' => 'node_type_get_type',
      'bundle_save_callback' => 'node_type_save',
      'export_menu' => array(
        'path' => 'admin/structure/types/export',
        'access arguments' => 'administer content types',
      ),
      'import_menu' => array(
        'path' => 'admin/structure/types/import',
        'access arguments' => 'administer content types',
      ),
    ),
  );
}

/**
 * @} End of "addtogroup hooks".
 */