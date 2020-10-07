@extends('template_frontend.content')

@section('isi')

	@foreach($data as $isi_post)

	<div id="post-header" class="page-header">
			<div class="page-header-bg"> <img src="{{asset($isi_post->gambar) }}" width="1140px" height="436px"
			data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="post-category">
							<a href="category.html">{{ $isi_post->category->name }}</a>
						</div>
						<h1>{{ $isi_post->judul }}</h1>
						<ul class="post-meta">
							<li><a href="author.html">{{ $isi_post->users->name }}</a></li>
							<li>{{ $isi_post->created_at }}</li>
						
							<!-- <li><i class="fa fa-eye"></i> 807</li> -->
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /PAGE HEADER -->
	</header>
	<div class="col-md-8 hot-post-left">
	<br>
		<div class="section-row">



		{!! $isi_post->content !!}

		</div>
		<div class="section-row">
			<div class="section-title">
				<h3 class="title">Leave a reply</h3>
			</div>
			<form class="post-reply">
				<div class="row">
					<div id="disqus_thread"></div>
						<script>

						/**
						*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
						*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
						/*
						var disqus_config = function () {
						this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
						this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
						};
						*/
						(function() { // DON'T EDIT BELOW THIS LINE
						var d = document, s = d.createElement('script');
						s.src = 'https://nonabears.disqus.com/embed.js';
						s.setAttribute('data-timestamp', +new Date());
						(d.head || d.body).appendChild(s);
						})();
						</script>
						<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
				</div>
			</form>
		</div>
	@endforeach
	</div>



@endsection