<?php

namespace App\Data\Transformers;

use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Support\Transformation\TransformationContext;
use Spatie\LaravelData\Transformers\Transformer;

class PasswordTransformer implements Transformer
{

    public function transform(DataProperty $property, mixed $value, TransformationContext $context): string
    {
        return bcrypt($value);
    }
}
