<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\CatuDaya;
use App\Models\CatuDayaEng;
use App\Models\Page;
use App\Models\PageEng;
use App\Models\Project;
use App\Models\ProjectEng;

class CatudayaController extends Controller
{
    public function index()
    {
        $catudaya=CatuDaya::first();
        $catudayaeng=CatuDayaEng::first();
        $project=Project::get();
        $pages=Page::where('id','d8a487db-30a9-4895-80d8-fda47256f820')->first();
        return view('pages.admin.catudaya.index',[
            'item'=>$catudaya,
            'item_eng'=>$catudayaeng,
            'page'=>$pages,
            'project'=>$project,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
          "title"=> "required",
          "header_tagline"=> "required",
          "section_2_description"=> "required",
          "section_2_sub_1_description"=> "required",
          "section_2_sub_2_alt_image"=> "required",
          "section_2_sub_2_description"=> "required",
          "section_2_sub_3_alt_image"=> "required",
          "section_2_sub_3_description"=> "required",
          "section_3_title"=> "required",

          "title_eng"=> "required",
          "header_tagline_eng"=> "required",
          "section_2_description_eng"=> "required",

          "section_2_sub_1_alt_image"=> "required",
          "section_2_sub_1_description_eng"=> "required",

          "section_2_sub_2_alt_image"=> "required",
          "section_2_sub_2_description_eng"=> "required",

          "section_2_sub_3_alt_image"=> "required",
          "section_2_sub_3_description_eng"=> "required",

          "section_3_title_eng"=> "required"
      ]);
        $data=[
            "title"=> $request->title,
            "header_tagline"=> $request->header_tagline,
            "section_2_description"=> $request->section_2_description,
            "section_2_sub_1_alt_image"=> $request->section_2_sub_1_alt_image,
            "section_2_sub_1_description"=> $request->section_2_sub_1_description,
            "section_2_sub_2_alt_image"=> $request->section_2_sub_2_alt_image,
            "section_2_sub_2_description"=> $request->section_2_sub_2_description,
            "section_2_sub_3_alt_image"=> $request->section_2_sub_3_alt_image,
            "section_2_sub_3_description"=> $request->section_2_sub_3_description,
            "section_3_title"=> $request->section_3_title
        ];

        $dataEng=[
            "title"=> $request->title_eng,
            "header_tagline"=> $request->header_tagline_eng,
            "section_2_description"=> $request->section_2_description_eng,
            "section_2_sub_1_alt_image"=> $request->section_2_sub_1_alt_image,
            "section_2_sub_1_description"=> $request->section_2_sub_1_description_eng,
            "section_2_sub_2_alt_image"=> $request->section_2_sub_2_alt_image,
            "section_2_sub_2_description"=> $request->section_2_sub_2_description_eng,
            "section_2_sub_3_alt_image"=> $request->section_2_sub_3_alt_image,
            "section_2_sub_3_description"=> $request->section_2_sub_3_description_eng,
            "section_3_title"=> $request->section_3_title_eng
        ];



        if($request->file('header_image')){
            $data['header_image']=str_replace("public/", "storage/", $request->file('header_image')->store('public/assets/foto'));
            $dataEng['header_image']=$data['header_image'];
        }

        if($request->file('section_2_sub_1_image')){
            $data['section_2_sub_1_image']=str_replace("public/", "storage/", $request->file('section_2_sub_1_image')->store('public/assets/foto'));
            $dataEng['section_2_sub_1_image']=$data['section_2_sub_1_image'];
        }

        if($request->file('section_2_sub_2_image')){
            $data['section_2_sub_2_image']=str_replace("public/", "storage/", $request->file('section_2_sub_2_image')->store('public/assets/foto'));
            $dataEng['section_2_sub_2_image']=$data['section_2_sub_2_image'];
        }

        if($request->file('section_2_sub_3_image')){
            $data['section_2_sub_3_image']=str_replace("public/", "storage/", $request->file('section_2_sub_3_image')->store('public/assets/foto'));
            $dataEng['section_2_sub_3_image']=$data['section_2_sub_3_image'];
        }


        CatuDaya::first()->update($data);
        CatuDayaEng::first()->update($dataEng);

        Page::where('id','d8a487db-30a9-4895-80d8-fda47256f820')->update([
            'name'=>$request->title,
            'title'=>$request->title,
            'slug'=>Str::slug($request->title)
        ]);

        PageEng::where('page_id','d8a487db-30a9-4895-80d8-fda47256f820')->update([
            'name'=>$request->title_eng,
            'title'=>$request->title_eng,
            'slug'=>Str::slug($request->title_eng)
        ]);

        return back()->with('success','Sukses! Data Berhasil Diajukan');
    }

    public function store_project(Request $request)
    {
        $validation=$request->validate([
            'title'=>'required',
            'image'=>"required|mimes:jpg,png,jpeg|file",
            'description'=>'required',
            'description_eng'=>'required',
        ]);

        $data=[
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>str_replace("public/", "storage/", $request->file('image')->store('public/assets/foto'))
        ];

        $dataEng=[
            'title'=>$request->title,
            'description'=>$request->description_eng,
            'image'=>$data['image']
        ];

        $project=Project::create($data);

        $dataEng["project_id"]=$project->id;

        ProjectEng::create($dataEng);

        return back()->with('success','Sukses! Data Berhasil Di Tambah');
    }

    public function update_project(Request $request,$id)
    {
        $validation=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'description_eng'=>'required',
        ]);

        $data=[
            'title'=>$request->title,
            'description'=>$request->description,
        ];

        $dataEng=[
            'title'=>$request->title,
            'description'=>$request->description_eng,
        ];
        if($request->file('image')){
            $data['image']=str_replace("public/", "storage/", $request->file('image')->store('public/assets/foto'));
            $dataEng['image']=$data['image'];
        }

        $project=Project::where('id',$id)->update($data);

        ProjectEng::where('project_id',$id)->update($dataEng);

        return back()->with('success','Sukses! Data Berhasil Di Ubah');
    }
}
