@extends('layouts.master')
@section('content')

    <!-- DataTables Example --> 
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="m-0 font-weight-bold text-primary">Informasi Data Image Slide Atas Home</h1>
            <button type="button" class="btn btn-primary btn-icon-split float-right" data-toggle="modal" data-target="#exampleModal">
            <span class="icon text-white-50">
                <i class="fas fa-flag"></i>
            </span>
            <span class="text">Tambah Data Image</span>
            </button>
        </div>

            <div class="card-body">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th>Judul Image 1</th>
                            <th>Image 1</th>
                            <th>Judul Image 2</th>
                            <th>Image 2</th>
                            <th>Judul Image 3</th>
                            <th>Image 3</th>
                        </tr>
                    </thead>

                    @php $i = 1; @endphp
                    @foreach ($data_pegawai as $pegawai)

                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td><a href="/pegawai/{{ $pegawai->id }}/profile"></a></td>
                    </tr>
                </table>
            </div>
    </div>   