<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Page;
use App\Models\PageEng;
use App\Models\Beranda;
use App\Models\BerandaEng;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beranda=Beranda::first();
        $berandaeng=BerandaEng::first();
        $pages=Page::where('id','36435435-96de-4c4a-8a6c-ffcf607d196d')->first();
        return view('pages.admin.beranda.index',[
            'item'=>$beranda,
            'item_eng'=>$berandaeng,
            'page'=>$pages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $validation=$request->validate([
      "title"=> "required",
      "header_image"=>"nullable|mimes:jpg,png,jpeg|file",

      "header_tagline"=> "required",
      "section_2_sub"=> "required",
      "section_2_image"=>"nullable|mimes:jpg,png,jpeg|file",

      "section_2_alt_image"=> "required",
      "section_2_title"=> "required",
      "section_2_description"=> "required",
      "section_3_image"=>"nullable|mimes:jpg,png,jpeg|file",

      "section_3_alt_image"=> "required",
      "section_3_title"=> "required",
      "section_3_description"=> "required",
      "section_4_sub"=> "required",

      "title_eng"=> "required",
      "header_tagline_eng"=> "required",
      "section_2_sub_eng"=> "required",
      "section_2_title_eng"=> "required",
      "section_2_description_eng"=> "required",
      "section_3_title_eng"=> "required",
      "section_3_description_eng"=> "required",
      "section_4_sub_eng"=> "required",

      "medan_pin"=> "required",
      "surabaya_pin"=> "required",
      "jakarta_pin"=> "required",
      "balikpapan_pin"=> "required"
  ]);



     $berandaData=[
      "title"=> $request->title,
      "header_tagline"=> $request->header_tagline,
      "section_2_sub"=> $request->section_2_sub,
      "section_2_alt_image"=> $request->section_2_alt_image,
      "section_2_title"=> $request->section_2_title,
      "section_2_description"=> $request->section_2_description,
      "section_3_alt_image"=> $request->section_3_alt_image,
      "section_3_title"=> $request->section_3_title,
      "section_3_description"=> $request->section_3_description,
      "section_4_sub"=> $request->section_4_sub,
      "medan_pin"=> $request->medan_pin,
      "surabaya_pin"=> $request->surabaya_pin,
      "jakarta_pin"=> $request->jakarta_pin,
      "balikpapan_pin"=> $request->balikpapan_pin
  ];

  $berandaDataEng=[
      "title"=> $request->title_eng,
      "header_tagline"=> $request->header_tagline_eng,
      "section_2_sub"=> $request->section_2_sub_eng,
      "section_2_alt_image"=> $request->section_2_alt_image,
      "section_2_title"=> $request->section_2_title_eng,
      "section_2_description"=> $request->section_2_description_eng,
      "section_3_alt_image"=> $request->section_3_alt_image,
      "section_3_title"=> $request->section_3_title_eng,
      "section_3_description"=> $request->section_3_description_eng,
      "section_4_sub"=> $request->section_4_sub_eng,
      "medan_pin"=> $request->medan_pin,
      "surabaya_pin"=> $request->surabaya_pin,
      "jakarta_pin"=> $request->jakarta_pin,
      "balikpapan_pin"=> $request->balikpapan_pin
  ];

  if($request->file('header_image')){
    $berandaData['header_image']=str_replace("public/", "storage/", $request->file('header_image')->store('public/assets/foto'));
    $berandaDataEng['header_image']=$berandaData['header_image'];
}

if($request->file('section_2_image')){
    $berandaData['section_2_image']=str_replace("public/", "storage/", $request->file('section_2_image')->store('public/assets/foto'));
    $berandaDataEng['section_2_image']=$berandaData['section_2_image'];
}

if($request->file('section_3_image')){
    $berandaData['section_3_image']=str_replace("public/", "storage/", $request->file('section_3_image')->store('public/assets/foto'));
    $berandaDataEng['section_3_image']=$berandaData['section_3_image'];
}


Beranda::first()->update($berandaData);
BerandaEng::first()->update($berandaDataEng);

Page::where('id','36435435-96de-4c4a-8a6c-ffcf607d196d')->update([
    'name'=>$request->title,
    'title'=>$request->title,
    'slug'=>Str::slug($request->title)
]);

PageEng::where('page_id','36435435-96de-4c4a-8a6c-ffcf607d196d')->update([
    'name'=>$request->title_eng,
    'title'=>$request->title_eng,
    'slug'=>Str::slug($request->title_eng)
]);


return back()->with('success','Sukses! Data Berhasil Ditambahkan');

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
        $page_id='36435435-96de-4c4a-8a6c-ffcf607d196d';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
