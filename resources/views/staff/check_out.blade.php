@extends('layouts.app')
@section('content')

    <div class="container">
        @if(session('message'))
            <div class="alert alert-info">{{ session('message') }}</div>
        @endif

        <form action="{{ route('staff.check-out') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="staff_id">Staff ID</label>
                <input type="text" name="staff_id" id="staff_id" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Check Out</button>
        </form>
    </div>
@endsection