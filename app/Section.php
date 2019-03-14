<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
  protected $fillable = ['video'];
  public function getVideoEmbedAttribute() {
    $ytvIDlen = 11;
    $idStarts = strpos($this->video, "?v=");
    if($idStarts === FALSE)
      $idStarts = strpos($this->video, "&v=");
    if($idStarts === FALSE)
      return "YouTube video ID not found. Please double-check your URL.";
    $idStarts +=3;
    $this->video = substr($this->video, $idStarts, $ytvIDlen);
    return 'https://www.youtube.com/embed/'.$this->video;
  }
  public function course() {
    return $this->belongsTo('App\Course');
  }
  public function user() {
    return $this->belongsTo('App\User');
  }
  public function ranks() {
    return $this->hasMany('App\Rank');
  }
  public function results() {
    return $this->hasMany('App\Result');
  }
}
