<!-- SECTION -->
@include('template_frontend.header')
	<div class="section">
		<!-- container -->
		<div class="container">
						<!-- row -->
			<div id="hot-post" class="row hot-post">
				
				@yield('isi')
				
				@include('template_frontend.widget')
	

		</div>
	</div>
</div>
	
	@include('template_frontend.footer')