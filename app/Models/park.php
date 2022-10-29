<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class park extends Model
{
    use HasFactory; use SoftDeletes;
    protected $guarded=[];


    public function get_group()
    {
        return $this->belongsTo(group::class,'g_id');
    }
}
