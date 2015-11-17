<?php

$this->data['header'] = $this->t('{core:frontpage:page_title}');
$this->includeAtTemplateBase('includes/header.php');

$icon_enabled  = '<i class="glyphicon glyphicon-ok" />';
$icon_disabled = '<i class="glyphicon glyphicon-remove" />';
?>

<div class="row">
  <div class="col-md-12">
    <pre>
      <?php echo $this->data['directory'] . ' (' . $this->data['version'] . ')';?>
    </pre>
  </div>


  <div class="col-md-12">
    <table class="table table-bordered">
      <thead>
        <th>Module</th>
        <th>Status</th>
      </thead>
      <tbody>
        <tr class="<?php echo $this->data['enablematrix']['saml20-idp'] ? 'success' : ''; ?>">
          <td>SAML 2.0 IdP</td>
          <td><?php echo $this->data['enablematrix']['saml20-idp'] ? $icon_enabled : $icon_disabled; ?></td>
        </tr>

        <tr class="<?php echo $this->data['enablematrix']['shib13-idp'] ? 'success' : ''; ?>">
          <td>Shib 1.3 IdP</td>
          <td><?php echo $this->data['enablematrix']['shib13-idp'] ? $icon_enabled : $icon_disabled; ?></td>
        </tr>
        </tbody>
    </table>
  </div>


  <div class="col-md-12">
    <h2><?php echo $this->t('{core:frontpage:configuration}'); ?></h2>
    <ul>
    <?php foreach ($this->data['links_config'] AS $link) : ?>
      <li>
        <a href="<?php echo htmlspecialchars($link['href']); ?>">
          <?php echo $this->t($link['text']); ?>
        </a>
      </li>
    <?php endforeach; ?>
    </ul>
  </div>

  <div class="col-md-12">
    <?php if (array_key_exists('warnings', $this->data) && is_array($this->data['warnings']) && !empty($this->data['warnings'])) : ?>
      <h2><?php echo $this->t('{core:frontpage:warnings}'); ?></h2>
      <?php foreach($this->data['warnings'] AS $warning) : ?>
        <div class="caution"><?php echo $this->t($warning); ?></div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>

  <?php if ($this->data['isadmin']) : ?>
    <div class="col-md-12">
      <h2><?php echo $this->t('{core:frontpage:checkphp}'); ?></h2>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead>
            <th>Status</th>
            <th>Required</th>
            <th>Description</th>
          </thead>
          <tbody>
          <?php foreach ($this->data['funcmatrix'] as $func) : ?>
            <tr class="<?php echo ($func['enabled'] ? 'success' : ''); ?>">
              <td><?php echo ($func['enabled'] ? $icon_enabled : $icon_disabled); ?></td>
              <td><?php echo $this->t('{core:frontpage:' . $func['required']. '}'); ?></td>
              <td><?php echo $func['descr']; ?></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  <?php endif; ?>

  </div>
</div>



    <?php $this->includeAtTemplateBase('includes/footer.php');
