@extends('admin.main')

@section('admin-style')
    <style type="text/css">
        .card-body {
            padding: 0px!important;
        }
        .custom-user-card {
            display: contents;
        }
        .custom-user-info {
            margin-top: 5px;
            margin-left: 0px!important;
        }
    </style>
@endsection

@section('content')
	<div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Customers</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="more-options"><em class="icon ni ni-more-v"></em></a>
                                                <div class="toggle-expand-content" data-content="more-options">
                                                    <ul class="nk-block-tools g-3">
                                                        {{-- <li>
                                                            <div class="form-control-wrap">
                                                                <div class="form-icon form-icon-right">
                                                                    <em class="icon ni ni-search"></em>
                                                                </div>
                                                                <input type="text" class="form-control" id="default-04" placeholder="Search by name">
                                                            </div>
                                                        </li> --}}
                                                        <li>
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-toggle="dropdown">Status</a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>Actived</span></a></li>
                                                                        <li><a href="#"><span>Inactived</span></a></li>
                                                                        <li><a href="#"><span>Blocked</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="nk-block-tools-opt">
                                                            <a href="#" class="btn btn-icon btn-primary d-md-none"><em class="icon ni ni-plus"></em></a>
                                                            <a href="#" class="btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Add</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="card-body">
                                    @include('partials.alert')
                                </div>
                                <div class="nk-block nk-block-lg">
                                        <div class="card card-preview">
                                            <div class="card-inner">
                                                <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                                    <thead>
                                                        <tr class="nk-tb-item nk-tb-head">
                                                            {{-- <th class="nk-tb-col nk-tb-col-check">
                                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                    <input type="checkbox" class="custom-control-input" id="uid">
                                                                    <label class="custom-control-label" for="uid"></label>
                                                                </div>
                                                            </th> --}}
                                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">#</span></th>
                                                            <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                                                            {{-- <th class="nk-tb-col tb-col-mb"><span class="sub-text">Balance</span></th> --}}
                                                            <th class="nk-tb-col"><span class="sub-text">Phone</span></th>
                                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Street Address</span></th>
                                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Division</span></th>
                                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">District</span></th>
                                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Thana</span></th>
                                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">ZIP</span></th>
                                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                                                            <th class="nk-tb-col nk-tb-col-tools text-right">
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php $num = 0; @endphp
                                                        @foreach ($users as $user)
                                                            <tr class="nk-tb-item">
                                                                {{--  <td class="nk-tb-col nk-tb-col-check">
                                                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                        <input type="checkbox" class="custom-control-input" id="uid1">
                                                                        <label class="custom-control-label" for="uid1"></label>
                                                                    </div>
                                                                </td> --}}
                                                                 <td class="nk-tb-col tb-col-md">
                                                                    <span>@php echo ++$num; @endphp</span>
                                                                </td>
                                                                <td class="nk-tb-col">
                                                                    <div class="user-card">
                                                                        <div class="user-avatar bg-dim-primary d-none d-sm-flex" style="background: none;">
                                                                            <div class="user-avatar sm" style="font-size: 14px; background: none;">
                                                                                @if (is_null($user->image))
                                                                                    <img src="{{ asset('public/assets/images/user/no-man.png') }}">
                                                                                @else
                                                                                    <img src="{{ $user->image }}">
                                                                                @endif
                                                                                
                                                                            </div>
                                                                        </div>
                                                                        <div class="user-info custom-user-info">
                                                                            <span class="tb-lead">{{ $user->name }}
                                                                                @if ($user->active)
                                                                                    <span class="dot dot-success d-md-none ml-1"></span>
                                                                                @else
                                                                                    <span class="dot dot-warning d-md-none ml-1"></span>
                                                                                @endif
                                                                            </span>
                                                                            <span>{{ $user->email }}</span>
                                                                            <span style="display: block; font-size: 10px;"><span style="font-weight: bold; color: #364a63;">UID: </span>{{ $user->userID }}</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                {{-- <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                                                                    <span class="tb-amount">35040.34 <span class="currency">USD</span></span>
                                                                </td> --}}
                                                                <td class="nk-tb-col">
                                                                    <span>{{ $user->phone }}</span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <span>
                                                                        @if ($user->street_address)
                                                                            {{ $user->street_address }}
                                                                        @else
                                                                        -
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <span>
                                                                        @if ($user->division)
                                                                            {{ $user->division }}
                                                                        @else
                                                                        -
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <span>
                                                                        @if ($user->district)
                                                                            {{ $user->district }}
                                                                        @else
                                                                        -
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <span>
                                                                        @if ($user->zone)
                                                                            {{ $user->zone }}
                                                                        @else
                                                                        -
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-md">
                                                                    <span>
                                                                        @if ($user->postal_code)
                                                                            {{ $user->postal_code }}
                                                                        @else
                                                                        -
                                                                        @endif
                                                                    </span>
                                                                </td>
                                                                {{-- <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                                                                    <ul class="list-status">
                                                                        <li><em class="icon text-success ni ni-check-circle"></em> <span>Email</span></li>
                                                                        <li><em class="icon ni ni-alert-circle"></em> <span>KYC</span></li>
                                                                    </ul>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-lg">
                                                                    <span>05 Oct 2019</span>
                                                                </td> --}}
                                                                @if ($user->active)
                                                                    <td class="nk-tb-col tb-col-md">
                                                                        <span class="tb-status text-success">Active</span>
                                                                    </td>
                                                                @else
                                                                    <td class="nk-tb-col tb-col-md">
                                                                        <span class="tb-status text-warning">Pending</span>
                                                                    </td>
                                                                @endif
                                                                {{-- <td class="nk-tb-col tb-col-md">
                                                                    <span class="tb-status text-success">Active</span>
                                                                </td> --}}
                                                                <td class="nk-tb-col nk-tb-col-tools">
                                                                    <ul class="nk-tb-actions gx-1">
                                                                        {{-- <li class="nk-tb-action-hidden">
                                                                            <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Wallet">
                                                                                <em class="icon ni ni-wallet-fill"></em>
                                                                            </a>
                                                                        </li> --}}
                                                                        <li class="nk-tb-action-hidden">
                                                                            <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Send Email">
                                                                                <em class="icon ni ni-mail-fill"></em>
                                                                            </a>
                                                                        </li>
                                                                        @if ($user->active)
                                                                            <form action="{{ url('/customer_status', $user->id) }}" method="post">
                                                                            @csrf
                                                                                <li class="nk-tb-action-hidden">
                                                                                    <button type="submit" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Suspend">
                                                                                        <em class="icon ni ni-user-cross-fill"></em>
                                                                                    </button>
                                                                                </li>
                                                                            </form>
                                                                        @else
                                                                            <form action="{{ url('/customer_status', $user->id) }}" method="post">
                                                                            @csrf
                                                                                <li class="nk-tb-action-hidden">
                                                                                    <button type="submit" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Activate">
                                                                                        <em class="icon ni ni-user-check-fill"></em>
                                                                                    </button>
                                                                                </li>
                                                                            </form>
                                                                        @endif
                                                                        {{-- <li class="nk-tb-action-hidden">
                                                                            <a href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Suspend">
                                                                                <em class="icon ni ni-user-cross-fill"></em>
                                                                            </a>
                                                                        </li> --}}
                                                                        <li>
                                                                            <div class="drodown">
                                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                                    <ul class="link-list-opt no-bdr">
                                                                                        <li><a href="#"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                                                        <li><a href="#"><em class="icon ni ni-repeat"></em><span>Orders</span></a></li>
                                                                                        <li><a href="#"><em class="icon ni ni-activity-round"></em><span>Activities</span></a></li>
                                                                                        <li class="divider"></li>
                                                                                        <li><a href="#"><em class="icon ni ni-na"></em><span>Suspend User</span></a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            </tr><!-- .nk-tb-item  -->
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><!-- .card-preview -->
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
@endsection

@section('admin-js')
    <script type="text/javascript">
        
    </script>
@endsection