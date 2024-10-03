@extends('admin.master')
@section('title', 'About | ' . env('APP_NAME'))

@section('content')

    <h1>About</h1>
    <hr>
    @if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
    </div>
    @endif
    <table class="table table-hover table-striped table-bordered">
        <thead>
            <th>ID</th>
            <th>Icon</th>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </thead>
        <tbody class="text-center">
            @forelse ($abouts as $about)
                <tr>
                    <td>{{ $about->id }}</td>
                    <td><?= $about->icon ?></td>
                    <td>{{ $about->title }}</td>
                    <td>{{ $about->description }}</td>
                    <td>
                        <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-sm btn-primary"><i
                                class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.about.destroy', $about->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <th colspan="5" class="text-center">No Data Found.</th>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $abouts->links() }}
















@endsection
