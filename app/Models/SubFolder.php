<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubFolder extends Model
{
    use HasFactory;

    protected $table='sub_folders';

    protected $guarded=[];

    public function GetParentFolders()
    {
        return $this->belongsTo(FreeResource::class, 'parent_folder','id');
    }
}
