<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class GalleryService {
    /**
     * Upload file to laravel storage
     *
     * @param object $request
     * @return mixed $file - Uploaded file - file_path url or boolean false
     */
    public function upload_file($request)
    {
        $file = $request->file_path->storeAs('gallery', strtotime(date('Y-m-d H:i:s')).'-'.$request->file_path->getClientOriginalName());
        if($file) {
            return $file;
        } else {
            return false;
        }
    }

    /**
     * Get file from external link
     *
     * @param  object $request
     * @return mixed $destination - Uploaded file - file_path url or boolean false
     */
    public function get_file_from_link($request)
    {
        $check_link = pathinfo($request['url'], PATHINFO_EXTENSION);
        $check_name = pathinfo($request['url'], PATHINFO_FILENAME);
        $allowed = ['jpeg', 'jpg', 'png', 'gif'];

        if(in_array($check_link, $allowed)) {
            $get_image = file_get_contents($request['url']);

            if($get_image) {
                $destination = 'gallery/'.strtotime(date('Y-m-d H:i:s')).'-'.$check_name.'.'.$check_link;
                $file = Storage::put($destination, $get_image);

                if($file) {
                    return $destination;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
