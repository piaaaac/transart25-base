<?php
$blockOptions = [
  "marginBottom" => $block->marginBottom()->value(),
];
$blockOptionsAttributes = [];
foreach ($blockOptions as $k => $op) {
  $blockOptionsAttributes[] = "data-" . $k . "='$op'";
}
?>

<section class="block threeColsList" <?= implode(" ", $blockOptionsAttributes) ?>>
  <div class="container-fluid">
    <div class="row">

      <?php foreach ($block->items()->toStructure() as $item): ?>
        <div class="col-md-6 col-lg-4">
          <?= $item->itemText()->kt() ?>
        </div>
      <?php endforeach ?>

    </div>
  </div>
</section>