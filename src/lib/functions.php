<?php
/**
 * Functions library.
 *
 * A library of functions used by the various themes.
 *
 * @author     Cory Collier <corycollier@corycollier.com>
 * @license    http://opensource.org/licenses/MIT  MIT License
 * @version    git: $Id$
 * @link       https://github.com/corycollier/simplesamlphp-module-themes
 * @see        https://github.com/simplesamlphp/simplesamlphp/
 * @since      File available since Release 1.3.0
 */

/**
 * Gets the language navigation bar.
 *
 * @param SimpleSAML_XHTML_Template $view The view object,
 * @param array $post The _POST array.
 *
 * @return string Resulting html markup.
 */
function simplesamlphp_get_languagebar(SimpleSAML_XHTML_Template $view, $params = array()) {
  if (!empty($params['post'])) {
    return '';
  }

  if (isset($view->data['hideLanguageBar']) && $view->data['hideLanguageBar'] === TRUE) {
    return '';
  }

  $languages = simplesamlphp_get_languages();
  $result    = '<ul class="dropdown-menu">';
  $template  = '<li><a href="!href">!name</a></li>';
  foreach ($languages as $lang => $name) {
    $href = \SimpleSAML\Utils\HTTP::addURLParameters(\SimpleSAML\Utils\HTTP::getSelfURL(), array(
      $params['languageParameterName'] => $lang
    ));
    $result .= strtr($template, array(
      '!href' => $href,
      '!name' => $name
    ));
  }
  return $result . '</ul>';
}

/**
 * Returns all of the supported languages
 *
 * @return array An associative array of language code to language names.
 */
function simplesamlphp_get_languages() {
  return array(
    'no'    => 'Bokmål', // Norwegian Bokmål
    'nn'    => 'Nynorsk', // Norwegian Nynorsk
    'se'    => 'Sámegiella', // Northern Sami
    'sam'   => 'Åarjelh-saemien giele', // Southern Sami
    'da'    => 'Dansk', // Danish
    'en'    => 'English',
    'de'    => 'Deutsch', // German
    'sv'    => 'Svenska', // Swedish
    'fi'    => 'Suomeksi', // Finnish
    'es'    => 'Español', // Spanish
    'fr'    => 'Français', // French
    'it'    => 'Italiano', // Italian
    'nl'    => 'Nederlands', // Dutch
    'lb'    => 'Lëtzebuergesch', // Luxembourgish
    'cs'    => 'Čeština', // Czech
    'sl'    => 'Slovenščina', // Slovensk
    'lt'    => 'Lietuvių kalba', // Lithuanian
    'hr'    => 'Hrvatski', // Croatian
    'hu'    => 'Magyar', // Hungarian
    'pl'    => 'Język polski', // Polish
    'pt'    => 'Português', // Portuguese
    'pt-br' => 'Português brasileiro', // Portuguese
    'ru'    => 'русский язык', // Russian
    'et'    => 'eesti keel', // Estonian
    'tr'    => 'Türkçe', // Turkish
    'el'    => 'ελληνικά', // Greek
    'ja'    => '日本語', // Japanese
    'zh'    => '简体中文', // Chinese (simplified)
    'zh-tw' => '繁體中文', // Chinese (traditional)
    'ar'    => 'العربية', // Arabic
    'fa'    => 'پارسی', // Persian
    'ur'    => 'اردو', // Urdu
    'he'    => 'עִבְרִית', // Hebrew
    'id'    => 'Bahasa Indonesia', // Indonesian
    'sr'    => 'Srpski', // Serbian
    'lv'    => 'Latviešu', // Latvian
    'ro'    => 'Românește', // Romanian
    'eu'    => 'Euskara', // Basque
  );
}

/**
 * Returns the mtype for a given set.
 *
 * @param string $set The name of the set.
 * @return string
 */
function simplesamlphp_get_mtype($set) {
  $map = array(
    'saml20-sp-remote'  => '{admin:metadata_saml20-sp}',
    'saml20-sp-hosted'  => '{admin:metadata_saml20-sp}',
    'saml20-idp-remote' => '{admin:metadata_saml20-idp}',
    'saml20-idp-hosted' => '{admin:metadata_saml20-idp}',
    'shib13-sp-remote'  => '{admin:metadata_shib13-sp}',
    'shib13-sp-hosted'  => '{admin:metadata_shib13-sp}',
    'shib13-idp-remote' => '{admin:metadata_shib13-idp}',
    'shib13-idp-hosted' => '{admin:metadata_shib13-idp}',
    'adfs-sp-remote'    => '{admin:metadata_adfs-sp}',
    'adfs-sp-hosted'    => '{admin:metadata_adfs-sp}',
    'adfs-idp-remote'   => '{admin:metadata_adfs-idp}',
    'adfs-idp-hosted'   => '{admin:metadata_adfs-idp}',
  );

  return $map[$set];
}

/**
 * Gets the name value from an entry array.
 *
 * @param  SimpleSAML_XHTML_Template $view  The view object.
 * @param  array $entry The entry array.
 *
 * @return string The resulting name value.
 */
function simplesamlphp_get_entry_name ($view, $entry = array()) {
  $result = $entry['entityid'];
  if (!empty($entry['name'])) {
    $name   = SimpleSAML\Utils\Arrays::arrayize($entry['name'], 'en');
    $result = $view->getTranslation($name);
  } elseif (!empty($entry['OrganizationDisplayName'])) {
    $name   = SimpleSAML\Utils\Arrays::arrayize($entry['OrganizationDisplayName'], 'en');
    $result = $view->getTranslation($name);
  }

  return htmlspecialchars($result);
}

/**
 * Gets the href value for a given entry.
 *
 * @param  SimpleSAML_XHTML_Template $view The view object.
 * @param  array $entry Information regarding the entry.
 *
 * @return string The resulting url.
 */
function simplesamlphp_get_entry_href ($view, $key, $entry = array()) {
  $raw = SimpleSAML_Module::getModuleURL('core/show_metadata.php', array(
    'set'      => $key,
    'entityid' => $entry['entityid'],
  ));

  return htmlspecialchars($raw);
}

/**
 * Gets the expires value for a given entry.
 *
 * @param  SimpleSAML_XHTML_Template $view  The view object.
 * @param  array  $entry Information regarding the entry.
 *
 * @return string The resulting information regarding expiry.
 */
function simplesamlphp_get_expires ($view, $entry = array()) {
  $now = time();
  if (array_key_exists('expire', $entry)) {
    if ($entry['expire'] < $now) {
      $value = number_format(($now - $entry['expire'])/3600, 1);
      return '(expired ' . $value . ' hours ago)';
    }
    $value = number_format(($entry['expire'] - $now)/3600, 1);
    return '(expires in ' . $value . ' hours)';
  }
}
