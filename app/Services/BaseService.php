<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Facades\Validator;

abstract class BaseService
{
    protected array $rules = [];
    public function validate(array $data): bool
    {
        Validator::make($data, $this->rules)
            ->validate();

        return true;
    }
}
