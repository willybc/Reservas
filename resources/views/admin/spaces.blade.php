@extends('layouts.administrator')

@section('content')
<div class="container-fluid container-dashboard" style="padding-right: 1.5rem; padding-left: 1.5rem;">
    <!-- Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="page-title" style="margin-bottom: 1rem;">Spaces</h4>
                    
                    <x-filters.filter :isAdmin="true" :isPageUsers="false" :users="$users"/>

                    @include('admin.spaces.table')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection