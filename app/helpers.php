<?php
if (! function_exists('insite')) {
    function insite() {
      $site = App\Site::where('domain', $_SERVER['HTTP_HOST'])->first();
      if(!$site) {
        $site = new App\Site;
        $site->name = $_SERVER['HTTP_HOST'];
        $site->domain = $_SERVER['HTTP_HOST'];
        $site->save();
      }
      return $site;
    }
}
