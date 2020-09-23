@extends('home')

@section('style')
	<style type="text/css">
        .form-control {
            display: block;
            width: 100%;
            height: calc(2.125rem + 2px);
            padding: .375rem .75rem;
            font-size: 13px;
            font-weight: 400;
            line-height: 1.25rem;
            color: #3c4d62;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #dbdfea;
            border-radius: 4px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .form-label {
            font-size: 13px;
            font-weight: 500;
            color: #344357;
            margin-bottom: .5rem;
        }
        .form-group:last-child {
            margin-bottom: 0;
        }
        .btn {
            display: inline-block;
            font-weight: 700;
            color: #526484;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0.4375rem 1.125rem;
            font-size: 0.8125rem;
            line-height: 1.25rem;
            border-radius: 4px;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        .btn-primary {
            color: #fff;
            background-color: #0e0c96;
            border-color: #0e0c96;
        }
        .btn-primary:hover {
            color: #fff;
            background-color: #ff005c;
            border-color: #ff005c;
        }
        .btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active, .show > .btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #ff005c;
            border-color: #ff005c;
        }
        .container {
            padding-left: 0px;
            padding-right: 0px;
        }
		#wrapper {
            overflow-x: hidden;
         }

        #sidebar-wrapper {
          min-height: 100vh;
          margin-left: -16rem;
          -webkit-transition: margin .25s ease-out;
          -moz-transition: margin .25s ease-out;
          -o-transition: margin .25s ease-out;
          transition: margin .25s ease-out;
        }

        #sidebar-wrapper .sidebar-heading {
          padding: 0.875rem 1.25rem;
          font-size: 1.2rem;
        }

        #sidebar-wrapper .list-group {
          width: 15.4rem;
        }

        #page-content-wrapper {
          min-width: 100vw;
        }

        #wrapper.toggled #sidebar-wrapper {
          margin-left: 0;
        }

        @media (min-width: 768px) {
          #sidebar-wrapper {
            margin-left: 0;
          }

          #page-content-wrapper {
            min-width: 0;
            width: 100%;
          }

          #wrapper.toggled #sidebar-wrapper {
            margin-left: -15rem;
          }
        }
        .list-group-flush>.list-group-item  {
            font-size: 13px;
            color: #ced4da;
            border-color: #08084a;
        }
        a.bg-theme-blue:focus, a.bg-theme-blue:hover, button.bg-theme-blue:focus, button.bg-theme-blue:hover {
            color: #fff;
            background-color: #212145!important;
        }
        .list-group-item.active {
            color: #FF005C;
            font-weight: bold;
            background: #fff;
            background-color: #212145!important;
            border: none;
        }
        .navbar.bg-light {
            background: #fff !important;
             box-shadow: none; 
        }
        .user-phn {
            font-size: 12px;
            color: #a5a5a5;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }
        .user-name {
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 15px;
        }
        .sidebar-heading {
            text-align: center;
            background: #0f0f4b;
            border-bottom: 2px solid #fff;
        }
        .user-img {
            margin-bottom: 20px;
        }
        .user-img img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 1px solid #6c757d;
        }
        .bg-theme-blue {
            background-color: #07072d!important
        }
        .navbar-toggler {
            padding: .25rem 1.75rem;
        }
        .logout-btn {
            color: #07072d!important;
            font-weight: bold;
            font-size: 13px;
            border: 1px solid #07072d;
            border-radius: 5px;
            padding: 6px 20px!important;
        }
        .logout-btn:hover {
            background: #07072d;
            color: #fff!important;
            box-shadow: 1px 1px 3px #0000004d;
        }
        .url-class {
            font-size: 12px;
            color: #a5a5a5;
            letter-spacing: 1px;
        }
        .profile-image-div {
            width: 100px;
        }
        .emp-profile{
            padding: 10px 3%;
            margin-bottom: 3%;
            border-radius: 0.5rem;
            background: #fff;
        }
        .profile-img{
            text-align: center;
        }
        .profile-img img{
            width: 70%;
            height: 100%;
        }
        .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -20%;
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #212529b8;
        }
        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }
        .profile-head h5{
            color: #333;
        }
        .profile-head h6{
            color: #0062cc;
        }
        .profile-edit-btn{
            border: 1px solid #a5a5a5;
            border-radius: 1.5rem;
            padding: 8px 25px;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
            font-size: 13px;
        }
        .profile-edit-btn:hover {
            background: #a5a5a5;
            text-decoration: none;
            color: #fff;
        }
        .proile-rating{
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }
        .proile-rating span{
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }
        .profile-head .nav-tabs{
            margin-bottom:5%;
        }
        .profile-head .nav-tabs .nav-link{
            font-weight:600;
            border: none;
            font-size: 14px;
        }
        .profile-head .nav-tabs .nav-link.active{
            border: none;
            border-bottom:2px solid #0062cc;
        }
        .profile-work{
            padding: 14%;
            margin-top: -15%;
        }
        .profile-work p{
            font-size: 12px;
            color: #818182;
            font-weight: 600;
            margin-top: 10%;
        }
        .profile-work a{
            text-decoration: none;
            color: #495057;
            font-weight: 600;
            font-size: 14px;
        }
        .profile-work ul{
            list-style: none;
        }
        .profile-tab label{
            font-weight: 600;
            font-size: 14px;
        }
        .profile-tab p{
            font-weight: 400;
            color: #6c757d;
            font-size: 13px;
        }
        .custom-edit-btn {
            margin-top: 25px;
            text-align: center;
        }
        .custom-user-div h5 {
            font-weight: 900;
            color: #495057;
        }
        .custom-info-div {
            border-left: 1px solid #e9ecef;
        }
        .custom-row-modal {
            padding: 20px;
        }
        .modal-dialog .modal-content .modal-header {
            position: initial;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #dbdfea;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px;
        }
        .modal-dialog .modal-content .modal-body {
            position: relative;
            flex: 1 1 auto;
            padding: 1.25rem;
            max-height: auto;
            height: auto;
        }
        .modal-content {
            position: relative;
            min-height: 40px;
            box-shadow: 0px 0px 1px 0px rgba(82, 100, 132, 0.2), 0px 8px 15.52px 0.48px rgba(28, 43, 70, 0.15);
        }
        .modal-content > .close {
            position: absolute;
            top: .75rem;
            right: .75rem;
            height: 2.25rem;
            width: 2.25rem;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            color: #526484;
            z-index: 1;
            transition: all .3s;
        }

	</style>

@endsection

@section('user-content')
	<h2 class="mt-4">Profile</h2>
    {{-- <div class="card-body">
        @include('partials.alert')
    </div> --}}
    <div class="container emp-profile mt-5">
        <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            @if (Auth::user()->image)
                                <img src="{{ asset(Auth::user()->image) }}" alt="Admin" width="150">
                            @else
                                <img src="{{ asset('public/assets/images/user/avatar.png') }}" alt="Admin" width="150">
                            @endif
                            
                        </div>
                        <div class="custom-edit-btn">
                            <a href="#editModal{{ Auth::user()->id }}" data-toggle="modal" class="profile-edit-btn"/>Edit Profile</a>
                        </div>
                        
                    </div>
                    <div class="col-md-6" style="border-left: 1px solid #a5a5a5;">
                        <div class="profile-head">
                            <div class="custom-user-div" style="margin-bottom: 50px;">
                                <h5>{{ Auth::user()->name }}</h5>
                            </div>
                                    
                                    {{-- <h6>
                                        Web Developer and Designer
                                    </h6>
                                    <p class="proile-rating">RANKINGS : <span>8/10</span></p> --}}
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true"><i class="fa fa-user-circle-o" style="margin-right: 10px;"></i> Personal Information</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="false"><i class="fa fa-map-marker" style="margin-right: 10px;"></i> Shipping Address</a>
                                </li>
                            </ul>

                            <div class="tab-content profile-tab" id="myTabContent">
                                <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>User Id</label>
                                        </div>
                                        <div class="col-md-6 custom-info-div">
                                            <p>{{ Auth::user()->userID }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-6 custom-info-div">
                                            <p>{{ Auth::user()->name }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Phone</label>
                                        </div>
                                        <div class="col-md-6 custom-info-div">
                                            <p>{{ Auth::user()->phone }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-6 custom-info-div">
                                            <p>{{ Auth::user()->email }}</p>
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-md-6">
                                            <label>Profession</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>Web Developer and Designer</p>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Street Address</label>
                                                </div>
                                                <div class="col-md-6 custom-info-div">
                                                    <p>{{ Auth::user()->street_address }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Division</label>
                                                </div>
                                                <div class="col-md-6 custom-info-div">
                                                    <p>{{ Auth::user()->division }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>District</label>
                                                </div>
                                                <div class="col-md-6 custom-info-div">
                                                    <p>{{ Auth::user()->district }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Thana/Zone</label>
                                                </div>
                                                <div class="col-md-6 custom-info-div">
                                                    <p>{{ Auth::user()->zone }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Zip</label>
                                                </div>
                                                <div class="col-md-6 custom-info-div">
                                                    <p>{{ Auth::user()->postal_code }}</p>
                                                </div>
                                            </div>
                                            
                                            {{-- <div class="row">
                                                <div class="col-md-6">
                                                    <label>Shipping Address</label>
                                                </div>
                                                <div class="col-md-6 custom-info-div">
                                                    <p>Expert</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Availability</label>
                                                </div>
                                                <div class="col-md-6 custom-info-div">
                                                    <p>6 months</p>
                                                </div>
                                            </div> --}}
                                    {{-- <div class="row">
                                        <div class="col-md-12">
                                            <label>Your Bio</label><br/>
                                            <p>Your detail description</p>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>
                    </div> --}}
                </div>
                <div class="row">
                    <div class="col-md-4">
                        {{-- <div class="profile-work">
                            <p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div> --}}
                    </div>
                    <div class="col-md-8">
                        
                    </div>
                </div>
    </div>

    <!-- edit Modal start -->
    <div class="modal fade" tabindex="-1" id="editModal{{ Auth::user()->id }}">
        <div class="modal-dialog modal-dialog-top modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Edit Profile</h5>
                </div>
                {{-- <div class="modal-body"> --}}
                    <form action="{{ url('/user/edit', Auth::user()->id ) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row custom-row-modal">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="staticPhone" class="form-label">Phone</label>
                                    {{-- <div class="col-sm-10"> --}}
                                        <input type="text" readonly class="form-control" id="staticPhone" value="{{ Auth::user()->phone }}">
                                    {{-- </div> --}}
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="default-06">Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" value="{{ Auth::user()->name }}" id="name" name="name" placeholder="Brand Name" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="default-06">E-mail</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" value="{{ Auth::user()->email }}" id="email" name="email" placeholder="E-mail" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="default-06">Address</label>
                                    <div class="form-control-wrap">
                                        <textarea type="text" class="form-control" id="street_address" name="street_address" placeholder="Street Address" rows="2" >{{ Auth::user()->street_address }}</textarea>
                                    </div>
                                </div>
                                @php
                                    $divisionPath = 'public/assets/json/bd-divisions.json';
                                    $divisionJson = json_decode(file_get_contents($divisionPath), true);

                                    // $districtPath = 'public/assets/json/districts.json';
                                    // $districtJson = json_decode(file_get_contents($districtPath), true);

                                    // $upazilaPath = 'public/assets/json/upazilas.json';
                                    // $upazilaJson = json_decode(file_get_contents($upazilaPath), true);


                                @endphp
                                <div class="row" style="padding-bottom: 20px;">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <select class="form-control @error('division') is-invalid @enderror" name="division" id="division_id">
                                                    <option value="" style="color: #a5a5a5;">Select a division</option>
                                                    
                                                    @foreach ($divisionJson as $key => $value)
                                                        <option value="{{ $value['id'] }}" {{ ($value['name'] == Auth::user()->division) ? 'selected' : '' }}>{{ $value['name'] }}</option>
                                                    @endforeach
                                                 </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <select class="form-control @error('district') is-invalid @enderror" name="district" id="district_id">
                                                    <option value="" style="color: #a5a5a5;">Select a district</option>
                                                    {{-- @if (Auth::user()->district)
                                                        <option value="{{ $value['id'] }}" selected>{{ Auth::user()->district }}</option>
                                                    @endi --}}
                                                    {{-- @foreach ($districtJson as $key => $value)
                                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                                    @endforeach --}}
                                                 </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <select class="form-control @error('zone') is-invalid @enderror" name="zone" id="zone_id">
                                                    <option value="" style="color: #a5a5a5;">Select a thana/zone</option>
                                                    {{-- @foreach ($districtJson as $key => $value)
                                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                                    @endforeach --}}
                                                 </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="default-06">Image</label>
                                    @if (Auth::user()->image)
                                        <img src="{{ asset(Auth::user()->image) }}" alt="image" width="100" style="margin-bottom: 1.25rem; border-radius: 3px; display: block;">
                                    @endif
                                    
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image" style="font-size: 13px;">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row custom-row-modal">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-md btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                {{-- </div> --}}
            </div>
        </div>
    </div>
    <!-- edit Modal end -->
    
@endsection

@section('js')
	<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
  <script type="text/javascript">
        $("#division_id").change(function() {
            var division = $("#division_id").val();

            // send AJAX request to server with this division

            $("#district_id").html("");

            var option = "<option value='' style='color: #a5a5a5;'>Choose a district</option>";

            $.get("http://localhost/firstrays/get-districts/"+division, 
                function(data){
                    $.each(data, function(i, element) {
                        option += "<option value='"+ element.id +"'>"+ element.name +"</option>";
                    });

                    // var data = jQuery.parseJSON(JSON.stringify(data));

                    // data.forEach(function(element){
                    //     option += "<option value='"+ element.id +"'>"+ element.name +"</option>";
                    // });
                $("#district_id").html(option);
            });
        });

        $("#district_id").change(function() {
            var district = $("#district_id").val();

            // send AJAX request to server with this district

            $("#zone_id").html("");

            var option = "<option value='' style='color: #a5a5a5;'>Choose a thana/zone</option>";

            $.get("http://localhost/firstrays/get-zones/"+district, 
                function(data){
                    $.each(data, function(i, element) {
                        option += "<option value='"+ element.postCode +"'>"+ element.postOffice + " ("+ element.postCode +")"+"</option>";
                    });

                    // var data = jQuery.parseJSON(JSON.stringify(data));

                    // data.forEach(function(element){
                    //     option += "<option value='"+ element.id +"'>"+ element.name +"</option>";
                    // });
                $("#zone_id").html(option);
            });
        });

        
    </script>
@endsection