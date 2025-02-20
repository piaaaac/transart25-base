<section class="opening-page event">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 mb-4">
        <h1 class="weight-900 pb-0"><?= $page->title() ?></h1>
        <div class="subtitle-line">
          <p class="font-xl"><?= $page->subtitle()->value() ?></p>


          <?php if ($page->ticketButton()->toBool()): ?>
            <a href="<?= $page->ticketLink()->toUrl() ?>" target="_blank" class="button large d-none d-md-inline-flex">Tickets&nbsp;<?= $page->ticketPrice()->value() ?>&nbsp;€</a>
          <?php else: ?>
            <span class="button large d-none d-md-inline-flex disabled"><?= Str::replace($page->ticketText()->value(), " ", "&nbsp;") ?></span>
          <?php endif ?>

          
        </div>
      </div>
    </div>
  </div>
</section>
