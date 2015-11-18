<?php
/**
 * Authsource listing template.
 *
 * This page lists all of the authentication sources for this instance.
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
$this->data['header'] = 'Test authentication sources';
$this->includeAtTemplateBase('includes/header.php');
?>

<div class="col-md-12">
  <ul class="nav nav-pills nav-stacked">
  <?php foreach ($this->data['sources'] as $id) : ?>
    <li>
      <a href="?as=<?php echo htmlspecialchars(urlencode($id)); ?>">
        <?php echo htmlspecialchars($id); ?>
      </a>
    </li>
  <?php endforeach; ?>
  </ul>
</div>

<?php $this->includeAtTemplateBase('includes/footer.php'); ?>
