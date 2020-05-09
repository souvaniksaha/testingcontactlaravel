<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trash extends Model
{
    protected $table = 'trash';
    protected $fillable = ['contact_id',	'name'	, 'email',	'phn',	'reason'];
}
