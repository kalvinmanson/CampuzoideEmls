<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Config;

class WebController extends Controller
{
  public function index()
  {
    return view('web.index');
  }
  public function install(Request $request) {
    $config = Config::all();
    if($config->count() == 0) {
      $configsAr = [
        ['name' => 'camp_name', 'content' => 'Campuzoide'],
        ['name' => 'camp_description', 'content' => 'Plataforma de cursos virtuales'],
        ['name' => 'course_categories', 'content' => 'Campuzoide'],
        ['name' => 'course_tags', 'content' => 'Campuzoide']
      ];
      $configs = Config::insert($configsAr);
    }
    return redirect()->route('home');
  }
}
