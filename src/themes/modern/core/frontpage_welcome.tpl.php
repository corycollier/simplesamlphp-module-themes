<?php
/**
 * Frontpage Welcome Template.
 *
 * The main entry page.
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
  <p><?php echo $this->t('{core:frontpage:intro}'); ?></p>

  <ul class="nav nav-stacked">
  <?php foreach ($this->data['links_welcome'] AS $link) : ?>
    <li role="presentation">
      <a href="<?php echo htmlspecialchars($link['href']); ?>">
        <?php echo $this->t($link['text']); ?>
      </a>
    </li>
  <?php endforeach;?>
  </ul>

</div>

<?php $this->includeAtTemplateBase('includes/footer.php');
