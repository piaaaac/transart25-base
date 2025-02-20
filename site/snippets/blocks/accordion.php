<?php
$blockOptions = [
  "marginBottom" => $block->marginBottom()->value(),
];
$blockOptionsAttributes = [];
foreach ($blockOptions as $k => $op) {
  $blockOptionsAttributes[] = "data-" . $k . "='$op'";
}
?>

<section class="block accordion" <?= implode(" ", $blockOptionsAttributes) ?>>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="items">
          <?php foreach ($block->items()->toStructure() as $id => $item): ?>
            <div class="item" data-id="<?= $id ?>">
              <div>
                <div class="title" data-id="<?= $id ?>">
                  <div><?= $item->itemTitle()->kt() ?></div>
                  <div class="arrow">+</div>
                </div>
                <div class="content" data-id="<?= $id ?>">
                  <?= $item->itemText()->kt() ?>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>

      </div>
    </div>
  </div>
</section>