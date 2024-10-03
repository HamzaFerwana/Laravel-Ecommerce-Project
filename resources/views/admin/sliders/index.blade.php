@extends('admin.master')
@section('title', 'Sliders | ' . env('APP_NAME'))
@section('styles')

    <style>
        .timed-fade {
            opacity: 1;
            transition: opacity 1s ease-out;
            /* Adjust the duration and easing as needed */
        }

        .fade-out {
            opacity: 0;
        }
    </style>


@endsection

@section('content')

    <h1>Sliders</h1>
    <hr>
    @if (session('msg'))
        <div class="alert alert-{{ session('type') }} alert-dismissible fade show timed-fade" role="alert" id="sessionAlert">
            {{ session('msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr class="table-secondary">
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($sliders as $slider)
                <tr>
                    <td>{{ $slider->id }}</td>
                    <td>{{ $slider->title }}</td>
                    <td>{{ $slider->description }}</td>
                    <td>
                        <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="btn btn-sm btn-info"><i
                                class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.sliders.destroy', $slider->id) }}" class="d-inline" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <th colspan="4" class="text-center">No Data Found.</th>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $sliders->links() }}

@endsection



@section('scripts')
    <script>
        let alert = document.querySelector('#sessionAlert');
        setTimeout(() => {
            alert.classList.add('fade-out');
        }, 3000);

        setTimeout(() => {
            alert.remove();
        }, 4500);
    </script>
@stop
