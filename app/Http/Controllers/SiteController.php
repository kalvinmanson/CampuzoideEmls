<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use Gate;
use Image;
use Storage;

class SiteController extends Controller
{

  public function edit($id)
  {
    $site = Site::findOrFail($id);
    if(Gate::allows('admin-site', $site)) {
      return view('sites.edit', compact('site'));
    }
  }
  public function update(Request $request, $id)
  {
    $site = Site::findOrFail($id);
    if(Gate::allows('admin-site', $site)) {
      $site->name = $request->name;
      $site->tagline = $request->tagline;
      //Load logo
      if($request->hasFile('logo') && $request->file('logo')->isValid()) {
        $filename = '/logo-'.$site->id.'.png';
        $img = Image::make($request->file('logo'))->fit(480, 150)->encode('png');
        Storage::put('public/'.$filename, $img->stream());
        $site->logo = $filename;
      }
      $site->head = $request->head;
      $site->footer = $request->footer;
      $site->save();
      return redirect()->route('home');
    }
  }
}
