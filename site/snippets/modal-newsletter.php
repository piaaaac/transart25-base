<?php
$modalId = "tr-modal-newsletter";
?>


<div class="tr-modal-container" id="<?= $modalId ?>">

  <div class="tr-modal-overlay"></div>

  <div class="tr-modal">

    <div class="tr-title">
      <h2>Subscribe</h2>
      <a class="tr-close">close</a>
    </div>

    <div class="tr-content">
      <iframe src="https://yu9uwz9s.sibpages.com?redirectParent=true" frameborder="0" scrolling="yes" width="100%" height="100%" marginheight="0" marginwidth="0" name="landing-page-embed-frame" wmode="transparent" style="height: 100vh"></iframe>
      <script type="text/javascript">
        window.addEventListener("message", function(e) {
          if (e.data && e.data.redirect) {
            window.location.href = e.data.url
          }
        })
      </script>
    </div>
  </div>
</div>