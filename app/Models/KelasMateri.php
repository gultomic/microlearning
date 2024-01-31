<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsCollection;

class KelasMateri extends Model
{
    use HasFactory;

    protected $table = 'kelas_materi';
    protected $guarded = ['id'];
    protected $casts = [
        'refs' => AsCollection::class,
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
}
