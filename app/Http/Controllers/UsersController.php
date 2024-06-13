<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $rows = Users::orderBy('name', 'ASC')->get();
    return view('users/userslist', ['rows' => $rows]);
  }

  public function create()
  {
    return view('users/usersform', ['action' => 'insert']);
  }

  public function store(Request $request)
  {

    $this->validate($request, [
      'nip' => 'required|string|max:255|min:8',
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:users',
      'password' => 'required|string|min:8|same:confirmed',
      'confirmed' => 'required|string|min:8',
    ]);

    $users = new Users;
    // $users->id = $request->id;
    $users->name = $request->name;
    $users->nip = $request->nip;
    $users->email = $request->email;
    // $users->email_verified_at = $request->email_verified_at;
    // $users->role = $request->role;
    $users->password = Hash::make($request->password);
    // $users->remember_token = $request->remember_token;
    // $users->created_at = $request->created_at;
    // $users->updated_at = $request->updated_at;
    $users->save();
    return redirect('/users');
  }

  public function show($id)
  {
    $users = Users::find($id);
    return view('users/usersform', ['row' => $users, 'action' => 'detail']);
  }

  public function edit($id)
  {
    $users = Users::find($id);
    return view('users/usersform', ['row' => $users, 'action' => 'update']);
  }

  public function update(Request $request)
  {
    $this->validate($request, [
      'nip' => 'required|string|max:255|min:8',
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255',
      'password' => 'same:confirmed',
    ]);

    $users = Users::find($request->id);
    // $users->id = $request->id;
    $users->name = $request->name;
    $users->nip = $request->nip;
    $users->email = $request->email;
    // $users->email_verified_at = $request->email_verified_at;
    // $users->role = $request->role;
    if (isset($request->password))
      $users->password = Hash::make($request->password);
    // $users->remember_token = $request->remember_token;
    // $users->created_at = $request->created_at;
    // $users->updated_at = $request->updated_at;
    $users->save();
    return redirect('/users');
  }

  public function delete($id)
  {
    $users = Users::find($id);
    return view('users/usersform', ['row' => $users, 'action' => 'delete']);
  }

  public function destroy($id)
  {
    $users = Users::find($id);
    $users->delete();
    return redirect('/users');
  }

  public function password($id)
  {
    $users = Users::where('id', $id)->where('nip', Auth::user()->nip)->first();
    return view('users/passwordform', ['row' => $users]);
  }

  public function passwordupdate(Request $request)
  {
    $this->validate($request, [
      'password' => 'required|string|min:8|same:confirmed',
    ]);
    $users = Users::where('id', $request->id)->first();
    if (isset($request->password)) {
      $users->password = Hash::make($request->password);
      $users->save();
      $message = "Password berhasil diubah!";
    } else {
      $message = "Password tidak berubah!";
    }
    // return view('users/passwordform', ['row' => $users, 'message' => $message]);
    return redirect('/password' . '/' . $request->id)->with(['message' => $message]);
  }

  public function passwordhash()
  {
    $rows = Users::where('role', 'user')->get();
    foreach ($rows as $row) {
      $row->password = Hash::make($row->nip);;
      $row->save();
    }
    dd('passwordhash');
  }
}
