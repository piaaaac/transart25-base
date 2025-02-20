<?php
$ass = $kirby->url("assets");
$testEvent = page("program/riot-days");
?>

<?php
$headerProps = [
  "invertedColors" => $page->background()->value() === "experiences",
];
snippet("header", $headerProps); 

$hasChildren = $page->hasListedChildren() ? "yes" : "no";
?>

<!-- Page blocks -->
<?php if ($page->contentBlocks()->isNotEmpty()): ?>
  <div class="page-body" data-has-children="<?= $hasChildren ?>">
    <?= $page->contentBlocks()->toBlocks() ?>
  </div>
<?php endif ?>

<?php if ($page->hasListedChildren()): ?>
  <section id="submenu">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="items">
            <?php foreach ($page->children()->listed() as $child): 
              $id = Str::slug($child->uid());
              ?>
              <a class="item" href="#anchor-<?= $id ?>"><?= $child->title()->value() ?></a>
            <?php endforeach ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php endif ?>

<!-- Children pages' blocks -->
<div class="page-body">
  <?php foreach ($page->children()->listed() as $child): 
    $id = Str::slug($child->uid());
    ?>
    <div id="anchor-<?= $id ?>"></div>
    <div class="subpage">
      <?= $child->contentBlocks()->toBlocks() ?>
    </div>
  <?php endforeach ?>
</div>

<?php snippet("footer") ?>
