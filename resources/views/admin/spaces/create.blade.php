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
            <?php echo sys_get_temp_dir(); ?>
            <form method="POST" action="{{ route('spaces.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label" for="title">Title</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label" for="description">Description</label>
                            <div class="col-md-4">
                                <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label" for="image">Image</label>
                            <div class="col-md-4">
                                <input type="file" id="image" name="image" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3 offset-md-3 container-buttons-create">
                                <button type="submit" class="btn btn-primary">Save</button>
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