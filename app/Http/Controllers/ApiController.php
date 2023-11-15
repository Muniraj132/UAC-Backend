<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Slug;
use App\Models\Slide;
use App\Models\Article;
use App\Models\Newsletter;
use App\Models\Media;
use App\Models\Page;
use App\Models\Image;
use DB;

class ApiController extends Controller
{
    Private $status = 200;
  
    public function storecontact(Request $request)
    {
      $data = [
            'name' =>  $request['name'],
            'email' => $request['email'],
            'mobile' => $request['mobile'],
            'message' => $request['message'],
      ];
      Contact::create($data);
         $email = $request['email'];
         $bodyContent = [
             'toName' => $request['name'],
             'toemail'   => $request['email'],
             'tomobile'=> $request['mobile'],
             'tosubject'=> $request['message'],
             ];
         {  
             try {
               Mail::to('muni20002raj@gmail.com')->send(new ContactFormMail($bodyContent));
            //    Mail::to($email)->send(new ContactFormMail($bodyContent));
                }
                 catch (Exception $e) {
             }
         } 
      return response()->json('request sent sucessfully');
      
    }
    public function getpostdata($id){  
        $articles = Article::select(
            'articles.title',
            'articles.id',
            'articles.content',
            'articles.media_id',
            'articles.created_at',
            'categories.title as category_name',
             'categories.content as category_description'
        )
            ->leftJoin('categories', 'articles.category_id', '=', 'categories.id')
            ->where('articles.status', 1)
            ->where('categories.id', $id)
            ->get();
        
        $articles->each(function ($article) {
            $mediaUrl = null;
          $media = Media::find($article->media_id);
        
            if ($media) {
                $mediaUrl = $media->getUrl();
            }
            if($article->media_id != 1){
                $article->image = $mediaUrl;
            }
            
            $article->date = $article->created_at->format('d-m-Y');
        });
        return response()->json([
            'success' => true,
            'message' => 'Data retrieved successfully',
            'category_name'=> $articles[0]->category_name,
            'category_description'=> $articles[0]->category_description,
            'data' => $articles,
        ]);
        
    }
    public function getsliderimages(){
        $Slides =Slide::all();

        $SlidesData = [];
        
        foreach ($Slides as $key => $slides) {
            $data = [
                'id' => $slides->id,
                'title' => $slides->title,
                'content' => $slides->content,
                'image' => $slides->bg,
                'date' =>  $slides->created_at->format('d-m-Y'),
            ]; 
            $SlidesData[] = $data; 
        }
        if(count($SlidesData) > 0) {
            return response()->json(["status" => $this->status, "success" => true, 
                        "count" => count($SlidesData), "data" => $SlidesData]);
        }
        else {
            return response()->json(["status" => "failed",
            "success" => false, "message" => "Whoops! no record found"]);
        }
    }
    public function getnewsletter(){
        $newsletters = Newsletter::select(
            'newsletters.title',
            'newsletters.file_id',
            'newsletters.id',
            'newsletters.content',
            'newsletters.media_id',
            'newsletters.created_at',
            'categories.title as category_name'
        )
        ->leftJoin('categories', 'newsletters.category_id', '=', 'categories.id')
        ->where('newsletters.status', 1)
        ->get();
    
       $newsletters->each(function ($newsletter) {
        $mediaUrl = null;
        $newsletter->date = $newsletter->created_at->format('d-m-Y');
        $media = Media::find($newsletter->media_id);
    
        if ($media) {
            $mediaUrl = $media->getUrl();
        }
        $newsletter->file_url = asset('newletter/' . $newsletter->file_id);
        
        if($newsletter->media_id != 1){
            $newsletter->media_url = $mediaUrl;
        }
       
    });
    
    return response()->json([
        'success' => true,
        'message' => 'success',
        'data' => $newsletters,
    ]);
    
    }
    public function getpage(){
     
        $pages = Page::select(
            'pages.title',
            'pages.template',
            'pages.id',
            'pages.content',
            'pages.media_id',
            'pages.slug_id',
            'pages.created_at',
            'slugs.slug as slug_name'
        )
        ->leftJoin('slugs', 'pages.slug_id', '=', 'slugs.id')
        ->where('pages.status', 1)
        ->get();

        $pages->each(function ($page) {
            $mediaUrl = null;
        
            $media = Media::find($page->media_id);
        
            if ($media) {
                $mediaUrl = $media->getUrl();
            } 
            $page->media_url = $mediaUrl;
        });
        
        return response()->json([
            'success' => true,
            'message' => 'success',
            'data' => $pages,
        ]);
    }
    public function getslidebar(){

        $articles = Article::select(
            'articles.title',
            'articles.id',
            'articles.content',
            'articles.media_id',
            'articles.created_at',
            'categories.title as category_name'
        )
            ->leftJoin('categories', 'articles.category_id', '=', 'categories.id')
            ->where('articles.status', 1)
            ->where('articles.category_id', 8)
            ->get();
        
        $articles->each(function ($article) {
            $mediaUrl = null;
          $media = Media::find($article->media_id);
        
            if ($media) {
                $mediaUrl = $media->getUrl('thumb');
            }
            if($article->media_id != 1){
                $article->image = $mediaUrl;
            }
            
            $article->date = $article->created_at->format('d-m-Y');
        });
       
        return response()->json([
            'success' => true,
            'message' => 'Data retrieved successfully',
            'data' => $articles,
        ]);
    }

    public function getGalleryimages(){

        $Image =Image::orderBy('id','desc')->get();

        $imagesData = [];
        
        foreach ($Image as $key => $image) {
            $data = [
                'id' => $image->id,
                'title' => $image->title,
                'alt_tag' => $image->alt,
                'image' => asset($image->path),
                'date' =>  $image->created_at->format('d-m-Y'),
            ]; 
            $imagesData[] = $data; 
        }
        if(count($Image) > 0) {
            return response()->json(["status" => $this->status, "success" => true, 
                        "count" => count($imagesData), "data" => $imagesData]);
        }
        else {
            return response()->json(["status" => "failed",
            "success" => false, "message" => "Whoops! no record found"]);
        }
    }

    public function getteam($id){

        
    }

}
