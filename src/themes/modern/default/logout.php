<?php
/**
 * Logout template.
 *
 * The logout page.
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
$this->data['header'] = $this->t('{logout:title}');
$this->includeAtTemplateBase('includes/header.php');

if($this->getTag($this->data['text']) !== NULL) :
  $this->data['text'] = htmlspecialchars($this->t($this->data['text']));
endif;

?>

<div class="row">
  <div class="col-md-12">
    <h2><?php echo $this->data['header']; ?></h2>
    <p><?php echo $this->t('{logout:logged_out_text}'); ?></p>
    <p>
      <a href="<?php echo htmlspecialchars($this->data['link']); ?>">
        <?php echo $this->data['text']; ?>
      </a>
    </p>
  </div>
</div>

<?php $this->includeAtTemplateBase('includes/footer.php'); ?>
