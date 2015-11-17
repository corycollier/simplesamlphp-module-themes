<?php
/**
 * Template to show list of configured authentication sources.
 *
 */
$this->data['header'] = 'Test authentication sources';
$this->includeAtTemplateBase('includes/header.php');
?>
<h1><?php echo $this->data['header']; ?></h1>
<ul class="nav nav-pills nav-stacked">
<?php foreach ($this->data['sources'] as $id) : ?>
  <li>
    <a href="?as=<?php echo htmlspecialchars(urlencode($id)); ?>">
      <?php echo htmlspecialchars($id); ?>
    </a>
  </li>
<?php endforeach; ?>
</ul>

<?php $this->includeAtTemplateBase('includes/footer.php'); ?>
