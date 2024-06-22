<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class RoyaltySplit extends Model
{
    use HasFactory;
    protected $guarded = '';

    public function track(){
        return $this->belongsTo(Track::class);
    }

    public function release(){
        return $this->belongsTo(Release::class);
    }

    public function royalty(){
        return $this->belongsTo(User::class,'email','email');
    }
}
