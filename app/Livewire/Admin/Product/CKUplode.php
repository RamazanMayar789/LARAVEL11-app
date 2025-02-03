<?php

namespace App\Livewire\Admin\Product;


use App\Traits\UplodeFile;
use Livewire\Component;
use Illuminate\Http\Request;

class CKUplode extends Component
{
    use UplodeFile;
   public function uplode($productId,Request $request){



    if($request->hasFile('upload')){


       $files=$request->file('upload');


        $this->UplodeImageInFileWebpFormat($files,null,null,'content',$productId);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('products/' . $productId . '/content/' . pathinfo($files->hashName(), PATHINFO_FILENAME) . '.webp');

            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;


    }



   }
}
