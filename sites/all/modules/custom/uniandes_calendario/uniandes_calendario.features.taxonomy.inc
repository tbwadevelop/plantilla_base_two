<?php
/**
 * @file
 * uniandes_calendario2.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function uniandes_calendario_taxonomy_default_vocabularies() {
  return array(
    'categoria_eventos' => array(
      'name' => 'Categoría eventos',
      'machine_name' => 'categoria_eventos',
      'description' => 'Clasificar el tipo de contenido eventos por categoría',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
      'language' => 'und',
      'i18n_mode' => 4,
      'rdf_mapping' => array(
        'rdftype' => array(
          0 => 'skos:ConceptScheme',
        ),
        'name' => array(
          'predicates' => array(
            0 => 'dc:title',
          ),
        ),
        'description' => array(
          'predicates' => array(
            0 => 'rdfs:comment',
          ),
        ),
      ),
    ),
  );
}
