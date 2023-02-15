@extends('backend.app.app')

@section('content')
    @php
        $id = Auth::user()->id;
        $user = App\Models\User::findOrFail($id);
    @endphp
    <div class="content">
        <!-- Top Statistics -->
        <div class="row">
            <h1 class="card-title">Welcome to our Dashboard {{ $user->full_name }}</h1>
        </div>
    </div>
@endsection
