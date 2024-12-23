<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'jenis_kelamin',
        'alamat',
        'tanggal_lahir',
        'bidang_keahlian',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    const JENIS_KELAMIN_LAKI = 'L';
    const JENIS_KELAMIN_PEREMPUAN = 'P';

    public static function getJenisKelaminOptions()
    {
        return [
            self::JENIS_KELAMIN_LAKI => 'Laki-laki',
            self::JENIS_KELAMIN_PEREMPUAN => 'Perempuan',
        ];
    }

    public function makuls()
    {
        return $this->hasMany(Makul::class);
    }
}
