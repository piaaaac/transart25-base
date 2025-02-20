<?php 
if ($page->highlightedEvents()->isEmpty()) {
  return;
}
?>

<section class="home-highlights-mobile bg-green">
  <div class="container-fluid">
    <div class="row">
      
      <div class="col-12">
        <p class="font-s mt-3">HIGLIGHTS</p>
      </div>
      
      <div class="col-12">
        <hr />
        <?php foreach ($page->highlightedEvents()->toPages() as $event): 
          $imageUrl = $event->img()->toFile()->thumb(["width" => 500])->url();
          ?>
          <div class="item" data-high-mob-id="<?= $event->slug() ?>">
            <h2 class="font-l">
              <a class="no-u" data-item-mob-id="<?= $event->slug() ?>"><?= $event->title()->value() ?></a>
            </h2>
            <p class="font-s">
              <a class="no-u" data-item-mob-id="<?= $event->slug() ?>">
                <?= t22_eventDate($event->startDate()) ?>
                &mdash;
                <?= t22_translatedPlace($event->place()) ?>
              </a>
            </p>
            <div class="details pb-2">
              <div class="high-image-mobile" style="background-image: url('<?= $imageUrl ?>');"></div>
              <div class="d-flex align-items-start justify-content-start">
                <div class="w-50 pt-1">
                  <p class="font-s my-2">
                    h <?= $event->startTime()->toDate("H:i") ?>
                    <?php if ($event->hasEndTime()->toBool() === true && $event->endTime()->isNotEmpty()): ?>
                      &rarr; <?= $event->endTime()->toDate("H:i") ?>
                    <?php endif ?>
                    <?php if ($event->ticketPrice()->isNotEmpty()): ?>
                      <br />€ <?= $event->ticketPrice()->value() ?>
                    <?php endif ?>
                  </p>
                </div>
                <div class="w-50">
                  <p class="font-s my-2">
                    <?php if ($event->venueMapLink()->isNotEmpty()): ?>
                      <p class="font-s mb-0"><a href="<?= $event->venueMapLink()->value() ?>" target="_blank"><?= $event->venueAddress() ?></a></p>
                    <?php else: ?>
                      <p class="font-s mb-0"><?= $event->venueAddress() ?></p>
                    <?php endif ?>
                  </p>
                </div>
              </div>
              <div class="my-3">
                <a class="button black small icon-rarr w-100" href="<?= $event->url() ?>">Info & tickets</a>
              </div>
            </div>
          </div>
          <hr />

        <?php endforeach ?>
      </div>

    </div>
  </div>
</section>


<section class="home-highlights-desktop bg-green">
  <div class="container-fluid">
    <div class="row">
      
      <div class="col-6 align-self-stretch my-4">
        <?php foreach ($page->highlightedEvents()->toPages() as $event): 
          $imageUrl = $event->img()->toFile()->thumb(["width" => 900])->url();
          ?>
          <div class="high-image h-100 d-none" style="background-image: url('<?= $imageUrl ?>');" data-high-id="<?= $event->slug() ?>"></div>
        <?php endforeach ?>
      </div>

      <div class="col-6 pl-3">
        <p class="font-s pt-4 mb-0">HIGLIGHTS</p>
        <?php foreach ($page->highlightedEvents()->toPages() as $event): ?>
          <div class="high-details d-none" data-high-id="<?= $event->slug() ?>">
            <h2 class="font-xl"><?= $event->title()->value() ?></h2>
            
            <div class="green-details mt-4 mb-4">
              <div class="font-m">
                <p class="font-bold mb-0"><?= t22_eventDate($event->startDate()) ?></p>
                <p class="font-s mb-0">
                  h <?= $event->startTime()->toDate("H:i") ?>
                  <?php if ($event->hasEndTime()->toBool() === true && $event->endTime()->isNotEmpty()): ?>
                    &rarr; <?= $event->endTime()->toDate("H:i") ?>
                  <?php endif ?>
                  <?php if ($event->ticketPrice()->isNotEmpty()): ?>
                    &mdash; € <?= $event->ticketPrice()->value() ?>
                  <?php endif ?>
                </p>

                <?php /*
                <?php if ($event->ticketLink()->isNotEmpty()): ?>
                  <p class="mt-3 mb-0"><a class="button outline small reg icon-tickets" href="<?= $event->ticketLink()->value() ?>" target="_blank"><?= t("tickets") ?></a></p>
                <?php endif ?>
                */ ?>

                <p class="mt-3 mb-0">
                  <a class="button outline small icon-rarr" href="<?= $event->url() ?>">Info & tickets</a>
                </p>


              </div>
              <div class="font-m">
                <p class="font-bold mb-0"><?= $event->venueTitle() ?></p>
                <?php if ($event->venueMapLink()->isNotEmpty()): ?>
                  <p class="font-s mb-0"><a href="<?= $event->venueMapLink()->value() ?>" target="_blank"><?= $event->venueAddress() ?></a></p>
                <?php else: ?>
                  <p class="font-s mb-0"><?= $event->venueAddress() ?></p>
                <?php endif ?>
              </div>
            </div>

          </div>
        <?php endforeach ?>

        <div class="my-5 py-3"></div>

        <div class="high-list my-3">
          <?php foreach ($page->highlightedEvents()->toPages() as $event): ?>
            <div class="item" data-item-id="<?= $event->slug() ?>">
              
              <div class="font-m"><?= $event->title()->value() ?></div>
              <!-- <div class="font-m font-bold"><?= $event->title()->value() ?></div> -->

              <div class="font-s">
                <?= t22_eventDate($event->startDate()) ?>
                &mdash;
                <?= t22_translatedPlace($event->place()) ?>    
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>

    </div>
  </div>
</section>

<script>

$(document).ready(function () {
  var first = $("[data-item-id]")[0];
  console.log(first)
  var itemId = first.dataset.itemId;
  highlightDesktop(itemId);
  highlightMobile(itemId);
});

// -------------
// Desktop
// -------------

function highlightDesktop (slug) {
  $(".home-highlights-desktop [data-high-id]").addClass("d-none");
  $(".home-highlights-desktop [data-high-id='"+ slug +"']").removeClass("d-none");
  $(".home-highlights-desktop [data-item-id]").removeClass("active");
  $(".home-highlights-desktop [data-item-id='"+ slug +"']").addClass("active");
}

$(".home-highlights-desktop .high-list .item").click(function () {
  var slug = this.dataset.itemId;
  console.log(slug)
  highlightDesktop(slug);
});

// -------------
// Mobile
// -------------

function highlightMobile (slug) {
  $(".home-highlights-mobile .item[data-high-mob-id]").removeClass("active");
  $(".home-highlights-mobile .item[data-high-mob-id='"+ slug +"']").addClass("active");
}

$(".home-highlights-mobile [data-item-mob-id]").click(function () {
  var slug = this.dataset.itemMobId;
  console.log(slug)
  highlightMobile(slug);
});



</script>








