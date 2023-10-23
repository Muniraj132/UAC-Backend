<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Throwable;

class GalleryController extends Controller
{
    public function index()
    {
        try {
            $medias = Image::orderBy('images.created_at', 'desc')
        ->get();
        return view("admin.gallery.index",compact('medias'));
        } catch (Throwable $th) {
            Log::create([
                'model' => 'file',
                'message' => 'Medias page could not be loaded.',
                'th_message' => $th->getMessage(),
                'th_file' => $th->getFile(),
                'th_line' => $th->getLine(),
            ]);
            return redirect()->back()->with(['type' => 'error', 'message' =>'Medias page could not be loaded.']);
        }
    }

    public function create()
    {
        try {
            return view("admin.gallery.create");
        } catch (Throwable $th) {
            Log::create([
                'model' => 'file',
                'message' => 'The gallery edit page could not be loaded.',
                'th_message' => $th->getMessage(),
                'th_file' => $th->getFile(),
                'th_line' => $th->getLine(),
            ]);
            return redirect()->back()->with(['type' => 'error', 'message' =>'The gallery edit page could not be loaded.']);
        }
    }

    public function store(Request $request)
    {
        
        try {
            if($request->document){
                foreach ($request->input('document', []) as $image) {
               
                    $newImage = new Image;
                    $newImage->name = $image;
                    $newImage->path = 'uploads/'.$image;
                    // $newImage->item_id = $request->item_id; 
                    $newImage->save();
                }
                return redirect()->route('admin.gallery.index')->with(['type' => 'success', 'message' =>'Medias saved.']);
            }else{
                return redirect()->back()->with(['type' => 'error', 'message' =>'The gallery is required']);
            }
            
        } catch (Throwable $th) {
            Log::create([
                'model' => 'file',
                'message' => 'The gallery could not be saved.',
                'th_message' => $th->getMessage(),
                'th_file' => $th->getFile(),
                'th_line' => $th->getLine(),
            ]);
            return redirect()->back()->with(['type' => 'error', 'message' =>'The gallery could not be saved.']);
        }
    }

    public function show($id)
    {
        try {
            $media = Image::find($id);
            return view('admin.gallery.show',compact('media'));
        } catch (Throwable $th) {
            Log::create([
                'model' => 'file',
                'message' => 'The gallery show page could not be loaded.',
                'th_message' => $th->getMessage(),
                'th_file' => $th->getFile(),
                'th_line' => $th->getLine(),
            ]);
            return redirect()->back()->with(['type' => 'error', 'message' =>'The gallery show page could not be loaded.']);
        }
    }

    public function edit($id)
    {
        try {
            // dd('fg');    
            $media = Image::find($id);
            return view('admin.gallery.edit',compact('media'));
        } catch (Throwable $th) {
            Log::create([
                'model' => 'file',
                'message' => 'The gallery edit page could not be loaded.',
                'th_message' => $th->getMessage(),
                'th_file' => $th->getFile(),
                'th_line' => $th->getLine(),
            ]);
            return redirect()->back()->with(['type' => 'error', 'message' =>'The gallery edit page could not be loaded.']);
        }
    }

    public function update(Request $request, $id)
    {

        try {
            $media = Image::find($id);
            $media->title = $request->title;
            $media->alt = $request->alt;
            $media->save();
            return redirect()->route('admin.gallery.index')->with(['type' => 'success', 'message' =>'Media is updated.']);
        } catch (Throwable $th) {
            Log::create([
                'model' => 'file',
                'message' => 'Media could not be updated.',
                'th_message' => $th->getMessage(),
                'th_file' => $th->getFile(),
                'th_line' => $th->getLine(),
            ]);
            return redirect()->back()->with(['type' => 'error', 'message' =>'Media could not be updated.']);
        }
    }

    public function destroy($id)
    {
        try {
            $gallery = Image::find($id);
            if($gallery){
                $filepath = 'uploads/'.$gallery->name;
                unlink($filepath);
            }
            $gallery->delete();
            
            return redirect()->route('admin.gallery.index')->with(['type' => 'success', 'message' =>'Media moved to recycle bin.']);
        } catch (Throwable $th) {
            Log::create([
                'model' => 'file',
                'message' => "Media couldn't be moved to recycle bin.",
                'th_message' => $th->getMessage(),
                'th_file' => $th->getFile(),
                'th_line' => $th->getLine(),
            ]);
            return redirect()->back()->with(['type' => 'error', 'message' =>"Media couldn't be moved to recycle bin."]);
        }
    }

    public function storeMedia(Request $request)
    {
        try {
           
            $file = $request->file('file');
            $imageName = time() . '.' . $file->extension();
            $path = 'uploads/';
            $name = uniqid() . '_' . trim($file->getClientOriginalName());
            $file->move($path, $name);

            return response()->json([
                'name'          => $name,
                'original_name' => $file->getClientOriginalName(),
            ]);
        } catch (Throwable $th) {
            Log::create([
                'model' => 'file',
                'message' => "Media couldn't be moved to temp directory.",
                'th_message' => $th->getMessage(),
                'th_file' => $th->getFile(),
                'th_line' => $th->getLine(),
            ]);
            return redirect()->back()->with(['type' => 'error', 'message' =>"Media couldn't be moved to temp directory."]);
        }
    }
}
