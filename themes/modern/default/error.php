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
  $this->data['header'] = $this->t($this->data['dictTitle']);
  $this->includeAtTemplateBase('includes/header.php');
?>

<div class="col-md-12">
  <h2><?php echo $this->t($this->data['dictTitle']); ?></h2>

<?php
echo htmlspecialchars($this->t($this->data['dictDescr'], $this->data['parameters']));

/* Include optional information for error. */
if (isset($this->data['includeTemplate'])) :
  $this->includeAtTemplateBase($this->data['includeTemplate']);
endif;
?>
</div>

<div class="col-md-12">
  <?php echo $this->t('report_trackid'); ?>
  <span class="trackid"><?php echo $this->data['error']['trackId']; ?></span>
</div>

<?php if ($this->data['showerrors']) : ?>
<div class="col-md-12">
  <h2><?php echo $this->t('debuginfo_header'); ?></h2>
  <p><?php echo $this->t('debuginfo_text'); ?></p>
  <p>
    <code><?php echo htmlspecialchars($this->data['error']['exceptionMsg']); ?></code>
  </p>
  <pre><?php echo htmlspecialchars($this->data['error']['exceptionTrace']); ?></pre>
</div>
<?php endif; ?>

<?php if (isset($this->data['errorReportAddress'])) : ?>
<div class="col-md-12">
  <h2><?php echo $this->t('report_header'); ?></h2>
  <form action="<?php echo htmlspecialchars($this->data['errorReportAddress']); ?>" method="post">

    <p><?php echo $this->t('report_text'); ?></p>
    <div class="form-group">
      <label for="email"><?php echo $this->t('report_email'); ?></label>
      <input type="text" size="25" id="email" name="email" class="form-control"
        value="<?php echo htmlspecialchars($this->data['email']); ?>"
        />
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <textarea name="text" rows="6" cols="43" id="description"
        class="form-control"><?php echo $this->t('report_explain'); ?></textarea>
    </div>

    <div class="form-group">
      <input type="hidden" name="reportId" value="<?php echo $this->data['error']['reportId']; ?>" />
      <input type="submit" name="send"
        class="btn btn-default"
        value="<?php echo $this->t('report_submit'); ?>" />
    </div>
  </form>
</div>
<?php endif; ?>

<div class="col-md-12">
  <h2><?php echo $this->t('howto_header'); ?></h2>
  <p><?php echo $this->t('howto_text'); ?></p>
</div>

<?php $this->includeAtTemplateBase('includes/footer.php'); ?>
