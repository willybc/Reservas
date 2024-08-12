@extends('layouts.administrator')

@section('content')
<div class="container-fluid container-dashboard" style="padding-right: 1.5rem; padding-left: 1.5rem;">
    <div class="row row-dashboard">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Spaces</h4>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-xl-8">
                            <form class="row gy-2 gx-2 align-items-center justify-content-xl-start justify-content-between">
                                <div class="col-6">
                                    <label for="inputPassword2" class="visually-hidden">Search</label>
                                    <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                                </div>
                            </form>
                        </div>

                        <div class="col-xl-4">
                            <div class="text-xl-end mt-xl-0 mt-2">
                                <a href="{{ route('admin.spaces.create') }}" class="btn btn-danger mb-2 me-2">
                                    <i class="fa-solid fa-plus"></i>
                                    Add New Space
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive table-spaces">
                        <table class="table table-centered table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 20px;">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customCheck1">
                                            <label for="customCheck1" class="form-check-label">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th>Thumb</th>
                                    <th>Title</th>
                                    <th>Users</th>
                                    <th>Reservations</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($spaces as $space)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customCheck{{ $space-> id }}">
                                            <label for="customCheck{{ $space-> id }}" class="form-check-label">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="{{ asset('storage/' . $space-> image) }}" alt="thumb" title="contact-img" class="rounded me-3" height="100">
                                    </td>
                                    <td>
                                        {{ $space -> title }}
                                    </td>
                                    <td>
                                        <h5 class="my-0">{{ $space-> users_count ?? 'N/A' }}</h5>
                                    </td>
                                    <td>
                                        <h5 class="my-0">{{ $space-> reservations_count ?? 'N/A' }}</h5>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.spaces.edit', $space->id) }}" class="action-icon"> <i class="fa-solid fa-pen"></i></a>
                                        <a href="{{ route('admin.spaces.destroy', $space->id) }}" class="action-icon" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $space->id }}').submit();"> <i class="fa-solid fa-trash"></i></a>
                                        <form id="delete-form-{{ $space->id }}" action="{{ route('admin.spaces.destroy', $space->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if($spaces->isEmpty())
                        <p class="text-center">
                            No spaces found.
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>

@endsection