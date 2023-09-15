@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Create Confession</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('confession.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-md-3 mb-3">
                                <label>Category</label>
                                <select name="category_id" class="form-control">
                                    @forelse ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @empty
                                        
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-3 mb-3">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label>Confession</label>
                                <textarea class='form-control' name="confession" required></textarea>
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