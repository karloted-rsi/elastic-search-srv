<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Elastic\ScoutDriverPlus\Searchable;

class Transaction extends Model
{
    use HasFactory, Searchable;

    protected $guarded = [];

    /**
     * Specify the data that should be sent to Elasticsearch.
     */
    public function toSearchableArray(): array
    {
        $array = $this->toArray();
        // You can modify the array before returning it if necessary
        return [
            'ref_number' => $this->ref_number,
            'amount' => $this->amount,
            'created_at' => $this->created_at,
        ];
    }

    public function searchableAs()
    {
        return 'trs_transaction_index';
    }
}
