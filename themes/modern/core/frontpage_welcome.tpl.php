<?php

$this->data['header'] = $this->t('{core:frontpage:page_title}');
$this->includeAtTemplateBase('includes/header.php');

?>


<div class="row">
  <div class="col-md-12">

<p><?php echo $this->t('{core:frontpage:intro}'); ?></p>

<ul class="nav nav-tabs">
<?php foreach ($this->data['links_welcome'] AS $link) : ?>
  <li role="presentation">
    <a href="<?php echo htmlspecialchars($link['href']); ?>">
      <?php echo $this->t($link['text']); ?>
    </a>
  </li>
<?php endforeach;?>
</ul>



  <h2><?php echo $this->t('{core:frontpage:about_header}'); ?></h2>
    <p><?php echo $this->t('{core:frontpage:about_text}'); ?></p>
    </div>
</div>


<?php $this->includeAtTemplateBase('includes/footer.php');
