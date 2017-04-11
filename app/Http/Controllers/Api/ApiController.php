<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Purchase;
use App\Model\Offering;

class ApiController extends Controller
{

    public function index()
    {
        $purchase = Purchase::paginate(5);
        return response()->json([
            'purchase' => $purchase
        ], 200);
    }

    //curl --request POST --data '{"customerName":"user","offeringID":1,"quantity":3}' -H "Content-Type: application/json"  "http://coding-challange/api/purchases?XDEBUG_SESSION_START=1"
    //curl --request GET --data '{}' -H "Content-Type: application/json"  "http://coding-challange/api/purchases?XDEBUG_SESSION_START=1"


    public function create(Request $request)
    {
        $purchase = new Purchase;
        if ($purchase->validate($request->all())) {
            $offering = Offering::find($request->input('offeringID'));
            if (!isset($offering)) {
                return response()->json([
                    'errors' => 'Offering  with id ' . $request->input('offeringID').' don\'t find'
                ], 400);
            }
            $purchase->customerName = $request->input('customerName');
            $purchase->offeringID = $request->input('offeringID');
            $purchase->quantity = $request->input('quantity');
            $purchase->save();
        }
        return response()->json([
            'message' => 'Purchase  successfully created with id ' . $purchase->id
        ], 200);
    }
}
