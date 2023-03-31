<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * App\Models\Customer
 *
 * @mixin \Illuminate\Database\Eloquent\Model
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Customer extends Model
{
    use HasFactory;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'cust_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cust_name',
        'cust_address',
    ];

    /**
     * Convert the model instance to an paginate.
     */
    public function toPaginage(array $parameters = []): LengthAwarePaginator
    {
        return $this->newQuery()
            ->when($parameters['search'] ?? null, fn ($query, $search) => $query
                ->where('cust_name', 'like', "%{$search}%")
                ->orWhere('cust_address', 'like', "%{$search}%")
            )
            ->orderBy('cust_name')
            ->paginate($parameters['per_page'] ?? $this->perPage);
    }
}
