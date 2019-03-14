<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
  public function section() {
    return $this->belongsTo('App\Section');
  }
  public function user() {
    return $this->belongsTo('App\User');
  }
  public function answers() {
    return $this->hasMany('App\Answer');
  }
  public function ranks() {
    return $this->hasMany('App\Rank');
  }
}
