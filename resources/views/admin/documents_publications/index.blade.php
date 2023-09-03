@extends('admin.layouts.main')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 text-center">Dokumen dan Publikasi</h1>
    @if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="/admin/dokumen-publikasi/create" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                </span>
                <span class="text">Tambah</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="col-1 align-middle text-center">No</th>
                            <th class="col-7">Judul</th>
                            <th class="col-2 align-middle text-center">File</th>
                            <th class="col-2 align-middle text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td class="col-1 align-middle text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->title }}</td>
                            <td class="align-middle text-center">
                                <a href="{{ url('/file/download/' . $item->id) }}"
                                    class="btn btn-success btn-icon-split">
                                    <span class="text">Download</span>
                                </a>
                            </td>
                            <td class="align-middle text-center">
                                <a href="/admin/dokumen-publikasi/{{ $item->id }}/edit" class="btn btn-warning btn-circle"><i
                                        class="fa fa-keyboard" aria-hidden="true"></i></a>

                                <a class="btn btn-danger btn-circle" href="{{ url('/dokumen-publikasi/hapus/' . $item->id) }}"
                                    id="deleteButton">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection
