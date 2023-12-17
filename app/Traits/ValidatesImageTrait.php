<?php
namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;


trait ValidatesImageTrait
{
    protected function validateImage(UploadedFile $file , $folder){
        if($file === null || !$file->isValid()){
      return response()->json(['error'=>'No file was uploaded'], 409);
        }


        $validator = Validator::make(
            ['image' => $file],
            ['image' => 'required|image|max:2048'] // Adjust the validation rules as per your requirements
        );

        $validator->validate();
        $fileName = $file->getClientOriginalName(); // Get the original filename
        $destinationPath = public_path($folder);
        $imagePath = $file->move($destinationPath, $fileName); // Concatenate the path and filename

        return $imagePath;

    }
}
