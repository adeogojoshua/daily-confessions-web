@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>All Confessions</h4>
                    <div class="card-header-action">
                        <a href="{{ route('confession.create') }}" class="btn btn-primary">
                            Create Confession
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Category</th>
                                <th scope="col">Confession</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($confessions as $confession)
                                <tr>
                                    <td>{{ $confession->category->title }}</td>
                                    <td>{{ $confession->body }}</td>
                                    <td>{{ $confession->status }}</td>
                                    <td>{{ $confession->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <a class="mr-3 btn btn-primary btn-sm mr-2"
                                            href="{{ route('confession.edit', ['confession' => $confession->id]) }}">Edit</a>

                                        
                                            <form style="display: inline" action="{{ route('confession.destroy', ['confession' => $confession]) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return(confirm('Delete?'))" class="text-danger">Delete</button>
                                            </form>
                                    </td>
                                </tr>

                            @empty
                            @endforelse
                        </tbody>
                    </table>

                    {{ $confessions->links() }}
                </div>
            </div>
        </div>
    @endsection
