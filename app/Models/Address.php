<?php

namespace App\Models;

use App\Data\Responses\AddressData;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Spatie\LaravelData\WithData;

class Address extends Model
{
    use HasFactory, WithData;

    protected $fillable = [
        'addressable_id',
        'addressable_type',
        'zipcode',
        'street',
        'number',
        'complement',
        'neighborhood',
        'city',
        'state',
    ];

    protected string $dataClass = AddressData::class;

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];
    }

    public function addressable(): MorphTo
    {
        return $this->morphTo('addressable');
    }
}
