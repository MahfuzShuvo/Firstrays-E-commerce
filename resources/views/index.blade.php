@extends('main')

@section('style')
    <style type="text/css">
        .modal-dialog {
  margin: 5% auto 8%;
  max-width: 1358px;
  width: 1358px;
}

@media only screen and (min-width: 1366px) and (max-width: 1600px) {
  .modal-dialog {
    width: 1145px;
    max-width: 1145px;
  }
}

@media only screen and (min-width: 1200px) and (max-width: 1365px) {
  .modal-dialog {
    width: 968px;    /*1145px*/
    max-width: 1145px;
  }
}

@media only screen and (min-width: 992px) and (max-width: 1199px) {
  .modal-dialog {
    width: 960px;
    max-width: 960px;
  }
}

@media only screen and (min-width: 768px) and (max-width: 991px) {
  .modal-dialog {
    width: 720px;
    max-width: 720px;
  }
}

@media only screen and (max-width: 767px) {
  .modal-dialog {
    width: 100%;
    max-width: 100%;
    padding: 35px 0;
  }
}

.modal-dialog .modal-content {
  border-radius: 0;
}

.modal-dialog .modal-content .modal-header {
  border: none;
  padding: 0;
  right: 25px;
  top: 10px;
  position: absolute;
  z-index: 9999;
}

@media only screen and (max-width: 767px) {
  .modal-dialog .modal-content .modal-header {
    right: 0px;
    top: -10px;
  }
}
.modal-dialog .modal-content .modal-header .close {
  color: #fff;
  cursor: pointer;
  opacity: 1;
  padding: 0;
  margin: 0;
  width: 30px;
  height: 30px;
  line-height: 30px;
  text-shadow: none;
  font-size: 11px;
  background: transparent;
  color: #737373;
  border-radius: 100%;
  border: 1px solid #eee;
  -webkit-transition:all 0.4s ease;
  -moz-transition:all 0.4s ease;
  transition:all 0.4s ease;
}
@media only screen and (max-width: 767px) {
  .modal-dialog .modal-content .modal-header .close {
    width: 34px;
    height: 34px;
    line-height: 34px;
    font-size: 15px;
  }
}

.modal-dialog .modal-content .modal-header .close:hover {
  color: #fff;
  border-color:transparent;
  background: #ff005c;
}
.modal-dialog .modal-content .modal-body {
  padding: 0px;
  /*overflow-y: auto;*/
  max-height: 510px;
  height: 700px;
}
.quickview-content {
  padding: 40px 40px;
}
@media only screen and (min-width: 992px) and (max-width: 1199px) {
  .quickview-content {
    padding: 15px 35px 20px;
  }
}

@media only screen and (min-width: 768px) and (max-width: 991px) {
  .quickview-content {
    padding: 20px 35px 35px;
  }
}

@media only screen and (max-width: 767px) {
  .quickview-content {
    padding: 15px 15px 15px;
  }
}
    </style>
@endsection

@section('content')
	{{-- slider start --}}
    @include('partials.slider')
    {{-- slider end --}}

    {{-- shop-service start --}}
    @include('partials.shop-service')
    {{-- shop-service end --}}

    {{-- small-banner start --}}
    @include('partials.small-banner')
    {{-- small-banner end --}}

    {{-- products start --}}
    @include('partials.products')
    {{-- products end --}}

    {{-- medium-banner start --}}
    @include('partials.medium-banner')
    {{-- medium-banner end --}}

    {{-- populer-products start --}}
    @include('partials.populer-products')
    {{-- populer-products end --}}

    {{-- shop-home-list start --}}
    @include('partials.shop-home-list')
    {{-- shop-home-list end --}}

    {{-- upcoming-product-countdown start --}}
    @include('partials.upcoming-product-countdown')
    {{-- upcoming-product-countdown end --}}

@endsection