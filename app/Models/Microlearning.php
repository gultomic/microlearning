<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsCollection;

class Microlearning extends Model
{
    use HasFactory;

    protected $table = 'microlearning';
    protected $guarded = ['id'];
    protected $casts = [
        'refs' => AsCollection::class,
    ];

    public function pembelajaran()
    {
        return $this->hasMany(Pembelajaran::class, 'microlearning_id', 'id');
    }
}
