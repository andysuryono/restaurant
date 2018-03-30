<br /><br /><br /><br /><br /><br /><br /><br />
<section class="data-section nopad content-3-10">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3 col-xs-12 content" style="text-align: center;">
				<div class="service-box">
					@if($service['icon'])
						<div class="icon">
	                     <i class="fa {{ $service['icon'] }}"></i>
	                    </div> 
					@elseif($service['images'])
						<img src="{{ asset('assets') }}/images/{{ $service['images'] }}" alt="Custom Image">

	                @endif


					<div class="editContent">
						<h3>{{ $service->name }}</h3>
					</div>
					<div class="editContent">
						{!! $service->text !!}
					</div>
				<br /><br /><br /><br />
				</div> 
				
				<a href="{{ route('home') }}#services" class="btn btn-outline btn-outline outline-dark" style="border: 1px solid #f66b27;">« Back</a>
			</div>
		</div>
	</div><!-- /.container -->
</section>