<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_user = User::all();
        $satker_id = auth()->user()->pegawai->satker_id;
        $daftar_user = User::whereHas('pegawai' , function($query) use($satker_id){
            $query->where('satker_id', '=', $satker_id);
        })->get();
        return view('pages.user.daftar',[
            "title" => "User",
            "menu" => "User",
            "users" => $daftar_user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.user.create',[
            "title" => "User",
            "menu" => "User",
            "pegawais" => Pegawai::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $validatedData = $request->validate([
            'username' => 'required|unique:users|min:3|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6|max:255',
            'pegawai_id' => 'required|unique:users',
            'role' => "required"
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        
        User::create($validatedData);
        return redirect('user')->with('notif','Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */

    public function show(User $user)
    {
        
        return view('pages.user.edit',[
            "title" => "User",
            "menu" => "User",
            "pegawais" => Pegawai::all(),
            "user" => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('pages.user.edit',[
            "title" => "User",
            "menu" => "User",
            "pegawais" => Pegawai::all(),
            "user" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules =[
            'password' => 'required|min:6|max:255',
            'role' => "required"
        ];

        if($request->username != $user->username){
            $rules['username'] = 'required|unique:users|min:3|max:255';
        }

        if($request->email != $user->email){
            $rules['email'] = 'required|email:dns|unique:users';
        }

        if($request->pegawai_id != $user->pegawai_id){
            $rules['pegawai_id'] = 'required|unique:users';
        }

        $validatedData = $request->validate($rules);

        $validatedData['password'] = Hash::make($validatedData['password']);
        
        User::where('id',$user->id)->update($validatedData);
        return redirect('user')->with('notif','Data berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('user')->with('notif','Data berhasil dihapus!');
    }
    
    /**
     * Display the user resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    
    public function profile()
    {     
        return view('pages.user.profile',[
            "title" => "Profile",
            "menu" => "User",
            "user" => auth()->user(),
        ]);
    }

    public function update_password(Request $request)
    {
        if (!(Hash::check($request->get('old_password'), auth()->user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Password lama salah");
        }

        if(strcmp($request->get('old_password'), $request->get('password')) == 0){
            // Current password and new password same
            return redirect()->back()->with("error","Password baru tidak boleh sama dengan password lama");
        }
        
        $validatedData = $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);        

        //Change Password
        $user = Auth::user();
        $user->password = Hash::make($validatedData['password']);

        User::where('id',$user->id)->update(['password' => Hash::make($validatedData['password'])]);
        return redirect()->back()->with("success","Password successfully changed!");        
        // return redirect('profile')->with('notifikasi','Data berhasil disimpan!');
    }
}
