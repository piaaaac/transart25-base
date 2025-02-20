<?php snippet("header") ?>

<!-- <div class="spacer py-3 position-relative"></div> -->

<!-- highlights -->
<?php
snippet("hp-highlights", ["events" => $page->highlights()->toPages()])
?>

<div class="spacer py-5 position-relative"></div>

<!-- blocks -->
<section class="page-body">
  <?= $page->contentBlocks()->toBlocks() ?>
</section>

<div class="spacer py-5 position-relative"></div>

<script>
  $(document).ready(function() {
    handleHomeScroll();
  });

  $(window).scroll(function() {
    handleHomeScroll();
  });

  function handleHomeScroll() {
    var homeScrolledBy = (document.body.dataset.homeScrolledBy === "yes");
    var scroll = $(window).scrollTop();

    // var threshold = 450;

    var margin = 100;
    var threshold = $("#opening-home .content").height() - $("#opening-home .content .top").height() - margin;

    console.log(homeScrolledBy, scroll)

    if (homeScrolledBy === false && scroll >= threshold) {
      document.body.dataset.homeScrolledBy = "yes";
    }

    if (homeScrolledBy === true && scroll < threshold) {
      document.body.dataset.homeScrolledBy = "no";
    }
  }
</script>

<?php snippet("footer") ?>