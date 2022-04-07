@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('admin.book.form.add') }}" class="btn btn-primary">Add Book</a>

        @if (Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif


        <div class="mt-3">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $book)
                        <tr>
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->serail }}</td>
                            <td>{{ $book->type }}</td>
                            <td>
                                <a class="btn btn-warning" href="{{ url('/admin/book/update', $book->id) }}">Edit</a>
                                <button book-id="{{ $book->id }}" book-name="{{ $book->name }}" type="button"
                                    class="btn btn-danger btn-delete" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Delete</button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>



    <!-- Modal -->
    <form action="{{ route('admin.book.remove') }}" method="post">
        @csrf
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">ຕ້ອງການລົບຂໍ້ມູນໜັງສື ນີ້ຫຼືບໍ ?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" disabled id="show-name" class="form-control">
                        <input type="hidden" id="show-id" name="code" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delet </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            $('.btn-delete').click(function() {
                let id = $(this).attr('book-id')
                let name = $(this).attr('book-name')

                $('#show-name').val(name)
                $('#show-id').val(id)
            })
        })
    </script>
@endsection
