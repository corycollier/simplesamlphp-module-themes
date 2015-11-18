<?php
/* vim: set expandtab tabstop=2 shiftwidth=2 softtabstop=2: */

/**
 * The htmlinject hook.
 *
 * A function used to inject html. This utilizes the hook pattern of the theme.
 *
 * @author     Cory Collier <corycollier@corycollier.com>
 * @license    http://opensource.org/licenses/MIT  MIT License
 * @version    git: $Id$
 * @link       https://github.com/corycollier/simplesamlphp-module-themes
 * @see        https://github.com/simplesamlphp/simplesamlphp/
 * @since      File available since Release 1.3.0
 */

/**
 * Hook to modify HTML content from previous hook implementations.
 *
 * @param  array &$hookinfo A reference to all of the hook information.
 *
 * @return array The modified hookinfo parameter.
 */
function themes_hook_htmlinject(&$hookinfo) {
  if (!isset($hookinfo['pre'])) {
    return;
  }

  foreach ($hookinfo['pre'] as $i => $info) {
    if (!strpos($info, 'tabset_tabs ui-tabs-nav')) {
      continue;
    }

    // This is pretty ugly, but to get the theme to work, We've got to modify the
    // existing markup. Overriding it would be ideal.
    $info = strtr($info, array(
      // 'id="portalcontent"' => '',
      // 'id="portalmenu"'    => '',
      'tabset_tabs ui-tabs-nav ui-helper-reset '          => 'nav nav-tabs',
      'ui-tabs-panel ui-widget-content ui-corner-bottom'  => '',
      'ui-helper-clearfix ui-widget-header ui-corner-all' => '',
      'ui-tabs ui-widget ui-widget-content ui-corner-all' => '',
    ));

    $hookinfo['pre'][$i] = $info;
  }
}

/*
 * Local variables:
 * tab-width: 2
 * c-basic-offset: 2
 * c-hanging-comment-ender-p: nil
 * End:
 */
