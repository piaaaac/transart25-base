<?php
$venues = $page->children()->listed();
$selectedVenue = param('venue', 'none');
?>

<?php snippet("header") ?>

<section class="block bg-white position-relative pt-5">
  <div class="container-fluid pt-5">
    <div class="row">

      <!-- map -->
      <div class="col-12">
        <?php snippet("map", ["selectedVenue" => $selectedVenue]) ?>
      </div>

    </div>
  </div>
</section>

<?php snippet("footer") ?>
