<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use App\Models\SoftDeletes;
class Book extends Model
{
   use SoftDeletes;
   protected $dates = ['deleted_at'];
   protected $fillable = ['name_book','details'];
  
}
