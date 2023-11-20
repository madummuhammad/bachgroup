<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Page;
use App\Models\ContactEng;
use App\Models\PageEng;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function index()
    {
        $catudaya=Contact::first();
        $catudayaeng=ContactEng::first();
        $pages=Page::where('id','51de527c-a7c2-4b3b-b4b4-8614b24c4474')->first();
        return view('pages.admin.contact.index',[
            'item'=>$catudaya,
            'item_eng'=>$catudayaeng,
            'page'=>$pages,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "title"=> "required",
            "title_eng"=> "required",
            "header_tagline"=> "required",
            "header_tagline_eng"=> "required",
            "alt_image"=> "required",
            "description"=> "required",
            "description_eng"=> "required"
        ]);

        $data=[
            "title"=>$request->title,
            "title_slug"=>Str::slug($request->title),
            "header_tagline"=>$request->header_tagline,
            "alt_image"=>$request->alt_image,
            "description"=>$request->description
        ];

        $dataEng=[
            "title"=>$request->title_eng,
            "title_slug"=>Str::slug($request->title_eng),
            "header_tagline"=>$request->header_tagline_eng,
            "alt_image"=>$request->alt_image,
            "description"=>$request->description_eng
        ];

        if($request->file('image')){
            $data['image']=str_replace("public/", "storage/", $request->file('image')->store('public/assets/foto'));
            $dataEng['image']=$data['image'];
        }

        Contact::first()->update($data);
        ContactEng::first()->update($dataEng);


        Page::where('id','51de527c-a7c2-4b3b-b4b4-8614b24c4474')->update([
            'name'=>$request->title,
            'title'=>$request->title,
            'slug'=>Str::slug($request->title)
        ]);

        PageEng::where('page_id','51de527c-a7c2-4b3b-b4b4-8614b24c4474')->update([
            'name'=>$request->title_eng,
            'title'=>$request->title_eng,
            'slug'=>Str::slug($request->title_eng)
        ]);
        return back()->with('success','Sukses! Data Berhasil Ditambah');
    }
}
