<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Satker;
use Spatie\PdfToText\Pdf;
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

	public function uploadFormKK($id)
	{
		$row = Users::findOrFail($id);
		return view('users.uploadkk', ['row' => $row, 'action' => 'uploadkk']);
	}

public function processUploadKK(Request $request)
{
    $request->validate([
        'pdf' => 'required|mimes:pdf|max:2048'
    ]);

    $file = $request->file('pdf');
    $path = $file->store('temp');

    $text = \Spatie\PdfToText\Pdf::getText(storage_path('app/' . $path));

    // ========================
    // HEADER
    // ========================
    $nama = $this->getValue($text, 'NAMA');
    $nip  = $this->getValue($text, 'NIP\/NRP');
    $tgl  = $this->getValue($text, 'TGL\. LAHIR');

    // ========================
    // AMBIL SECTION
    // ========================
    $section = strstr($text, 'C. DATA KELUARGA');
    $section = strstr($section, 'halaman', true);

    $lines = array_values(array_filter(array_map('trim', explode("\n", $section))));

    // ========================
    // 1. AMBIL NAMA
    // ========================
    $namaList = [];

    for ($i = 0; $i < count($lines); $i++) {
        if (preg_match('/^\d+$/', $lines[$i])) {

            $next = $lines[$i + 1] ?? null;

            if ($next && !in_array($next, ['-', 'Ya', 'Tidak'])) {
                $namaList[] = $next;
            }
        }
    }

    // ========================
    // 2. AMBIL TANGGAL
    // ========================
    $tanggalIndex = [];
    $tanggalList  = [];

    for ($i = 0; $i < count($lines); $i++) {
        if (preg_match('/\d{2}-\d{2}-\d{4}/', $lines[$i])) {
            $tanggalList[]  = $lines[$i];
            $tanggalIndex[] = $i;
        }
    }

    // ========================
    // 3. HUBUNGAN
    // ========================
    $hubunganList = [];

    foreach ($lines as $line) {
        if (in_array($line, ['Istri', 'Suami', 'Anak Kandung', 'Anak Angkat'])) {
            $hubunganList[] = $line;
        }
    }

    // ========================
    // 4. TANGGUNGAN
    // ========================
    $tanggunganList = [];

    foreach ($lines as $line) {
        if (in_array($line, ['Ya', 'Tidak'])) {
            $tanggunganList[] = $line;
        }
    }

    // ========================
    // 5. SEKOLAH (FIX FINAL)
    // ========================
    $sekolahList = [];

    foreach ($tanggalIndex as $idx) {

        $sekolah = null;

        for ($j = $idx; $j < $idx + 10 && $j < count($lines); $j++) {

            $val = strtolower($lines[$j]);

            if (str_contains($val, 'kuliah')) {
                $sekolah = 'Kuliah';
                break;
            } elseif (str_contains($val, 'sma')) {
                $sekolah = 'SMA';
                break;
            } elseif (str_contains($val, 'smp')) {
                $sekolah = 'SMP';
                break;
            } elseif (str_contains($val, 'sd')) {
                $sekolah = 'SD';
                break;
            }
        }

        // fallback
        if (!$sekolah) {
            $sekolah = '-';
        }

        $sekolahList[] = $sekolah;
    }

    // ========================
    // 6. GABUNGKAN
    // ========================
    $count = min(count($namaList), count($tanggalList));

    $keluarga = [];

    for ($i = 0; $i < $count; $i++) {

        $keluarga[] = [
            'nama' => $namaList[$i],
            'tanggal_lahir' => $tanggalList[$i],
            'hubungan' => $hubunganList[$i] ?? null,
            'tanggungan' => $tanggunganList[$i] ?? null,
            'sekolah' => $sekolahList[$i] ?? null,
        ];
    }

    // ========================
    // OUTPUT
    // ========================
    // dd([
    //     'nama' => $nama,
    //     'nip' => $nip,
    //     'tanggal_lahir' => $tgl,
    //     'keluarga' => $keluarga
    // ]);

    return view('users.previewkk', [
        'data' => [
            'user' => Users::find($request->id),
            'nama' => $nama,
            'nip' => $nip,
            'tanggal_lahir' => $tgl,
            'keluarga' => $keluarga
        ]
    ]);
}
	
	private function getValue($text, $field)
	{
		preg_match('/' . $field . '\s*:\s*(.*)/', $text, $match);
		return trim($match[1] ?? '');
	}

}
