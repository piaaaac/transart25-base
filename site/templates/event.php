<?php

use Kirby\Toolkit\Str;

$image = $page->img()->toFile();
$imageUrl = $image->thumb(["width" => 1400])->url();
$imageCredits = $image->creditText()->kti();

$prevEvent = $page->hasPrevListed() ? $page->prevListed() : $page->siblings()->listed()->last();
$nextEvent = $page->hasNextListed() ? $page->nextListed() : $page->siblings()->listed()->first();

$detailsNormal = $page->detailsItems()->toStructure()->filterBy("itemType", "normal");
$detailsStar = $page->detailsItems()->toStructure()->filterBy("itemType", "star");
$detailsInfo = $page->detailsItems()->toStructure()->filterBy("itemType", "info");

$logos = $page->files()->filterBy("template", "logos");
$hasLogosCollaboration = $logos->filterBy("creditType", "collaboration")->count() > 0;
$hasLogosThanks = $logos->filterBy("creditType", "thanks")->count() > 0;

function logos($logos, $creditType)
{ ?>

  <div class="logos-cont">
    <?php foreach ($logos->filterBy("creditType", $creditType) as $file) : ?>
      <?php if ($file->content()->linkUrl()->isNotEmpty()) : ?>
        <a class="event-logo" href="<?= $file->content()->linkUrl()->value() ?>" target="_blank"><img src="<?= $file->thumb(["width" => 200])->url() ?>" /></a>
      <?php else : ?>
        <div class="event-logo"><img src="<?= $file->thumb(["width" => 200])->url() ?>" /></div>
      <?php endif ?>
    <?php endforeach ?>
  </div>

<?php }


function details($title, $text, $type)
{
?>
  <div class="details-item <?= $type ?>">
    <div class="title"><?= $title ?></div>
    <div class="text"><?= $text ?></div>
  </div>
<?php }
function detailsItem($structureItem)
{
  $type = $structureItem->itemType()->value(); // normal|star|info
  $title = $structureItem->itemLabel()->kti();
  $text = $structureItem->itemText()->kt();
  details($title, $text, $type);
}
function detailsDate($event)
{
  $type = "normal";
  $title = t("when");
  $textDate = t23_eventDayWeek($event->startDate()) . " " . t23_eventDayNum($event->startDate());
  if ($event->hasEndDate()->toBool()) {
    $textDate .= " &rarr; " . t23_eventDayWeek($event->endDate()) . " " . t23_eventDayNum($event->endDate());
  }
  $textTime = "h " . $event->startTime()->toDate("H:i");
  if ($event->hasEndTime()->toBool()) {
    $textTime .= " &rarr; h " . $event->endTime()->toDate("H:i");
  }
  $text = "<p>$textDate</p><p>$textTime</p>";
  details($title, $text, $type);
}
function detailsVenue($event)
{
  $type = "normal";
  $title = t("where");
  $text = "<p>Venue info will be added soon.</p>";

  $venuePage = $event->place()->toPage();
  if ($venuePage) {
    $text = "<p>" . $venuePage->title() . "</p>";
    $text .= "<p>" . $venuePage->address()->value() . "</p>";
    $text .= "<p><a href='" . $venuePage->url() . "'>" . t("see_location") . "</a>&nbsp;&rarr;</span></p>";
  }

  details($title, $text, $type);
}

?>

<?php
$headerProps = [
  "invertedColors" => $page->category()->value() === "experiences",
];
snippet("header", $headerProps);

// Use the isPast method from the EventPage model
$isPast = $page->isPast() ? "yes" : "no";
?>

<section id="submenu" class="tickets">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <!-- submenu texts dsk -->
        <div class="items d-none d-lg-flex">
          <div class="d-flex align-items-center justify-content-start">
            <h5 class="color-white"><?= $page->title() ?></h5>
            <span class="color-white font-s ml-2"><?= $page->subtitle()->value() ?></span>
          </div>
          <div>
            <?php if ($page->ticketButton()->toBool()) : ?>
              <a href="<?= $page->ticketLink()->toUrl() ?>" target="_blank" class="button ticket">Tickets<span class="d-none d-md-inline">&nbsp;<?= $page->ticketPrice()->value() ?>&nbsp;€</span></a>
            <?php else : ?>
              <span class="button ticket disabled"><?= Str::replace($page->ticketText()->value(), " ", "&nbsp;") ?></span>
            <?php endif ?>
          </div>
        </div>

        <!-- submenu texts mobile -->
        <div class="items d-lg-none">
          <div class="mob-texts">
            <h5 class="color-white"><?= $page->title() ?></h5>
            <span class="color-white font-s"><?= $page->subtitle()->value() ?></span>
          </div>
          <div class="mob-button">
            <?php if ($page->ticketButton()->toBool()) : ?>
              <a href="<?= $page->ticketLink()->toUrl() ?>" target="_blank" class="button ticket">Tickets<span class="d-none d-md-inline">&nbsp;<?= $page->ticketPrice()->value() ?>&nbsp;€</span></a>
            <?php else : ?>
              <span class="button ticket disabled"><?= Str::replace($page->ticketText()->value(), " ", "&nbsp;") ?></span>
            <?php endif ?>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<div class="event-page-24" data-is-past="<?= $isPast ?>">

  <section class="image">
    <div class="event-img" style="background-image: url('<?= $imageUrl ?>');">
      <div class="credits"><?= $imageCredits ?></div>
    </div>
  </section>

  <!-- ticket button mobile -->
  <section class="mt-3 mb-3 btn-mobile d-md-none">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 text-center">
          <?php if ($page->ticketButton()->toBool()) : ?>
            <a href="<?= $page->ticketLink()->toUrl() ?>" target="_blank" class="button large w-100">Tickets&nbsp;<?= $page->ticketPrice()->value() ?>&nbsp;€</a>
          <?php else : ?>
            <span class="button large w-100 disabled"><?= Str::replace($page->ticketText()->value(), " ", "&nbsp;") ?></span>
          <?php endif ?>
        </div>
      </div>
    </div>
  </section>

  <section class="texts">
    <div class="container-fluid">
      <div class="row">

        <!-- description dsk -->
        <div class="col-md-6 d-none d-md-block kt-paragraphs pr-5"> <!-- colored-bold  -->
          <?= $page->description()->kt() ?>
        </div>

        <!-- details -->
        <div class="col-md-6 col-xl-3">

          <?php detailsDate($page) ?>

          <?php detailsVenue($page) ?>

          <div class="d-xl-none">
            <!-- Details star -->
            <?php foreach ($detailsStar as $item) : ?>
              <?php detailsItem($item) ?>
            <?php endforeach ?>

            <!-- Details info -->
            <?php foreach ($detailsInfo as $item) : ?>
              <?php detailsItem($item) ?>
            <?php endforeach ?>
          </div>

          <!-- description mobile -->
          <div class="details-item kt-paragraphs d-md-none my-3">
            <?= $page->description()->kt() ?>
          </div>

          <!-- Details normal -->
          <?php foreach ($detailsNormal as $item) : ?>
            <?php detailsItem($item) ?>
          <?php endforeach ?>

          <div class="d-xl-none">
            <?php if ($hasLogosCollaboration) : ?>
              <div class="details-item">
                <div class="title">In collaboration with</div>
                <div>
                  <?php logos($logos, "collaboration"); ?>
                </div>
              </div>
            <?php endif ?>
            <?php if ($hasLogosThanks) : ?>
              <div class="details-item">
                <div class="title">Thanks to</div>
                <div>
                  <?php logos($logos, "thanks"); ?>
                </div>
              </div>
            <?php endif ?>
          </div>

        </div>

        <div class="col-md-3 d-none d-xl-block">
          <!-- Details star -->
          <?php foreach ($detailsStar as $item) : ?>
            <?php detailsItem($item) ?>
          <?php endforeach ?>

          <!-- Details info -->
          <?php foreach ($detailsInfo as $item) : ?>
            <?php detailsItem($item) ?>
          <?php endforeach ?>

          <?php if ($hasLogosCollaboration) : ?>
            <div class="details-item">
              <div class="title">In collaboration with</div>
              <div>
                <?php logos($logos, "collaboration"); ?>
              </div>
            </div>
          <?php endif ?>
          <?php if ($hasLogosThanks) : ?>
            <div class="details-item">
              <div class="title">Thanks to</div>
              <div>
                <?php logos($logos, "thanks"); ?>
              </div>
            </div>
          <?php endif ?>
        </div>

      </div>
    </div>
  </section>

  <?php if ($page->related()->isNotEmpty()) : ?>
    <section class="related pt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <h6 class="mb-2">Related events</h6>
          </div>
          <?php foreach ($page->related()->toPages() as $event) : ?>
            <div class="col-md-6 col-xl-3">
              <?php snippet("event-preview", ["event" => $event, "type" => "small-soft"]) ?>
            </div>
          <?php endforeach ?>
        </div>
      </div>
    </section>
  <?php endif ?>

  <?php
  // $testEvent = page("program/riot-days");


  if ($page->hasPrevListed()) {
    $prevEvent = $page->prevListed();
  } else {
    $prevEvent = $page->siblings()->listed()->last();
  }


  if ($page->hasNextListed()) {
    $nextEvent = $page->nextListed();
  } else {
    $nextEvent = $page->siblings()->listed()->first();
  }



  ?>
  <section class="nav mt-5 pt-4">
    <div class="container-fluid">
      <div class="row">
        <div class="col-6">
          <h6 class="mb-2">Previous</h6>
          <?php snippet("event-preview", ["event" => $prevEvent, "type" => "nav-prev"]) ?>
        </div>
        <div class="col-6">
          <h6 class="mb-2">Next</h6>
          <?php snippet("event-preview", ["event" => $nextEvent, "type" => "nav-next"]) ?>
        </div>
      </div>
    </div>
  </section>

</div>



<?php snippet("footer") ?>