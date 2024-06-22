<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SelectedArtist extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded = [];

    public function getArtist(){
        return $this->belongsTo(Artist::class,'artist_id','id');
    }
}
