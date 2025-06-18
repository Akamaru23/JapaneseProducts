<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Products;
use  App\Models\Comments;
use App\Models\Ranking;

use App\Http\Requests\SearchRequest;
use App\Http\Requests\EditRequest;
use App\Http\Requests\CommentsRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use LDAP\Result;
use Psy\Readline\Hoa\Console;
use Throwable;

class ProductsController extends Controller
{
    public function showWeb(){
        $filePath = 'text/saved_ids.txt';
        
        if(Storage::exists($filePath)){
            $ids = explode("\n", trim(Storage::get($filePath)));

            if (empty($ids)) {
                return response()->json(['message' => 'IDが見つかりません'], 404);
            }

            $data = Products::whereIn('id', $ids)
            ->orderByRaw("FIELD(id, " . implode(',', $ids) . ")")
            ->get();
            
            return view('websites.menu', ['data' => $data]);
        }

        return response()->json(['message' => '沒有檔案'], 404);
    }

    public function exeComments(CommentsRequest $request){
        $input = $request->all();

        Comments::create([
            'title' => $input['title'],
            'Comment' => $input['Comment']
        ]);


        return redirect(route('menu'));
    }

    public function showPrefecture(SearchRequest $request){

        $query = Ranking::query();

        $Alldata = Products::query();

        if ($request->filled('SearchPrefecture')) {
            $query->where('Prefecture', 'like', '%' . $request->input('SearchPrefecture') . '%');
            $Alldata->where('Prefecture', 'like', '%' . $request->input('SearchPrefecture') . '%');

        }


        $jpProducts = $query->get();
        $data = $Alldata->get();

        return view('websites.Search', ['jpProducts' => $jpProducts], ['data' => $data]);
    }

    public function showProducts(SearchRequest $request){

        $Alldata = Products::query();

        if ($request->filled('SearchProducts_names')) {
            $Alldata->where('products_names', 'like', '%' . $request->input('SearchProducts_names') . '%');
        }

        $data = $Alldata->get();

        return view('websites.SearchName', ['data' => $data]);   
    }

    public function ProductsInfo($id){
        $data = Products::find($id);

        if(is_null($data)){
            Session::flash('err_msg', 'データがありません');
            return back();
        }

        return view('websites.ProductsInfo', ['data'=>$data]);
    }




    public function showPass(Request $request)
    {
        $username = 'admin';
        $pass = '0106';
        $error = '';

        if ($request->isMethod('post')) {
            $input_user = $request->input('username');
            $input_pass = $request->input('password');

            if ($input_user === $username && $input_pass === $pass) {
                session(['is_admin' => true]);
                return redirect('/2bVtbHzQ/admin/database');
            } else {
                $error = '輸入錯誤, 請重新輸入';
            }
        }

        return view('adminPass', compact('error'));
    }


    public function showUploadImg(){
        return view('selectAdmin.showCreateData');
    }

    public function uploadImg(EditRequest $request){


        $input = $request->all();

        if ($request->input('image_or_url') === 'image') {
            $uploadedFile = $request->file('ProductImg');
            $filename = $uploadedFile->getClientOriginalName();
            $uploadedFile->storeAs('uploads', $filename, 'public');
            $input['ProductImg'] = $filename;
        } elseif ($request->input('image_or_url') === 'url') {
            $input['ProductImg'] = $request->input('ProductImgUrl');
        } else {
            return back()->withErrors(['image_or_url' => '画像またはURLを選択してください']);
        }

        DB::beginTransaction();
        try{
            Products::create([
                'products_names'=>$input['ProductName'],
                'products_img'=>$input['ProductImg'],
                'description'=>$input['description'],
                'Prefecture'=>$input['Prefecture'],
                'url'=>$input['url']
            ]);
            DB::commit();
        }catch(Throwable $e){
            DB::rollback();
            abort(500);
        }

        return back();
    }

    public function showComments(){
        $comments = Comments::all();

        return view('selectAdmin.comments', ['comments' => $comments]);
    }

    public function exeDeleteComments($id){
        if(empty($id)){
            return redirect()->route('showComments');
        }

        try{
            Comments::destroy($id);
        }catch(Throwable $e){
            abort(500);
        }

        return redirect()->route('showComments');
    }

    public function showTop3Rank(){
        $filePath = 'text/saved_ids.txt';

        if(Storage::exists($filePath)){
            $ids = explode("\n", trim(Storage::get($filePath)));

            if (empty($ids)) {
                return response()->json(['message' => 'IDが見つかりません'], 404);
            }

            $data = Products::whereIn('id', $ids)
            ->orderByRaw("FIELD(id, " . implode(',', $ids) . ")")
            ->get();
            
            return view('selectAdmin.top3rank', ['data'=>$data]);
        }

        return response()->json(['message' => '沒有檔案'], 404);
    }

    public function showChangeTop3(Request $request){

        $id = $request->input('id');
        $no = $request->input('no');
        $no_data = Products::find($id);

        if(empty($id)){
            return back();
        }elseif(is_null($no_data)){
            Session::flash('err_msg', 'データがありません');
            return back();
        }else{
            $data = Products::query();

            $data->where('products_names', 'like', '%' . $no_data->products_names . '%')->where('id', '!=', $no_data->id);
            $data = $data->get();

            return view('selectAdmin.changeTop3', ['data' => $data, 'no_data' => $no_data, 'no' => $no]);
        }
    }

    public function exeUpdateTop3(Request $request, $rank){
        $filePath = 'text/saved_ids.txt';

        $newId = $request->input('products_id');

        if(!Storage::exists($filePath)){
            return response()->json(['message' => '沒有資料夾']);
        }

        $ids = explode("\n", trim(Storage::get($filePath)));

        if(isset($ids[$rank - 1])){
            for($i=0;$i<count($ids);$i+=1){
                if($rank-1!=$i && $newId==$ids[$i]){
                    $num = $ids[$i];
                    $ids[$i] = $ids[$rank - 1];
                    $ids[$rank - 1] = $num;
                }
            }
            $ids[$rank - 1] = $newId;
        }else{
            return response()->json(['message' => '不可這個派次']);
        }

        Storage::put($filePath, implode("\n", $ids));

        return redirect()->route('top3rank');

    }

    public function showSearchTop3(SearchRequest $Srequest, $no, $id){
        $data = Products::query();
        $no_data = Products::find($id);
        

        if ($Srequest->filled('SearchProducts_names')) {
            $data->where('products_names', 'like', '%' . $Srequest->input('SearchProducts_names') . '%');
        }

        $data = $data->get();

        return view('selectAdmin.changeTop3', ['data' => $data, 'no_data' => $no_data, 'no' => $no] );
    }
    

    public function showRank(){
        return view('selectAdmin.rank');
    }
    
    public function showSearchRank(SearchRequest $request){
        $data = Ranking::query();

        if($request->filled('SearchPrefecture')){
            $data->where('Prefecture', 'like', '%' . $request->input('SearchPrefecture') . '%');
        }

        $data = $data->get();

        return view('selectAdmin.SearchRank', ['data' => $data]);
    }

    public function showchangeRank($id){

        $no_data = Ranking::find($id);

        if(empty($id)){
            return back();
        }elseif(is_null($no_data)){
            Session::flash('err_msg', 'データがありません');
            return back();
        }else{
            $data = Products::query();

            $data->where('Prefecture', $no_data->Prefecture);
            $data = $data->get();

            return view('selectAdmin.changeRank', ['data' => $data], ['no_data' => $no_data]);
        }
    }

    public function showSearchProducts(SearchRequest $request, $id){
        $data = Products::query();
        $no_data = Ranking::find($id);

        if ($request->filled('SearchProducts_names')) {
            $data->where('products_names', 'like', '%' . $request->input('SearchProducts_names') . '%');
        }

        $data = $data->get();

        return view('selectAdmin.changeRank', ['data' => $data], ['no_data' => $no_data] );
    }

    public function exeUpdateRank($id, $no_id){
        $products_data = Products::find($id);
        $rank_data = Ranking::find($no_id);

        if(is_null($products_data) || is_null($rank_data)){
            Session::flash('err_msg', '沒有任何資料');
            return back();
        }

        DB::beginTransaction();
        try{
            $rank_data->update([
                'products_name' => $products_data->products_names,
                'Prefecture' => $products_data->Prefecture,
                'products_img' => $products_data->products_img,
                'description' => $products_data->description,
                'url' => $products_data->url,
                
            ]);
            DB::commit();
            Session::flash('err_msg', '已更新資料');
        }catch(Throwable $e){
            DB::rollback();
            Session::flash('err.msg', '失敗更新資料');
            throw $e;
        }

        return view('selectAdmin.rank');

    }




    public function showAdminDatabase(){
        $data=Products::all();
        return view('selectAdmin.changeDatabese', ['data' => $data]);
    }

    public function exeSearch(SearchRequest $request){

        $query = Products::query();


        if ($request->filled('SearchPrefecture')) {
            $query->where('Prefecture', 'like', '%' . $request->input('SearchPrefecture') . '%');
        }

    
        if ($request->filled('SearchProducts_names')) {
            $query->where('products_names', 'like', '%' . $request->input('SearchProducts_names') . '%');
        }


        $jpProducts = $query->get();

        return view('selectAdmin.changeDatabese', ['jpProducts' => $jpProducts]);
    }


    public function showDetail($id){
        $products = Products::find($id);

        if(is_null($products)){
            return redirect()->route('selectAdmin.changeDatabese');
        }
        return view('selectAdmin.DetailDatabese', ['products'=> $products]);
    }

    public function exeEdit(EditRequest $request){
        $input = $request->all();

        DB::beginTransaction();
        try{
            $content = Products::find($input['id']);
            $content->fill([
                'products_names' => $input['ProductName'],
                'products_img' => $input['ProductImg'],
                'Prefecture' => $input['Prefecture'],
                'description' => $input['description'],
                'url' => $input['url']
            ]);
            $content->save();
            DB::commit();
        }catch(Throwable $e){
            DB::rollback();
            throw $e;
        }

        return redirect(route('search'));
    }

    public function exeDelete($id){
        if (empty($id)) {
            return redirect()->route('search');
        }

        try{
            Products::destroy($id);
        }catch(Throwable $e){
            abort(500);
        }

        return redirect(route('search'));
    }
}
