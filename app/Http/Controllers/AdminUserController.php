<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'user' => User::get(),
            'content' => 'admin.user.index'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [
            'content' => 'admin.user.create'
        ];
        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:users',
            'password'=> 'required',
            're_password'=> 'required|same:password',
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);
        return redirect('/admin/user')->with('success', 'Data Berhasil Diedit');
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

    public function showIdCard($id)
    {
        //
        $user = User::find($id);

        if (!$user) {
            abort(404); // Atau Anda bisa menangani ini dengan cara lain, sesuai kebutuhan aplikasi Anda.
        }

        $data = [
            'user' => $user,
            'content' => 'admin.user.id-card'
        ];

        return view('admin.layouts.wrapper', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = [
            'user' => User::find($id),
            'content' => 'admin.user.create'
        ];
        return view('admin.layouts.wrapper', $data);
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
        //
        $user = User::find($id);
        $data = $request->validate([
            'name'=> 'required',
            'email'=> 'required|email|unique:users,email,'.$user->id,
            // 'password'=> 'required',
            're_password'=> 'same:password',
        ]);

        if($request->password != ''){
            $data['password'] = Hash::make($request['password']);
        } else {
            $data['password'] = $user->password;
        }

        $user->update($data);
        return redirect('/admin/user')->with('success', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/user')->with('success', 'Data Berhasil Dihapus');
    }
}
