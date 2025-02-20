<?php

function composeUrl($_view, $_category, $_tag)
{
  $url = page("program")->url();
  if ($_view && $_view != "") {
    $url .= "/view:$_view";
  }
  if ($_category && $_category != "") {
    $url .= "/category:$_category";
  }
  if ($_tag && $_tag != "") {
    $url .= "/tag:$_tag";
  }
  return $url;
}

?>

<div class="program-filters">

  <!-- category -->
  <span class="radio-group input-group order-lg-2">
    <a class="button <?= r(!$category, "selected") ?>" href="<?= composeUrl($view, "", "") ?>">All</a>
    <a class="button <?= r($category === "experiences", "selected") ?>" href="<?= composeUrl($view, "experiences", "") ?>">Experiences</a>
    <a class="button <?= r($category === "performances", "selected") ?>" href="<?= composeUrl($view, "performances", "") ?>">Performances</a>
  </span>

  <span class="d-lg-none" style="flex-basis: 100%;"></span>

  <!-- view -->
  <span class="radio-group input-group order-lg-1">
    <a class="button <?= r($view === "grid", "selected") ?>" href="<?= composeUrl("grid", $category, $tag) ?>"><i class="fontello icon-th-large"></i></a>
    <a class="button <?= r($view === "list", "selected") ?>" href="<?= composeUrl("list", $category, $tag) ?>"><i class="fontello icon-align-justify"></i></a>
  </span>

  <!-- tags desktop -->
  <span class="radio-group input-group d-none d-lg-inline-block order-lg-3">
    <a class="button tag <?= r(!$tag, "selected") ?>" href="<?= composeUrl($view, $category, "") ?>">All tags</a>
    <?php foreach ($tagsForButtons as $t): ?>
      <a class="button tag <?= r($tag === $t, "selected") ?>" href="<?= composeUrl($view, $category, $t) ?>">#<?= $t ?></a>
    <?php endforeach ?>
  </span>

  <!-- tags mobile -->
  <span class="btn-select input-group d-lg-none order-lg-3" id="btn-select-1">
    <!-- button -->
    <?php if (!$tag): ?>
      <a class="button off" onclick="toggleDropdown()">TAGS</a>
    <?php else: ?>
      <a class="button selected" href="<?= composeUrl($view, $category, "") ?>">#<?= $tag ?></a>
    <?php endif ?>
    <!-- dropdown -->
    <div class="dropdown">
      <?php foreach ($tagsForButtons as $t): ?>
        <a class="option <?= r($tag === $t, "selected") ?>" href="<?= composeUrl($view, $category, $t) ?>">#<?= $t ?></a>
      <?php endforeach ?>
    </div>
    <!-- sensi -->
    <div class="sensi-close" onclick="toggleDropdown()"></div>
  </span>

</div>

<script>
  function toggleDropdown() {
    var el = document.getElementById("btn-select-1")
    el.classList.toggle("open");
  }
</script>