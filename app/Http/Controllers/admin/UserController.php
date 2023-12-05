<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->hak_akses=='superadmin'){
            $user=User::get();
        } else {
            $user=User::where('hak_akses','admin')->get();
        }
        return view('pages.admin.user.index',[
            'item'=>$user
        ]);
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
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'hak_akses' => 'required',
        ]);

        $validatedData['password_text']=$validatedData['password'];
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);

        return redirect()
        ->route('user.index')
        ->with('success', 'Sukses! Data User Berhasil Disimpan');
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
        $item = User::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => [
                'required',
                Rule::unique('users')->ignore($item->id),
            ],
            'hak_akses' => 'required',
            'password' => 'nullable|min:5|max:255',
        ]);

        if ($request->password!==null) {
            $validatedData['password_text']=$validatedData['password'];
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $item->update($validatedData);

        return redirect()
        ->route('user.index')
        ->with('success', 'Sukses! Data Pengguna telah diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = User::findorFail($id);

        $item->delete();

        return redirect()
        ->route('user.index')
        ->with('success', 'Sukses! Data Pengguna telah dihapus');
    }
}
