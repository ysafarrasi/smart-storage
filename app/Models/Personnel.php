<?php

namespace App\Models;

use App\Models\Weapon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Personnel extends Model
{
    use HasFactory, SoftDeletes;

    public function weapon()
    {
        return $this->hasOne(Weapon::class, 'loadCellID', 'loadCellID');
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
