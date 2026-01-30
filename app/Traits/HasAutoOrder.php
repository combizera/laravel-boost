<?php

namespace App\Traits;

/**
 * Trait HasAutoOrder
 *
 * Automatically assigns the next available order number when creating a new model.
 *
 * Usage:
 * ```php
 * class MenuItem extends Model
 * {
 *     use HasAutoOrder;
 *
 *     // Optional: Customize the order column (default: 'order')
 *     protected string $orderColumn = 'order';
 *
 *     // Optional: Group orders by a specific column (e.g., 'menu_id', 'category_id')
 *     protected string $orderGroupColumn = 'menu_id';
 * }
 * ```
 *
 * Example without grouping:
 * ```php
 * class Category extends Model
 * {
 *     use HasAutoOrder;
 *
 *     // Will auto-increment order across all categories
 * }
 * ```
 *
 * Example with custom column names:
 * ```php
 * class Task extends Model
 * {
 *     use HasAutoOrder;
 *
 *     protected string $orderColumn = 'position';
 *     protected string $orderGroupColumn = 'project_id';
 * }
 * ```
 */
trait HasAutoOrder
{
    protected static function bootHasAutoOrder(): void
    {
        static::creating(function ($model) {
            if (is_null($model->{$model->getOrderColumn()})) {
                $model->{$model->getOrderColumn()} = $model->getNextOrderNumber();
            }
        });
    }

    /**
     * Get the next order number for this model
     */
    protected function getNextOrderNumber(): int
    {
        $query = static::query();

        // Se tiver um campo de agrupamento (ex: menu_id), filtra por ele
        if ($groupColumn = $this->getOrderGroupColumn()) {
            $query->where($groupColumn, $this->{$groupColumn});
        }

        $maxOrder = $query->max($this->getOrderColumn()) ?? -1;

        return $maxOrder + 1;
    }

    /**
     * Get the column name used for ordering
     */
    protected function getOrderColumn(): string
    {
        return property_exists($this, 'orderColumn') ? $this->orderColumn : 'order';
    }

    /**
     * Get the column name used for grouping orders (optional)
     *
     * @return string|null
     */
    protected function getOrderGroupColumn(): ?string
    {
        return property_exists($this, 'orderGroupColumn') ? $this->orderGroupColumn : null;
    }
}
