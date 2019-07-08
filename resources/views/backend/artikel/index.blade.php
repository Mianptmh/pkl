@extends('layouts.app')
@section('content')
    <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
            <h1>Smk Assalaam Bandung</h1>
            @if(Session::has('alert-success'))
                <div class="alert alert-success">
                    <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                </div>
            @endif
            <hr>
            <center><button><a href="#">Tambah Data</a></button></center>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Judul</th>
                    <th>Slug</th>
                    <th>Konten</th>
                    <th>Foto</th>
                    <th colspan="2">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($artikel as $datas)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $datas->judul }}</td>
                        <td>{{ $datas->slug }}</td>
                        <td>{{ $datas->konten }}</td>
                        <td>{{ $datas->foto }}</td>
                        <td>
                            <form action="{{ route('kontak.destroy', $datas->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{ route('kontak.edit',$datas->id) }}" class=" btn btn-sm btn-primary">Edit</a>
                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection