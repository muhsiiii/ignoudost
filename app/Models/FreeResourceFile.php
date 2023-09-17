<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeResourceFile extends Model
{
    use HasFactory;

    protected $table='free_resource_files';

    protected $guarded=[];

    public function GetSubFolders()
    {
        return $this->belongsTo(SubFolder::class, 'sub_folder','id');
    }
}
