{{-- @dd($articles->category); --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Article') }}</div>
                <div class="text-start p-3">
                    <a href="/admin/article/create" class="btn btn-primary px-5">Create Article</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table id="table" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Content</th>
                                <th scope="col">Category</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1 ?>
                            @foreach($articles as $value)
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>{{ $value->title }}</td>
                                <td>
                                    <span class="d-inline-block text-truncate" style="max-width: 150px;">
                                        {{ $value->content }}
                                    </span>
                                </td>
                                <td>{{ $value->category->name }}</td>
                                <td><img src="{{ asset('public/images/' . $value->image) }}" alt="">
                                </td>
                                <td>
                                    <form action='{{ "/admin/article/" . $value->id }}' method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            data-method="DELETE">Delete</button>
                                    </form>
                                    <a href="#" class="btn btn-success">Show</a>
                                </td>
                            </tr>
                            <?php $i++ ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
    $('#table').DataTable();
});
</script>
@endpush