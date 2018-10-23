<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Quote;
use Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class QuoteController extends Controller {

    public function postQuote(Request $request)
    {
        $user = JWTAuth::parseToken()->toUser();
        $quote = new Quote();
        $quote->content = $request->input('content');
        $quote->save();
        return response()->json(['quote'=>$quote,'user'=>$user],201);
    }
    public function getQuote()
    {
        $quotes = Quote::all();
        $resp = [
            "quotes"=> $quotes            
        ];
        return response()->json($resp, 201);
        

    }

    public function putQuote(Request $request, $id)
    {
        $quote = Quote::find($id);
        if (!$quote){
            return response()->json(['message'=>'Document not found'], 404);
        }
        $quote->content = $request->input('content');
        $quote->save();
        return response()->json(['quote'=>$quote],200);

    }

    public function deleteQuote($id)
    {
        $quote = Quote::find($id);
        $quote->delete();
        return response()->json(['message'=>'Quote deleted'],200);

    }
}
