<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use App\Models\Heroe;

class ImageUploadController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUpload($id)
    {	$heroe = heroe::find($id);
    	//$image = $this-> getImage($id);

        return view('heroe.imageUpload',compact('heroe'));
    }
    
    public function deleteImage(Request $request){

      $heroe = heroe::find($request->heroe_id);
      this.deleteImageNoRequest($heroe,$request->imageName);
   /*   if (empty($heroe)){
        return Redirect::back()->with('error','No hemos encontrado al heroe que buscas'); 
      }

      if(File::exists(public_path('images/'.$request->imageName))){
        File::delete(public_path('images/'.$request->imageName));
        //eliminamos el nombre en la base de datos
        $heroe->image_name = "";
        $heroe->save();
        return back()->with('success','Imagen eliminada');
      }else{
        return Redirect::back()->with('error','No hemos encontrado al heroe que buscas');
      }*/

    }

    public function deleteImageNoRequest($heroe,$imageName){

        if (empty($heroe)){
        return Redirect::back()->with('error','No hemos encontrado al heroe que buscas'); 
      }

      if(File::exists(public_path('images/'.$imageName))){
        File::delete(public_path('images/'.$imageName));
        //eliminamos el nombre en la base de datos
        $heroe->image_name = "";
        $heroe->save();
        return back()->with('success','Imagen eliminada');
      }else{
        return Redirect::back()->with('error','No hemos encontrado al heroe que buscas');
      }


    }

    public function getImage($id){
    	$heroe = heroe::find($id);
  		if (empty($heroe)){
  			return Redirect::back()->with('error','No hemos encontrado al heroe que buscas');	
  		}
    	
	     	$image   = 'image/'.$heroe->image_name;
		 
	    	return $image;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = $request->heroe_id.'.'.$request->image->extension(); 
    	
  		$heroe = heroe::find($request->heroe_id);
  		if (empty($heroe)){
  			return Redirect::back()->with('error','No hemos encontrado al heroe que buscas');	
  		}
  		/*if(isset($heroe->image_name )){
  			return Redirect::back()->with('error','Ya existe una imagen de este h??roe');		
  		}*/

	    	//la guardamos en la carpeta public
        $request->image->move(public_path('images'), $imageName);

  	   	//guardamos el nombre en la base de datos
  	   	$heroe->image_name = $imageName;
  		  $heroe->save();
    
        return back()
            ->with('success','Imagen subida correctamente')
            ->with('image',$imageName); 
    }
}
