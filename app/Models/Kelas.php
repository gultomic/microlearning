<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsCollection;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $guarded = ['id'];
    protected $casts = [
        'refs' => AsCollection::class,
    ];

    public function pembelajaran()
    {
        return $this->belongsTo(Pembelajaran::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function status()
    {
        return $this->hasMany(KelasMateri::class);
    }

    public function materi()
    {
        return $this->hasManyThrough(Materi::class, Pembelajaran::class);
    }
}
