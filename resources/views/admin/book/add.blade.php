@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{ route('admin.book.store') }}" method="post">
            @csrf
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Book Name</label>
                        <input class="form-control mb-3" type="text" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="">Serial</label>
                        <input class="form-control mb-3" type="text" name="serial" value="{{ old('serial') }}">
                        @error('serial')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="">Type</label>
                        <input class="form-control mb-3" type="text" name="type" value="{{ old('type') }}">
                        @error('type')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
