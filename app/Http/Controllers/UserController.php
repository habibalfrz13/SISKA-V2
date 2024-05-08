<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
         // Ambil semua data user dengan peran "enduser"
        $data = User::where('id_role', '2')->orderBy('id', 'DESC')->get();
    
        return view('dashboard.user.index', [
            'data' => $data,
            'title' => 'User',
        ]);
    }

    public function profile()
    {
        $user = Auth::id();
        $data = User::where('id', $user)->get();
        return view('dashboard.user.profile',[
            'data' => $data,
        ]);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Jika Anda ingin melewatkan data roles ke view, Anda dapat melakukannya di sini
        $roles = Role::all(); // Pastikan Anda sudah mengimpor namespace Role di atas

        return view('dashboard.user.create', [
            'title' => 'Create User',
            'roles' => $roles,
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
             // Menggunakan konfirmasi password yang sudah disediakan Laravel
        ]);
        
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        // $input['id_role'] = $request['id_role'];

        $user = User::create($input);

        return redirect()->route('user.index')
            ->with('success', 'User created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('dashboard.user.show', [
            'user' => $user,
            'title' => 'Detail',
        ]);
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
        return view('dashboard.user.edit', [
            'user' => $user,
            'title' => 'Edit-User'
        ]);
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
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|same:confirm_password',
        'username' => [
            'required',
            Rule::unique('users')->ignore($id),
        ],
        'foto'     => 'image|mimes:jpeg,png,jpg,svg|max:2048',
    ]);

   
    $image = $request->file('foto');
    $image->storeAs('public/user/', $image->hashName());
    

    $input = $request->all();
    $input['foto'] = $image->hashName();
    if (!empty($input['password'])) {
        $input['password'] = Hash::make($input['password']);
    } else {
        $input = Arr::except($input, ['password']);
    }

    $user = User::find($id);
    $user->update($input);

    return redirect()->route('users.index')
        ->with('success', 'User updated successfully');
}



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
