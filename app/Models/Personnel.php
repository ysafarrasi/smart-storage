<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personnel extends Model
{
    use HasFactory, SoftDeletes;

    public function weapon()
    {
        return $this->belongsTo(Weapon::class, 'loadCellID', 'personnel_id');
    }

    protected $table = 'personnels';
    public $timestamps = false;

    protected $fillable = [
        'personnel_id',
        'loadCellID',
        'nokartu',
        'nama',
        'pangkat',
        'nrp',
        'jabatan',
        'kesatuan',
    ];

    protected $primaryKey = 'personnel_id';
}
