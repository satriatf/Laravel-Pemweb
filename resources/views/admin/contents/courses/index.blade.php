@extends('admin.main')

@section('content')
<div class="pagetitle">
    <h1>Courses</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Courses</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="card">
        <div class="card-body p-3">
            <a href="/admin/courses/create" class="btn btn-primary">+ Courses</a>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($courses as $courses)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $courses->name }}</td>
                        <td>{{ $courses->category }}</td>
                        <td>{{ $courses->desc }}</td>
                        <td class="d-flex">
                            <a href="/admin/courses/edit/{{ $courses->id }}" class="btn btn-warning me-2">Edit</a>
                            <form action="/admin/courses/delete/{{ $courses->id }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</section>
@endsection