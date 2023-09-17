<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $table='playlists';

    protected $guarded=[];

    // public function getPlaylist()
    // {
    //     return $this->belongsTo(Ignoutube::class, 'id','playlist');
    // }
}
