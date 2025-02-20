<?php
$blockOptions = [
  "marginBottom" => $block->marginBottom()->value(),
];
$blockOptionsAttributes = [];
foreach ($blockOptions as $k => $op) { 
  $blockOptionsAttributes[] = "data-". $k ."='$op'";
}
?>

<section class="block t23_buttonBling" <?= implode(" ", $blockOptionsAttributes) ?>>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <?php snippet("button-bling", ["text" => $block->btnText()->value(), "url" => $block->btnUrl()->value()]) ?>
      </div>
    </div>
  </div>
</section>
