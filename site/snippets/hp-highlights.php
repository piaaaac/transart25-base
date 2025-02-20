<?php

/**
 * 
 * @param $events – Kirby Pages obj
 * 
 * */

if ($events->count() === 0) {
  return;
}

function details($title, $text, $type)
{
?>
  <div class="details-item <?= $type ?>">
    <div class="title"><?= $title ?></div>
    <div class="text"><?= $text ?></div>
  </div>
<?php }
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
    $text .= "<p><a href='" . $venuePage->url() . "'>" . t("see_location") . "</a>&nbsp;&rarr;</span></p>";
  }
  details($title, $text, $type);
}

function detailsMobile($event)
{
  $type = "normal";
  $textDate = t23_eventDayNum($event->startDate());
  if ($event->hasEndDate()->toBool()) {
    $textDate .= " &rarr; " . t23_eventDayNum($event->endDate());
  }
  $textTime = "h " . $event->startTime()->toDate("H:i");
  if ($event->hasEndTime()->toBool()) {
    $textTime .= " &rarr; h " . $event->endTime()->toDate("H:i");
  }
  $title = "$textDate, $textTime";
  $text = "<p>Venue info will be added soon.</p>";
  $venuePage = $event->place()->toPage();
  if ($venuePage) {
    $text = "<p><a href='" . $venuePage->url() . "'>" . $venuePage->title() . "</a>&nbsp;&rarr;</span></p>";
  }
  details($title, $text, $type);
}
?>

<section class="hp-highlights">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <h5 class="upper mb-3">Highlighted events</h5>
        <div class="items">
          <?php foreach ($events as $id => $event) :
            $image = $event->img()->toFile();
            $imageUrl = $image->thumb(["width" => 1400])->url();
            $category = $event->category()->value();
          ?>
            <div class="item" data-id="<?= $id ?>">
              <div class="left">
                <div class="title" data-id="<?= $id ?>">
                  <div>
                    <p class="weight-900"><?= $event->title()->kti() ?></p>
                    <p><?= $event->subtitle()->kti() ?>&nbsp;</p>
                  </div>
                  <div class="arrow">+</div>
                </div>
                <div class="content" data-id="<?= $id ?>">
                  <div class="img d-md-none my-3" style="background-image: url('<?= $imageUrl ?>');" data-url="<?= $event->url() ?>">
                    <span class="category <?= $category ?>"><?= $category ?></span>
                  </div>
                  <div class="info d-none d-md-block">
                    <!--  
                    <?php detailsDate($event) ?>
                    <?php detailsVenue($event) ?>
                    -->
                    <div><?php detailsMobile($event) ?></div>
                    <div><a class="button ticket" href="<?= $event->url() ?>">Info & tickets</a></div>
                  </div>
                  <div class="info d-flex d-md-none align-items-start justify-content-between">
                    <div><?php detailsMobile($event) ?></div>
                    <div><a class="button ticket" href="<?= $event->url() ?>">Info&nbsp;&&nbsp;tickets</a></div>
                  </div>
                </div>
              </div>
              <div class="right">
                <div class="img d-none d-md-block" style="background-image: url('<?= $imageUrl ?>');" data-url="<?= $event->url() ?>">
                  <span class="category <?= $category ?>"><?= $category ?></span>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>

      </div>
    </div>
  </div>
</section>