@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>All Categories</h4>
                    <div class="card-header-action">
                        <a href="{{ route('category.create') }}" class="btn btn-primary">
                            Create Category
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="mb-3 table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Category</th>
                                
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->status }}</td>
                                    <td>{{ $category->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <a class="mr-3 btn btn-primary btn-sm mr-2"
                                            href="{{ route('category.edit', ['category' => $category->id]) }}">Edit</a>

                                        @if ($category->confessions()->count() == 0)
                                            <form style="display: inline" action="{{ route('category.destroy', ['category' => $category]) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return(confirm('Delete?'))" class="text-danger">Delete</button>
                                            </form>
                                        @endif
                                    </td>
                                    {{-- <td>
                                        <button class="btn btn-info btn-sm dropdown-toggle" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Small button
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Separated link</a>
                                        </div>
                                    </td> --}}

                                </tr>

                            @empty
                            @endforelse
                        </tbody>
                    </table>

                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    @endsection
