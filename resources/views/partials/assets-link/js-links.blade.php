<!-- Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

{{-- Sweet alert CDN --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<!-- Jquery -->
<script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('public/assets/js/jquery-migrate-3.0.0.js')}}"></script>
<script src="{{asset('public/assets/js/jquery-ui.min.js')}}"></script>

<!-- Owl Carousel JS -->
<script src="{{asset('public/assets/js/owl-carousel.js')}}"></script>

<!-- Countdown JS -->
<script src="{{asset('public/assets/js/finalcountdown.min.js')}}"></script>

<!-- custom js -->
<script type="text/javascript" src="{{asset('public/assets/js/script.js')}}"></script>

<script>
	@if (session('success'))
		swal({
		  title: "Success!",
		  text: "{{ session('success') }}",
		  icon: "success",
		  button: "OK",
		});
	@endif

	@if (session('error'))
		swal({
		  title: "Error!",
		  text: "{{ session('error') }}",
		  icon: "error",
		  button: "OK",
		});
	@endif

	@if (session('warning'))
		swal({
		  title: "Warning!",
		  text: "{{ session('warning') }}",
		  icon: "warning",
		  button: "OK",
		});
	@endif

	@if (session('message'))
		swal({
		  // title: "Info!",
		  text: "{{ session('message') }}",
		  icon: "info",
		  button: "OK",
		});
	@endif
	@if (session('delete'))
		swal({
		  title: "Removed!",
		  text: "{{ session('delete') }}",
		  icon: "success",
		  button: "OK",
		});
	@endif
</script>