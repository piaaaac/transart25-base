<?php
$h = 0;
if ($block->spaceSize()->value() === "one")         { $h = "50px"; }
elseif ($block->spaceSize()->value() === "two")     { $h = "100px"; }
elseif ($block->spaceSize()->value() === "three")   { $h = "150px"; }
elseif ($block->spaceSize()->value() === "custom")  { $h = $block->customMargin()->value(); }
?>

<section class="block t23_space" style="margin-bottom: <?= $h ?>"></section>
