<?php
/**
 * @file
 * Header include.
 */
?>
<?php
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

    <div class="container">

      <div class="row">
        <div class="page-header col-md-12">
          <h1 class="mainTitle"><?php echo $title; ?></h1>
        </div>
        <div class="alert">
          <p><?php echo $alert_msg;?></p>
        </div>
      </div><!-- end .row -->

      <?php
      if(!empty($this->data['htmlinject']['htmlContentPre'])) :
        foreach($this->data['htmlinject']['htmlContentPre'] as $content) :
          echo $content;
        endforeach;
      endif;
      ?>


