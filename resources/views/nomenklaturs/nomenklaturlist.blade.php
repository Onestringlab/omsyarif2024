@extends('layouts.app')

@section('title')
Data Nomenklaturs
@endsection

@section('content')
<div class="container">
    <div class="card border-success">
        <h5 class="card-header text-bg-success">Nomenklatur Potongan</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover ">
                    <tbody>
                        <tr>
                            <td width="100px">P1</td>
                            <td>{{ $row->p1 }}</td>
                        </tr>
                        <tr>
                            <td>P2</td>
                            <td>{{ $row->p2 }}</td>
                        </tr>
                        <tr>
                            <td>P3</td>
                            <td>{{ $row->p3 }}</td>
                        </tr>
                        <tr>
                            <td>P4</td>
                            <td>{{ $row->p4 }}</td>
                        </tr>
                        <tr>
                            <td>P5</td>
                            <td>{{ $row->p5 }}</td>
                        </tr>
                        <tr>
                            <td>P6</td>
                            <td>{{ $row->p6 }}</td>
                        </tr>
                        <tr>
                            <td>P7</td>
                            <td>{{ $row->p7 }}</td>
                        </tr>
                        <tr>
                            <td>P8</td>
                            <td>{{ $row->p8 }}</td>
                        </tr>
                        <tr>
                            <td>P9</td>
                            <td>{{ $row->p9 }}</td>
                        </tr>
                        <tr>
                            <td>P10</td>
                            <td>{{ $row->p10 }}</td>
                        </tr>
                        <tr>
                            <td>P11</td>
                            <td>{{ $row->p11 }}</td>
                        </tr>
                        <tr>
                            <td>P12</td>
                            <td>{{ $row->p12 }}</td>
                        </tr>
                        <tr>
                            <td>P13</td>
                            <td>{{ $row->p13 }}</td>
                        </tr>
                        <tr>
                            <td>P14</td>
                            <td>{{ $row->p14 }}</td>
                        </tr>
                        <tr>
                            <td>P15</td>
                            <td>{{ $row->p15 }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <a href="{{asset('/')}}nomenklatur/{{ $row->id }}/edit" class="btn btn-warning">Edit</a>
                                <a href="{{asset('/')}}nomenklatur/{{ $row->id }}/delete" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection