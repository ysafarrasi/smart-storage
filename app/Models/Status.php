<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table = 'status';
    public $timestamps = false; // jika tidak menggunakan timestamps
    protected $primaryKey = 'loadCellID';

    protected $fillable = [
        'loadCellID',
        'tanggal',
        'time_in',
        'time_out',
        'duration',
    ];

    public function personnel()
    {
        return $this->belongsTo(Personnel::class, 'loadCellID', 'loadCellID');
    }
}
