@extends('template_frontend.content')

@section('isi')	
<div class="row">
	<div class="col-md-8">
		<div class="section-row">
			<div class="section-title">
				<h2 class="title">Contact Information</h2>
			</div>
			<p>Jika anda mempunyai masukan,kritik atau tidak keterpuasan tentang blog kami, Silahkan hubungi kami melalui form yang ada dibawah ini.</p>
			<ul class="contact">
				<li><i class="fa fa-phone"></i> 0896-3013-2793</li>
				<li><i class="fa fa-envelope"></i> <a href="#">aldi@gmail.com</a></li>
				<li><i class="fa fa-map-marker"></i> Indonesia, Jakarta</li>
			</ul>
		</div>

		<div class="section-row">
			<div class="section-title">
				<h2 class="title">Mail us</h2>
			</div>
			<form action="{{ route('blog.contact.email') }}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<input class="form-control" type="text" name="name" placeholder="Name">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<input class="form-control" type="email" name="email" placeholder="Email">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<textarea type="text" class="form-control" name="email_body" placeholder="Message"></textarea>
						</div>
						<button class="primary-button">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>

@endsection