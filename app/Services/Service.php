<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Spatie\LaravelData\DataCollection;

abstract class Service
{
    abstract public function referenceData(): string;

    /**
     * @param Collection<int, Model> $collection
     * @return DataCollection
     */
    public function transformCollection(Collection $collection): DataCollection
    {
        return new DataCollection($this->referenceData(), $collection);
    }
}
