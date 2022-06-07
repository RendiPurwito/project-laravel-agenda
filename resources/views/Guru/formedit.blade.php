@extends('layout.voler')

@section('title', 'Form Edit')

@section('content')
<h1 class="text-center">Edit Data Guru</h1>

<div class="container">

    <section id="multiple-column-form">
        <div class="row match-height justify-content-center">
            <div class="col-10">
                <div class="card pt-3">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="/updatedataguru/{{ $data->id }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row justify-content-center">
                                    <div class="col-md-5 col-10">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">Nama</label>
                                            <input type="text" id="first-name-column" name="nama_guru"
                                                value="{{ $data->nama_guru }}" class="form-control" name="fname-column">
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-10">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">NIP</label>
                                            <input type="text" id="first-name-column" name="nip"
                                                value="{{ $data->nip }}" class="form-control" name="fname-column">
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">Mata Pelajaran</label>
                                            <select class="form-select" name="mapel_id" >
                                                <option selected>{{$data->mapel_id}}</option>
                                                @foreach ($datamapel as $item)
                                                <option value="{{$item->id}}">{{$item->mapel}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">Username</label>
                                            <input list="browsers" name="user_id" class="form-control"
                                                id="exampleInputEmail1" value="{{$data->user_id}}">
                                            @foreach($datauser as $data)
                                            <datalist id="browsers">
                                                <option value="{{$data->id}}">{{$data->email}}</option>
                                            @endforeach
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