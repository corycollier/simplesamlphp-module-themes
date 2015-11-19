<?php
/**
 * Sanity Check template
 *
 * Shows all of the sanity checks
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
$this->data['header'] = 'Sanity check';
$this->includeAtTemplateBase('includes/header.php');
?>

<?php if (count($this->data['errors'])) : ?>
<div class="row">
  <div class="col-md-12">
    <p> These checks failed:</p>
    <?php foreach ($this->data['errors'] as $err) :  ?>
      <div class="alert alert-warning">
        <i class="glyphicon glyphicon-remove"></i> <?php echo $err; ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>

<?php if (count($this->data['info'])) :  ?>
<div class="row">
  <div class="col-md-12">
    <p> These checks succeeded:</p>
    <?php foreach ($this->data['info'] as $info) : ?>
    <div class="alert alert-success">
      <i class="glyphicon glyphicon-ok"></i> <?php echo $info; ?>
    </div>
    <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>

<?php $this->includeAtTemplateBase('includes/footer.php'); ?>
