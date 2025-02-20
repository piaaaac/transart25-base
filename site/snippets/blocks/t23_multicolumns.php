<?php
$toCols = [
  "col1" => 1,
  "col2" => 2,
  "col3" => 3,
];

$cols = $toCols[$block->colNum()->value()];

$blockOptions = [
  "marginBottom" => $block->marginBottom()->value(),
];
$blockOptionsAttributes = [];
foreach ($blockOptions as $k => $op) { 
  $blockOptionsAttributes[] = "data-". $k ."='$op'";
}
?>

<section class="block t23_multicolumns" <?= implode(" ", $blockOptionsAttributes) ?>>
  <div class="container-fluid">
    <div class="row">

      <?php if ($cols === 1): ?>
        <div class="col-lg-10 col-xl-8 kt-paragraphs"><?= $block->text1A()->kt() ?></div>
      <?php endif ?>
      <?php if ($cols === 2): ?>
        <div class="col-lg-6 kt-paragraphs"><?= $block->text2A()->kt() ?></div>
        <div class="col-lg-6 kt-paragraphs"><?= $block->text2B()->kt() ?></div>
      <?php endif ?>
      <?php if ($cols === 3): ?>
        <div class="col-md-6 col-lg-4 kt-paragraphs"><?= $block->text3A()->kt() ?></div>
        <div class="col-md-6 col-lg-4 kt-paragraphs"><?= $block->text3B()->kt() ?></div>
        <div class="col-md-6 col-lg-4 kt-paragraphs"><?= $block->text3C()->kt() ?></div>
      <?php endif ?>

    </div>
  </div>
</section>
