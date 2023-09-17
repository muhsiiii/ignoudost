<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ignoutube extends Model
{
    use HasFactory;

    protected $table='ignoutubes';

    protected $guarded=[];

    public function GetPlaylist()
    {
        return $this->belongsTo(Playlist::class, 'playlist','id');
    }
}
