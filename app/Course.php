<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
  public function enrollments() {
    return $this->hasMany('App\Enrollment')->where('role', '!=', 'Candidate');
  }
  public function candidates() {
    return $this->hasMany('App\Enrollment')->where('role', 'Candidate');
  }
  public function users() {
    return $this->hasManyThrough('App\User', 'App\Enrollment');
  }
  public function sections() {
    return $this->hasMany('App\Section')->orderBy('sorted', 'asc');
  }
  public function topics() {
    return $this->hasMany('App\Topic')->orderBy('created_at', 'desc');
  }
  public function questions() {
    return $this->hasManyThrough('App\Question', 'App\Section');
  }
}
