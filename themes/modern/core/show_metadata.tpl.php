<?php
/**
 * Metadata Display Template.
 *
 * This template shows metadata for a specific entry. The entry is handled by
 * The Template class.
 *
 * @author     Cory Collier <corycollier@corycollier.com>
 * @license    http://opensource.org/licenses/MIT  MIT License
 * @version    git: $Id$
 * @link       https://github.com/corycollier/simplesamlphp-module-themes
 * @see        https://github.com/simplesamlphp/simplesamlphp/
 * @since      File available since Release 1.3.0
 */
?>
<?php $this->includeAtTemplateBase('includes/header.php'); ?>
<div class="col-md-12">
  <pre>
  $metadata['<?php echo $this->data['m']['metadata-index']; unset($this->data['m']['metadata-index']) ?>'] => <?php
      echo htmlspecialchars(var_export($this->data['m'], true));
  ?>
  </pre>
</div>

<div class="col-md-12">
  <p>[ <a href="<?php echo $this->data['backlink']; ?>">back</a> ]</p>
</div>

<?php $this->includeAtTemplateBase('includes/footer.php'); ?>
