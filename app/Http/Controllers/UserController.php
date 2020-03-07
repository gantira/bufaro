<?php

namespace App\Http\Controllers;

use App\Traits\ImageTrait;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'image' => 'nullable|mimes:jpg,png,jpeg|max:2048',
        ]);

        $user = User::create([
            'name' => request()->name,
            'email' => request()->email,
            'password' => bcrypt($request->password),
        ]);

        $this->storeImage($user, $request);

        $user->assignRole($request->role);

        return redirect(route('user.index'))->with(['success' => 'User Baru Ditambahkan.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', compact('user'))->with(['warning' => 'Kosongkan password jika tidak berubah.']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8|confirmed',
            'image' => 'nullable|mimes:jpg,png,jpeg|max:2048',
        ]);

        $user = User::find($id);
        $user->fill($request->except('image'));
        $user->password = $request->password ? bcrypt($request->password) : $user->fresh()->password;
        $user->save();
        
        $this->storeImage($user, $request);

        $user->syncRoles($request->role);

        return redirect(route('user.index'))->with(['success' => 'User Sudah Diupdate.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        $this->deleteImage($user);

        return redirect(route('user.index'))->with(['success' => 'User Dihapus.']);
    }
}
