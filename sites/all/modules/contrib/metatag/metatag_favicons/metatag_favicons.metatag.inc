<?php
/**
 * @file
 * Metatag integration for the Metatag:favicons module.
 */

/**
 * Implements hook_metatag_bundled_config_alter().
 */
function metatag_favicons_metatag_bundled_config_alter(&$config) {
  $favicon = metatag_favicons_get_theme_favicon();
  if (!empty($favicon)) {
    $config['global']->config['shortcut icon'] = array('value' => $favicon);
  }
}

/**
 * Implements hook_metatag_info().
 */
function metatag_favicons_metatag_info() {
  $info['groups']['favicons'] = array(
    'label' => t('Favicons & touch icons'),
    'description' => t('Meta tags for displaying favicons of various sizes and types. All values should be either absolute or relative URLs. No effects are added to the "precomposed" icons.'),
    'form' => array(
      '#weight' => 100,
    ),
  );

  // favicons meta tags stack after the simple tags.
  $weight = 100;

  // Default values for each meta tag.
  $favicon_defaults = array(
    'description' => '',
    'class' => 'DrupalLinkMetaTag',
    'group' => 'favicons',
    'url' => TRUE,
    'context' => array('global'),
  );

  $info['tags']['shortcut icon'] = array(
    'label' => t('Default shortcut icon'),
    'description' => t('The traditional favicon, must be either a GIF, ICO, JPG/JPEG or PNG image.'),
    'weight' => ++$weight,
    'element' => array(
      '#rel' => 'shortcut icon',
      '#theme' => 'metatag_shortcut_icon',
    ),
  ) + $favicon_defaults;

  $info['tags']['mask-icon'] = array(
    'label' => t('Icon: SVG'),
    'description' => t('A grayscale scalable vector graphic (SVG) file.'),
    'weight' => ++$weight,
    'element' => array(
      '#theme' => 'metatag_mask_icon',
    ),
    'class' => 'DrupalMaskIconMetaTag',
    'replaces' => array('icon_any'),
  ) + $favicon_defaults;

  $info['tags']['icon_16x16'] = array(
    'label' => t('Icon: 16px x 16px'),
    'description' => t('A PNG image that is 16px wide by 16px high.'),
    'weight' => ++$weight,
    'element' => array(
      '#rel' => 'icon',
      '#sizes' => '16x16',
      '#theme' => 'metatag_favicon',
    ),
  ) + $favicon_defaults;

  $info['tags']['icon_32x32'] = array(
    'label' => t('Icon: 32px x 32px'),
    'description' => t('A PNG image that is 32px wide by 32px high.'),
    'weight' => ++$weight,
    'element' => array(
      '#rel' => 'icon',
      '#sizes' => '32x32',
      '#theme' => 'metatag_favicon',
    ),
  ) + $favicon_defaults;

  $info['tags']['icon_96x96'] = array(
    'label' => t('Icon: 96px x 96px'),
    'description' => t('A PNG image that is 96px wide by 96px high.'),
    'weight' => ++$weight,
    'element' => array(
      '#rel' => 'icon',
      '#sizes' => '96x96',
      '#theme' => 'metatag_favicon',
    ),
  ) + $favicon_defaults;

  $info['tags']['icon_192x192'] = array(
    'label' => t('Icon: 192px x 192px'),
    'description' => t('A PNG image that is 192px wide by 192px high.'),
    'weight' => ++$weight,
    'element' => array(
      '#rel' => 'icon',
      '#sizes' => '192x192',
      '#theme' => 'metatag_favicon',
    ),
  ) + $favicon_defaults;

  $info['tags']['apple-touch-icon'] = array(
    'label' => t('Apple touch icon: 60px x 60px'),
    'description' => t('A PNG image that is 60px wide by 60px high. Used with the non-Retina iPhone, iPod Touch, and Android 2.1+ devices.'),
    'weight' => ++$weight,
    'element' => array(
      '#rel' => 'apple-touch-icon',
      '#theme' => 'metatag_favicon',
    ),
  ) + $favicon_defaults;

  $info['tags']['apple-touch-icon_72x72'] = array(
    'label' => t('Apple touch icon: 72px x 72px'),
    'description' => t('A PNG image that is 72px wide by 72px high. Used with the iPad mini and the first- and second-generation iPad (@1x display) on iOS <= 6.'),
    'weight' => ++$weight,
    'element' => array(
      '#rel' => 'apple-touch-icon',
      '#sizes' => '72x72',
      '#theme' => 'metatag_favicon',
    ),
  ) + $favicon_defaults;

  $info['tags']['apple-touch-icon_76x76'] = array(
    'label' => t('Apple touch icon: 76px x 76px'),
    'description' => t('A PNG image that is 76px wide by 76px high. Used with the iPad mini and the second-generation iPad (@1x display) on iOS >= 7.'),
    'weight' => ++$weight,
    'element' => array(
      '#rel' => 'apple-touch-icon',
      '#sizes' => '76x76',
      '#theme' => 'metatag_favicon',
    ),
  ) + $favicon_defaults;

  $info['tags']['apple-touch-icon_114x114'] = array(
    'label' => t('Apple touch icon: 114px x 114px'),
    'description' => t('A PNG image that is 114px wide by 114px high. Used with iPhone with @2x display running iOS <= 6.'),
    'weight' => ++$weight,
    'element' => array(
      '#rel' => 'apple-touch-icon',
      '#sizes' => '114x114',
      '#theme' => 'metatag_favicon',
    ),
  ) + $favicon_defaults;

  $info['tags']['apple-touch-icon_120x120'] = array(
    'label' => t('Apple touch icon: 120px x 120px'),
    'description' => t('A PNG image that is 120px wide by 120px high. Used with iPhone with @2x display running iOS >= 7.'),
    'weight' => ++$weight,
    'element' => array(
      '#rel' => 'apple-touch-icon',
      '#sizes' => '120x120',
      '#theme' => 'metatag_favicon',
    ),
  ) + $favicon_defaults;

  $info['tags']['apple-touch-icon_144x144'] = array(
    'label' => t('Apple touch icon: 144px x 144px'),
    'description' => t('A PNG image that is 144px wide by 144px high. Used with iPad with @2x display running iOS <= 6.'),
    'weight' => ++$weight,
    'element' => array(
      '#rel' => 'apple-touch-icon',
      '#sizes' => '144x144',
      '#theme' => 'metatag_favicon',
    ),
  ) + $favicon_defaults;

  $info['tags']['apple-touch-icon_152x152'] = array(
    'label' => t('Apple touch icon: 152px x 152px'),
    'description' => t('A PNG image that is 152px wide by 152px high. Used with iPad with @2x display running iOS >= 7.'),
    'weight' => ++$weight,
    'element' => array(
      '#rel' => 'apple-touch-icon',
      '#sizes' => '152x152',
      '#theme' => 'metatag_favicon',
    ),
  ) + $favicon_defaults;

  $info['tags']['apple-touch-icon_180x180'] = array(
    'label' => t('Apple touch icon: 180px x 180px'),
    'description' => t('A PNG image that is 180px wide by 180px high. Used with iPhone 6 Plus with @3x display.'),
    'weight' => ++$weight,
    'element' => array(
      '#rel' => 'apple-touch-icon',
      '#sizes' => '180x180',
      '#theme' => 'metatag_favicon',
    ),
  ) + $favicon_defaults;

  $info['tags']['apple-touch-icon-precomposed'] = array(
    'label' => t('Apple touch icon (precomposed): 57px x 57px'),
    'description' => t('A PNG image that is 57px wide by 57px high. Used with the non-Retina iPhone, iPod Touch, and Android 2.1+ devices.'),
    'weight' => ++$weight,
    'element' => array(
      '#rel' => 'apple-touch-icon-precomposed',
      '#theme' => 'metatag_favicon',
    ),
  ) + $favicon_defaults;

  $info['tags']['apple-touch-icon-precomposed_72x72'] = array(
    'label' => t('Apple touch icon (precomposed): 72px x 72px'),
    'description' => t('A PNG image that is 72px wide by 72px high. Used with the iPad mini and the first- and second-generation iPad (@1x display) on iOS <= 6.'),
    'weight' => ++$weight,
    'element' => array(
      '#rel' => 'apple-touch-icon-precomposed',
      '#sizes' => '72x72',
      '#theme' => 'metatag_favicon',
    ),
  ) + $favicon_defaults;

  $info['tags']['apple-touch-icon-precomposed_76x76'] = array(
    'label' => t('Apple touch icon (precomposed): 76px x 76px'),
    'description' => t('A PNG image that is 76px wide by 76px high. Used with the iPad mini and the second-generation iPad (@1x display) on iOS >= 7.'),
    'weight' => ++$weight,
    'element' => array(
      '#rel' => 'apple-touch-icon-precomposed',
      '#sizes' => '76x76',
      '#theme' => 'metatag_favicon',
    ),
  ) + $favicon_defaults;

  $info['tags']['apple-touch-icon-precomposed_114x114'] = array(
    'label' => t('Apple touch icon (precomposed): 114px x 114px'),
    'description' => t('A PNG image that is 114px wide by 114px high. Used with iPhone with @2x display running iOS <= 6.'),
    'weight' => ++$weight,
    'element' => array(
      '#rel' => 'apple-touch-icon-precomposed',
      '#sizes' => '114x114',
      '#theme' => 'metatag_favicon',
    ),
  ) + $favicon_defaults;

  $info['tags']['apple-touch-icon-precomposed_120x120'] = array(
    'label' => t('Apple touch icon (precomposed): 120px x 120px'),
    'description' => t('A PNG image that is 120px wide by 120px high. Used with iPhone with @2x display running iOS >= 7.'),
    'weight' => ++$weight,
    'element' => array(
      '#rel' => 'apple-touch-icon-precomposed',
      '#sizes' => '120x120',
      '#theme' => 'metatag_favicon',
    ),
  ) + $favicon_defaults;

  $info['tags']['apple-touch-icon-precomposed_144x144'] = array(
    'label' => t('Apple touch icon (precomposed): 144px x 144px'),
    'description' => t('A PNG image that is 144px wide by 144px high. Used with iPad with @2x display running iOS <= 6.'),
    'weight' => ++$weight,
    'element' => array(
      '#rel' => 'apple-touch-icon-precomposed',
      '#sizes' => '144x144',
      '#theme' => 'metatag_favicon',
    ),
  ) + $favicon_defaults;

  $info['tags']['apple-touch-icon-precomposed_152x152'] = array(
    'label' => t('Apple touch icon (precomposed): 152px x 152px'),
    'description' => t('A PNG image that is 152px wide by 152px high. Used with iPad with @2x display running iOS >= 7.'),
    'weight' => ++$weight,
    'element' => array(
      '#rel' => 'apple-touch-icon-precomposed',
      '#sizes' => '152x152',
      '#theme' => 'metatag_favicon',
    ),
  ) + $favicon_defaults;

  $info['tags']['apple-touch-icon-precomposed_180x180'] = array(
    'label' => t('Apple touch icon (precomposed): 180px x 180px'),
    'description' => t('A PNG image that is 180px wide by 180px high. Used with iPhone 6 Plus with @3x display.'),
    'weight' => ++$weight,
    'element' => array(
      '#rel' => 'apple-touch-icon-precomposed',
      '#sizes' => '180x180',
      '#theme' => 'metatag_favicon',
    ),
  ) + $favicon_defaults;

  return $info;
}
