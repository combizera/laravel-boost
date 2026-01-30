<?php

namespace App\Models;

use App\Traits\HasAutoOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MenuItem extends Model
{
    /** @use HasFactory<\Database\Factories\MenuItemFactory> */
    use HasFactory;
    use HasAutoOrder;

    protected $fillable = [
        'menu_id',
        'label',
        'url',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * The column name used for ordering
     */
    protected string $orderColumn = 'order';

    /**
     * The column name used for grouping orders
     */
    protected string $orderGroupColumn = 'menu_id';

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }
}
