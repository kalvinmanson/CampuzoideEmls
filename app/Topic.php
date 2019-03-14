<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
  public function course() {
    return $this->belongsTo('App\Course');
  }
  public function user() {
    return $this->belongsTo('App\User');
  }
  public function ranks() {
    return $this->hasMany('App\Rank');
  }
  public function parent() {
    return $this->belongsTo('App\Topic', 'parent_id');
  }
  public function replies() {
    return $this->hasMany('App\Topic', 'parent_id');
  }
}
