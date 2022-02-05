<?php

namespace App\Models;

use App\Models\Concerns\Collections\CustomersCollection;
use App\Services\Builders\CustomerDataBuilder;
use App\Services\CollectionService;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customer';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Create a new Eloquent Collection instance.
     *
     * @param array $models
     * @return CustomersCollection
     */
    public function newCollection(array $models = []): CustomersCollection
    {
        return new CustomersCollection($models);
    }
}
