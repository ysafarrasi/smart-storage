<?php

namespace Database\Seeders;

use App\Models\Personnel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonnelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $personnelData = [
            [
                'personnel_id' => 293482,
                'loadCellID' => 2,
                'nokartu' => '4716626460911901',
                'nama' => 'Budi Santoso',
                'pangkat' => 'Serka',
                'nrp' => 8324567891,
                'jabatan' => 'Kepala Bagian Operasi',
                'kesatuan' => 'PT Indo Raya'
            ],
            [
                'personnel_id' => 593182,
                'loadCellID' => 4,
                'nokartu' => '4539471365208910',
                'nama' => 'Dedi Irawan',
                'pangkat' => 'Letkol',
                'nrp' => 9326578129,
                'jabatan' => 'Komandan Kompi',
                'kesatuan' => 'PT Garuda Nusantara'
            ],
            [
                'personnel_id' => 784512,
                'loadCellID' => 5,
                'nokartu' => '4532669011123562',
                'nama' => 'Agus Subroto',
                'pangkat' => 'Mayor',
                'nrp' => 8732456987,
                'jabatan' => 'Perwira Intelijen',
                'kesatuan' => 'PT Bumi Sejahtera'
            ],
            [
                'personnel_id' => 103485,
                'loadCellID' => 1,
                'nokartu' => '4921937428364871',
                'nama' => 'Wawan Hermawan',
                'pangkat' => 'Lettu',
                'nrp' => 7543267812,
                'jabatan' => 'Komandan Peleton',
                'kesatuan' => 'PT Citra Mandiri'
            ],
            [
                'personnel_id' => 473910,
                'loadCellID' => 7,
                'nokartu' => '4485102547432103',
                'nama' => 'Rudi Setiawan',
                'pangkat' => 'Kolonel',
                'nrp' => 9321746981,
                'jabatan' => 'Kepala Staf Divisi',
                'kesatuan' => 'PT Surya Gemilang'
            ],
            [
                'personnel_id' => 592104,
                'loadCellID' => 9,
                'nokartu' => '4539256471103982',
                'nama' => 'Heri Prasetyo',
                'pangkat' => 'Kapten',
                'nrp' => 7634218954,
                'jabatan' => 'Komandan Seksi',
                'kesatuan' => 'PT Nusantara Jaya'
            ],
            [
                'personnel_id' => 184309,
                'loadCellID' => 3,
                'nokartu' => '4532734892093846',
                'nama' => 'Eko Sugiarto',
                'pangkat' => 'Letda',
                'nrp' => 8629145632,
                'jabatan' => 'Perwira Logistik',
                'kesatuan' => 'PT Matahari Indonesia'
            ],
            [
                'personnel_id' => 562314,
                'loadCellID' => 8,
                'nokartu' => '4917395021348721',
                'nama' => 'Andi Gunawan',
                'pangkat' => 'Sertu',
                'nrp' => 7321456981,
                'jabatan' => 'Bintara Pelatih',
                'kesatuan' => 'PT Pelita Harapan'
            ],
            [
                'personnel_id' => 292810,
                'loadCellID' => 6,
                'nokartu' => '4539027482127631',
                'nama' => 'Slamet Riyadi',
                'pangkat' => 'Kapten',
                'nrp' => 9632145872,
                'jabatan' => 'Komandan Batalyon',
                'kesatuan' => 'PT Bintang Samudera'
            ],
            [
                'personnel_id' => 685214,
                'loadCellID' => 10,
                'nokartu' => '4539057841209364',
                'nama' => 'Imam Sudrajat',
                'pangkat' => 'Sertu',
                'nrp' => 8231456987,
                'jabatan' => 'Bintara Pembina',
                'kesatuan' => 'PT Adi Mulya'
            ]
        ];

        Personnel::insert($personnelData);
    }
}

