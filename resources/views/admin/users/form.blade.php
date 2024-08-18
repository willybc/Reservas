@extends('layouts.administrator')

@section('content')
<div class="container-fluid container-dashboard" style="padding-right: 1.5rem; padding-left: 1.5rem;">
    <div class="row row-dashboard">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ isset($user) ? 'Editar Usuario' : 'Crear Usuario'}}</h4>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="card">
        <div class="card-body">
            <form action="{{ isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($user))
                    @method('PUT')
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label" for="title">Nombre</label>
                            <div class="col-md-4">
                                <input type="text" name="name" class="form-control" id="name"
                                    value="{{ isset($user) ? $user->name : old('name') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label" for="email">E-mail</label>
                            <div class="col-md-4">
                                <input type="email" name="email" class="form-control" id="email"
                                    value="{{ isset($user) ? $user->email : old('email') }}" required>
                            </div>
                        </div>

                        <!-- Rol -->

                        <!-- Password -->
                        
                        
                        <div class="row mb-3">
                            <div class="col-md-3 offset-md-3 container-buttons-create">
                                <button type="submit"
                                    class="btn btn-primary">{{ isset($user) ? 'Actualizar Usuario' : 'Crear Usuario' }}</button>
                                <a href="{{ route('admin.users') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
            </form>
        </div>
    </div>

</div>

@endsection