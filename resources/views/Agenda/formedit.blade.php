@extends('layout.voler')

@section('title', 'Form Edit')

@section('content')
<h1 class="text-center">Edit Data Agenda</h1>

<div class="container">
    <section id="multiple-column-form">
        <div class="row match-height justify-content-center">
            <div class="col-10">
                <div class="card pt-3">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" action="/updatedataagenda/{{ $data->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row justify-content-center">
                                    <div class="col-10">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">Nama Guru</label>
                                            <select class="form-select" name="guru_id" value="nama_guru">
                                                @foreach($dataguru as $datagr)
                                                    <option value="{{$datagr->id}}">{{$datagr->nama_guru}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-5 col-10">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">Mata Pelajaran</label>
                                            <input type="text" id="first-name-column" name="mapel" value="{{ $data->mapel }}" class="form-control" placeholder="Mata Pelajaran"
                                                name="fname-column">
                                        </div>
                                    </div> --}}

                                    <div class="col-md-5 col-10">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">Jam Mulai</label>
                                            <input type="text" id="first-name-column" name="jam_mulai" class="form-control" placeholder="Jam Mulai"
                                                name="fname-column" value="{{ $data->jam_mulai }}">
                                        </div>
                                    </div>

                                    <div class="col-md-5 col-10">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">Jam Selesai</label>
                                            <input type="text" id="first-name-column" name="jam_selesai" value="{{ $data->jam_selesai }}" class="form-control" name="fname-column">
                                        </div>
                                    </div>

                                    <div class="col-10">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">Absen Siswa</label>
                                            <textarea class="form-control" name="absensi" id="floatingTextarea2" rows="3">{{ $data->absensi  }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-5 col-10">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">Nama Kelas</label>
                                            <select class="form-select" name="kelas_id" value="">
                                                @foreach ($datakelas as $item)
                                                <option value="{{$item->id}}" selected>{{$item->kelas}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-5 col-10">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">Jenis Pembelajaran</label>
                                            <select class="form-select" aria-label="Default select example" name="jenis" value="{{$data->jenis}}">
                                                <option selected>{{ $data->jenis }}</option>
                                                <option value="PTM">PTM</option>
                                                <option value="PJJ">PJJ</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-10">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">Link Pembelajaran</label>
                                            <input type="text" id="first-name-column" name="link" value="{{ $data->link }}" class="form-control" name="fname-column">
                                        </div>
                                    </div>

                                    <div class="col-10">
                                        <label for="first-name-column" class="form-label">Dokumentasi</label>
                                        <div class="form-group">
                                            <img src="{{asset('images/'.$data->dokumentasi)}}" style="width: 100px">
                                        </div>
                                        <div class="form-group">
                                            <input type="file" name="dokumentasi">
                                        </div>
                                    </div>

                                    <div class="col-10">
                                        <div class="form-group">
                                            <label for="first-name-column" class="form-label">Keterangan</label>
                                            <textarea class="form-control" name="keterangan"  id="floatingTextarea2" rows="3">{{ $data->keterangan }}</textarea>
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