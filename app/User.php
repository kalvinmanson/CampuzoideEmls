<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'username', 'email', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];

  public function enrollments() {
    return $this->hasMany('App\Enrollment');
  }
  public function courses() {
    return $this->hasManyThrough('App\Course', 'App\Enrollment');
  }
  public function ranks() {
    return $this->hasMany('App\Rank');
  }
  public function results() {
    return $this->hasMany('App\Result');
  }
  public function sections() {
    return $this->hasMany('App\Section');
  }
  public function answers() {
    return $this->hasMany('App\Answer');
  }
  public function questions() {
    return $this->hasMany('App\Question');
  }
  public function topics() {
    return $this->hasMany('App\Topic');
  }
}
