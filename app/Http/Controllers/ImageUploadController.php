<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

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

        return view('imageUpload',compact('heroe'));
    }
    
    public function getImage($id){
    	$heroe = heroe::find($id);
  		if (empty($heroe)){
  			return Redirect::back()->with('error','No hemos encontrado al heroe que buscas');	
  		}
    	
		$image   = 'image/'.$heroe->image_name;
		 
		print_r($ficheros1);

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
  		if(isset($heroe->image_name )){
  			return Redirect::back()->with('error','Ya existe una imagen de este héroe');		
  		}

		//la guardamos en la carpeta public
        $request->image->move(public_path('images'), $imageName);

  		//guardamos el mnombre en la base de datos
  		$heroe->image_name = $imageName;
  		$heroe->save();
    
        return back()
            ->with('success','Imagen subida correctamente')
            ->with('image',$imageName); 
    }
}
