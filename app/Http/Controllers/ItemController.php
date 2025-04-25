<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Stock;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item
            ::where('items.status', 'active')
            ->select()
            ->get();

        return view('item.index', compact('items'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [

                'name' => 'required|max:100|unique:items',
                'company_name' => 'required',
                'image' => 'required',
            ]);

            //画像を保存するディレクトリ名
            $dir = 'sample';

            //アップロードされたファイル名を取得
            $file_name = $request->file('image')->getClientOriginalName();

            //sampleディレクトリに画像を保存
            $request->file('image')->storeAs('public/' . $dir, $file_name);




            // 商品登録
            Item::create([
                'id' => Auth::user()->id,
                'name' => $request->name,
                'company_name' => $request->company_name,
                'image' => 'storage/' . $dir . '/' . $file_name,
            ]);

            return redirect('/items');
        }

        return view('item.add');
    }

    public function edit(Request $request)
    {
        $edit = Item::where('id', $request->id)->first();
        return view('item.edit')->with(['edit' => $edit]);
    }
    
    public function edit_form(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:100',
            'company_name' => 'required',
        ]);

        
        $edit = Item::find($request->id);
        $edit->company_name = $request->company_name;
        $edit->name = $request->name;
        $edit->image = $request->image;

        if (empty($request->image)) {
            $this->validate($request, [
                'image' => 'required',
            ]);

        }


            //画像を保存するディレクトリ名
        $dir = 'sample';

        //アップロードされたファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();

        //sampleディレクトリに画像を保存
        $request->file('image')->storeAs('public/' . $dir, $file_name);

        $edit->image = 'storage/' . $dir . '/' . $file_name;

        $edit->save();

        return redirect('/items');
    }

    public function delete(Request $request)
    {
        $delete = Item::where('id', $request->id)->first();
        return view('item.delete')->with(['delete' => $delete]);
    }

    public function destory(Request $request)
    {
        $stock_key = Stock::where('item_id', $request->id)->get();
        if (count($stock_key)  > 0) {
            $this->validate($request, [
                 'stock'=>'present',
            ]);

        }

        $delete = Item::where('id', $request->id)->first();

        $delete->delete();
        return redirect('/items');


    }


    public function display()
    {
        // 商品一覧取得
        $items = Item
            ::where('items.status', 'active')
            ->select()
            ->get();

        return view('/display/display', compact('items'));
    }

    public function search(Request $request){
        
        $items = Item::where('name', 'LIKE', "%{$request->search}%")->get();
        
        $search_result = $request->search.'の検索結果'.count($items).'件';

        return view('/item/index', ['items' => $items, 'search_result' => $search_result]);
        

    }

    public function display_search(Request $request){
        
        $items = Item::where('name', 'LIKE', "%{$request->search}%")->get();
        
        $search_result = $request->search.'の検索結果'.count($items).'件';

        return view('/display/display', ['items' => $items, 'search_result' => $search_result]);
        

    }

    public function message()
    {
        return 'この商品はまだ在庫が残っています。';
    }
}

