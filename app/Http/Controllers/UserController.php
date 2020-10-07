<?php

namespace App\Http\Controllers;

use App\User;
use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::paginate(10);
        return view('admin.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:100',
            'email' => 'required|email',
            'tipe' => 'required',
            'avatar' => 'required'
        ]);

        

        if($request->input('password')){
            $password = bcrypt($request->password);
        }
        else{
            $password = bcrypt('123456789');
        }

        $avatar = $request->avatar;
        $new_avatar = time().$avatar->getClientOriginalName();

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'tipe' => $request->tipe,
                'password' => $password,
                'avatar' => 'public/uploads/users/'.$new_avatar,
            ]);

        $avatar->move('public/uploads/users/', $new_avatar);

        return redirect()->back()->with('success', 'User Berhasil Disimpan');
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
        return view('admin.user.edit', compact('user'));
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
        $this->validate($request, [
            'name' => 'required|min:3|max:100',
            'tipe' => 'required'
        ]);

        if($request->has('avatar')){
            $avatar = $request->avatar;
            $new_avatar = time().$avatar->getClientOriginalName();
            $avatar->move('public/uploads/users/', $new_avatar);
            $user_data = [
                'name' => $request->name,
                'tipe' => $request->tipe,
                'password' => bcrypt($request->password),
                'avatar' => 'public/uploads/users/'.$new_avatar
            ];
        }
        else if($request->input('password')){
            $user_data = [
                'name' => $request->name,
                'tipe' => $request->tipe,
                'password' => bcrypt($request->password)
            ];
        }
        else{   
            $user_data = [
                'name' => $request->name,
                'tipe' => $request->tipe
            ];
        }

        $user = User::find($id);
        $user->update($user_data);

        return redirect()->route('user.index')->with('success', 'User Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorfail($id);
        $user->delete();

        return redirect()->back()->with('success', 'User Berhasil Di Hapus');
    }

    public function profile()
    {
        $user = User::all();
        $post = Posts::all();

        return view('admin.user.profile', compact('user','post'));
    }
}
