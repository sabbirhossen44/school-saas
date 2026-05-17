@extends('layouts.app')

{{-- @section('title', $app_setting['name'] . ' | Branch List') --}}

@section('content')
    <!-- ****Body-Section***** -->
    <div class="app-main-outer">
        <div class="app-main-inner">
            <div
                class="page-title-actions px-3 py-3 d-flex justify-content-between align-items-center bg-white rounded mb-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tenant List</li>
                    </ol>
                </nav>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('tenants.create') }}" class="btn btn-shadow btn-outline-primary mr-3 ms-auto">
                        {{ '+ New Tenant' }}
                    </a>
                </div>
            </div>

            <div class="row" id="deleteTableItem">
                <div class="col-md-12">
                    <div class="card mb-5">
                        <div class="card-body">
                            <div class=" d-flex justify-content-end mb-3 align-items-center">
                                <form action="#" method="GET" class="w-25 me-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="inputGroupFile04"
                                            aria-describedby="inputGroupFileAddon04" aria-label="Upload"
                                            placeholder="Search" name="cat_search" value="{{ request('cat_search') }}">
                                        <button class="btn btn-outline-primary px-3" type="submit"
                                            id="inputGroupFileAddon04"><i class="bi bi-search"></i></button>
                                    </div>
                                </form>
                                <div class="d-flex justify-content-end">
                                    <a href="#" class="px-3">
                                        <i class="bi bi-arrow-counterclockwise"></i> Reset
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive company-table-wrapper">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th><strong>#</strong></th>
                                            <th><strong>Name</strong></th>
                                            <th><strong>Type</strong></th>
                                            <th><strong>Vat Id</strong></th>
                                            <th><strong>Fiscal Code</strong></th>
                                            <th><strong>Email</strong></th>
                                            <th><strong>Address</strong></th>
                                            <th><strong>Status</strong></th>
                                            <th><strong>Action</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ****End-Body-Section**** -->
        </div>
    </div>

    <div class="modal fade" id="userInfoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">User Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body" id="userInfoModalBody">
                    <!-- Content will be loaded here -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        /* Force horizontal scroll instead of page overflow */
        .company-table-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        /* Prevent text overlapping columns */
        .company-table-wrapper table {
            table-layout: fixed;
        }

        /* NAME column */
        .company-table-wrapper .tableName {
            width: 220px;
            white-space: normal;
            word-break: break-word;
        }

        /* TYPE column */
        .company-table-wrapper th:nth-child(3),
        .company-table-wrapper td:nth-child(3) {
            width: 120px;
            white-space: nowrap;
        }

        /* Ensure text doesn't overflow visually */
        .company-table-wrapper td {
            overflow: hidden;
        }


        /* Allow wrapping only where needed */
        .company-table-wrapper td.tableAddress,
        .company-table-wrapper td.tableEmail {
            white-space: normal;
            max-width: 220px;
            word-break: break-word;
        }

        /* Column widths */
        .company-table-wrapper th:nth-child(1),
        .company-table-wrapper td:nth-child(1) {
            width: 60px;
        }

        .company-table-wrapper th:nth-child(2),
        .company-table-wrapper td:nth-child(2) {
            width: 180px;
        }

        .company-table-wrapper th:nth-child(6),
        .company-table-wrapper td:nth-child(6) {
            width: 220px;
        }

        .company-table-wrapper th:nth-child(7),
        .company-table-wrapper td:nth-child(7) {
            width: 260px;
        }

        /* Action column stays compact */
        .company-table-wrapper th:last-child,
        .company-table-wrapper td:last-child {
            width: 140px;
            text-align: center;
        }

    </style>
@endpush


@push('scripts')
    <script>

    </script>
@endpush
