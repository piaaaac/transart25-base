<?php
$ass = $kirby->url("assets");
?>

<section id="footer">
  <div class="social marquee-v5">

    <!-- v5 
      https://codepen.io/dumontmatteo/pen/rNeVoYE
      -->
    <div class="marquee-wrapper" data-url="https://www.instagram.com/festivaltransart/">
      <div class="marquee">
        <div class="marquee__inner">
          <span class="px-0">INSTAGRAM &rarr; INSTAGRAM &rarr;&nbsp;</span>
          <span class="px-0">INSTAGRAM &rarr; INSTAGRAM &rarr;&nbsp;</span>
          <span class="px-0">INSTAGRAM &rarr; INSTAGRAM &rarr;&nbsp;</span>
          <span class="px-0">INSTAGRAM &rarr; INSTAGRAM &rarr;&nbsp;</span>
          <span class="px-0">INSTAGRAM &rarr; INSTAGRAM &rarr;&nbsp;</span>
          <span class="px-0">INSTAGRAM &rarr; INSTAGRAM &rarr;&nbsp;</span>
        </div>
      </div>
    </div>
    <div class="marquee-wrapper" data-url="https://www.facebook.com/Festival-Transart-103590802397587/">
      <div class="marquee">
        <div class="marquee__inner">
          <span class="px-0">FACEBOOK &rarr; FACEBOOK &rarr;&nbsp;</span>
          <span class="px-0">FACEBOOK &rarr; FACEBOOK &rarr;&nbsp;</span>
          <span class="px-0">FACEBOOK &rarr; FACEBOOK &rarr;&nbsp;</span>
          <span class="px-0">FACEBOOK &rarr; FACEBOOK &rarr;&nbsp;</span>
          <span class="px-0">FACEBOOK &rarr; FACEBOOK &rarr;&nbsp;</span>
          <span class="px-0">FACEBOOK &rarr; FACEBOOK &rarr;&nbsp;</span>
        </div>
      </div>
    </div>
    <div class="marquee-wrapper" onclick="showModal('tr-modal-newsletter');">
      <div class="marquee">
        <div class="marquee__inner">
          <span class="px-0">NEWSLETTER &rarr; NEWSLETTER &rarr;&nbsp;</span>
          <span class="px-0">NEWSLETTER &rarr; NEWSLETTER &rarr;&nbsp;</span>
          <span class="px-0">NEWSLETTER &rarr; NEWSLETTER &rarr;&nbsp;</span>
          <span class="px-0">NEWSLETTER &rarr; NEWSLETTER &rarr;&nbsp;</span>
          <span class="px-0">NEWSLETTER &rarr; NEWSLETTER &rarr;&nbsp;</span>
          <span class="px-0">NEWSLETTER &rarr; NEWSLETTER &rarr;&nbsp;</span>
        </div>
      </div>
    </div>
  </div>

  <div class="space-6"></div>

  <div class="container-fluid full-w">
    <div class="row">
      <div class="col-md-4 d-flex align-items-end">
        <div>
          <p class="mb-3"><img src="<?= $ass ?>/images/logo-nr24.png" style="max-width: 40px;" /></p>
          <p class="font-s mb-3 pb-1">
            TRANSART FESTIVAL
            <br />Dantestr. 28 Via Dante, Bozen
            <br />BZ 39100 · P.I/C.F. 02280130218
            <br />SDI code W7YVJK9
            <br />TEL: 0471 665369
          </p>
        </div>
      </div>
      <div class="col-md-8 d-flex align-items-end justify-content-end">
        <div class="text-md-right mt-4 mt-md-none">
          <img src="<?= $ass ?>/images/logos-dsk.png" style="width: 100%; max-width: 700px; pointer-events: none;" class="mb-4" />
          <p class="font-s mt-4 mb-3 pb-1">
            <a class="no-u" href="<?= page("colophon")->url() ?>">Colophon</a>
            &nbsp;&nbsp;
            <a class="no-u" href="<?= page("privacy")->url() ?>">Privacy</a>
            &nbsp;&nbsp;
            <a class="no-u" href="<?= page("transparency")->url() ?>"><?= t("page_transparency") ?></a>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="d-md-none bg-black py-5 position-relative"></div>

</main>

<?php snippet("modal-newsletter") ?>
<?= js(['assets/js/common.js']) ?>
<?= js(['assets/js/blocks.js']) ?>

<?= snippet('cookie'); ?>

<?php snippet("seo/schemas") ?>

</body>

</html>