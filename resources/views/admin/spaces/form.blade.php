@extends('layouts.administrator')

@section('content')
<div class="container-fluid container-dashboard" style="padding-right: 1.5rem; padding-left: 1.5rem;">
    <div class="row row-dashboard">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Crear Espacio</h4>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="card">
        <div class="card-body">
            <form action="{{ isset($space) ? route('admin.spaces.update', $space->id) : route('admin.spaces.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($space))
                    @method('PUT')
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label" for="title">Title</label>
                            <div class="col-md-4">
                                <input type="text" name="title" class="form-control" id="title"
                                    value="{{ isset($space) ? $space->title : old('title') }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label" for="description">Description</label>
                            <div class="col-md-4">
                                <textarea name="description" class="form-control" id="description"
                                    required>{{ isset($space) ? $space->description : old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label" for="image">Image</label>
                            <div class="col-md-4">
                                <input type="file" id="image" name="image" class="form-control">
                                @if(isset($space) && $space->image)
                                    <img src="{{ asset('storage/' . $space->image) }}" alt="Image" class="img-fluid mt-2"
                                        height="100">
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3 offset-md-3 container-buttons-create">
                                <button type="submit"
                                    class="btn btn-primary">{{ isset($space) ? 'Update Space' : 'Create Space' }}</button>
                                <a href="{{ route('admin.spaces') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
            </form>
        </div>
    </div>

</div>

@endsection