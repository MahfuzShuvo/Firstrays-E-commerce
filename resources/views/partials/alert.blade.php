@if (Session::has('message'))
    <div class="alert alert-info" role="alert" style="font-size: 12px;">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: -4px;">
			<span aria-hidden="true">&times;</span>
		</button>
		<i class="fa fa-info-circle"></i>&nbsp; {{ Session::get('message') }}
	</div>
@endif

@if (session('success'))
	<div class="alert alert-success" role="alert" style="font-size: 12px;">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: -4px;">
			<span aria-hidden="true">&times;</span>
		</button>
		<i class="fa fa-check-circle"></i>&nbsp; {{ session('success') }}
	</div>
@endif

@if (session('error'))
    <div class="alert alert-danger" role="alert" style="font-size: 12px;">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: -4px;">
			<span aria-hidden="true">&times;</span>
		</button>
		<i class="fa fa-exclamation-circle"></i>&nbsp; {{ session('error') }}
	</div>
@endif

@if (session('warning'))
    <div class="alert alert-warning" role="alert" style="font-size: 12px;">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: -4px;">
			<span aria-hidden="true">&times;</span>
		</button>
		<i class="fa fa-warning"></i>&nbsp; {{ session('warning') }}
	</div>
@endif


<script type="text/javascript">
	window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
    });
}, 4000);
</script>