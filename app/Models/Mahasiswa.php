<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        'jenis_kelamin',
        'alamat',
        'tanggal_lahir',
        'jurusan',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    const JURUSAN_TI = 'TI';
    const JURUSAN_SI = 'SI';
    const JURUSAN_ILKOM = 'ILKOM';

    const JENIS_KELAMIN_LAKI = 'L';
    const JENIS_KELAMIN_PEREMPUAN = 'P';

    public static function getJurusanOptions()
    {
        return [
            self::JURUSAN_TI => 'Teknik Informatika',
            self::JURUSAN_SI => 'Sistem Informasi',
            self::JURUSAN_ILKOM => 'Ilmu Komputer',
        ];
    }

    public static function getJenisKelaminOptions()
    {
        return [
            self::JENIS_KELAMIN_LAKI => 'Laki-laki',
            self::JENIS_KELAMIN_PEREMPUAN => 'Perempuan',
        ];
    }
}