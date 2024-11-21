<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $results = Transaction::searchQuery([
            'match_all' => new \stdClass(), // Match all documents
        ])->execute();

        $data = $results->models()->where('ref_number','=',$request->q);

        return response()->json(['data' => $data]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $transaction = Transaction::create([
            'ref_number' => $request->ref_number,
            'amount' => $request->amount
        ]);

        return response()->json(['data' => $transaction]);
    }
}
