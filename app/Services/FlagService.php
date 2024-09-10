<?php

namespace App\Services;

use App\Contracts\Flaggable;
use App\Data\Requests\Flag\CreateFlagRequestData;
use App\Data\Responses\FlagData;
use App\Models\Flag;
use App\Models\Ong;
use Illuminate\Support\Collection;
use Throwable;

class FlagService extends Service
{
    public function referenceData(): string
    {
        return FlagData::class;
    }

    public function findAll(?Flaggable $model = null): Collection
    {
        if ($model) {
            return $model->flags;
        }

        return Flag::all();
    }

    /**
     * @throws Throwable
     */
    public function create(CreateFlagRequestData $data): Flag
    {
        return Flag::create($data->transform());
    }

    /**
     * @throws Throwable
     */
    public function update(Flag $flag, CreateFlagRequestData $data): Flag
    {
        $flag->update($data->transform());

        $flag->refresh();

        return $flag;
    }

    public function delete(Flag $flag): ?bool
    {
        return $flag->delete();
    }

    public function syncSlug(Flaggable $flaggable, array $flagSlugs): Flaggable
    {
        $flaggable->flags()->sync(
            Flag::whereIn('slug', $flagSlugs)->pluck('id')
        );

        $flaggable->refresh()->load('flags');

        return $flaggable;
    }
}
