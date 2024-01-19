<?php

namespace App\Filters;

use App\Enums\Global\Sort;
use App\Enums\TodoStatusEnum;

class TodoFilters extends AbstractFilters
{
    protected function title(string $value): void
    {
        $this->builder->where('title', 'LIKE', "%{$value}%");
    }

    protected function ids(array $value): void
    {
        $this->builder->whereIn('id', $value);
    }

    protected function from(string $value): void
    {
        $this->builder->whereDate('created_at', '>=', $value);
    }

    protected function to(string $value): void
    {
        $this->builder->whereDate('created_at', '<', $value);
    }

    protected function status(string $value): void
    {
        match ($value) {
            strtolower(TodoStatusEnum::COMPLETED->name) => $this->builder->where('status', TodoStatusEnum::COMPLETED->value),
            strtolower(TodoStatusEnum::INCOMPLETE->name) => $this->builder->where('status', TodoStatusEnum::INCOMPLETE->value),
            default => $this->builder->where('status', TodoStatusEnum::COMPLETED->value),
        };
    }

    protected function sort(string $value): void
    {
        match ($value) {
            strtolower(Sort::ASCENDING->name) => $this->builder->orderBy('created_at', Sort::ASCENDING->value),
            strtolower(Sort::DESCENDING->name) => $this->builder->orderBy('created_at', Sort::DESCENDING->value),
            default => $this->builder->orderBy('created_at', Sort::DESCENDING->value),
        };
    }
}
