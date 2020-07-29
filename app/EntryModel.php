<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntryModel extends Model
{
    public $fillable = ['entry'];
  protected $table = 'entries';
}
