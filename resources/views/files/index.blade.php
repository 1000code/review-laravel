@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-8">
            <table class="table">

                @if (Session::get('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($files as $file)
                        <tr>
                            <td>{{ $file->id }}</td>
                            <td>
                                <img src="{{ asset($file->path) }}" class="img-fluid">
                            </td>
                            <td>
                                <form action="{{ route('file.remove') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $file->id }}">
                                    <input type="hidden" name="path" value="{{ $file->path }}">
                                    <button class="btn btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="col-4">
            <form action="{{ route('file.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" name="mini" class="form-control">
                @error('file')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>
    </div>
@endsection
