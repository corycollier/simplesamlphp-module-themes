<?php
/**
 * Error template.
 *
 * This template is used when an error occurs, and it's displayed to the user.
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
if(array_key_exists('header', $this->data)) {
  if($this->getTag($this->data['header']) !== NULL) {
    $this->data['header'] = $this->t($this->data['header']);
  }
}

$this->includeAtTemplateBase('includes/header.php');
$this->includeAtTemplateBase('includes/attributes.php');

$nameid = $this->data['nameid'];
$status = $this->t('{status:subject_format}');
$list = array(
  'NameId' => array($nameid['Value']),
  $status  => array($nameid['Format']),
);
$header = isset($this->data['header'])
  ? $this->data['header']
  : $this->t('{status:some_error_occurred}');
?>

<div class="col-md-12">
  <h2><?php $header; ?></h2>
  <p><?php echo($this->t('{status:intro}')); ?></p>
  <?php if (isset($this->data['remaining'])) : ?>
    <p>
      <?php echo $this->t('{status:validfor}', array(
        '%SECONDS%' => $this->data['remaining']
      )); ?>
    </p>
  <?php endif; ?>

  <?php if (isset($this->data['sessionsize'])) : ?>
    <p>
      <?php echo $this->t('{status:sessionsize}', array(
        '%SIZE%' => $this->data['sessionsize']
      )); ?>
    </p>
  <?php endif; ?>
</div>

<!-- attribute values -->
<div class="col-md-12">
  <h2><?php echo($this->t('{status:attributes_header}')); ?></h2>
  <table class="table">
    <thead>
      <th>Name</th>
      <th>Value</th>
    </thead>
    <tbody>
    <?php foreach ($this->data['attributes'] as $name => $values) : ?>
      <tr>
        <td><code><?php echo $name; ?></code></td>
        <td><code><?php echo $values[0]; ?></code></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>

<!-- list values -->
<div class="col-md-12">
<?php if ( $nameid !== FALSE ) : ?>
  <h2><?php echo $this->t('{status:subject_header}'); ?></h2>
  <?php if ( !isset($nameid['Value']) ) : ?>
    <?php $list = array("NameID" => array($this->t('{status:subject_notset}'))); ?>
    <p>NameID:
      <span class="notset">
        <?php echo $this->t('{status:subject_notset}'); ?>
      </span>
    </p>
  <?php endif; ?>
  <table class="table">
    <thead>
      <th>Name</th>
      <th>Value</th>
    </thead>
    <tbody>
    <?php foreach ($list as $name => $values) : ?>
      <tr>
        <td><code><?php echo $name; ?></code></td>
        <td><code><?php echo $values[0]; ?></code></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>
</div>

<!-- logout stuff -->
<div class="col-md-12">
  <?php if (isset($this->data['logout'])) : ?>
    <h2><?php echo $this->t('{status:logout}'); ?></h2>
    <p><?php echo $this->data['logout']; ?></p>
  <?php endif; ?>

  <?php if (isset($this->data['logouturl'])) : ?>
    <h2><?php echo $this->t('{status:logout}'); ?></h2>
    <p>[ <a href="<?php echo htmlspecialchars($this->data['logouturl']); ?>">
      <?php echo $this->t('{status:logout}'); ?></a> ]
    </p>
  <?php endif; ?>
</div>
<?php $this->includeAtTemplateBase('includes/footer.php');
