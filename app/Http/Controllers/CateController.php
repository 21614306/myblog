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
        $file = $request->file('photo');
        $cate = new Cate;
        $cate->catename = $catename;
        $cate->to = $request->input('to');
        if($file){
            $cate->url = upload($file,'upload');
        }else{
            return response()->json([
                'result'=>'error',
                'mgs'=>''
            ]);
        }
        $cate->save();
        return response()->json([
            'result'=>'success'
        ]);
    }

    public function getMakeCateItem(Request $request)
    {
        return view('cate');
    }
}



