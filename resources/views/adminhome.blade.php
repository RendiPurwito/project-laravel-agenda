@extends('layout.voler')
@section('title', 'Admin Home Page')
@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <h1>{{$jumlahmapel}}</h1>
                <a href="{{route('mapel')}}" class="text-white"> Mata Pelajaran</a>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <h1>{{$jumlahguru}}</h1>
                <a href="{{route('mapel')}}" class="text-white">Guru</a>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <h1>{{$jumlahkelas}}</h1>
                <a href="{{route('mapel')}}" class="text-white">Kelas</a>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
            <div class="card-body">
                <h1>{{$jumlahagenda}}</h1>
                <a href="{{route('mapel')}}" class="text-white">Agenda</a>
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
@endsection