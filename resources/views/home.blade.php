@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-success ">
                <h5 class="card-header text-bg-success">{{ $satuankerja }}</h5>
                <img src="{{ asset('/images/banner/pexels-burst-374720.jpg') }}"
                    alt="Card image cap">
                <div class="card-body">
                    <!-- <p class="card-text">SLIP.web.id adalah aplikasi berbasis website yang berguna bagi ASN Pusat untuk
                        memonitor informasi dan mencetak slip penghasilan yang terdiri dari gaji, tunjangan dan uang
                        makan dengan mudah dan aman, di mana saja serta kapan saja.</p> -->
                    <p class="card-text">Hak Cipta Pengadilan Tinggi Pontianak © 2024</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection