// ----------------------------------------------------------------
// Accordion
// ----------------------------------------------------------------

$(document).ready(function () {
  var highlightState = {
    selected: null,
  };

  // via https://css-tricks.com/snippets/jquery/simple-jquery-accordion/
  var allContents = $(".hp-highlights .items .item .content").hide();
  var allItems = $(".hp-highlights .items .item");
  var firstItem = allItems.first()[0];

  function openItem(item) {
    var id = item.dataset.id;
    if (highlightState.selected !== id) {
      console.log("clicked", id);
      allContents.slideUp();
      allItems.removeClass("open");
      highlightState.selected = id;
      $(item).find(".content").slideDown();
      $(".hp-highlights .items .item[data-id='" + id + "']").addClass("open");
    }
    return false;
  }

  $(".hp-highlights .items .item").click(function () {
    openItem(this);
  });

  if (firstItem) {
    openItem(firstItem);
  }
});
