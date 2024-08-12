<!-- resources/views/userInformation/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit User Information</h1>

        <form action="{{ route('userInformation.update', $userInformation->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $userInformation->name }}" required>
            </div>

            <div class="form-group">
                <label for="path">Path:</label>
                <input type="text" class="form-control" id="path" name="path" value="{{ $userInformation->path }}" required>
            </div>

            <div class="form-group">
                <label for="color">Color:</label>
                <input type="text" class="form-control" id="color" name="color" value="{{ $userInformation->color }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
