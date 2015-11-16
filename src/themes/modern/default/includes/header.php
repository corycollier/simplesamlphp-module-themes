<?php
/**
 * @file
 * Header include.
 */
?>
<?php
// Define variables.
$url_path = SimpleSAML_Module::getModuleURL('corytheme');
$css_path = $url_path . '/css';
$js_path  = $url_path . '/js';
$img_path = $url_path . '/img';
$title    = isset($this->data['header']) ? $this->data['header'] :'SimpleSAMLphp';
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
        <div class="header col-md-12">
          <h1 class="mainTitle"><?php echo $title; ?></h1>
        </div>
      </div><!-- end .row -->

      <pre>

      <?php print_r($this->configuration); ?>
      </pre>
