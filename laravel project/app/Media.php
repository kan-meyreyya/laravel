<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [
    	'file_name', 'file_size', 'created_by', 'created_date', 'file_type'
    ];
}
