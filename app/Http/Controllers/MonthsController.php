<?php

namespace App\Http\Controllers;

use App\Models\Months;
use App\Models\Salaries;
use App\Models\Presence;
use App\Models\Grand;
use App\Models\Allowances;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonthsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $rows = Months::orderBy('created_at', 'DESC')->where('satker',Auth::user()->satker)->get();
    return view('months/monthslist', ['rows' => $rows]);
  }

  public function create()
  {
    return view('months/monthsform', ['action' => 'insert']);
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'month' => 'required',
      'year' => 'required',
    ]);
    $months = new Months;
    $months->month = $request->month;
    $months->year = $request->year;
    $months->satker = Auth::user()->satker;
    $months->save();
    return redirect('/months');
  }

  public function show($id)
  {
    $months = Months::where('id',$id)->where('satker',Auth::user()->satker)->first();
    return view('months/monthsform', ['row' => $months, 'action' => 'detail']);
  }

  public function edit($id)
  {
    $months = Months::where('id',$id)->where('satker',Auth::user()->satker)->first();
    return view('months/monthsform', ['row' => $months, 'action' => 'update']);
  }

  public function update(Request $request)
  {
    $months = Months::find($request->id);
    // $months->id = $request->id;
    $months->month = $request->month;
    $months->year = $request->year;
    $months->save();
    return redirect('/months');
  }

  public function delete($id)
  {
    $months = Months::where('id',$id)->where('satker',Auth::user()->satker)->first();
    return view('months/monthsform', ['row' => $months, 'action' => 'delete']);
  }

  public function destroy($id)
  {
    Allowances::where('month_id', '=', $id)->delete();
    Salaries::where('month_id', '=', $id)->delete();
    Presence::where('month_id', '=', $id)->delete();
    Grand::where('month_id', '=', $id)->delete();
    $months = Months::find($id);
    $months->delete();
    return redirect('/months');
  }
}
