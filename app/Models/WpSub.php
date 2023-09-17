<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WpSub extends Model
{
    use HasFactory;

    protected $table='wp_subs';

    protected $guarded=[];
}
