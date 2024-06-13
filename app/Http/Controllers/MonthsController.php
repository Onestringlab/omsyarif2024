<?php

namespace App\Http\Controllers;

use App\Models\Months;
use App\Models\Salaries;
use App\Models\Presence;
use App\Models\Grand;
use App\Models\Allowances;
use Illuminate\Http\Request;

class MonthsController extends Controller
{

  public function index()
  {
    $rows = Months::orderBy('created_at', 'DESC')->get();
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
    // $months->id = $request->id;
    $months->month = $request->month;
    $months->year = $request->year;
    // $months->created_at = $request->created_at;
    // $months->updated_at = $request->updated_at;
    $months->save();
    return redirect('/months');
  }

  public function show($id)
  {
    $months = Months::find($id);
    return view('months/monthsform', ['row' => $months, 'action' => 'detail']);
  }

  public function edit($id)
  {
    $months = Months::find($id);
    return view('months/monthsform', ['row' => $months, 'action' => 'update']);
  }

  public function update(Request $request)
  {
    $months = Months::find($request->id);
    // $months->id = $request->id;
    $months->month = $request->month;
    $months->year = $request->year;
    // $months->created_at = $request->created_at;
    // $months->updated_at = $request->updated_at;
    $months->save();
    return redirect('/months');
  }

  public function delete($id)
  {
    $months = Months::find($id);
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
