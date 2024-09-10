<?php

namespace App\Models;

use App\Contracts\Flaggable;
use App\Data\Responses\OngData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\LaravelData\WithData;

class Ong extends Model implements Flaggable
{
    use HasFactory, WithData;

    protected $fillable = [
        'name'
    ];

    protected string $dataClass = OngData::class;

    public function flags(): MorphToMany
    {
        return $this->morphToMany(Flag::class, 'flaggable', 'flag_model');
    }

    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable');
    }
}
