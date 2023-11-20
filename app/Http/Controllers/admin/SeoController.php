<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seo;
use App\Models\SeoEng;

class SeoController extends Controller
{
    public function index()
    {
        $seo=Seo::first();
        $seoeng=SeoEng::first();
        return view('pages.admin.seo.index',[
            'item'=>$seo,
            'item_eng'=>$seoeng,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "site_title"=> "required",
            "site_title_eng"=> "required",
            "meta_keywords"=> "required",
            "meta_keywords_eng"=> "required",
            "meta_description"=> "required",
            "meta_description_eng"=> "required",
        ]);

        $data=[
            "site_title"=> $request->site_title,
            "meta_keywords"=> $request->meta_keywords,
            "meta_description"=> $request->meta_description,
            "head_script"=> $request->head_script
        ];
        $dataEng=[
            "site_title"=> $request->site_title_eng,
            "meta_keywords"=> $request->meta_keywords_eng,
            "meta_description"=> $request->meta_description_eng,
            "head_script"=> $request->head_script
        ];

        Seo::first()->update($data);
        SeoEng::first()->update($dataEng);

        return back()->with('success','Sukses! Data berhasil di ubah');
    }
}
