<!-- resources/views/userInformation/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User Information</h1>
        <a href="{{ route('userInformation.create') }}" class="btn btn-primary">Add New User Information</a>

        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Path</th>
                    <th>Color</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userInformation as $info)
                    <tr>
                        <td>{{ $info->id }}</td>
                        <td>{{ $info->name }}</td>
                        <td>{{ $info->path }}</td>
                        <td>{{ $info->color }}</td>
                        <td>
                            <a href="{{ route('userInformation.show', $info->id) }}" class="btn btn-info">View</a>
                            <a href="{{ route('userInformation.edit', $info->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('userInformation.destroy', $info->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
