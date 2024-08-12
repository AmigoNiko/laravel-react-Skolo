<!-- resources/views/userInformation/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New User Information</h1>

        <form action="{{ route('userInformation.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="path">Path:</label>
                <input type="text" class="form-control" id="path" name="path" required>
            </div>

            <div class="form-group">
                <label for="color">Color:</label>
                <input type="text" class="form-control" id="color" name="color" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
