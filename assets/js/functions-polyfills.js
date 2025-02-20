function breakpointIs(breakpointName, compare) {
  var breakpoints = [
    { name: "xs", index: 1, minWidth: 0 },
    { name: "sm", index: 2, minWidth: 576 },
    { name: "md", index: 3, minWidth: 768 },
    { name: "lg", index: 4, minWidth: 992 },
    { name: "xl", index: 5, minWidth: 1200 },
  ];
  var w = window.innerWidth;
  var current = breakpoints[0];
  breakpoints.forEach(function (b, i) {
    if (w > b.minWidth) {
      current = b;
    }
  });
  var breakpoint = breakpoints.find(function (e) {
    return e.name === breakpointName;
  });
  if (!breakpoint) {
    throw "(30298140) Unknown breakpointName " + breakpointName;
  }
  var breakpointIndex = breakpoint.index;
  if (compare === "only") {
    return current.index === breakpointIndex;
  } else if (compare === "down") {
    return current.index <= breakpointIndex;
  } else if (compare === "up") {
    return current.index >= breakpointIndex;
  }
}
