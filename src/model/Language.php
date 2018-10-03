<?php

namespace Datht\Language;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //
    protected $table = 'translates';
    protected $fillable = ['in_code','en','vn','pages'];

    public $timestamps = false;
}
