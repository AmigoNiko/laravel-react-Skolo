<!-- resources/views/userInformation/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>View User Information</h1>

        <table class="table">
            <tr>
                <th>ID:</th>
                <td>{{ $userInformation->id }}</td>
            </tr>
            <tr>
                <th>Name:</th>
                <td>{{ $userInformation->name }}</td>
            </tr>
            <tr>
                <th>Path:</th>
                <td>{{ $userInformation->path }}</td>
            </tr>
            <tr>
                <th>Color:</th>
                <td>{{ $userInformation->color }}</td>
            </tr>
        </table>

        <a href="{{ route('userInformation.edit', $userInformation->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('userInformation.destroy', $userInformation->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <a href="{{ route('userInformation.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
@endsection
