@extends('layout.voler')

@section('title', 'Tambah Data Kelas')

@section('content')

<div class="container">
    <h1 class="text-center mb-4">Tambah Data Kelas</h1>
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body" style="width: 90%;">
                    <form action="/insertdatakelas" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Kelas</label>
                            <input type="text" name="kelas" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                            @error('kelas')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Wali Kelas</label>
                            <select class="form-control" name="guru_id">
                                <option selected>Select Guru</option>
                                @foreach($dataguru as $data)
                                <option value="{{$data->id}}">{{$data->nama_guru}}</option>
                                @endforeach
                            </select>
                            @error('nama_guru')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection