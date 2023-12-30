<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogEng;
class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blog=Blog::with('eng')->get();
        $blogeng=BlogEng::get();
        return view('pages.admin.blog.index',[
            'item'=>$blog,
            'item_eng'=>$blogeng,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     $validation=$request->validate([
      "title"=> "required",
      "image"=>"required|mimes:jpg,png,jpeg|file",
      "alt_image"=> "required",
      "content"=> "required",

      "title_eng"=> "required",
      "content_eng"=> "required",
  ]);

     $data=[
        "title"=>$request->title,
        "content"=>$request->content,
        "alt_image"=>$request->alt_image,
    ];

    $dataEng=[
        "title"=>$request->title_eng,
        "content"=>$request->content_eng,
        "alt_image"=>$request->alt_image,
    ];

    if($request->file('image')){
        $data['image']=str_replace("public/", "storage/", $request->file('image')->store('public/assets/foto'));
        $dataEng['image']=$data['image'];
    }

    $data['user_id']=auth()->user()->id;
    $dataEng['user_id']=auth()->user()->id;

    $blog=Blog::create($data);

    $dataEng['blog_id']=$blog->id;
    BlogEng::create($dataEng);


    return redirect()->route('blog.index')->with('success','Sukses! Blog baru Berhasil Ditambahkan');
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

        $blog=Blog::with('eng')->where('id',$id)->first();
        $blogeng=BlogEng::where('blog_id',$id)->first();
        return view('pages.admin.blog.edit',[
            'item'=>$blog,
            'item_eng'=>$blogeng,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
     $validation=$request->validate([
      "title"=> "required",
      "image"=>"nullable|mimes:jpg,png,jpeg|file",
      "alt_image"=> "required",
      "content"=> "required",

      "title_eng"=> "required",
      "content_eng"=> "required",
  ]);

     $data=[
        "title"=>$request->title,
        "content"=>$request->content,
        "alt_image"=>$request->alt_image,
    ];

    $dataEng=[
        "title"=>$request->title_eng,
        "content"=>$request->content_eng,
        "alt_image"=>$request->alt_image,
    ];

    if($request->file('image')){
        $data['image']=str_replace("public/", "storage/", $request->file('image')->store('public/assets/foto'));
        $dataEng['image']=$data['image'];
    }

    $data['user_id']=auth()->user()->id;
    $dataEng['user_id']=auth()->user()->id;

    $blog=Blog::where('id',$id)->update($data);
    BlogEng::where('blog_id',$id)->update($dataEng);


    return redirect()->route('blog.index')->with('success','Sukses! Blog baru Berhasil Diupdate');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Blog::findorFail($id);
        $itemeng = BlogEng::where('blog_id',$id)->delete();

        $item->delete();
        return redirect()
        ->route('blog.index')
        ->with('success', 'Sukses! Blog telah dihapus');
    }
}
