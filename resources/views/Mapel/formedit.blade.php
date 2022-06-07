@extends('layout.voler')

@section('title', 'Form Edit Mapel')

@section('content')
<h1 class="text-center">Edit Data Mapel</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action="/updatedatamapel/{{ $data->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Mata Pelajaran</label>
                            <input type="text" name="mapel" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->mapel }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection