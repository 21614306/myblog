<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Cate;
use Illuminate\Http\Request;

class CateController extends BaseController
{
    public function getCateItems(){
       $cates = Cate::all();
       return response()->json($cates);
    }

    public function makeCateItem(Request $request){
        $catename = $request->input('catename');
        $to = $request->input('to');
        $url = $request->input('url');
        $cate = new Cate;
        $cate->catename = $catename;
        $to = $request->input('to');
        $url = $request->input('url');
        $cate->save();
        return response()->json([
            'result'=>'success'
        ]);
    }
}



