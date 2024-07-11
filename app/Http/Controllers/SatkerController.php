<?php
namespace App\Http\Controllers;

use App\Models\Satker;
use Illuminate\Http\Request;

class SatkerController extends Controller {

	public function index(){
		$rows = Satker::orderBy('kode')->get();
		return view('satker.satkerlist', compact('rows'));
	}

	public function create(){
		return view('satker.satkerform',['action' => 'insert']);
	}

	public function store(Request $request){
		$validatedData = $request->validate([
		'kode' => 'required|numeric',
		'nama' => 'required|max:255',
		'alamat' => 'required',
		'keterangan' => 'required',
		]);

		Satker::create($validatedData);
		return redirect('satker');
	}	

	public function show($id){
		$satker = Satker::findOrFail($id);
		return view('satker.satkerform',['row' => $satker,'action' => 'detail']);
	}

	public function edit($id){
		$satker = Satker::findOrFail($id);
		return view('satker.satkerform',['row' => $satker,'action' => 'update']);
	}

	public function update(Request $request){

		$validatedData = $request->validate([
			'kode' => 'required|numeric',
			'nama' => 'required|max:255',
			'alamat' => 'required',
			'keterangan' => 'required',

		]);

		Satker::whereId($request -> id)->update($validatedData);
		return redirect('/satker');
	}

	public function delete($id){
		$satker = Satker::findOrFail($id);
		return view('satker.satkerform',['row' => $satker,'action' => 'delete']);
	}

	public function destroy($id){
		$satker = Satker::findOrFail($id);
		$satker -> delete();
		return redirect('/satker');
	}
}
