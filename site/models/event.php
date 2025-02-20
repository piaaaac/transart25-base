<?php

use Kirby\Cms\Page;

class EventPage extends Page
{

    // Page method that returns a boolean value: True if the event is in the past, False if it is in the future
    public function isPast()
    {

        // If event has no date, return false
        if ($this->startDate()->isEmpty()) {
            return false;
        }

        // Get the event date
        $date = $this->startDate();

        // If there is an endDate, use that one for the comparison
        if ($this->hasEndDate()->toBool()) {
            $date = $this->endDate();
        }

        // Get the event time for 23:59:59
        $dateAt235959 = strtotime("$date 23:59:59");

        // Compare the event date with tonight
        $isPast = time() > $dateAt235959;
        return $isPast;
    }
}
