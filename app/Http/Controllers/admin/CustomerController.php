<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CustomerSection;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers=Customer::get();
        $section=CustomerSection::first();
        return view('pages.admin.customer.index',[
            'customers'=>$customers,
            'section'=>$section
        ]);
    }

    public function section(Request $request)
    {
        $validatedData=$request->validate([
            'title'=>'required',
            'title_eng'=>'required'
        ]);

        CustomerSection::first()->update($validatedData);

        return back()->with('success','Sukses! Pelanggan Berhasil Di Ubah');
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
            'image'=>"required|mimes:jpg,png,jpeg|file"
        ]);

        $data=[
            'image'=>str_replace("public/", "storage/", $request->file('image')->store('public/assets/foto'))
        ];

        Customer::create($data);

        return back()->with('success','Sukses! Pelanggan Berhasil Di Tambah');
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
        $validation=$request->validate([
            'image'=>"required|mimes:jpg,png,jpeg|file"
        ]);

        $data=[
            'image'=>str_replace("public/", "storage/", $request->file('image')->store('public/assets/foto'))
        ];

        Customer::where('id',$id)->update($data);

        return back()->with('success','Sukses! Pelanggan Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Customer::findorFail($id);

        $item->delete();

        return redirect()
        ->route('customer.index')
        ->with('success', 'Sukses! Data Pelanggan telah dihapus');
    }
}
