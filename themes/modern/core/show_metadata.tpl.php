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

<div class="col-md-12">
  <pre><code><?php print_r($this->data); ?></code></pre>
</div>

<?php $this->includeAtTemplateBase('includes/footer.php'); ?>

