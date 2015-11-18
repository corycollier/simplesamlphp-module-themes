<?php
/**
 * Header template.
 *
 * The main header template. This is used throughout the application.
 *
 * @author     Cory Collier <corycollier@corycollier.com>
 * @license    http://opensource.org/licenses/MIT  MIT License
 * @version    git: $Id$
 * @link       https://github.com/corycollier/simplesamlphp-module-themes
 * @see        https://github.com/simplesamlphp/simplesamlphp/
 * @since      File available since Release 1.3.0
 */
?>
<?php
$dir = SimpleSAML_Module::getModuleDir('themes');
require $dir . '/lib/functions.php';

// Define variables.
$url_path  = SimpleSAML_Module::getModuleURL('themes');
$css_path  = $url_path . '/css';
$js_path   = $url_path . '/js';
$img_path  = $url_path . '/img';

$login_url = isset($this->data['loginurl'])
  ? $this->data['loginurl']
  : '';

$title     = isset($this->data['header'])
  ? $this->data['header']
  : 'SimpleSAMLphp';

$alert_msg = isset($this->data['isadmin'])
  ? $this->t('{core:frontpage:loggedin_as_admin}')
  : '<a href="' . $login_url . '">' . $this->t('{core:frontpage:login_as_admin}') . '</a>';

if (array_key_exists('pageid', $this->data)) :
  $hookinfo = array(
    'pre'    => &$this->data['htmlinject']['htmlContentPre'],
    'post'   => &$this->data['htmlinject']['htmlContentPost'],
    'head'   => &$this->data['htmlinject']['htmlContentHead'],
    'jquery' => &$jquery,
    'page'   => $this->data['pageid']
  );
  SimpleSAML_Module::callHooks('htmlinject', $hookinfo);

endif;
?>

<!doctype html>
<html class="" lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" type="text/css" href="<?php echo $css_path; ?>/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $css_path; ?>/bootstrap-theme.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $css_path; ?>/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $css_path; ?>/print.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $css_path; ?>/screen.css" />

    <!--[if IE]>
      <link href="<?php echo $css_path; ?>/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
    <![endif]-->

  </head>
  <body>

    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser.
        Please <a href="http://browsehappy.com/">upgrade your browser</a> to
        improve your experience.</p>
    <![endif]-->

    <!-- start .header -->
    <div class="header">
      <nav class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navigation" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo $title; ?></a>
          </div>
          <div class="collapse navbar-collapse" id="header-navigation">
            <ul class="nav navbar-nav">
              <li role="presentation"><a href="/">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li role="presentation" class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                  Language <span class="caret"></span>
                </a>
                <?php
                // render the language selector
                echo simplesamlphp_get_languagebar($this, array(
                  'post' => $_POST,
                  'languageParameterName' => $this->languageParameterName,
                ));
                ?>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="container">
        <div class="row">
          <div class="page-header col-md-12">
            <h1 class="mainTitle"><?php echo $title; ?></h1>
          </div>
          <div class="alert">
            <p><?php echo $alert_msg;?></p>
          </div>
        </div>
      </div>

    </div>

    <!-- start the .content.row -->
    <div class="content">
      <div class="container">
      <?php
      if(!empty($this->data['htmlinject']['htmlContentPre'])) :
        foreach($this->data['htmlinject']['htmlContentPre'] as $content) :
          echo $content;
        endforeach;
      endif;
      ?>
        <div class="row">
