<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Services\GalleryService;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreGalleryPost;

class GalleryController extends Controller
{
    /**
     * Display a listing of the gallery.
     *
     * @return mixed
     */
    public function index()
    {
        $today = date('Y-m-d');
        $this->data['photos'] = DB::table('gallery')->where('show_from', '<=', $today)->where('show_until', '>', $today)->get();
        return view('gallery.index', $this->data);
    }

    /**
     * Show the form for creating a new gallery image.
     *
     * @return mixed
     */
    public function create()
    {
        $this->data['today'] = date('Y-m-d');
        return view('gallery.create', $this->data);
    }

    /**
     * Store gallery data to database
     *
     * @param  object $request
     * @param  GalleryService $gallery - instance from GalleryService class
     * @return mixed
     */
    public function store(StoreGalleryPost $request, GalleryService $gallery)
    {
        $validated = $request->validated();
        if(!$validated['url']) {
            $uploaded_link = $gallery->upload_file($request);
        } else {
            $uploaded_link = $gallery->get_file_from_link($validated);
        }

        if($uploaded_link) {
            $validated['file_path'] = $uploaded_link;

            Gallery::create($validated);

            return redirect()->route('gallery.index');
        } else {
            return redirect()->route('gallery.create');
        }
    }
}
