<?php

/**
 * @param $imgs                   - Kirby Files
 * @param $aspectRatioHorizontal  - Float
 * @param $aspectRatioVertical    - Float
 * @param $width                  - String "full" | "grid100" | "grid66" | "grid50"
 * @param $mode                   - String "auto3" | "auto5" | "manual"
 * */

// Get variables values from block
$widthName = $block->width()->value();
$aspectHori = $block->aspectRatioHorizontal()->toFloat();
$aspectVert = $block->aspectRatioVertical()->toFloat();
$ratio = $aspectHori / $aspectVert;
$thumbSettings = [ // Based on width name
  "full"    => ["width" => 1400, "height" => 1400 / $ratio, "quality" => 70, "crop" => "center", "format" => "webp"],
  "grid100" => ["width" => 1024, "height" => 1024 / $ratio, "quality" => 80, "crop" => "center", "format" => "webp"],
  "grid66"  => ["width" => 1024, "height" => 1024 / $ratio, "quality" => 80, "crop" => "center", "format" => "webp"],
  "grid50"  => ["width" => 1024, "height" => 1024 / $ratio, "quality" => 80, "crop" => "center", "format" => "webp"],
];
$thumbOptions = $thumbSettings[$widthName];
$images = [];
foreach ($block->imgs()->toFiles() as $img) {
  $images[] = $img->thumb($thumbOptions)->url();
}
$mode = $block->mode()->value();
$mode2Millis = [
  "auto3" => 3000,
  "auto5" => 5000,
  "manual" => null,
];
$autoplay = $mode != "manual";
$milliseconds = $mode2Millis[$mode];

$debug = [
  "imgs" => $images,
  "aspectRatio" => $ratio,
  "widthName" => $widthName,
  "mode" => $mode,
];
// kill($debug);

$rand = rand(0, 20000);
$container = false;
$testImages = [
  "https://freight.cargo.site/w/1024/q/94/i/4eaae4760ad1480705381b05da22a246c4c57f3eb82fc3a3822d56abea044238/tumblr_ofy6xhfLGa1vjn0soo1_1280.jpg",
  "https://freight.cargo.site/w/1024/q/94/i/2513d937e7576f3c7a71bdfd1d15a82b156e3b5425b2b1d8519d4cee598a1bf2/tumblr_ofy6xbMJmJ1vjn0soo1_1280.jpg",
  "https://freight.cargo.site/w/1024/q/94/i/d7e5d30d2aaaceee2da52938df2eabbcba59d084139f91acdfbfb8d70d32b352/tumblr_og3o5bWqWo1vjn0soo1_1280.jpg",
  "https://freight.cargo.site/w/1024/q/94/i/222074170077f6a665867748011ff2e4773928bdd43a0228822d4d10e3082e1e/tumblr_og3o5770CZ1vjn0soo1_1280.jpg",
  "https://freight.cargo.site/w/1024/q/94/i/fee3b5093cab158e3cc76d3f874bb5fc5ed57fd1c5c0ceaa0c8334c17db57de0/tumblr_ol9iklwqda1vjn0soo1_1280.jpg",
];

if (isset($images) && count($images) > 0) {
  $imageUrls = $images;
} else {
  $imageUrls = $testImages;
}

if (isset($options)) {
  if (isset($options["ratio"])) {
    $ratio = $options["ratio"];
  }
  if (isset($options["container"]) && $options["container"] === false) {
    $container = false;
  }
}
?>

<style>
  .keen-slider .slide {
    aspect-ratio: <?= $ratio ?>;
    background-size: cover;
    background-position: center center;
    /* background-image: url("https://freight.cargo.site/w/1024/q/94/i/2513d937e7576f3c7a71bdfd1d15a82b156e3b5425b2b1d8519d4cee598a1bf2/tumblr_ofy6xbMJmJ1vjn0soo1_1280.jpg"); */
  }
</style>

<?php
// Get the slider markup to include in the grid element as needded
ob_start();
?>
<div id="abc-slider-<?= $rand ?>" class="keen-slider">
  <?php foreach ($imageUrls as $url): ?>
    <div class="keen-slider__slide slide" style="background-image: url('<?= $url ?>');"></div>
  <?php endforeach ?>
</div>
<?php
$sliderMarkup = ob_get_clean();
?>

<section class="position-relative">
  <?php if ($widthName == "full"): ?>
    <?= $sliderMarkup ?>
  <?php elseif ($widthName == "grid100"): ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <?= $sliderMarkup ?>
        </div>
      </div>
    </div>
  <?php elseif ($widthName == "grid66"): ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-8 offset-xl-2">
          <?= $sliderMarkup ?>
        </div>
      </div>
    </div>
  <?php elseif ($widthName == "grid50"): ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-6 offset-xl-3">
          <?= $sliderMarkup ?>
        </div>
      </div>
    </div>
  <?php endif ?>
</section>

<script>
  // https://keen-slider.io/docs
  // KeenSlider needs a container as first argument, which could be a css selector string, a HTMLElement or a function that returns a HTML element or css selector string. Optionally, you can pass Options and Event hooks as second argument. Plugins can be passed as third argument.KeenSlider returns some Properties for further actions

  var millis = <?= JSON_encode($milliseconds) ?>;
  var autoplay = (millis == null) ? false : true;
  var slider = new KeenSlider(
    "#abc-slider-<?= $rand ?>", {
      loop: true,
      created: function() {
        console.log('created')
      },
    },

    <?php
    // disable this block to turn off autoplay
    if ($autoplay):
    ?>[
        (slider) => {
          let timeout
          let mouseOver = false

          function clearNextTimeout() {
            clearTimeout(timeout)
          }

          function nextTimeout() {
            clearTimeout(timeout)
            if (mouseOver) return
            timeout = setTimeout(() => {
              slider.next()
            }, millis)
          }
          slider.on("created", () => {
            slider.container.addEventListener("mouseover", () => {
              mouseOver = true
              clearNextTimeout()
            })
            slider.container.addEventListener("mouseout", () => {
              mouseOver = false
              nextTimeout()
            })
            nextTimeout()
          })
          slider.on("dragStarted", clearNextTimeout)
          slider.on("animationEnded", nextTimeout)
          slider.on("updated", nextTimeout)
        },
      ],
    <?php endif ?>
  );
</script>