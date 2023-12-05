<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\Milestone;
use App\Models\MilestoneEng;
use App\Models\PerusahaanEng;
use App\Models\Page;
use App\Models\PageEng;
use App\Models\Certificate;
use App\Models\Award;
use Illuminate\Support\Str;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perusahaan=Perusahaan::first();
        $milestone=Milestone::with('eng')->orderBy('year','ASC')->get();
        $milestoneeng=MilestoneEng::orderBy('year','ASC')->get();
        $perusahaaneng=PerusahaanEng::first();
        $certificate=Certificate::orderBy('created_at','DESC')->get();
        $award=Award::orderBy('created_at','DESC')->get();
        $pages=Page::where('id','36435435-96de-4c4a-8a6c-ffcf607d196c')->first();
        return view('pages.admin.perusahaan.index',[
            'item'=>$perusahaan,
            'item_eng'=>$perusahaaneng,
            'milestone'=>$milestone,
            'milestone_eng'=>$milestoneeng,
            'page'=>$pages,
            'certificate'=>$certificate,
            'award'=>$award
        ]);
    }

    public function store_milestones(Request $request)
    {
        $validation=$request->validate([
            'year'=>'required',
            'description'=>'required',
            'description_eng'=>'required',
            'image'=>"required|mimes:jpg,png,jpeg|file"
        ]);

        $data=[
            'year'=>$request->year,
            'description'=>$request->description,
            'image'=>str_replace("public/", "storage/", $request->file('image')->store('public/assets/foto'))
        ];

        $dataEng=[
            'year'=>$request->year,
            'description'=>$request->description_eng,
            'image'=>$data['image']
        ];

        $milestone=Milestone::create($data);

        $dataEng["milestone_id"]=$milestone->id;

        MilestoneEng::create($dataEng);

        return back()->with('success','Sukses! Data Berhasil Di Tambah');
    }

    public function update_milestones(Request $request,$id)
    {
        $validation=$request->validate([
            'year'=>'required',
            'description'=>'required',
            'description_eng'=>'required',
        ]);

        $data=[
            'year'=>$request->year,
            'description'=>$request->description,
        ];

        $dataEng=[
            'year'=>$request->year,
            'description'=>$request->description_eng,
        ];
        if($request->file('image')){
            $data['image']=str_replace("public/", "storage/", $request->file('image')->store('public/assets/foto'));
            $dataEng['image']=$data['image'];
        }

        $milestone=Milestone::where('id',$id)->update($data);

        MilestoneEng::where('milestone_id',$id)->update($dataEng);

        return back()->with('success','Sukses! Data Berhasil Di Ubah');
    }


    public function store_certificate(Request $request)
    {
        $validation=$request->validate([
            'image'=>"required|mimes:jpg,png,jpeg|file"
        ]);

        $data=[
            'image'=>str_replace("public/", "storage/", $request->file('image')->store('public/assets/foto'))
        ];

        Certificate::create($data);

        return back()->with('success','Sukses! Data Berhasil Di Tambah');
    }

    public function update_certificate(Request $request,$id)
    {
        $validation=$request->validate([
            'image'=>"required|mimes:jpg,png,jpeg|file"
        ]);

        $data=[
            'image'=>str_replace("public/", "storage/", $request->file('image')->store('public/assets/foto'))
        ];

        Certificate::where('id',$id)->update($data);

        return back()->with('success','Sukses! Data Berhasil Di Ubah');
    }


    public function store_award(Request $request)
    {
        $validation=$request->validate([
            'image'=>"required|mimes:jpg,png,jpeg|file"
        ]);

        $data=[
            'image'=>str_replace("public/", "storage/", $request->file('image')->store('public/assets/foto'))
        ];

        Award::create($data);

        return back()->with('success','Sukses! Data Berhasil Di Tambah');
    }

    public function update_award(Request $request,$id)
    {
        $validation=$request->validate([
            'image'=>"required|mimes:jpg,png,jpeg|file"
        ]);

        $data=[
            'image'=>str_replace("public/", "storage/", $request->file('image')->store('public/assets/foto'))
        ];

        Award::where('id',$id)->update($data);

        return back()->with('success','Sukses! Data Berhasil Di Ubah');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validation=$request->validate([
          "title"=> "required",
          "title_eng"=> "required",
          "header_tagline"=> "required",
          "header_image"=> "nullable|mimes:jpg,png,jpeg|file",
          "header_tagline_eng"=> "required",
          "section_2_description"=> "required",
          "section_2_description_eng"=> "required",
          "section_2_sub_1_title"=> "required",
          "section_2_sub_1_title_eng"=> "required",
          "section_2_sub_1_description"=> "required",
          "section_2_sub_1_description_eng"=> "required",
          "section_2_sub_2_title"=> "required",
          "section_2_sub_2_title_eng"=> "required",
          "section_2_sub_2_description"=> "required",
          "section_2_sub_2_description_eng"=> "required",
          "section_3_title"=> "required",
          "section_3_title_eng"=> "required",
          "section_3_sub_1_title"=> "required",
          "section_3_sub_1_title_eng"=> "required",
          "section_3_sub_1_description"=> "required",
          "section_3_sub_1_description_eng"=> "required",
          "section_3_sub_2_title"=> "required",
          "section_3_sub_2_title_eng"=> "required",
          "section_3_sub_2_description"=> "required",
          "section_3_sub_2_description_eng"=> "required",
          "section_3_sub_3_title"=> "required",
          "section_3_sub_3_title_eng"=> "required",
          "section_3_sub_3_description"=> "required",
          "section_3_sub_3_description_eng"=> "required",
          "section_4_title"=> "required",
          "section_4_title_eng"=> "required",
          "section_5_title"=> "required",
          "section_5_title_eng"=> "required",
          "section_6_title"=> "required",
          "section_6_title_eng"=> "required",
          "komisaris_title"=> "required",
          "structure_title"=> "required"
      ]);

       $data=[
        "title" => $request->title,
        "header_tagline" => $request->header_tagline,
        "section_2_description" => $request->section_2_description,
        "section_2_sub_1_title" => $request->section_2_sub_1_title,
        "section_2_sub_1_description" => $request->section_2_sub_1_description,
        "section_2_sub_2_title" => $request->section_2_sub_2_title,
        "section_2_sub_2_description" => $request->section_2_sub_2_description,
        "section_3_title" => $request->section_3_title,
        "section_3_sub_1_title" => $request->section_3_sub_1_title,
        "section_3_sub_1_description" => $request->section_3_sub_1_description,
        "section_3_sub_2_title" => $request->section_3_sub_2_title,
        "section_3_sub_2_description" => $request->section_3_sub_2_description,
        "section_3_sub_3_title" => $request->section_3_sub_3_title,
        "section_3_sub_3_description" => $request->section_3_sub_3_description,
        "section_4_title" => $request->section_4_title,
        "section_5_title" => $request->section_5_title,
        "section_6_title" => $request->section_6_title,
        "komisaris_title" => $request->komisaris_title,
        "structure_title" => $request->structure_title,
    ];

    $dataEng=[
        "title" => $request->title_eng,
        "header_tagline" => $request->header_tagline_eng,
        "section_2_description" => $request->section_2_description_eng,
        "section_2_sub_1_title" => $request->section_2_sub_1_title_eng,
        "section_2_sub_1_description" => $request->section_2_sub_1_description_eng,
        "section_2_sub_2_title" => $request->section_2_sub_2_title_eng,
        "section_2_sub_2_description" => $request->section_2_sub_2_description_eng,
        "section_3_title" => $request->section_3_title_eng,
        "section_3_sub_1_title" => $request->section_3_sub_1_title_eng,
        "section_3_sub_1_description" => $request->section_3_sub_1_description_eng,
        "section_3_sub_2_title" => $request->section_3_sub_2_title_eng,
        "section_3_sub_2_description" => $request->section_3_sub_2_description_eng,
        "section_3_sub_3_title" => $request->section_3_sub_3_title_eng,
        "section_3_sub_3_description" => $request->section_3_sub_3_description_eng,
        "section_4_title" => $request->section_4_title_eng,
        "section_5_title" => $request->section_5_title_eng,
        "section_6_title" => $request->section_6_title_eng,
        "komisaris_title" => $request->komisaris_title_eng,
        "structure_title" => $request->structure_title_eng,
    ];

    if($request->file('header_image')){
        $data['header_image']=str_replace("public/", "storage/", $request->file('header_image')->store('public/assets/foto'));
        $dataEng['header_image']=$data['header_image'];
    }


    Perusahaan::first()->update($data);
    PerusahaanEng::first()->update($dataEng);
    Page::where('id','36435435-96de-4c4a-8a6c-ffcf607d196c')->update([
        'name'=>$request->title,
        'title'=>$request->title,
        'slug'=>Str::slug($request->title)
    ]);

    PageEng::where('page_id','36435435-96de-4c4a-8a6c-ffcf607d196c')->update([
        'name'=>$request->title_eng,
        'title'=>$request->title_eng,
        'slug'=>Str::slug($request->title_eng)
    ]);
    return back()->with('success','Sukses! Data Berhasil Diajukan');
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
