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
    <ul>
    <?php foreach ($this->data['errors'] as $err) :  ?>
      <li><i class="glyphicon glyphicon-remove"></i> <?php echo $err; ?></li>
    <?php endforeach; ?>
    </ul>
  </div>
</div>
<?php endif; ?>

<?php if (count($this->data['info'])) :  ?>
<div class="row">
  <div class="col-md-12">
    <p> These checks succeeded:</p>
    <ul>
    <?php foreach ($this->data['info'] as $info) : ?>
      <li><i class="glyphicon glyphicon-ok"></i> <?php echo $info; ?></li>
    <?php endforeach; ?>
    </ul>
  </div>
</div>
<?php endif; ?>


<?php $this->includeAtTemplateBase('includes/footer.php'); ?>
