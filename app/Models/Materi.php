<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materi';
    protected $guarded = ['id'];
    // protected $appends =['status'];
    protected $casts = [
        'refs' => AsCollection::class,
    ];

    public function pembelajaran()
    {
        return $this->belongsTo(Pembelajaran::class);
    }

    /**
     * Get all of the progress for the Materi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function status(): HasMany
    {
        return $this->hasMany(KelasMateri::class, 'materi_id', 'id');
    }

    // public function getProgressAttribute(): KelasMateri | null
    // {
    //     return $this->status->where('user_id', 1)
    //         ->where('materi_id', $this->id)
    //         ->first();
    // }
}
