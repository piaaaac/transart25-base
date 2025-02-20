// ----------------------------------------------------------------
// Accordion
// ----------------------------------------------------------------

$(document).ready(function () {
  var accordionState = {
    selected: null,
  };

  // via https://css-tricks.com/snippets/jquery/simple-jquery-accordion/
  var allContents = $(".t23_accordion .items .item .content").hide();
  var allItems = $(".t23_accordion .items .item");

  $(".t23_accordion .items .item .title").click(function () {
    console.log("clicked", id);
    var id = this.dataset.id;
    allContents.slideUp();
    allItems.removeClass("open");
    if (accordionState.selected === this.dataset.id) {
      accordionState.selected = null;
    } else {
      accordionState.selected = id;
      $(this).next().slideDown();
      $(".t23_accordion .items .item[data-id='" + id + "']").addClass("open");
    }
    return false;
  });
});
