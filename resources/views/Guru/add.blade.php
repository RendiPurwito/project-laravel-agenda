@extends('layout.voler')

@section('title', 'Tambah Data Guru')

@section('content')

<div class="container">
    <h1 class="text-center mb-4">Tambah Data Guru</h1>


    <section id="multiple-column-form">
        <div class="row match-height justify-content-center">
            <div class="col-10">
                <div class="card pt-3">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="/insertdataguru" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="row justify-content-center">
                                    <div class="col-md-5 col-10">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">Nama</label>
                                            <input type="text" id="first-name-column" name="nama_guru"
                                                class="form-control" placeholder="Nama" name="fname-column">
                                            @error('nama_guru')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-10">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">NIP</label>
                                            <input type="text" id="first-name-column" name="nip" class="form-control"
                                                placeholder="NIP" name="fname-column">
                                            @error('nip')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-10">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">Mata Pelajaran</label>
                                            <select class="form-select" name="mapel_id">
                                                <option selected>Select Mata Pelajaran</option>
                                                @foreach($datamapel as $data)
                                                <option value="{{$data->id}}">{{$data->mapel}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-10">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">Username</label>
                                            <input list="browsers" name="user_id" class="form-control"
                                                id="exampleInputEmail1">
                                            @foreach($datauser as $data)
                                            <datalist id="browsers">
                                                <option value="{{$data->id}}">{{$data->email}}</option>
                                                @endforeach
                                                @error('user_id')
                                                <div class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-10 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection