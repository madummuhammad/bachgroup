<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\PageEng;
use App\Models\NewPage;
use App\Models\NewPageEng;

class PageController extends Controller
{
    public function index($slug)
    {
        $id=null;
      if(session('lang')=="eng"){
        $page=PageEng::where('slug',$slug)->first();
        $id=$page->page_id;
        $item=NewPageEng::where('page_id',$id)->first();
      } else {
        $page=Page::where('slug',$slug)->first();
        $id=$page->id;
        $item=NewPage::where('page_id',$id)->first();
    }
    return view('pages.web.page',[
        'item'=>$item,
        'page'=>$page
    ]);
}
}
