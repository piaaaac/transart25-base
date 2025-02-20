<?php
$ass = $kirby->url("assets");
?>

<?php snippet("header") ?>

<section class="page-body">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <?= $page->text()->kt() ?>
      </div>
    </div>
  </div>
</section>

<div class="page-body bg-white">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 py-5"></div>
    </div>
    <div class="row">
      <?php foreach ($page->items()->toStructure() as $item): 
        if ($item->archpage()->isNotEmpty() && $archpage = $item->archpage()->toPage()) {
          $link = $archpage->url();
        } else {
          $link = $item->url()->value();
        }
        ?>
        <div class="col-6 col-md-4 col-xl-3 pb-5 mb-5">
          <div data-url="<?= $link ?>">
            <?php 
            $url = $item->img()->toFile()->url();
            ?>
            <img class="full-w mb-2" src="<?= $url ?>" />
            <div class="kt-small"><?= $item->text()->kt() ?></div>
            <!--  
            <p class="font-s font-bold mb-0">< ?= $d["text1"] ?></p>
            <p class="font-s opacity-05 mb-0">< ?= $d["text2"] ?></p>
            -->
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div>

<?php snippet("footer") ?>
