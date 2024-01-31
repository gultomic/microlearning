<?php

namespace App\Models;

use App\Models\Kelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembelajaran extends Model
{
    use HasFactory;

    protected $table = 'pembelajaran';
    protected $guarded = ['id'];
    protected $appends = ['count_kelas'];
    protected $casts = [
        'refs' => AsCollection::class,
    ];

    public function materi()
    {
        return $this->hasMany(Materi::class, 'pembelajaran_id', 'id');
    }

    public function microlearning()
    {
        return $this->belongsTo(Microlearning::class, 'microlearning_id', 'id');
    }

    /**
     * Get all of the kelas for the Pembelajaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kelas(): HasMany
    {
        return $this->hasMany(Kelas::class, 'pembelajaran_id', 'id');
    }

    public function getCountKelasAttribute(): Kelas | int
    {
        return Kelas::where('pembelajaran_id', $this->id)->count();
    }
}
