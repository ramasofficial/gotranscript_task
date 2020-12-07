<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'gallery';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['uploader_name', 'file_path', 'url', 'show_from', 'show_until'];
}
