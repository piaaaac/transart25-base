<?php
$blockOptions = [
  "marginBottom" => $block->marginBottom()->value(),
];
$blockOptionsAttributes = [];
foreach ($blockOptions as $k => $op) { 
  $blockOptionsAttributes[] = "data-". $k ."='$op'";
}
?>

<section class="block t23_textImgCta" <?= implode(" ", $blockOptionsAttributes) ?>>
  <div class="container-fluid">
    <div class="row">

      <div class="col-lg-6 kt-paragraphs colored-bold pr-lg-5">
        <?= $block->text1()->kt() ?>
        <div class="d-none d-lg-block">
          <?= $block->text2()->kt() ?>
        </div>
      </div>

      <div class="col-lg-6 kt-paragraphs">
        <div class="mb-3">
          <?php if ($block->imgs()->toFiles()->count() == 1): ?>
            <?= $block->imgs()->toFiles()->first()->html() ?>
          <?php elseif ($block->imgs()->toFiles()->count() > 1): ?>
            <!-- slideshow -->
            <!-- slideshow -->
            <!-- slideshow -->
            <?= $block->imgs()->toFiles()->first()->html() ?>
            <!-- slideshow -->
            <!-- slideshow -->
            <!-- slideshow -->
          <?php endif ?>
        </div>
        <div class="d-lg-none">
          <?= $block->text2()->kt() ?>
        </div>
      </div>

    </div>
  </div>
</section>
