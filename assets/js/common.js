$(document).ready(function () {
  handleScroll();
});

$(window).scroll(function () {
  handleScroll();
});

function handleScroll() {
  var scrolledByThreshold = document.body.dataset.scrolledByThreshold === "yes";
  var scrolledBySubmenuThreshold =
    document.body.dataset.scrolledBySubmenuThreshold === "yes";
  var scroll = $(window).scrollTop();

  // menu header
  var threshold = 130;
  if (scrolledByThreshold === false && scroll >= threshold) {
    document.body.dataset.scrolledByThreshold = "yes";
  }
  if (scrolledByThreshold === true && scroll < threshold) {
    document.body.dataset.scrolledByThreshold = "no";
  }

  // submenu header
  var thresholdSub = 130;
  if (window.currentTemplate == "event") {
    if (breakpointIs("sm", "down")) {
      thresholdSub = $(".btn-mobile").position().top - 50;
    }
  }
  if (scrolledBySubmenuThreshold === false && scroll >= thresholdSub) {
    document.body.dataset.scrolledBySubmenuThreshold = "yes";
  }
  if (scrolledBySubmenuThreshold === true && scroll < thresholdSub) {
    document.body.dataset.scrolledBySubmenuThreshold = "no";
  }
}

function toggleMenu(newState) {
  var isOpen = $("body").hasClass("menu-xs-open");
  if (newState === true || newState === false) {
    isOpen = !newState;
  }
  $("body").toggleClass("menu-xs-open", !isOpen);
  $("button.hamburger").toggleClass("is-active", !isOpen);
}

function showModal(id) {
  $("#" + id).addClass("show");
}

function hideModal(id) {
  $("#" + id).removeClass("show");
}

function visit(url, target) {
  var defaultTarget = "_blank";
  var t = target ? target : defaultTarget;
  window.open(url, t);
}

$("[data-url]").click(function () {
  var url = this.dataset.url;
  var defaultTarget = "_blank";
  var target = this.dataset.target ? this.dataset.target : defaultTarget;
  visit(url, target);
});

$(".tr-modal-overlay").click(function () {
  console.log(this);
  $(this.parentElement).removeClass("show");
});

$(".tr-close").click(function () {
  $(".tr-modal-container").removeClass("show");
});

$("button.hamburger").click(function (e) {
  console.log("click", e);
  toggleMenu();
});

// --- detect touch devices
window.addEventListener(
  "touchstart",
  function onFirstTouch() {
    window.USER_CAN_TOUCH = true;
    $("body").attr("data-user-can-touch", "true");
    window.removeEventListener("touchstart", onFirstTouch, false);
  },
  false
);

document.addEventListener("keyup", function (event) {
  if (event.defaultPrevented) {
    return;
  }
  var key = event.key || event.keyCode;
  if (key === "Escape" || key === "Esc" || key === 27) {
    $(".tr-modal-container").removeClass("show");
  }
});
