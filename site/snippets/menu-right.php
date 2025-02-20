<?php

// prepare menu items
$menuItems = $site->menuItems()->toStructure()->filterBy("active", true);

// find menu texts for current language
$currentLang = $kirby->language()->code();
$langTextFiled = "menuTextEn";
if ($currentLang === "it") { $langTextFiled = "menuTextIt"; }
if ($currentLang === "de") { $langTextFiled = "menuTextDe"; }

// sort languages
$order = ["en" => 1, "it" => 2, "de" => 3];
$languages = $kirby->languages()->sortBy(function ($language) use ($order) {
  return $order[$language->code()];
});
?>

<div class="items d-none d-xl-block">
  <?php foreach ($menuItems as $item): 
    $active = ($page->is($item->menuPage()->toPage())) ? true : false;
    ?>
    <a class="item<?= $active ? " active" : "" ?>" href="<?= $item->menuPage()->toPage()->url() ?>"><?= $item->$langTextFiled()->value() ?></a>
  <?php endforeach ?>
  <?php 
  foreach($languages as $lang): 
    $active = ($kirby->language() == $lang) ? true : false;
    ?>
    <a href="<?= $page->url($lang->code()) ?>" hreflang="<?= $lang->code() ?>" class="item lang<?= $active ? " active" : "" ?>"><?= html($lang->code()) ?></a>
  <?php endforeach ?>

</div>
<div class="d-xl-none mt-1">
  <button class="hamburger hamburger--slider" type="button">
    <span class="hamburger-box">
      <span class="hamburger-inner"></span>
    </span>
  </button>
</div>

