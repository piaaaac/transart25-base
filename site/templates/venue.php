<?php
$venues = page("locations")->children()->listed();
$selectedVenue = $page->slug();
?>

<?php snippet("header") ?>

<section class="block">
  <div class="container-fluid">
    <div class="row">

      <!-- map -->
      <div class="col-12">
        <?php snippet("map", ["selectedVenue" => $selectedVenue]) ?>
      </div>

    </div>
  </div>
</section>

<?php snippet("footer") ?>
