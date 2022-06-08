@extends('layout.voler')
@section('title', 'Guru Home Page')
@section('content')

{{-- Form --}}
<section id="multiple-column-form">
    <div class="row match-height justify-content-center">
        <div class="col-10">
            <div class="card pt-3">
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" action="/storehome" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row justify-content-center">
                                <div class="col-md-5 col-10">
                                    <div class="form-group">
                                        <label for="first-name-column" class="form-label">Nama Guru</label>
                                        <select class="form-select" name="guru_id">
                                            <option selected>Select Guru</option>
                                            @foreach($dataguru as $guru)
                                                <option value="{{$guru->id}}">{{$guru->nama_guru}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- <div class="col-md-5 col-10">
                                    <div class="form-group">
                                        <label for="first-name-column" class="form-label">Mata Pelajaran</label>
                                        <input type="text" id="first-name-column" name="mapel" class="form-control" placeholder="Mata Pelajaran"
                                            name="fname-column">
                                        @error('mapel')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div> --}}
                               
                                <div class="col-md-5 col-10">
                                    <div class="form-group">
                                        <label for="first-name-column" class="form-label">Materi</label>
                                        <input type="text" id="first-name-column" name="materi" class="form-control" placeholder="Materi"
                                            name="fname-column">
                                        @error('materi')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-5 col-10">
                                    <div class="form-group">
                                        <label for="first-name-column" class="form-label">Jam Mulai</label>
                                        <input type="text" id="first-name-column" name="jam_mulai" class="form-control" placeholder="Jam Mulai"
                                            name="fname-column">
                                        @error('jam_mulai')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-5 col-10">
                                    <div class="form-group">
                                        <label for="first-name-column" class="form-label">Jam Selesai</label>
                                        <input type="text" id="first-name-column" name="jam_selesai" class="form-control" placeholder="Jam Selesai"
                                            name="fname-column">
                                        @error('jam_selesai')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-10">
                                    <div class="form-group">
                                        <label for="first-name-column" class="form-label">Absen Siswa</label>
                                        <textarea class="form-control" name="absensi" id="floatingTextarea2" rows="3"></textarea>
                                        @error('absensi')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-5 col-10">
                                    <div class="form-group">
                                        <label for="first-name-column" class="form-label">Nama Kelas</label>
                                        <select class="form-select" name="kelas_id">
                                            <option selected>Select Kelas</option>
                                            @foreach($datakelas as $datakls)
                                            <option value="{{$datakls->id}}">{{$datakls->kelas}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-5 col-10">
                                    <div class="form-group">
                                        <label for="first-name-column" class="form-label">Jenis Pembelajaran</label>
                                        <select class="form-select" aria-label="Default select example" name="jenis">
                                            <option selected>Jenis Pembelajaran</option>
                                            <option value="ptm">PTM</option>
                                            <option value="pjj">PJJ</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-5 col-10">
                                    <div class="form-group">
                                        <label for="first-name-column" class="form-label">Link Pembelajaran</label>
                                        <input type="text" id="first-name-column" name="link" class="form-control" placeholder="Link Pembelajaran"
                                            name="fname-column">
                                    </div>
                                </div>

                                <div class="col-md-5 col-10">
                                    <div class="form-group">
                                        <label for="first-name-column" class="form-label">Dokumentasi</label>
                                        <input type="file" id="first-name-column" name="dokumentasi" class="form-control" name="fname-column">
                                        @error('dokumentasi')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-10">
                                    <div class="form-group">
                                        <label for="first-name-column" class="form-label">Keterangan</label>
                                        <textarea class="form-control" name="keterangan" id="floatingTextarea2" rows="3"></textarea>
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

{{-- @dd($data) --}}
{{-- Table --}}
<section class="section">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class='table table-hover' id="table1">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Guru</th>
                            <th scope="col">MaPel</th>
                            <th scope="col">Materi</th>
                            <th scope="col">Jam Mulai</th>
                            <th scope="col">Jam Selesai</th>
                            <th scope="col">Absensi</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Link</th>
                            <th scope="col">Dokumentasi</th>
                            <th scope="col">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($data as $index => $row)
                        <tr>
                            <th scope="row">{{ $index + $data->firstItem() }}</th>
                            <td>{{$row->nama_guru}}</td>
                            <td>{{$row->mapel}}</td>
                            <td>{{$row->materi}}</td>
                            <td>{{$row->jam_mulai}}</td>
                            <td>{{$row->jam_selesai}}</td>
                            <td>{{$row->absensi}}</td>
                            <td>{{$row->kelasagenda->kelas}}</td>
                            <td>{{$row->jenis}}</td>
                            <td>{{$row->link}}</td>
                            <td>
                                <a href="{{asset('images/'.$row->dokumentasi)}}" target="_blank"
                                    rel="noopener noreferrer">Lihat Gambar</a>
                                {{-- <img src="{{asset('images/'.$row->dokumentasi)}}" style="width: 70px"> --}}
                            </td>
                            <td>{{ $row->keterangan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
        </div>
    </div>
</section>
@endsection