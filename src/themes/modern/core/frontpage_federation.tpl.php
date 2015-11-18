<?php
/**
 * Authsource listing template.
 *
 * This page lists all of the authentication sources for this instance.
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
$now = time();
$this->data['header'] = $this->t('{core:frontpage:page_title}');
$this->includeAtTemplateBase('includes/header.php');

$has_hosted_entries = is_array($this->data['metaentries']['hosted'])
  && count($this->data['metaentries']['hosted']);

$has_remote_entries = is_array($this->data['metaentries']['remote'])
  && count($this->data['metaentries']['remote']);
?>

<?php if ($has_hosted_entries) : ?>
<div class="col-md-12">
  <h2>Hosted Services</h2>
  <dl class="dl-horizontal">
  <?php foreach ($this->data['metaentries']['hosted'] as $hm) : ?>
    <dt><?php echo $this->t(simplesamlphp_get_mtype($hm['metadata-set'])); ?></dt>
    <dd>
      <p>Entity ID: <?php echo $hm['entityid']; ?></p>
      <?php if (isset($hm['deprecated']) && $hm['deprecated']) : ?>
        <p>Deprecated</p>
      <?php endif; ?>
      <?php if ($hm['entityid'] !== $hm['metadata-index']) : ?>
        <p>Index: <?php echo $hm['metadata-index']; ?></p>
      <?php endif; ?>
      <?php if (!empty($hm['name'])) : ?>
        <p><?php echo $this->getTranslation(SimpleSAML\Utils\Arrays::arrayize($hm['name'], 'en')); ?></p>
      <?php endif; ?>
      <?php if (!empty($hm['descr'])) : ?>
        <p><?php echo $this->getTranslation(SimpleSAML\Utils\Arrays::arrayize($hm['descr'], 'en')); ?></p>
      <?php endif; ?>
      <p> [ <a href="<?php echo $hm['metadata-url']; ?>">
          <?php echo $this->t('{core:frontpage:show_metadata}'); ?>
        </a> ]
      </p>
    </dd>
  <?php endforeach; ?>
  </dl>
</div>
<?php endif; ?>

<?php if ($has_remote_entries) : ?>
<div class="col-md-12">
<h2>Trusted Remote Entries</h2>
<?php foreach($this->data['metaentries']['remote'] as $setkey => $set) : ?>
  <fieldset class="fancyfieldset">
    <legend><?php echo $this->t(simplesamlphp_get_mtype($setkey)); ?> (Trusted)</legend>
    <ul>
    <?php foreach($set as $entry) : ?>
      <li>
        <?php
        // local variable assignments.
        $href    = simplesamlphp_get_entry_href($this, $setkey, $entry);
        $name    = simplesamlphp_get_entry_name($this, $entry);
        $expires = simplesamlphp_get_expires($this, $entry);
        ?>
        <a href="<?php echo $href; ?>"><?php echo $name; ?></a>
        <span><?php echo $expires; ?></span>
      </li>
    <?php endforeach; ?>
    </ul>
  </fieldset>
<?php endforeach; ?>
</div>
<?php endif; ?>

<div class="col-md-12">
  <h2><?php echo $this->t('{core:frontpage:tools}'); ?></h2>
  <ul>
  <?php foreach ($this->data['links_federation'] as $link) : ?>
    <li>
      <a href="<?php echo htmlspecialchars($link['href']); ?>">
        <?php echo $this->t($link['text']);?>
      </a>
    </li>
  <?php endforeach;?>
  </ul>
</div>

<?php if ($this->data['isadmin']) : ?>
<div class="col-md-12">
  <?php $action = SimpleSAML_Module::getModuleURL('core/show_metadata.php'); ?>
  <form action="<?php echo $action; ?>" class="" method="get" >
    <fieldset>
      <legend>Lookup metadata</legend>
      <div class="form-group">
        <label for="setValues">Look up metadata for entity:</label>
        <select name="set" id="setValues" class="form-control">
        <?php if ($has_remote_entries) : ?>
          <?php foreach($this->data['metaentries']['remote'] as $setkey => $set) : ?>
            <option value="<?php echo htmlspecialchars($setkey); ?>">
              <?php echo $this->t(simplesamlphp_get_mtype($setkey)); ?>
            </option>
          <?php endforeach; ?>
        <?php endif; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="entityid">Entity ID</label>
        <input type="text" name="entityid" class="form-control">
      </div>
      <div class="form-group">
        <input type="submit" value="Lookup" class="btn btn-default">
      </div>
    </fieldset>
  </form>
</div>
<?php endif; ?>

<?php $this->includeAtTemplateBase('includes/footer.php');
