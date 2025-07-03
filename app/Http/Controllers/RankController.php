<?php

namespace App\Http\Controllers;
use  App\Models\Products;
use App\Models\Ranking;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SearchRequest;
use Throwable;

class RankController extends Controller
{
    public function showSearchRank(SearchRequest $request){

        Session::put('Prefecture', $request->input('SearchPrefecture'));

        $data = Ranking::query();

        if($request->filled('SearchPrefecture')){
            $data->where('Prefecture', 'like', '%' . $request->input('SearchPrefecture') . '%');
        }

        $data = $data->get();

        return view('selectAdmin.SearchRank', ['data' => $data], ['Prefecture' => Session::get('Prefecture')]);

    }

    
    public function showChangeRank($id){
        //紀錄現在控制的Rank是第幾位
        if((int)$id>0)
            Session::put('id', (int)$id);


        $no_data = Ranking::query();
        $no_data->where('Prefecture', Session::get('Prefecture'))->where('rank', Session::get('id'));
        $Rank_data = $no_data->first();

        if($no_data->exists()){
            return view('selectAdmin.changeRank', [
                'Rank_data' => $Rank_data,
                'Rank' => Session::get('id')
            ]);
        }else{
            return view('selectAdmin.changeRank', [
                'Rank_data' => null,
                'Rank' => Session::get('id')
            ]);
        }
    }

    public function showSearchProducts(SearchRequest $request){

        $product_name = $request->input('SearchProducts_names');

        if(is_null($request->input('Search_id'))){
            $data = Products::query();
            $data -> where('Prefecture', Session::get('Prefecture'))->where('products_names', 'like', '%' . $product_name . '%');
            $data = $data -> get();

            return view('selectAdmin.changeRank', [
                'data' => $data,
                'Rank_data' => null,
                'Rank' => Session::get('id')
            ]);
        }else{
            $id = $request->input('Search_id');
            $data = Products::query();
            $data -> where('Prefecture', Session::get('Prefecture'))->where('products_names', 'like', '%' . $product_name . '%');
            $data = $data -> get();

            $Rank_data = Ranking::find($id);

            return view('selectAdmin.changeRank', [
                'data' => $data,
                'Rank_data' => $Rank_data,
                'Rank' => Session::get('id')
            ]);
        }
    }

    public function exeUpdateRank($id){

        $prod = Products::find($id);
        $rank = Ranking::query();
        $rank->where('Prefecture', Session::get('Prefecture'))->where('rank', Session::get('id'));

        if($rank->exists()){
            DB::beginTransaction();
            try{
                $rank->update([
                    'products_names' => $prod->products_names,
                    'products_img' => $prod->products_img,
                    'Prefecture' => $prod->Prefecture,
                    'description' => $prod->description,
                    'url' => $prod->url,
                ]);
                $rank->save();
                DB::commit();
            }catch(Throwable $e){
                dump("exeUpdateRank test2 error");
                DB::rollback();
                throw $e;
            }
        }else{
            DB::beginTransaction();
            try{
                Ranking::create([
                    'products_name' => $prod->products_names,
                    'Prefecture' => $prod->Prefecture,
                    'products_img' => $prod->products_img,
                    'description' => $prod->description,
                    'url' => $prod->url,
                    'rank' => Session::get('id')
                ]);
                DB::commit();
            }catch(Throwable $e){
                dump("exeUpdateRank test3 error");
                DB::rollback();
                throw $e;
            }
        }

        return view('selectAdmin.rank');

    }
}