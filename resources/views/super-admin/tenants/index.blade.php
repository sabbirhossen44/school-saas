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
                    <a href="{{ route('tenant.create') }}" class="btn btn-shadow btn-outline-primary mr-3 ms-auto">
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
                                            <th><strong>School Name</strong></th>
                                            <th><strong>Admin Name</strong></th>
                                            <th><strong>Email</strong></th>
                                            <th><strong>Domain Name</strong></th>
                                            <th><strong>Database</strong></th>
                                            <th><strong>Status</strong></th>
                                            <th><strong>Action</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tenants ?? [] as $tenant)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    {{ $tenant->name }}
                                                </td>
                                                <td>
                                                    {{ $tenant->admin->name }}
                                                </td>
                                                <td>
                                                    {{ $tenant->admin->email }}
                                                </td>
                                                <td>
                                                    {{ $tenant->domain }}
                                                </td>
                                                <td>
                                                    {{ $tenant->database }}
                                                </td>

                                                <td class="tableStatus">
                                                    @if (!$tenant->status)
                                                        <div class="statusItem">
                                                            <div class="circleDot animatedPending"></div>
                                                            <div class="statusText">
                                                                <span class="statusPending">Deactivate</span>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="statusItem">
                                                            <div class="circleDot animatedCompleted"></div>
                                                            <div class="statusText">
                                                                <span class="statusconfirm">Active</span>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td class="tableAction">
                                                    <div class="action-icon">
                                                        <a href="#" class="circleIcon btn-sm showUser"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-custom-class="custom-tooltip" title="View branch info">
                                                            <img src="{{ asset('assets/images/icon/eye.svg') }}"
                                                                alt="View branch info">
                                                        </a>
                                                        @if (!$tenant->status)
                                                            <a class="circleIcon btn-sm" data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                data-bs-custom-class="custom-tooltip"
                                                                data-bs-title="Restore company" href="#"><i
                                                                    class="bi bi-arrow-counterclockwise Circleicon"></i></a>
                                                        @else
                                                            <a class="circleIcon btn-sm" data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                data-bs-custom-class="custom-tooltip"
                                                                data-bs-title="Edit company" href="{{ route('tenant.edit', $tenant->id) }}"><img
                                                                    src="{{ asset('assets/images/icon/edit.svg') }}"
                                                                    alt="icon"></a>

                                                            <a class="circleIcon btn-sm" data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                data-bs-custom-class="custom-tooltip"
                                                                data-bs-title="Suspend company" href="#"
                                                                onclick="deleteAction('')"><img
                                                                    src="{{ asset('assets/images/icon/user-ban.svg') }}"
                                                                    alt="icon"></a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
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
    <script></script>
@endpush
