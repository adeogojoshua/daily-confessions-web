@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Edit Category</h4>
                    {{-- <div class="card-header-action">
                        <a href="{{ route('category.create') }}" class="btn btn-primary">
                            Create Category
                        </a>
                    </div> --}}
                </div>
                <div class="card-body">
                    <form action="{{ route('category.update', ['category' => $category]) }}" method="POST">
                        @method("PUT")
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-md-6 mb-3">
                                <label>Category</label>
                                <input class='form-control' value="{{ $category->title }}" name="category" type="text" required />
                            </div>
                            <div class="col-sm-12 col-md-3 mb-3">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="Active" {{ $category->status == 'Active' ? 'selected' : '' }}>Active</option>
                                    <option value="Inactive" {{ $category->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-3 mb-3">
                                <br/>
                                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                            </div>
                        </div>                   
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection