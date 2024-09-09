<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tmprfid extends Model
{
    use HasFactory;
    protected $table = 'tmprfids';
    protected $primaryKey = 'nokartu';

    public $timestamps = false; // Tambahkan baris ini

    protected $fillable = [
        'nokartu'
    ];
}
