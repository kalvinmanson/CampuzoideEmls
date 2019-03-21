<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attachment;
use Auth;
use URL;
use Storage;
use Image;

class AttachmentController extends Controller
{
  public function index(Request $request)
  {
    $attachments = Attachment::all();
    if($request->CKEditor) { $isEditor = true; } else { $isEditor = false; }
    $funcNum = $request->CKEditorFuncNum;
    return view('attachments.index', compact('attachments', 'isEditor', 'funcNum'));
  }
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'upload' => 'required|mimes:jpeg,bmp,png,gif'
    ]);
    //Create thumbnail
    $filename = str_slug(explode('.', $request->file('upload')->getClientOriginalName())[0]).rand(10000,99999);
    $uploadedFile = Image::make($request->file('upload'))->encode('png');
    Storage::put('public/'.Auth::user()->id.'/'.$filename.'.png', $uploadedFile->stream());
    $uploadThumb = Image::make($request->file('upload'))->widen(300);
    Storage::put('public/'.Auth::user()->id.'/thumb-'.$filename.'.png', $uploadThumb->stream());
    $attachment = new Attachment;
    $attachment->user_id = Auth::user()->id;
    $attachment->name = $filename;
    $attachment->mime = $request->file('upload')->getClientOriginalExtension();
    $attachment->size = $request->file('upload')->getClientSize();
    $attachment->path = Auth::user()->id.'/'.$filename.'.png';
    $attachment->thumbnail = Auth::user()->id.'/thumb-'.$filename.'.png';
    $attachment->save();
    if($request->responseHTML) {
      return redirect()->route('attachments.index');
    } else {
      return response()->json([
        'uploaded' => 1,
        'fileName' => $filename,
        'url' => '/uploads/'.Auth::user()->id.'/'.$filename
      ]);
    }
  }
  public function destroy($id)
  {
    $attachment = Attachment::findOrFail($id);
    Storage::delete('public/'.$attachment->path);
    Storage::delete('public/'.$attachment->thumbnail);
    $attachment->delete();
    return redirect()->route('attachments.index');
  }
}
