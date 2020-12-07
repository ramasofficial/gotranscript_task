<?php

namespace App\Services;

use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryService {
    /**
     * Next upload integer
     *
     * @var integer
     */
    protected $next_number;

    /**
     * GalleryService Class instance
     */
    public function __construct()
    {
        $this->next_number = Gallery::count() + 1;
    }

    /**
     * Upload file to laravel storage
     *
     * @param object $request
     * @return mixed $file - Uploaded file - file_path url or boolean false
     */
    public function upload_file($request)
    {
        $file = $request->file_path->storeAs('gallery', $this->next_number.'_'.strtotime(date('Y-m-d H:i:s')).'-'.$request->file_path->getClientOriginalName());

        if(!$file) {
            return false;
        }

        return $file;
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

        if(!in_array(strtolower($check_link), $allowed)) {
            return false;
        }

        $get_image = file_get_contents($request['url']);

        if(!$get_image) {
            return false;
        }

        $destination = 'gallery/'.$this->next_number.'_'.strtotime(date('Y-m-d H:i:s')).'-'.$check_name.'.'.$check_link;
        $file = Storage::put($destination, $get_image);

        if(!$file) {
            return false;
        }

        return $destination;
    }
}
