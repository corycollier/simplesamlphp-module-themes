<?php
/**
 * Footer template.
 *
 * The main footer template. This is used throughout the application.
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
// Variable assignment.
$this->data['header'] = $this->t('{login:user_pass_header}');
$errorcode            = $this->data['errorcode'];
$errorparams          = $this->data['errorparams'];
?>
<?php $this->includeAtTemplateBase('includes/header.php'); ?>

<?php if ($errorcode !== NULL) : ?>
<div class="col-md-12">
  <div class="alert alert-danger" role="alert">
    <h2><?php echo $this->t('{login:error_header}'); ?></h2>
    <p><?php echo htmlspecialchars($this->t('{errors:title_' . $errorcode . '}', $errorparams)); ?></p>
    <p><?php echo htmlspecialchars($this->t('{errors:descr_' . $errorcode . '}', $errorparams)); ?></p>
  </div>
</div>
<?php endif; ?>

<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><?php echo $this->t('{login:user_pass_header}'); ?></h3>
    </div>

    <div class="panel-body">
      <p class="logintext">
        <?php echo $this->t('{login:user_pass_text}'); ?>
      </p>

      <form action="?" method="post" name="f">
        <div class="form-group">
          <label for-"username">Username</label>
          <input type="text" id="username"
            tabindex="1"
            name="username"
            value="<?php echo htmlspecialchars($this->data['username']); ?>"
            class="form-control"
            />
        </div>

        <div class="form-group">
          <label for-"password">Password</label>
          <input type="password" id="password"
            tabindex="2"
            name="password"
            class="form-control" />
        </div>

        <button type="submit" class="btn btn-default">Submit</button>

        <?php foreach ($this->data['stateparams'] as $name => $value) : ?>
          <input type="hidden"
            name="<?php echo htmlspecialchars($name); ?>"
            value="<?php echo htmlspecialchars($value); ?>" />
        <?php endforeach; ?>

      </form>
    </div>
  </div>
</div>

<?php $this->includeAtTemplateBase('includes/footer.php'); ?>
