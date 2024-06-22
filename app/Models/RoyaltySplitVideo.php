<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class RoyaltySplitVideo extends Model
{
    use HasFactory;
    protected $guarded = '';

    public function release(){
        return $this->belongsTo(VideoRelease::class,'video_id','id');
    }

    public function royalty(){
        return $this->belongsTo(User::class,'email','email');
    }
}
