<?php

namespace App\Models;

use App\Data\Responses\FlagData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\WithData;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Flag extends Model
{
    use HasFactory, WithData, HasSlug;

    protected $fillable = [
        'name',
        'slug'
    ];

    protected string $dataClass = FlagData::class;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }
}
