<?php

/**
 * Die and inspect variable
 */
function kill ($var, $continue = false) {
  $msg = "<pre>". print_r($var, true) ."</pre>";
  if (isset($continue) && $continue === true) {
    echo $msg;
  } else {
    die($msg);
  }
}

// -----------------------------------------------------
// For values used by t() see: 
// site/languages/de.php
// site/languages/en.php
// site/languages/it.php

function t23_eventDayNum ($field) {
  return $field->toDate('d.m');
}
function t23_eventDayWeek ($field) {
  $dayEn = $field->toDate('l');
  // return t("xs-$dayEn", $dayEn); //short
  return t($dayEn, $dayEn);
}
// function t23_eventDate ($field) {
//   $dayEn = $field->toDate('l');
//   return t($dayEn, $dayEn) ." ". $field->toDate('d.m.y');
// }
// function t23_eventDate_compact ($field) {
//   $dayEn = $field->toDate('l');
//   return t("xs-$dayEn", $dayEn) ." ". $field->toDate('d.m.y');
// }


// ----------------old
function t22_translatedPlace ($field) {
  return t($field->value(), ucfirst($field->html()));
}
function t22_langPlace ($field, $langCode) {
  return t($field->value(), ucfirst($field->html()), $langCode);
  // require(kirby()->roots("languages") . DS . $langCode . '.php');
  // return l::get($field->value());
}
// 
// 
function t22_eventDate ($field) {
  $dayEn = $field->toDate('l');
  return t($dayEn, $dayEn) ." ". $field->toDate('d.m.y');
}
function t22_eventDate_compact ($field) {
  $dayEn = $field->toDate('l');
  return t("xs-$dayEn", $dayEn) ." ". $field->toDate('d.m.y');
}

function t22_eventDayNum ($field) {
  return $field->toDate('d.m.y');
}
function t22_eventDayWeek ($field) {
  $dayEn = $field->toDate('l');
  return t($dayEn, $dayEn);
}
// 
// -----------------------------------------------------


/**
 * 
 * Extract metadata from events
 * 
 * @param $events - Kirby $pages object
 * 
 * Returns two arraws with all days and all tags
 * 
 * */
function extractEventsTagsDays ($events) {
  $allTags = [];
  $allDays = [];
  foreach ($events as $event) {
    
    // tags
    $tags = $event->eventTags()->split();
    foreach ($tags as $tag) {
      if (!in_array($tag, $allTags)) {
        $allTags[] = $tag;
      }
    }
    
    // dates
    $days = t22_extracEventDays($event);
    foreach ($days as $day) {
      if (!in_array($day, $allDays)) {
        $allDays[] = $day;
      }
    }
  }
  return [ "allTags" => $allTags, "allDays" => $allDays ];
}




/**
 * 
 * Extract day numbers from dates
 * @param $event - Kirby $page object
 * 
 * */
function t22_extracEventDays ($event) {
  $septemberStart = 1661990400;
  $septemberEnd = 1664582399;
  $days = [];
  if ($event->startDate()->toDate() >= $septemberStart && $event->startDate()->toDate() <= $septemberEnd) {
    $startDay = intval($event->startDate()->toDate('d'));
    $days = [$startDay];
    if ($event->hasDndDate()->toBool() && $event->endDate()->isNotEmpty()) {
      if ($event->endDate()->toDate() >= $septemberStart && $event->endDate()->toDate() <= $septemberEnd) {
        $endDay = intval($event->endDate()->toDate('d'));
        if ($endDay > $startDay) {
          while ($endDay > $startDay) {
            $days[] = $endDay;
            $endDay--;
          }
        }
      }
    }
  }
  return $days;
}