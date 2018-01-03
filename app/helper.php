<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/12/14
 * Time: 23:28
 */
//use Log;

function upload($file,$path){
    try{
        if($file->isValid() && $path){
            $clientName = $file->getClientOriginalName();

            $tmpName = $file->getFileName();
            //缓存路径
            $realPath = $file->getRealPath();
            //扩展名
            $entension = $file->getClientOriginalExtension();
            //文件类型
            $mimeType = $file->getMimeType();
//        $url = $file->move($path);
            $newName = md5(date("Y-m-d H:i:s").$clientName).".".$entension;
            $url =  $file -> move($path,$newName);
        }
    }catch (Exception $e){
//        Log::error(e);
    }


    return $url;
}