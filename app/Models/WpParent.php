<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WpParent extends Model
{
    use HasFactory;

    protected $table='wp_parents';

    protected $guarded=[];
}
