<?php
/**
 * Hostnames template.
 *
 * Template to display information regarding hostname values.
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

<div class="row">
  <div class="col-md-12">
    <table class="table table-bordered">
      <thead>
        <th>Name</th>
        <th>Value</th>
      </thead>
      <tbody>
      <?php foreach ($this->data['attributes'] as $name => $value) : ?>
        <tr>
          <td><code><?php echo $name; ?></code></td>
          <td><code><?php print_r($value); ?></code></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<?php $this->includeAtTemplateBase('includes/footer.php'); ?>
