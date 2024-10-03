@extends('admin.master')

@section('title', 'Dashboard | ' . env('APP_NAME'))

@section('content')



    <form action="{{ route('admin.notify') }}" method="POST">
        @csrf
        <button class="btn btn-primary">Notify</button>
    </form>

    <div class="noti-result"></div>



@endsection

@section('scripts')
@vite('resources/js/bootstrap.js')
@endsection
