<?php

// prepare menu items
$menuItems = $site->menuItems()->toStructure()->filterBy("active", true);

// find menu texts for current language
$currentLang = $kirby->language()->code();
$langTextFiled = "menuTextEn";
if ($currentLang === "it") {
  $langTextFiled = "menuTextIt";
}
if ($currentLang === "de") {
  $langTextFiled = "menuTextDe";
}

// sort languages
$order = ["en" => 1, "it" => 2, "de" => 3];
$languages = $kirby->languages()->sortBy(function ($language) use ($order) {
  return $order[$language->code()];
});
?>

<nav id="menu-header">
  <div id="header-bg"></div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 menu-wrapper d-flex align-items-center justify-content-between">

        <div class="left">
          <a href="<?= $site->url() ?>" class="d-flex align-items-center no-u">
            transart25
          </a>
        </div>

        <div class="right">
          <?php snippet("menu-right") ?>
        </div>

      </div>
    </div>
  </div>
</nav>

<div id="menu-xs">
  <?php foreach ($menuItems as $item):
    $active = ($page->is($item->menuPage()->toPage())) ? true : false;
  ?>
    <a class="item<?= $active ? " active" : "" ?>" href="<?= $item->menuPage()->toPage()->url() ?>"><?= $item->$langTextFiled()->value() ?></a>
  <?php endforeach ?>

  <div class="text-center mx-2 my-4">
    <?php foreach ($languages as $lang):
      $active = ($kirby->language() == $lang) ? true : false;
    ?>
      <a href="<?= $page->url($lang->code()) ?>" hreflang="<?= $lang->code() ?>" class="item small mx-2 lang<?= $active ? " active" : "" ?>"><?= html($lang->code()) ?></a>
    <?php endforeach ?>
  </div>

</div>