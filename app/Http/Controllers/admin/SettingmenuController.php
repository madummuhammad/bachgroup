<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\PageEng;
use App\Models\NewPage;
use App\Models\NewPageEng;
use Illuminate\Support\Str;

class SettingmenuController extends Controller
{
    public function index()
    {
        $page=Page::with('eng','new_page','new_page_eng')->orderBy('created_at','ASC')->get();
        return view('pages.admin.settingmenu.index',[
            'item'=>$page
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
          "title"=> "required",
          "title_eng"=> "required",
          "header_tagline"=> "required",
          "header_tagline_eng"=> "required",
          "description"=> "required",
          "header_image"=>"required|mimes:jpg,png,jpeg|file",
          "description_eng"=>"required"
      ]);

        $data=[
            'header_tagline'=>$request->header_tagline,
            'description'=>$request->description
        ];

        $dataEng=[
            'header_tagline'=>$request->header_tagline_eng,
            'description'=>$request->description_eng
        ];

        $page=Page::create([
            'name'=>$request->title,
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'can_be_deleted'=>1,
            'hidden'=>0
        ]);

        PageEng::create([
            'name'=>$request->title_eng,
            'page_id'=>$page->id,
            'title'=>$request->title_eng,
            'slug'=>Str::slug($request->title_eng),
            'can_be_deleted'=>1,
            'hidden'=>0
        ]);

        if($request->file('header_image')){
            $data['header_image']=str_replace("public/", "storage/", $request->file('header_image')->store('public/assets/foto'));
            $dataEng['header_image']=$data['header_image'];
        }

        $data['page_id']=$page->id;
        $dataEng['page_id']=$page->id;

        NewPage::create($data);
        NewPageEng::create($dataEng);

        return back()->with('success','Sukses! Data Berhasil Ditambah');
    }

    public function update(Request $request,$id)
    {
        $request->validate([
          "title"=> "required",
          "title_eng"=> "required",
          "header_tagline"=> "required",
          "header_tagline_eng"=> "required",
          "description"=> "required",
          "header_image"=>"nullable|mimes:jpg,png,jpeg|file",
          "description_eng"=>"required"
      ]);

        $data=[
            'header_tagline'=>$request->header_tagline,
            'description'=>$request->description
        ];

        $dataEng=[
            'header_tagline'=>$request->header_tagline_eng,
            'description'=>$request->description_eng
        ];

        Page::where('id',$id)->update([
            'name'=>$request->title,
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'can_be_deleted'=>1,
            'hidden'=>0
        ]);

        PageEng::where('page_id',$id)->update([
            'name'=>$request->title_eng,
            'title'=>$request->title_eng,
            'slug'=>Str::slug($request->title_eng),
            'can_be_deleted'=>1,
            'hidden'=>0
        ]);

        if($request->file('header_image')){
            $data['header_image']=str_replace("public/", "storage/", $request->file('header_image')->store('public/assets/foto'));
            $dataEng['header_image']=$data['header_image'];
        }

        NewPage::where('page_id',$id)->update($data);
        NewPageEng::where('page_id',$id)->update($dataEng);

        return back()->with('success','Sukses! Data Berhasil Diubah');
    }

    public function hidden($id)
    {
        $page=Page::where('id',$id)->first();
        $status=0;
        $message='pusblish';
        if($page->hidden==0){
            $status=1;
            $message='sembunyikan';
        }

        Page::where('id',$id)->update(['hidden'=>$status]);
        PageEng::where('page_id',$id)->update(['hidden'=>$status]);
        return back()->with('success','Sukses! Halaman Berhasil Di'.$message);
    }

    public function destroy($id)
    {
        Page::where('id',$id)->delete();
        PageEng::where('page_id',$id)->delete();
        NewPage::where('page_id',$id)->delete();
        NewPageEng::where('page_id',$id)->delete();

        return redirect()
        ->route('admin.setting')
        ->with('success', 'Sukses! Data telah dihapus');
    }
}
