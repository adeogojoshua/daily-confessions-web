@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Edit Confession</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('confession.update', ['confession' => $confession]) }}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="row">
                            <div class="col-sm-12 col-md-3 mb-3">
                                <label>Category</label>
                                <select name="category_id" class="form-control">
                                    @forelse ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $confession->category_id == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                    @empty
                                        
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-3 mb-3">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="Active" {{ $confession->status == 'Active' ? 'selected' : '' }}>Active</option>
                                    <option value="Inactive" {{ $confession->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label>Confession</label>
                                <textarea class='form-control' name="confession" required>{{ $confession->body }}</textarea>
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