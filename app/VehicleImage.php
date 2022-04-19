<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class VehicleImage extends Model
{
    protected $fillable = [
        'vehicle',
        'path',
        'cover'
    ];
    public function getUrlCroppedAttribute()
    {
        return Storage::url($this->path);
    }
}
