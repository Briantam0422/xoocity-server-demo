<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UploadFilesService{
    public function handleUploadPublicFile($path, $file): string{
        if (!is_null($path) && !is_null($file)){
            $file_name = Carbon::now()->timestamp . '_' . $file->getClientOriginalName();
            return $file->storePubliclyAs('public/'.$path, $file_name);
        }
        return '';
    }

    public function handleEditPublicFile($o_path, $n_path, $file): string{
        if (!is_null($o_path) && !is_null($n_path) && !is_null($file)){
            // delete original file first
            $isDeleted = $this->handleDeletePublicFile($o_path);
            if (!$isDeleted){
                return '';
            }
            // upload new file
            return $this->handleUploadPublicFile( $n_path, $file );
        } elseif ( !is_null($n_path) && !is_null( $file ) ) {
            return $this->handleUploadPublicFile( $n_path, $file );
        }
        return '';
    }

    public function handleDeletePublicFile($path):bool{
        if(!is_null($path) && Storage::exists($path)){
          Storage::delete($path);
          return true;
        }
        return false;
    }

    public function getFileName($path):string{
        $name_str = explode('/', $path);
        return $name_str[count($name_str) - 1] ?? '';
    }
}
