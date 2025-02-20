<?php


// --- V2

return [

  /**
   * 
   * Default language: ita
   * 
   * */

  [
    "pattern" => "/",
    "action"  => function () {
      return site()->visit("home", "it");
    }
  ],

  /**
   * 
   * Program page >>> hp links
   * 
   * */

  [
    "pattern" => "/program/category/(:any)",
    "language" => "*",
    "action"  => function ($lang, $slug) {
      $url = page("program")->url($lang->code()) ."/view:list/category:". $slug;
      go($url);
    }
  ],

  [
    "pattern" => "/program/tag/(:any)",
    "language" => "*",
    "action"  => function ($lang, $slug) {
      $url = page("program")->url($lang->code()) ."/view:list/tag:". $slug;
      go($url);
    }
  ],

  /**
   * 
   * Venue page >>> Locations with param
   * 
   * */

  [
    "pattern" => "/locations/(:any)",
    "language" => "*",
    "action"  => function ($lang, $slug) {
      $url = page("locations")->url() ."/venue:". $slug;
      go($url);
    }
  ],

  /**
   * 
   * Redirect events from old url to archive url 
   * - before and during the festival the format was: /program/event-name
   * - now that the pages are archived the format is: /archive/archive-22/event-name
   * 
   * */

  // [
  //   "pattern" => "program/(:any)",
  //   "language" => "*",
  //   "action"  => function ($lang, $slug) {
  //     $archiveId = "archive/archive-22";
  //     $archiveUrl = site()->url() ."/$archiveId/". $slug;
  //     go($archiveUrl);
  //     // return "<div>". $slug ." - ". $lang ."</div>";
  //     // return "<div>". $archiveUrl ."</div>";
  //     // $site->visit("archive/archive-22/". $slug, $lang);
  //   }
  // ],

  /**
   * 
   * 404 problem on server
   * 
   * */

  // [
  //   "pattern" => "(:any)",
  //   "language" => "*",
  //   "action"  => function ($lang, $uid) {
  //     $page = page($uid);
  //     if (!$page) {
  //       $err = site()->errorPage();
  //       return site()->visit($err);
  //     }
  //   }
  // ],

  // handle 404 manually ?

  // [
  //   "pattern" => "/en/home-en-21",
  //   "action" => function () {
  //       return page("error");
  //   }
  // ],

]; 
