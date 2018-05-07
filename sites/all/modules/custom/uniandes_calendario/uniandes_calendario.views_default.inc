<?php

/**
 * @file
 * Default views file for to create views.
 */

/**
 * Implements hook_views_default_views().
 */
function uniandes_calendario_views_default_views() {
  $t = get_t();
  $node_type = 'eventos';

  $view = new view();
  $view->name = 'calendar_events';
  $view->description = '';
  $view->tag = 'Calendario';
  $view->base_table = 'node';
  $view->human_name = 'Calendario eventos';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */
  
  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['use_more_text'] = 'más';
  $handler->display->display_options['link_display'] = 'page_1';
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['query']['options']['query_comment'] = FALSE;
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['exposed_form']['options']['submit_button'] = 'Aplicar';
  $handler->display->display_options['exposed_form']['options']['reset_button_label'] = 'Reiniciar';
  $handler->display->display_options['exposed_form']['options']['exposed_sorts_label'] = 'Ordenar por';
  $handler->display->display_options['pager']['type'] = 'date_views_pager';
  $handler->display->display_options['pager']['options']['date_id'] = 'month';
  $handler->display->display_options['style_plugin'] = 'calendar_style';
  $handler->display->display_options['style_options']['name_size'] = '3';
  $handler->display->display_options['style_options']['with_weekno'] = '0';
  $handler->display->display_options['style_options']['multiday_theme'] = '1';
  $handler->display->display_options['style_options']['theme_style'] = '1';
  $handler->display->display_options['style_options']['max_items'] = '0';
  $handler->display->display_options['row_plugin'] = 'calendar_entity';
  /* Campo: Contenido: Título */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['title']['hide_alter_empty'] = FALSE;
  /* Campo: Contenido: Fecha Evento */
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['id'] = 'field_fecha_evento_calendario';
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['table'] = 'field_data_field_fecha_evento_calendario';
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['field'] = 'field_fecha_evento_calendario';
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['label'] = '';
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['hide_alter_empty'] = FALSE;
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['settings'] = array(
    'format_type' => 'short',
    'fromto' => 'both',
    'multiple_number' => '',
    'multiple_from' => '',
    'multiple_to' => '',
    'show_repeat_rule' => '',
  );
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['group_rows'] = FALSE;
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['delta_offset'] = '0';
  /* Campo: Contenido: Enlace de edición */
  $handler->display->display_options['fields']['edit_node']['id'] = 'edit_node';
  $handler->display->display_options['fields']['edit_node']['table'] = 'views_entity_node';
  $handler->display->display_options['fields']['edit_node']['field'] = 'edit_node';
  $handler->display->display_options['fields']['edit_node']['label'] = '';
  $handler->display->display_options['fields']['edit_node']['element_label_colon'] = FALSE;
  /* Sort criterion: Contenido: Fecha Evento -  start date (field_fecha_evento_calendario) */
  $handler->display->display_options['sorts']['field_fecha_evento_calendario_value']['id'] = 'field_fecha_evento_calendario_value';
  $handler->display->display_options['sorts']['field_fecha_evento_calendario_value']['table'] = 'field_data_field_fecha_evento_calendario';
  $handler->display->display_options['sorts']['field_fecha_evento_calendario_value']['field'] = 'field_fecha_evento_calendario_value';
  /* Filter criterion: Contenido: Publicado */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 0;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Contenido: Idioma */
  $handler->display->display_options['filters']['language']['id'] = 'language';
  $handler->display->display_options['filters']['language']['table'] = 'node';
  $handler->display->display_options['filters']['language']['field'] = 'language';
  $handler->display->display_options['filters']['language']['value'] = array(
    '***CURRENT_LANGUAGE***' => '***CURRENT_LANGUAGE***',
  );
  
  /* Display: Mes */
  $handler = $view->new_display('page', 'Mes', 'page_1');
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'date_views_pager';
  $handler->display->display_options['pager']['options']['date_id'] = 'month';
  $handler->display->display_options['pager']['options']['link_format'] = 'clean';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'calendar_style';
  $handler->display->display_options['style_options']['name_size'] = '3';
  $handler->display->display_options['style_options']['mini'] = '0';
  $handler->display->display_options['style_options']['with_weekno'] = '0';
  $handler->display->display_options['style_options']['multiday_theme'] = '0';
  $handler->display->display_options['style_options']['theme_style'] = '1';
  $handler->display->display_options['style_options']['max_items'] = '0';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'calendar_entity';
  $handler->display->display_options['row_options']['colors']['legend'] = 'type';
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['arguments'] = FALSE;
  /* Contextual filter: Fecha: Date (node) */
  $handler->display->display_options['arguments']['date_argument']['id'] = 'date_argument';
  $handler->display->display_options['arguments']['date_argument']['table'] = 'node';
  $handler->display->display_options['arguments']['date_argument']['field'] = 'date_argument';
  $handler->display->display_options['arguments']['date_argument']['default_action'] = 'default';
  $handler->display->display_options['arguments']['date_argument']['exception']['title'] = 'Todo';
  $handler->display->display_options['arguments']['date_argument']['default_argument_type'] = 'date';
  $handler->display->display_options['arguments']['date_argument']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['date_argument']['add_delta'] = 'yes';
  $handler->display->display_options['arguments']['date_argument']['date_fields'] = array(
    'field_data_field_fecha_evento_calendario.field_fecha_evento_calendario_value' => 'field_data_field_fecha_evento_calendario.field_fecha_evento_calendario_value',
  );
  $handler->display->display_options['defaults']['filter_groups'] = FALSE;
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Contenido: Publicado */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 0;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Contenido: Categoría (field_categoria_evento) */
  $handler->display->display_options['filters']['field_categoria_evento_tid']['id'] = 'field_categoria_evento_tid';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['table'] = 'field_data_field_categoria_evento';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['field'] = 'field_categoria_evento_tid';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_categoria_evento_tid']['expose']['operator_id'] = 'field_categoria_evento_tid_op';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['expose']['label'] = 'Categoría';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['expose']['operator'] = 'field_categoria_evento_tid_op';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['expose']['identifier'] = 'field_categoria_evento_tid';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    11 => 0,
    12 => 0,
    13 => 0,
    14 => 0,
  );
  $handler->display->display_options['filters']['field_categoria_evento_tid']['reduce_duplicates'] = TRUE;
  $handler->display->display_options['filters']['field_categoria_evento_tid']['type'] = 'select';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['vocabulary'] = 'categoria_eventos';
  /* Filter criterion: Contenido: Idioma */
  $handler->display->display_options['filters']['language']['id'] = 'language';
  $handler->display->display_options['filters']['language']['table'] = 'node';
  $handler->display->display_options['filters']['language']['field'] = 'language';
  $handler->display->display_options['filters']['language']['value'] = array(
    '***CURRENT_LANGUAGE***' => '***CURRENT_LANGUAGE***',
  );
  $handler->display->display_options['path'] = 'eventos/calendario/mes';
  $handler->display->display_options['menu']['type'] = 'default tab';
  $handler->display->display_options['menu']['title'] = $t('Month');
  $handler->display->display_options['menu']['weight'] = '0';
  $handler->display->display_options['menu']['name'] = 'main-menu';
  $handler->display->display_options['menu']['context'] = 0;
  $handler->display->display_options['menu']['context_only_inline'] = 0;
  $handler->display->display_options['tab_options']['type'] = 'normal';
  $handler->display->display_options['tab_options']['title'] = $t('Calendar');
  $handler->display->display_options['tab_options']['weight'] = '0';
  
  /* Display: Semana */
  $handler = $view->new_display('page', 'Semana', 'page_2');
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'date_views_pager';
  $handler->display->display_options['pager']['options']['date_id'] = 'week';
  $handler->display->display_options['pager']['options']['link_format'] = 'clean';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'calendar_style';
  $handler->display->display_options['style_options']['calendar_type'] = 'week';
  $handler->display->display_options['style_options']['name_size'] = '3';
  $handler->display->display_options['style_options']['mini'] = '0';
  $handler->display->display_options['style_options']['with_weekno'] = '0';
  $handler->display->display_options['style_options']['multiday_theme'] = '0';
  $handler->display->display_options['style_options']['theme_style'] = '1';
  $handler->display->display_options['style_options']['max_items'] = '0';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'calendar_entity';
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['arguments'] = FALSE;
  /* Contextual filter: Fecha: Date (node) */
  $handler->display->display_options['arguments']['date_argument']['id'] = 'date_argument';
  $handler->display->display_options['arguments']['date_argument']['table'] = 'node';
  $handler->display->display_options['arguments']['date_argument']['field'] = 'date_argument';
  $handler->display->display_options['arguments']['date_argument']['default_action'] = 'default';
  $handler->display->display_options['arguments']['date_argument']['exception']['title'] = 'Todo';
  $handler->display->display_options['arguments']['date_argument']['default_argument_type'] = 'date';
  $handler->display->display_options['arguments']['date_argument']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['date_argument']['granularity'] = 'week';
  $handler->display->display_options['arguments']['date_argument']['add_delta'] = 'yes';
  $handler->display->display_options['arguments']['date_argument']['date_fields'] = array(
    'field_data_field_fecha_evento_calendario.field_fecha_evento_calendario_value' => 'field_data_field_fecha_evento_calendario.field_fecha_evento_calendario_value',
  );
  $handler->display->display_options['defaults']['filter_groups'] = FALSE;
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Contenido: Publicado */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 0;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Contenido: Categoría (field_categoria_evento) */
  $handler->display->display_options['filters']['field_categoria_evento_tid']['id'] = 'field_categoria_evento_tid';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['table'] = 'field_data_field_categoria_evento';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['field'] = 'field_categoria_evento_tid';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_categoria_evento_tid']['expose']['operator_id'] = 'field_categoria_evento_tid_op';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['expose']['label'] = 'Categoría';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['expose']['operator'] = 'field_categoria_evento_tid_op';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['expose']['identifier'] = 'field_categoria_evento_tid';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    11 => 0,
    12 => 0,
    13 => 0,
    14 => 0,
  );
  $handler->display->display_options['filters']['field_categoria_evento_tid']['reduce_duplicates'] = TRUE;
  $handler->display->display_options['filters']['field_categoria_evento_tid']['type'] = 'select';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['vocabulary'] = 'categoria_eventos';
  /* Filter criterion: Contenido: Idioma */
  $handler->display->display_options['filters']['language']['id'] = 'language';
  $handler->display->display_options['filters']['language']['table'] = 'node';
  $handler->display->display_options['filters']['language']['field'] = 'language';
  $handler->display->display_options['filters']['language']['value'] = array(
    '***CURRENT_LANGUAGE***' => '***CURRENT_LANGUAGE***',
  );
  $handler->display->display_options['path'] = 'eventos/calendario/semana';
  $handler->display->display_options['menu']['type'] = 'tab';
  $handler->display->display_options['menu']['title'] = $t('Week');
  $handler->display->display_options['menu']['weight'] = '2';
  $handler->display->display_options['menu']['context'] = 0;
  $handler->display->display_options['menu']['context_only_inline'] = 0;
  
  /* Display: Dia */
  $handler = $view->new_display('page', 'Dia', 'page_3');
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'date_views_pager';
  $handler->display->display_options['pager']['options']['date_id'] = 'day';
  $handler->display->display_options['pager']['options']['link_format'] = 'clean';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'calendar_style';
  $handler->display->display_options['style_options']['calendar_type'] = 'day';
  $handler->display->display_options['style_options']['name_size'] = '3';
  $handler->display->display_options['style_options']['mini'] = '0';
  $handler->display->display_options['style_options']['with_weekno'] = '0';
  $handler->display->display_options['style_options']['multiday_theme'] = '1';
  $handler->display->display_options['style_options']['theme_style'] = '1';
  $handler->display->display_options['style_options']['max_items'] = '0';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'calendar_entity';
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['arguments'] = FALSE;
  /* Contextual filter: Fecha: Date (node) */
  $handler->display->display_options['arguments']['date_argument']['id'] = 'date_argument';
  $handler->display->display_options['arguments']['date_argument']['table'] = 'node';
  $handler->display->display_options['arguments']['date_argument']['field'] = 'date_argument';
  $handler->display->display_options['arguments']['date_argument']['default_action'] = 'default';
  $handler->display->display_options['arguments']['date_argument']['exception']['title'] = 'Todo';
  $handler->display->display_options['arguments']['date_argument']['default_argument_type'] = 'date';
  $handler->display->display_options['arguments']['date_argument']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['date_argument']['granularity'] = 'day';
  $handler->display->display_options['arguments']['date_argument']['date_fields'] = array(
    'field_data_field_fecha_evento_calendario.field_fecha_evento_calendario_value' => 'field_data_field_fecha_evento_calendario.field_fecha_evento_calendario_value',
  );
  $handler->display->display_options['defaults']['filter_groups'] = FALSE;
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Contenido: Publicado */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 0;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Contenido: Categoría (field_categoria_evento) */
  $handler->display->display_options['filters']['field_categoria_evento_tid']['id'] = 'field_categoria_evento_tid';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['table'] = 'field_data_field_categoria_evento';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['field'] = 'field_categoria_evento_tid';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_categoria_evento_tid']['expose']['operator_id'] = 'field_categoria_evento_tid_op';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['expose']['label'] = 'Categoría';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['expose']['operator'] = 'field_categoria_evento_tid_op';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['expose']['identifier'] = 'field_categoria_evento_tid';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    11 => 0,
    12 => 0,
    13 => 0,
    14 => 0,
  );
  $handler->display->display_options['filters']['field_categoria_evento_tid']['reduce_duplicates'] = TRUE;
  $handler->display->display_options['filters']['field_categoria_evento_tid']['type'] = 'select';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['vocabulary'] = 'categoria_eventos';
  /* Filter criterion: Contenido: Idioma */
  $handler->display->display_options['filters']['language']['id'] = 'language';
  $handler->display->display_options['filters']['language']['table'] = 'node';
  $handler->display->display_options['filters']['language']['field'] = 'language';
  $handler->display->display_options['filters']['language']['value'] = array(
    '***CURRENT_LANGUAGE***' => '***CURRENT_LANGUAGE***',
  );
  $handler->display->display_options['path'] = 'eventos/calendario/dia';
  $handler->display->display_options['menu']['type'] = 'tab';
  $handler->display->display_options['menu']['title'] = $t('Day');
  $handler->display->display_options['menu']['weight'] = '3';
  $handler->display->display_options['menu']['context'] = 0;
  $handler->display->display_options['menu']['context_only_inline'] = 0;
  
  /* Display: Block */
  $handler = $view->new_display('block', 'Block', 'block_1');
  $handler->display->display_options['defaults']['use_ajax'] = FALSE;
  $handler->display->display_options['use_ajax'] = TRUE;
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'date_views_pager';
  $handler->display->display_options['pager']['options']['date_id'] = 'mini';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'calendar_style';
  $handler->display->display_options['style_options']['name_size'] = '1';
  $handler->display->display_options['style_options']['mini'] = '1';
  $handler->display->display_options['style_options']['with_weekno'] = '0';
  $handler->display->display_options['style_options']['multiday_theme'] = '1';
  $handler->display->display_options['style_options']['theme_style'] = '1';
  $handler->display->display_options['style_options']['max_items'] = '0';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'calendar_entity';
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Campo: Contenido: Título */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['title']['hide_alter_empty'] = FALSE;
  /* Campo: Contenido: Fecha Evento */
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['id'] = 'field_fecha_evento_calendario';
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['table'] = 'field_data_field_fecha_evento_calendario';
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['field'] = 'field_fecha_evento_calendario';
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['label'] = '';
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['hide_alter_empty'] = FALSE;
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['settings'] = array(
    'format_type' => 'short',
    'fromto' => 'both',
    'multiple_number' => '',
    'multiple_from' => '',
    'multiple_to' => '',
    'show_repeat_rule' => '',
  );
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['group_rows'] = FALSE;
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['delta_offset'] = '0';
  $handler->display->display_options['defaults']['arguments'] = FALSE;
  /* Contextual filter: Fecha: Date (node) */
  $handler->display->display_options['arguments']['date_argument']['id'] = 'date_argument';
  $handler->display->display_options['arguments']['date_argument']['table'] = 'node';
  $handler->display->display_options['arguments']['date_argument']['field'] = 'date_argument';
  $handler->display->display_options['arguments']['date_argument']['default_action'] = 'default';
  $handler->display->display_options['arguments']['date_argument']['exception']['title'] = 'Todo';
  $handler->display->display_options['arguments']['date_argument']['default_argument_type'] = 'date';
  $handler->display->display_options['arguments']['date_argument']['summary']['format'] = 'default_summary';
  $handler->display->display_options['arguments']['date_argument']['add_delta'] = 'yes';
  $handler->display->display_options['arguments']['date_argument']['date_fields'] = array(
    'field_data_field_fecha_evento_calendario.field_fecha_evento_calendario_value' => 'field_data_field_fecha_evento_calendario.field_fecha_evento_calendario_value',
  );
  
  /* Display: Upcoming */
  $handler = $view->new_display('block', 'Upcoming', 'block_2');
  $handler->display->display_options['display_description'] = 'Upcoming events block';
  $handler->display->display_options['defaults']['use_more'] = FALSE;
  $handler->display->display_options['use_more'] = TRUE;
  $handler->display->display_options['defaults']['pager'] = FALSE;
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '5';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['defaults']['style_plugin'] = FALSE;
  $handler->display->display_options['style_plugin'] = 'list';
  $handler->display->display_options['defaults']['style_options'] = FALSE;
  $handler->display->display_options['defaults']['row_plugin'] = FALSE;
  $handler->display->display_options['row_plugin'] = 'fields';
  $handler->display->display_options['defaults']['row_options'] = FALSE;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Campo: Contenido: Título */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['label'] = '';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['title']['hide_alter_empty'] = FALSE;
  /* Campo: Contenido: Fecha Evento */
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['id'] = 'field_fecha_evento_calendario';
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['table'] = 'field_data_field_fecha_evento_calendario';
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['field'] = 'field_fecha_evento_calendario';
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['label'] = '';
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['hide_alter_empty'] = FALSE;
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['settings'] = array(
    'format_type' => 'short',
    'fromto' => 'both',
    'multiple_number' => '',
    'multiple_from' => '',
    'multiple_to' => '',
    'show_repeat_rule' => '',
  );
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['group_rows'] = FALSE;
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['delta_offset'] = '0';
  $handler->display->display_options['defaults']['filter_groups'] = FALSE;
  $handler->display->display_options['defaults']['filters'] = FALSE;
  /* Filter criterion: Contenido: Publicado */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 0;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Fecha: Date (node) */
  $handler->display->display_options['filters']['date_filter']['id'] = 'date_filter';
  $handler->display->display_options['filters']['date_filter']['table'] = 'node';
  $handler->display->display_options['filters']['date_filter']['field'] = 'date_filter';
  $handler->display->display_options['filters']['date_filter']['operator'] = '>=';
  $handler->display->display_options['filters']['date_filter']['default_date'] = 'now';
  $handler->display->display_options['filters']['date_filter']['add_delta'] = 'yes';
  $handler->display->display_options['filters']['date_filter']['date_fields'] = array(
    'field_data_field_fecha_evento_calendario.field_fecha_evento_calendario_value' => 'field_data_field_fecha_evento_calendario.field_fecha_evento_calendario_value',
  );
  /* Filter criterion: Contenido: Idioma */
  $handler->display->display_options['filters']['language']['id'] = 'language';
  $handler->display->display_options['filters']['language']['table'] = 'node';
  $handler->display->display_options['filters']['language']['field'] = 'language';
  $handler->display->display_options['filters']['language']['value'] = array(
    '***CURRENT_LANGUAGE***' => '***CURRENT_LANGUAGE***',
  );  
  
  $views[$view->name] = $view;


  /* Vista para exportar */

  $view = new view();
  $view->name = 'export_events';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Exportar eventos';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */
  
  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['title'] = 'Exportar eventos';
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['use_more_text'] = 'más';
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['exposed_form']['options']['submit_button'] = 'Aplicar';
  $handler->display->display_options['exposed_form']['options']['reset_button_label'] = 'Reiniciar';
  $handler->display->display_options['exposed_form']['options']['exposed_sorts_label'] = 'Ordenar por';
  $handler->display->display_options['pager']['type'] = 'full';
  $handler->display->display_options['pager']['options']['items_per_page'] = '30';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['pager']['options']['id'] = '0';
  $handler->display->display_options['pager']['options']['quantity'] = '9';
  $handler->display->display_options['pager']['options']['expose']['items_per_page_label'] = 'Elementos por página';
  $handler->display->display_options['pager']['options']['expose']['items_per_page_options_all_label'] = '- Todo -';
  $handler->display->display_options['pager']['options']['expose']['offset_label'] = 'Desplazamiento';
  $handler->display->display_options['pager']['options']['tags']['first'] = '« primero';
  $handler->display->display_options['pager']['options']['tags']['previous'] = '‹ anterior';
  $handler->display->display_options['pager']['options']['tags']['next'] = 'siguiente ›';
  $handler->display->display_options['pager']['options']['tags']['last'] = 'última »';
  $handler->display->display_options['style_plugin'] = 'table';
  /* Campo: Contenido: Título */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['title']['element_wrapper_type'] = '0';
  $handler->display->display_options['fields']['title']['element_default_classes'] = FALSE;
  $handler->display->display_options['fields']['title']['link_to_node'] = FALSE;
  /* Campo: Contenido: Lugar */
  $handler->display->display_options['fields']['field_lugar_eventos']['id'] = 'field_lugar_eventos';
  $handler->display->display_options['fields']['field_lugar_eventos']['table'] = 'field_data_field_lugar_eventos';
  $handler->display->display_options['fields']['field_lugar_eventos']['field'] = 'field_lugar_eventos';
  $handler->display->display_options['fields']['field_lugar_eventos']['element_wrapper_type'] = '0';
  $handler->display->display_options['fields']['field_lugar_eventos']['element_default_classes'] = FALSE;
  $handler->display->display_options['fields']['field_lugar_eventos']['type'] = 'text_plain';
  /* Campo: Contenido: Fecha Evento */
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['id'] = 'field_fecha_evento_calendario';
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['table'] = 'field_data_field_fecha_evento_calendario';
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['field'] = 'field_fecha_evento_calendario';
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['element_wrapper_type'] = '0';
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['element_default_classes'] = FALSE;
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['settings'] = array(
    'format_type' => 'short',
    'custom_date_format' => '',
    'fromto' => 'both',
    'multiple_number' => '',
    'multiple_from' => '',
    'multiple_to' => '',
    'show_remaining_days' => 0,
  );
  /* Campo: Contenido: Hora Evento */
  $handler->display->display_options['fields']['field_hora_evento']['id'] = 'field_hora_evento';
  $handler->display->display_options['fields']['field_hora_evento']['table'] = 'field_data_field_hora_evento';
  $handler->display->display_options['fields']['field_hora_evento']['field'] = 'field_hora_evento';
  $handler->display->display_options['fields']['field_hora_evento']['element_wrapper_type'] = '0';
  $handler->display->display_options['fields']['field_hora_evento']['element_default_classes'] = FALSE;
  $handler->display->display_options['fields']['field_hora_evento']['type'] = 'text_plain';
  /* Campo: Contenido: Categoría */
  $handler->display->display_options['fields']['field_categoria_evento']['id'] = 'field_categoria_evento';
  $handler->display->display_options['fields']['field_categoria_evento']['table'] = 'field_data_field_categoria_evento';
  $handler->display->display_options['fields']['field_categoria_evento']['field'] = 'field_categoria_evento';
  $handler->display->display_options['fields']['field_categoria_evento']['label'] = 'Categoría Evento';
  $handler->display->display_options['fields']['field_categoria_evento']['element_wrapper_type'] = '0';
  $handler->display->display_options['fields']['field_categoria_evento']['element_default_classes'] = FALSE;
  $handler->display->display_options['fields']['field_categoria_evento']['type'] = 'i18n_taxonomy_term_reference_plain';
  $handler->display->display_options['fields']['field_categoria_evento']['delta_offset'] = '0';
  $handler->display->display_options['fields']['field_categoria_evento']['multi_type'] = 'ol';
  /* Campo: Contenido: Descripción */
  $handler->display->display_options['fields']['field_descripcion_eventos']['id'] = 'field_descripcion_eventos';
  $handler->display->display_options['fields']['field_descripcion_eventos']['table'] = 'field_data_field_descripcion_eventos';
  $handler->display->display_options['fields']['field_descripcion_eventos']['field'] = 'field_descripcion_eventos';
  $handler->display->display_options['fields']['field_descripcion_eventos']['element_wrapper_type'] = '0';
  $handler->display->display_options['fields']['field_descripcion_eventos']['element_default_classes'] = FALSE;
  $handler->display->display_options['fields']['field_descripcion_eventos']['type'] = 'text_plain';
  /* Sort criterion: Contenido: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Filter criterion: Contenido: Publicado */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Contenido: Tipo */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'eventos' => 'eventos',
  );
  $handler->display->display_options['filters']['type']['group'] = 1;
  /* Filter criterion: Contenido: Fecha Evento -  start date (field_fecha_evento_calendario) */
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value']['id'] = 'field_fecha_evento_calendario_value';
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value']['table'] = 'field_data_field_fecha_evento_calendario';
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value']['field'] = 'field_fecha_evento_calendario_value';
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value']['operator'] = '>=';
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value']['group'] = 1;
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value']['expose']['operator_id'] = 'field_fecha_evento_calendario_value_op';
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value']['expose']['label'] = 'Fecha inicial';
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value']['expose']['operator'] = 'field_fecha_evento_calendario_value_op';
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value']['expose']['identifier'] = 'field_fecha_evento_calendario_value';
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    11 => 0,
    12 => 0,
    13 => 0,
    14 => 0,
  );
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value']['group_info']['label'] = 'Fecha Evento -  start date (field_fecha_evento_calendario)';
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value']['group_info']['identifier'] = 'field_fecha_evento_calendario_value';
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value']['group_info']['remember'] = FALSE;
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value']['group_info']['group_items'] = array(
    1 => array(),
    2 => array(),
    3 => array(),
  );
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value']['granularity'] = 'minute';
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value']['form_type'] = 'date_popup';
  /* Filter criterion: Contenido: Fecha Evento -  start date (field_fecha_evento_calendario) */
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value_1']['id'] = 'field_fecha_evento_calendario_value_1';
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value_1']['table'] = 'field_data_field_fecha_evento_calendario';
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value_1']['field'] = 'field_fecha_evento_calendario_value';
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value_1']['operator'] = '<=';
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value_1']['group'] = 1;
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value_1']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value_1']['expose']['operator_id'] = 'field_fecha_evento_calendario_value_1_op';
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value_1']['expose']['label'] = 'Fecha límite';
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value_1']['expose']['operator'] = 'field_fecha_evento_calendario_value_1_op';
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value_1']['expose']['identifier'] = 'field_fecha_evento_calendario_value_1';
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value_1']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    11 => 0,
    12 => 0,
    13 => 0,
    14 => 0,
  );
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value_1']['granularity'] = 'second';
  $handler->display->display_options['filters']['field_fecha_evento_calendario_value_1']['form_type'] = 'date_popup';
  /* Filter criterion: Contenido: Categoría (field_categoria_evento) */
  $handler->display->display_options['filters']['field_categoria_evento_tid']['id'] = 'field_categoria_evento_tid';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['table'] = 'field_data_field_categoria_evento';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['field'] = 'field_categoria_evento_tid';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['group'] = 1;
  $handler->display->display_options['filters']['field_categoria_evento_tid']['exposed'] = TRUE;
  $handler->display->display_options['filters']['field_categoria_evento_tid']['expose']['operator_id'] = 'field_categoria_evento_tid_op';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['expose']['label'] = 'Categoría evento';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['expose']['operator'] = 'field_categoria_evento_tid_op';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['expose']['identifier'] = 'field_categoria_evento_tid';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['expose']['remember_roles'] = array(
    2 => '2',
    1 => 0,
    3 => 0,
    11 => 0,
    12 => 0,
    13 => 0,
    14 => 0,
  );
  $handler->display->display_options['filters']['field_categoria_evento_tid']['reduce_duplicates'] = TRUE;
  $handler->display->display_options['filters']['field_categoria_evento_tid']['type'] = 'select';
  $handler->display->display_options['filters']['field_categoria_evento_tid']['vocabulary'] = 'categoria_eventos';
  
  /* Display: Exportar eventos */
  $handler = $view->new_display('page', 'Exportar eventos', 'page_expev');
  $handler->display->display_options['path'] = 'eventos/exportar';
  $handler->display->display_options['menu']['type'] = 'tab';
  $handler->display->display_options['menu']['title'] = $t('Export events');
  $handler->display->display_options['menu']['weight'] = '5';
  $handler->display->display_options['menu']['context'] = 0;
  $handler->display->display_options['menu']['context_only_inline'] = 0;
  
  /* Display: Exportación de datos */
  $handler = $view->new_display('views_data_export', 'Exportación de datos', 'views_data_export_1');
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['style_plugin'] = 'views_data_export_xlsx';
  $handler->display->display_options['style_options']['provide_file'] = 1;
  $handler->display->display_options['style_options']['filename'] = '%view%timestamp-full.xlsx';
  $handler->display->display_options['style_options']['parent_sort'] = 0;
  $handler->display->display_options['defaults']['fields'] = FALSE;
  /* Campo: Contenido: Título */
  $handler->display->display_options['fields']['title']['id'] = 'title';
  $handler->display->display_options['fields']['title']['table'] = 'node';
  $handler->display->display_options['fields']['title']['field'] = 'title';
  $handler->display->display_options['fields']['title']['alter']['word_boundary'] = FALSE;
  $handler->display->display_options['fields']['title']['alter']['ellipsis'] = FALSE;
  $handler->display->display_options['fields']['title']['element_wrapper_type'] = '0';
  $handler->display->display_options['fields']['title']['element_default_classes'] = FALSE;
  $handler->display->display_options['fields']['title']['link_to_node'] = FALSE;
  /* Campo: Contenido: Lugar */
  $handler->display->display_options['fields']['field_lugar_eventos']['id'] = 'field_lugar_eventos';
  $handler->display->display_options['fields']['field_lugar_eventos']['table'] = 'field_data_field_lugar_eventos';
  $handler->display->display_options['fields']['field_lugar_eventos']['field'] = 'field_lugar_eventos';
  $handler->display->display_options['fields']['field_lugar_eventos']['element_wrapper_type'] = '0';
  $handler->display->display_options['fields']['field_lugar_eventos']['element_default_classes'] = FALSE;
  $handler->display->display_options['fields']['field_lugar_eventos']['type'] = 'text_plain';
  /* Campo: Contenido: Fecha Evento */
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['id'] = 'field_fecha_evento_calendario';
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['table'] = 'field_data_field_fecha_evento_calendario';
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['field'] = 'field_fecha_evento_calendario';
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['element_type'] = '0';
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['element_wrapper_type'] = '0';
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['element_default_classes'] = FALSE;
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['type'] = 'date_plain';
  $handler->display->display_options['fields']['field_fecha_evento_calendario']['settings'] = array(
    'format_type' => 'short',
    'custom_date_format' => '',
    'fromto' => 'both',
    'multiple_number' => '',
    'multiple_from' => '',
    'multiple_to' => '',
    'show_remaining_days' => 0,
  );
  /* Campo: Contenido: Hora Evento */
  $handler->display->display_options['fields']['field_hora_evento']['id'] = 'field_hora_evento';
  $handler->display->display_options['fields']['field_hora_evento']['table'] = 'field_data_field_hora_evento';
  $handler->display->display_options['fields']['field_hora_evento']['field'] = 'field_hora_evento';
  $handler->display->display_options['fields']['field_hora_evento']['element_wrapper_type'] = '0';
  $handler->display->display_options['fields']['field_hora_evento']['element_default_classes'] = FALSE;
  $handler->display->display_options['fields']['field_hora_evento']['type'] = 'text_plain';
  /* Campo: Contenido: Categoría */
  $handler->display->display_options['fields']['field_categoria_evento']['id'] = 'field_categoria_evento';
  $handler->display->display_options['fields']['field_categoria_evento']['table'] = 'field_data_field_categoria_evento';
  $handler->display->display_options['fields']['field_categoria_evento']['field'] = 'field_categoria_evento';
  $handler->display->display_options['fields']['field_categoria_evento']['label'] = 'Categoría Evento';
  $handler->display->display_options['fields']['field_categoria_evento']['element_type'] = '0';
  $handler->display->display_options['fields']['field_categoria_evento']['element_label_type'] = '0';
  $handler->display->display_options['fields']['field_categoria_evento']['element_wrapper_type'] = '0';
  $handler->display->display_options['fields']['field_categoria_evento']['element_default_classes'] = FALSE;
  $handler->display->display_options['fields']['field_categoria_evento']['type'] = 'taxonomy_term_reference_plain';
  $handler->display->display_options['fields']['field_categoria_evento']['delta_offset'] = '0';
  /* Campo: Contenido: Descripción */
  $handler->display->display_options['fields']['field_descripcion_eventos']['id'] = 'field_descripcion_eventos';
  $handler->display->display_options['fields']['field_descripcion_eventos']['table'] = 'field_data_field_descripcion_eventos';
  $handler->display->display_options['fields']['field_descripcion_eventos']['field'] = 'field_descripcion_eventos';
  $handler->display->display_options['fields']['field_descripcion_eventos']['element_wrapper_type'] = '0';
  $handler->display->display_options['fields']['field_descripcion_eventos']['element_default_classes'] = FALSE;
  $handler->display->display_options['fields']['field_descripcion_eventos']['type'] = 'text_plain';
  $handler->display->display_options['path'] = 'eventos/exportar/datos-eventos.xlsx';
  $handler->display->display_options['displays'] = array(
    'page_expev' => 'page',
    'default' => 0,
  );

  $views[$view->name] = $view;

  return $views;
}
