@extends('layouts.administrator')

@section('content')
<div class="container-fluid container-dashboard" style="padding-right: 1.5rem; padding-left: 1.5rem;">
    <div class="row row-dashboard">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>

    <div class="row row-dashboard">
        <div class="col-9">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="fa-solid fa-square-poll-horizontal widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0">Reservations</h5>
                            <h3 class="mt-3 mb-3">3</h3>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="fa-solid fa-square-poll-horizontal widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0">Assets</h5>
                            <h3 class="mt-3 mb-3">2</h3>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card widget-flat">
                        <div class="card-body">
                            <div class="float-end">
                                <i class="fa-solid fa-square-poll-horizontal widget-icon"></i>
                            </div>
                            <h5 class="text-muted fw-normal mt-0">Users</h5>
                            <h3 class="mt-3 mb-3">3</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row row-dashboard py-4">
        <div class="col-xl-6 col-lg-12 order-lg-2 order-xl-1">
            <div class="card">
                <div class="d-flex card-header justify-content-between align-items-center">
                    <h4 class="header-title">Latest reservations</h4>

                    <a href="" class="btn btn-sm btn-light">
                        Export
                        <i class="ms-1"></i>
                    </a>
                </div>

                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-hover mb-0">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">Aula tornavías</h5>
                                        <span class="text-muted font-13">Space</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">Comunicación</h5>
                                        <span class="text-muted font-13">User</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">19-07-2024, 14:00</h5>
                                        <span class="text-muted font-13">Beginning</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">19-07-2024, 15:00</h5>
                                        <span class="text-muted font-13">Ending</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">1hours</h5>
                                        <span class="text-muted font-13">Duration</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">Aula tornavías</h5>
                                        <span class="text-muted font-13">Space</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">Comunicación</h5>
                                        <span class="text-muted font-13">User</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">19-07-2024, 14:00</h5>
                                        <span class="text-muted font-13">Beginning</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">19-07-2024, 15:00</h5>
                                        <span class="text-muted font-13">Ending</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">1hours</h5>
                                        <span class="text-muted font-13">Duration</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">Aula tornavías</h5>
                                        <span class="text-muted font-13">Space</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">Comunicación</h5>
                                        <span class="text-muted font-13">User</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">19-07-2024, 14:00</h5>
                                        <span class="text-muted font-13">Beginning</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">19-07-2024, 15:00</h5>
                                        <span class="text-muted font-13">Ending</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">1hours</h5>
                                        <span class="text-muted font-13">Duration</span>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 order-lg-1">
            <div class="card">
                <div class="d-flex card-header justify-content-between align-items-center">
                    <h4 class="header-title">Space availability</h4>
                </div>

                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-hover mb-0">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">Aula tornavías</h5>
                                        <span class="text-muted font-13">Space</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">Comunicación</h5>
                                        <span class="text-muted font-13">User</span>
                                    </td>

                                </tr>

                                <tr>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">Aula tornavías</h5>
                                        <span class="text-muted font-13">Space</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">Comunicación</h5>
                                        <span class="text-muted font-13">User</span>
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6 order-lg-1">
            <div class="card">
                <div class="d-flex card-header justify-content-between align-items-center">
                    <h4 class="header-title">User reservations</h4>
                </div>

                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap table-hover mb-0">
                            <tbody>
                                <tr>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">Comunicación</h5>
                                        <span class="text-muted font-13">User</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">Aula Tanque</h5>
                                        <span class="text-muted font-13">Espacio</span>
                                    </td>

                                </tr>

                                <tr>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">Comunicación</h5>
                                        <span class="text-muted font-13">User</span>
                                    </td>
                                    <td>
                                        <h5 class="font-14 my-1 fw-normal">Aula Tanque</h5>
                                        <span class="text-muted font-13">Espacio</span>
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection