<section id="opening-page-program">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="content">
  
          <div class="wrapper">
  
            <h1 class="color-yelo"><?= $page->title()->value() ?></h1>

            <div class="pt-3 mt-3">
              <div class="prog-butt-container d-sm-none">
                <a href="<?= $page->url() ."/view:grid" ?>" class="<?= $view === "grid" ? "active " : "" ?>button white program-views small icon-grid"><?= t("grid") ?></a>
                <a href="<?= $page->url() ."/view:date" ?>" class="<?= $view === "date" ? "active " : "" ?>button white program-views small icon-cal"><?= t("date") ?></a>
                <a href="<?= $page->url() ."/view:place" ?>" class="<?= $view === "place" ? "active " : "" ?>button white program-views small icon-pin"><?= t("place") ?></a>
              </div>
              <div class="prog-butt-container d-none d-md-none d-sm-flex">
                <a href="<?= $page->url() ."/view:grid" ?>" class="<?= $view === "grid" ? "active " : "" ?>button white program-views small icon-grid"><?= t("as_grid") ?></a>
                <a href="<?= $page->url() ."/view:date" ?>" class="<?= $view === "date" ? "active " : "" ?>button white program-views small icon-cal"><?= t("by_date") ?></a>
                <a href="<?= $page->url() ."/view:place" ?>" class="<?= $view === "place" ? "active " : "" ?>button white program-views small icon-pin"><?= t("by_place") ?></a>
              </div>
              <div class="prog-butt-container d-none d-md-flex">
                <a href="<?= $page->url() ."/view:grid" ?>" class="<?= $view === "grid" ? "active " : "" ?>button white program-views icon-grid"><?= t("view_as_grid") ?></a>
                <a href="<?= $page->url() ."/view:date" ?>" class="<?= $view === "date" ? "active " : "" ?>button white program-views icon-cal"><?= t("view_by_date") ?></a>
                <a href="<?= $page->url() ."/view:place" ?>" class="<?= $view === "place" ? "active " : "" ?>button white program-views icon-pin"><?= t("view_by_place") ?></a>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<section class="opening-page-program-spacer"></section>