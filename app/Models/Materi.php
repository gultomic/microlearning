<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsCollection;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materi';
    protected $guarded = ['id'];
    protected $appends =['status'];
    protected $casts = [
        'refs' => AsCollection::class,
    ];

    public function pembelajaran()
    {
        return $this->belongsTo(Pembelajaran::class);
    }

    public function getStatusAttribute(): KelasMateri | null
    {
        return KelasMateri::where('kelas_id', 1)
            ->where('materi_id', $this->id)
            ->first();
    }
}
