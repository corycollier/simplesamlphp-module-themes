<?php
/**
 * Auth Links template.
 *
 * A link to the authentication sources.
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
$this->data['header'] = $this->t('{core:frontpage:page_title}');
$this->includeAtTemplateBase('includes/header.php');
?>

<div class="col-md-12">
  <ul>
  <?php foreach ($this->data['links_auth'] AS $link) : ?>
    <li>
      <a href="<?php echo htmlspecialchars($link['href']); ?>">
        <?php echo $this->t($link['text']); ?>
      </a>
      <?php if (isset($link['deprecated']) && $link['deprecated']) : ?>
        <b><?php echo $this->t('{core:frontpage:deprecated}'); ?></b>
      <?php endif; ?>
    </li>
  <?php endforeach; ?>
  </ul>
</div>

<?php $this->includeAtTemplateBase('includes/footer.php');
