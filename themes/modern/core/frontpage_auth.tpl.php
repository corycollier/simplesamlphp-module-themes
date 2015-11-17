<?php
$this->data['header'] = $this->t('{core:frontpage:page_title}');
$this->includeAtTemplateBase('includes/header.php');
?>

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

<?php $this->includeAtTemplateBase('includes/footer.php');
