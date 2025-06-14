@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Manajemen Tentang</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>Title</th>
                <td>{{ $about->title }}</td>
            </tr>
            <tr>
                <th>Deskripsi</th>
                <td>{{ $about->description }}</td>
            </tr>
            <tr>
                <th>Deskripsi 2</th>
                <td>{{ $about->description_2 }}</td>
            </tr>
            <tr>
                <th>Visi</th>
                <td>{{ $about->visi }}</td>
            </tr>
            <tr>
                <th>Misi</th>
                <td>{{ $about->misi }}</td>
            </tr>

            @foreach(['image1', 'image2', 'image3'] as $image)
                <tr>
                    <th>{{ ucfirst($image) }}</th>
                    <td>
                        @if($about->$image)
                            <img src="{{ asset('storage/' . $about->$image) }}" width="150">
                        @else
                            Tidak ada gambar
                        @endif
                    </td>
                </tr>
            @endforeach

            @foreach(['image4', 'image5'] as $image)
                <tr>
                    <th>{{ ucfirst($image) }}</th>
                    <td>
                        @if($about->$image)
                            <img src="{{ asset('storage/' . $about->$image) }}" width="150">
                        @else
                            Tidak ada gambar
                        @endif
                    </td>
                </tr>
            @endforeach

        </table>

        <a href="{{ route('admin.about.edit') }}" class="btn btn-primary">Edit</a>
    </div>
@endsection