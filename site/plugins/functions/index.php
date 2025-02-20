<?php

function t23_eventDayNum($field)
{
  return $field->toDate('d.m');
}

function t23_eventDayWeek($field)
{
  $dayEn = $field->toDate('l');
  return t($dayEn, $dayEn);
}

function t22_translatedPlace($field)
{
  return t($field->value(), ucfirst($field->html()));
}

function t22_langPlace($field, $langCode)
{
  return t($field->value(), ucfirst($field->html()), $langCode);
}

function t22_eventDate($field)
{
  $dayEn = $field->toDate('l');
  return t($dayEn, $dayEn) . " " . $field->toDate('d.m.y');
}

function t22_eventDate_compact($field)
{
  $dayEn = $field->toDate('l');
  return t("xs-$dayEn", $dayEn) . " " . $field->toDate('d.m.y');
}

function t22_eventDayNum($field)
{
  return $field->toDate('d.m.y');
}

function t22_eventDayWeek($field)
{
  $dayEn = $field->toDate('l');
  return t($dayEn, $dayEn);
}

function extractEventsTagsDays($events)
{
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
  return ["allTags" => $allTags, "allDays" => $allDays];
}

function t22_extracEventDays($event)
{
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
