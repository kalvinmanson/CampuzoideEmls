<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
  public function user() {
    return $this->belongsTo('App\User');
  }
  public function section() {
    return $this->belongsTo('App\Section');
  }
  public function question() {
    return $this->belongsTo('App\Question');
  }
  public function result() {
    return $this->belongsTo('App\Result');
  }
  public function topic() {
    return $this->belongsTo('App\Topic');
  }
}
