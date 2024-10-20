<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Satker;
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
    $satker = Auth::user()->satker;
    if (Auth::user()->role === "superadmin") {
      $rows = Users::where('role', '!=', 'superadmin')->orderBy('name', 'ASC')->get();
    } else {
      $rows = Users::orderBy('name', 'ASC')->where("satker", $satker)->get();
    }
    return view('users/userslist', ['rows' => $rows]);
  }

  public function create()
  {
    $satker = Satker::orderBy('nama', 'ASC')->get();
    return view('users/usersform', ['action' => 'insert', 'satker' => $satker]);
  }

  public function store(Request $request)
  {

    $this->validate(
      $request,
      [
        'nip' => 'required|string|max:255|min:8|unique:users',
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|same:confirmed',
        'confirmed' => 'required|string|min:8',
      ],
      [
        'nip.unique' => 'NIP sudah terdaftar, silakan menghubungi Super Admin.',
      ]
    );

    $user = new Users;
    $user->name = $request->name;
    $user->nip = $request->nip;
    $user->email = $request->email;
    if (Auth::user()->role === "superadmin") {
      $user->satker = $request->satker;
      $user->role = "admin";
    }
    if (Auth::user()->role === "admin") {
      $user->satker = Auth::user()->satker;
      $user->role = "user";
    }
    $user->password = Hash::make($request->password);
    $user->save();
    return redirect('/users');
  }

  public function show($id)
  {
    if (Auth::user()->role === "superadmin") {
      $user = Users::where('id', $id)->first();
    } else {
      $user = Users::where('id', $id)->where('satker', Auth::user()->satker)->first();
    }
    return view('users/usersform', ['row' => $user, 'action' => 'detail']);
  }

  public function edit($id)
  {
    if (Auth::user()->role === "superadmin") {
      $user = Users::where('id', $id)->first();
    } else {
      $user = Users::where('id', $id)->where('satker', Auth::user()->satker)->first();
    }
    $satker = Satker::orderBy('nama', 'ASC')->get();
    return view('users/usersform', ['row' => $user, 'action' => 'update', 'satker' => $satker]);
  }

  public function update(Request $request)
  {
    $this->validate(
      $request,
      [
        'nip' => 'required|string|max:255|min:8',
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'password' => 'same:confirmed',
      ]
    );

    $user = Users::find($request->id);
    $user->name = $request->name;
    $user->nip = $request->nip;
    $user->email = $request->email;
    if (Auth::user()->role === "superadmin") {
      $user->satker = $request->satker;
    }
    if (isset($request->password))
      $user->password = Hash::make($request->password);
    $user->save();
    return redirect('/users');
  }

  public function delete($id)
  {
    if (Auth::user()->role == "superadmin") {
      $user = Users::where('id', $id)->first();
    } else {
      $user = Users::where('id', $id)->where('satker', Auth::user()->satker)->first();
    }
    return view('users/usersform', ['row' => $user, 'action' => 'delete']);
  }

  public function destroy($id)
  {
    $user = Users::find($id);
    $user->delete();
    return redirect('/users');
  }

  public function password($id)
  {
    $user = Users::where('id', $id)->where('nip', Auth::user()->nip)->first();
    return view('users/passwordform', ['row' => $user]);
  }

  public function passwordupdate(Request $request)
  {
    $this->validate($request, [
      'password' => 'required|string|min:8|same:confirmed',
    ]);
    $user = Users::where('id', $request->id)->first();
    if (isset($request->password)) {
      $user->password = Hash::make($request->password);
      $user->save();
      $message = "Password berhasil diubah!";
    } else {
      $message = "Password tidak berubah!";
    }
    return redirect('/password' . '/' . $request->id)->with(['message' => $message]);
  }

  public function passwordhash()
  {
    $rows = Users::where('role', 'user')->get();
    foreach ($rows as $row) {
      $row->password = Hash::make($row->nip);;
      $row->save();
    }
  }
}
