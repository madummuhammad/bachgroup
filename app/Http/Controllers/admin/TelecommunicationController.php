<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TelecommunicationContractor;
use App\Models\TelecommunicationContractorEng;
use App\Models\ContractorImage;
use App\Models\Page;
use App\Models\PageEng;
use Illuminate\Support\Str;

class TelecommunicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $telecommunication=TelecommunicationContractor::first();
        $telecommunicationeng=TelecommunicationContractorEng::first();
        $image=ContractorImage::orderBy('created_at','ASC')->get();
        $pages=Page::where('id','36435435-96de-4c4a-8aadd-ffcf607d196d')->first();

        return view('pages.admin.telecommunication.index',[
            'item'=>$telecommunication,
            'item_eng'=>$telecommunicationeng,
            'page'=>$pages,
            'image'=>$image,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
     $validation=$request->validate([
        "title"=>"required",
        "title_eng"=>"required",
        "header_tagline"=>"required",
        "header_tagline_eng"=>"required",
        "section_2_description"=>"required",
        "section_2_description_eng"=>"required",
        "section_2_sub_1_title"=>"required",
        "section_2_sub_1_title_eng"=>"required",
        "section_2_sub_1_description"=>"required",
        "section_2_sub_1_description_eng"=>"required",
        "section_2_sub_2_title"=>"required",
        "section_2_sub_2_title_eng"=>"required",
        "section_2_sub_2_description"=>"required",
        "section_2_sub_2_description_eng"=>"required",
        "section_3_title"=>"required",
        "section_3_title_eng"=>"required",
        "section_3_description"=>"required",
        "section_3_description_eng"=>"required"
    ]);

     $data=[
       "title"=>$request->title,
       "header_tagline"=>$request->header_tagline,
       "section_2_description"=>$request->section_2_description,
       "section_2_sub_1_title"=>$request->section_2_sub_1_title,
       "section_2_sub_1_description"=>$request->section_2_sub_1_description,
       "section_2_sub_2_title"=>$request->section_2_sub_2_title,
       "section_2_sub_2_description"=>$request->section_2_sub_2_description,
       "section_3_title"=>$request->section_3_title,
       "section_3_description"=>$request->section_3_description
   ];


   $dataEng=[
    "title"=> $request->title_eng,
    "header_tagline"=> $request->header_tagline_eng,
    "section_2_description"=> $request->section_2_description_eng,
    "section_2_sub_1_title"=> $request->section_2_sub_1_title_eng,
    "section_2_sub_1_description"=> $request->section_2_sub_1_description_eng,
    "section_2_sub_2_title"=> $request->section_2_sub_2_title_eng,
    "section_2_sub_2_description"=> $request->section_2_sub_2_description_eng,
    "section_3_title"=> $request->section_3_title_eng,
    "section_3_description"=> $request->section_3_description_eng
];

if($request->file('header_image'))
{
    $data['header_image']=str_replace("public/", "storage/", $request->file('header_image')->store('public/assets/foto'));
    $dataEng['header_image']=$data['header_image'];
}

if($request->file('section_3_image'))
{
    $data['section_3_image']=str_replace("public/", "storage/", $request->file('section_3_image')->store('public/assets/foto'));
    $dataEng['section_3_image']=$data['section_3_image'];
}


TelecommunicationContractor::first()->update($data);
TelecommunicationContractorEng::first()->update($dataEng);

Page::where('id','36435435-96de-4c4a-8aadd-ffcf607d196d')->update([
    'name'=>$request->title,
    'title'=>$request->title,
    'slug'=>Str::slug($request->title)
]);

PageEng::where('page_id','36435435-96de-4c4a-8aadd-ffcf607d196d')->update([
    'name'=>$request->title_eng,
    'title'=>$request->title_eng,
    'slug'=>Str::slug($request->title_eng)
]);

return back()->with('success','Sukses! Data Berhasil Diajukan');
}

public function store_image(Request $request)
{
    $validation=$request->validate([
        'image'=>"required|mimes:jpg,png,jpeg|file"
    ]);

    $data=[
        'image'=>str_replace("public/", "storage/", $request->file('image')->store('public/assets/foto'))
    ];

    ContractorImage::create($data);

    return back()->with('success','Sukses! Data Berhasil Di Tambah');
}

public function update_image(Request $request,$id)
{
    $validation=$request->validate([
        'image'=>"required|mimes:jpg,png,jpeg|file"
    ]);

    $data=[
        'image'=>str_replace("public/", "storage/", $request->file('image')->store('public/assets/foto'))
    ];

    ContractorImage::where('id',$id)->update($data);

    return back()->with('success','Sukses! Data Berhasil Di Ubah');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
