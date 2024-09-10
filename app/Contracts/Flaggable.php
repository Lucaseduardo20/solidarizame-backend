<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Collection;

/**
 * @property Collection $flags
 */
interface Flaggable
{
    public function flags(): MorphToMany;
}
