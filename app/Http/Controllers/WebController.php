<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatuDaya;
use App\Models\Contact;
use App\Models\ContactEng;
use App\Models\CatuDayaEng;
use App\Models\Beranda;
use App\Models\CustomerSection;
use App\Models\Project;
use App\Models\ProjectEng;
use App\Models\BerandaEng;
use App\Models\Perusahaan;
use App\Models\PerusahaanEng;
use App\Models\Milestone;
use App\Models\MilestoneEng;
use App\Models\Certificate;
use App\Models\Award;
use App\Models\Customer;
use App\Models\TelecommunicationContractor;
use App\Models\TelecommunicationContractorEng;
use App\Models\ContractorImage;
class WebController extends Controller
{
    public function index()
    {
        if(session('lang')=="eng"){
            $beranda=BerandaEng::first();
        } else {
            $beranda=Beranda::first();
        }

        return view('pages.web.index',[
            'item'=>$beranda
        ]);
    }

    public function perusahaan()
    {
        if(session('lang')=="eng"){
            $beranda=PerusahaanEng::first();
            $milestone=MilestoneEng::orderBy('year','ASC')->get();
        } else {
            $milestone=Milestone::orderBy('year','ASC')->get();
            $beranda=Perusahaan::first();
        }

        $certificate=Certificate::orderBy('created_at','DESC')->get();
        $award=Award::orderBy('created_at','DESC')->get();

        return view('pages.web.perusahaan',[
            'item'=>$beranda,
            'milestone'=>$milestone,
            'certificate'=>$certificate,
            'award'=>$award
        ]);
    }

    public function kontraktor()
    {
        if(session('lang')=="eng"){
            $item=TelecommunicationContractorEng::first();
        } else {
            $item=TelecommunicationContractor::first();
        }
        $customer=Customer::orderBy('created_at','ASC')->get();
        $image=ContractorImage::orderBy('created_at','ASC')->get();
        $customer_section=CustomerSection::first();
        return view('pages.web.kontraktor',[
            'item'=>$item,
            'image'=>$image,
            'customer'=>$customer,
            'customer_section'=>$customer_section
        ]);
    }

    public function catudaya()
    {
        if(session('lang')=="eng"){
            $item=CatuDayaEng::first();
            $project=ProjectEng::orderBy('created_at','DESC')->get();
        } else {
            $project=Project::orderBy('created_at','DESC')->get();
            $item=CatuDaya::first();
        }
        $customer_section=CustomerSection::first();
        $customer=Customer::orderBy('created_at','ASC')->get();
        $image=ContractorImage::orderBy('created_at','ASC')->get();
        return view('pages.web.catudaya',[
            'item'=>$item,
            'project'=>$project,
            'customer'=>$customer,
            'customer_section'=>$customer_section
        ]);
    }

    public function kontak()
    {
        if(session('lang')=="eng"){
            $item=ContactEng::first();
        } else {
            $item=Contact::first();
        }

        $image=ContractorImage::get();
        return view('pages.web.kontak',[
            'item'=>$item,
        ]);
    }

    public function lang(Request $request)
    {
        if(session('lang')=="eng"){
            session()->forget('lang');
        } else {
            session(["lang"=>"eng"]);
        }

        return back();
    }
}
