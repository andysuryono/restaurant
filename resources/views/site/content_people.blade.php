<br /><br /><br /><br /><br /><br /><br /><br />
<section class="data-section nopad content-3-10">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3 col-xs-12 content" style="text-align: center;">
				<div class="service-box">
					
					<img src="{{ asset('assets') }}/images/img-teams/{{ $people['images'] }}" alt="Custom Image">



					<div class="editContent">
						<h3>{{ $people->name }}</h3>
					</div>
					<div class="editContent">
						{!! $people->text !!}
					</div>
					<br /><br /><br /><br />
				</div> 
				
				<a href="{{ route('home') }}#services" class="btn btn-outline btn-outline outline-dark" style="border: 1px solid #f66b27;">« Back</a>
			</div>
		</div>
	</div><!-- /.container -->
</section>