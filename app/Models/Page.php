<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Page extends Model
{
  use HasFactory;
  use SoftDeletes;

  protected $guarded = [];

  public $incrementing = false;
  protected $keyType = "string";

  protected static function boot() {
    parent::boot();
    static::creating(function ($model) {
      $model->id = (string) Str::uuid();
    });
  }

  function eng()
  {
    return $this->belongsTo('App\Models\PageEng','id','page_id');
  }

  function new_page()
  {
    return $this->belongsTo('App\Models\NewPage','id','page_id');
  }

  function new_page_eng()
  {
    return $this->belongsTo('App\Models\NewPageEng','id','page_id');
  }
}
