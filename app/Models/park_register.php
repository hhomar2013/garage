<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class park_register extends Model
{
    use HasFactory; use SoftDeletes;
    protected $guarded=[];

    public function users()
    {
      return  $this->belongsTo(User::class,'user_id');
    }

    public function parking()
    {
        return $this->belongsTo(park::class,'parking_id');
    }
}
