<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Item;
use Psy\Command\WhereamiCommand;

class StockController extends Controller
{
    //

    public function detail(Request $request){

    $detail = Item::where('id', $request->id)->first();
    
    $stock = Stock::with('item')->where('item_id', $request->id)->orderBy('expiry_date', 'asc')->get();
    
        return view('/display/detail')->with(['stock' => $stock])->with(['detail' => $detail]);

    }

    public function detail_form(Request $request){

        $details = Item::where('id', $request->id)->first();

        return view('/display/detail_form')->with(['details' => $details]);

    }

    public function detail_register(Request $request){

        $this->validate($request, [
            'expiry_date' => 'required',
            'quantity' => 'required',
        ]);

        Stock::create([
            'item_id' => $request->item_id,
            'expiry_date' => $request->expiry_date,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('detail', ['id' => $request->item_id]);
    }

    public function detail_edit(Request $request){

        $edits = Stock::where('id', $request->id)->first();

        return view('/display/edit')->with(['edits'=>$edits]);

    }

    public function edit_form(Request $request){

        $this->validate($request, [
            'expiry_date' => 'required',
            'quantity' => 'required',
        ]);

        $edits = Stock::find($request->id);
        $edits->expiry_date = $request->expiry_date;
        $edits->quantity = $request->quantity;
        $edits->save();

        return redirect()->route('detail', ['id' => $request->item_id]);

    }

    public function delete(Request $request){

        $delete = Stock::where('id', $request->id)->first();

        return view('/display/delete')->with(['delete'=>$delete]);

    }

    public function destory(Request $request){

        $destory = Stock::where('id', $request->id)->first();
        $destory->delete();
        return redirect()->route('detail', ['id' => $request->item_id]);

    }



}
