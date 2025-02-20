<?php
/**
 * TEMPORARILY DISABLED
 * - pointer-events none
 * - js 3rd slider parameter
 */ ?>

<?php
/**
 * @param $images [] urls
 * @param $options 
 *  [
 *    "ratio" fraction like 16/9 or number like 1.777
 *    "container" bool
 *  ]
 * 
 * */

$rand = rand(0, 20000);
$ratio = 2.0;
$container = true;
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

$padding = (100 / $ratio) ."%";
?>

<style>
.keen-slider .slide {
  height: 0;
  padding-top: <?= $padding ?>;
  background-size: cover;
  background-position: center center;
  /* background-image: url("https://freight.cargo.site/w/1024/q/94/i/2513d937e7576f3c7a71bdfd1d15a82b156e3b5425b2b1d8519d4cee598a1bf2/tumblr_ofy6xbMJmJ1vjn0soo1_1280.jpg"); */
}

</style>

<section class="position-relative">
  <?php if ($container): ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-10 offset-xl-1">
          <div id="abc-slider-<?= $rand ?>" class="keen-slider">
            <?php foreach ($imageUrls as $url): ?>
              <div class="keen-slider__slide slide" style="background-image: url('<?= $url ?>');"></div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
    </div>
  <?php else: ?>
    <div id="abc-slider-<?= $rand ?>" class="keen-slider">
      <?php foreach ($imageUrls as $url): ?>
        <div class="keen-slider__slide slide" style="background-image: url('<?= $url ?>');"></div>
      <?php endforeach ?>
    </div>
  <?php endif ?>
</section>

<script>
  // https://keen-slider.io/docs
  // KeenSlider needs a container as first argument, which could be a css selector string, a HTMLElement or a function that returns a HTML element or css selector string. Optionally, you can pass Options and Event hooks as second argument. Plugins can be passed as third argument.KeenSlider returns some Properties for further actions
  
  var slider = new KeenSlider (
    "#abc-slider-<?= $rand ?>", 
    {
      loop: true,
      created: function () {
        console.log('created')
      },
    },
    // disable this block to turn off autoplay
    [
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
          }, 2000)
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
  );
</script>

<?php /*

<!-- via https://www.cssscript.com/draggable-touch-slider-carousel/ -->

<style>

<?php
$width = "100%";
?>
/* --- ap added --- * /

.slider-container {
  position: relative;
  width: 100%;
  height: 0;
  padding-top: 60%;
  background-color: green;
}

/* --- slider --- * /

.slider {
  /* width: 300px; * /
  width: 100%;
  height: 200px;
}
.wrapper {
  overflow: hidden;
  position: relative;
  background: #222;
  z-index: 1;
}
#items {
  width: 10000px;
  position: relative;
  top: 0;
  left: -300px;
}
#items.shifting {
  transition: left .2s ease-out;
}
.slide {
  /* width: 300px; * /
  width: 100%;
  height: 200px;
  cursor: pointer;
  float: left;
  display: flex;
  flex-direction: column;
  justify-content: center;
  transition: all 1s;
  position: relative;
  background: #FFCF47;
}

/* --- navigation controls --- * /

.control {
  position: absolute;
  top: 50%;
  width: 40px;
  height: 40px;
  background: #fff;
  border-radius: 20px;
  margin-top: -20px;
  box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.3);
  z-index: 2;
}
.prev,
.next {
  background-size: 22px;
  background-position: center;
  background-repeat: no-repeat;
  cursor: pointer;
}
.prev {
  background-image: url(ChevronLeft.png);
  left: -20px;
}
.next {
  background-image: url(ChevronRight-512.png);
  right: -20px;
}
.prev:active,
.next:active {
  transform: scale(0.8);
}
</style>

<section class="slider-container">
  <div id="slider" class="slider">
    <div class="wrapper">
      <div id="items" class="items">
        <span class="slide">Slide 1</span>
        <span class="slide">Slide 2</span>
        <span class="slide">Slide 3</span>
        <span class="slide">Slide 4</span>
        <span class="slide">Slide 5</span>
        ...
      </div>
    </div>
    <a id="prev" class="control prev"></a>
    <a id="next" class="control next"></a>
  </div>
</section>

<script>
var slider = document.getElementById('slider'),
    sliderItems = document.getElementById('items'),
    prev = document.getElementById('prev'),
    next = document.getElementById('next');
slide(slider, sliderItems, prev, next);
function slide(wrapper, items, prev, next) {
  var posX1 = 0,
      posX2 = 0,
      posInitial,
      posFinal,
      threshold = 100,
      slides = items.getElementsByClassName('slide'),
      slidesLength = slides.length,
      slideSize = items.getElementsByClassName('slide')[0].offsetWidth,
      firstSlide = slides[0],
      lastSlide = slides[slidesLength - 1],
      cloneFirst = firstSlide.cloneNode(true),
      cloneLast = lastSlide.cloneNode(true),
      index = 0,
      allowShift = true;
  
  // Clone first and last slide
  items.appendChild(cloneFirst);
  items.insertBefore(cloneLast, firstSlide);
  wrapper.classList.add('loaded');
  
  // Mouse and Touch events
  items.onmousedown = dragStart;
  
  // Touch events
  items.addEventListener('touchstart', dragStart);
  items.addEventListener('touchend', dragEnd);
  items.addEventListener('touchmove', dragAction);
  
  // Click events
  prev.addEventListener('click', function () { shiftSlide(-1) });
  next.addEventListener('click', function () { shiftSlide(1) });
  
  // Transition events
  items.addEventListener('transitionend', checkIndex);
  
  function dragStart (e) {
    e = e || window.event;
    e.preventDefault();
    posInitial = items.offsetLeft;
    
    if (e.type == 'touchstart') {
      posX1 = e.touches[0].clientX;
    } else {
      posX1 = e.clientX;
      document.onmouseup = dragEnd;
      document.onmousemove = dragAction;
    }
  }
  function dragAction (e) {
    e = e || window.event;
    
    if (e.type == 'touchmove') {
      posX2 = posX1 - e.touches[0].clientX;
      posX1 = e.touches[0].clientX;
    } else {
      posX2 = posX1 - e.clientX;
      posX1 = e.clientX;
    }
    items.style.left = (items.offsetLeft - posX2) + "px";
  }
  
  function dragEnd (e) {
    posFinal = items.offsetLeft;
    if (posFinal - posInitial < -threshold) {
      shiftSlide(1, 'drag');
    } else if (posFinal - posInitial > threshold) {
      shiftSlide(-1, 'drag');
    } else {
      items.style.left = (posInitial) + "px";
    }
    document.onmouseup = null;
    document.onmousemove = null;
  }
  
  function shiftSlide(dir, action) {
    items.classList.add('shifting');
    
    if (allowShift) {
      if (!action) { posInitial = items.offsetLeft; }
      if (dir == 1) {
        items.style.left = (posInitial - slideSize) + "px";
        index++;      
      } else if (dir == -1) {
        items.style.left = (posInitial + slideSize) + "px";
        index--;      
      }
    };
    
    allowShift = false;
  }
    
  function checkIndex (){
    items.classList.remove('shifting');
    if (index == -1) {
      items.style.left = -(slidesLength * slideSize) + "px";
      index = slidesLength - 1;
    }
    if (index == slidesLength) {
      items.style.left = -(1 * slideSize) + "px";
      index = 0;
    }
    
    allowShift = true;
  }
}  
</script>
*/