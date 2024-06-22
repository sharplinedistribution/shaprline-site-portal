<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ReleaseStream extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded = '';

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function release(){
        return $this->belongsTo(Release::class,'release_id');
    }
}
