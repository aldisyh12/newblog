<div class="col-md-4">

			<!-- social widget -->
			<div class="aside-widget">
				<div class="section-title">
					<h2 class="title">Social Media</h2>
				</div>
				<div class="addthis_inline_share_toolbox"></div> 
			</div>
			<!-- /social widget -->

			<!-- category widget -->
			<div class="aside-widget">
				<div class="section-title">
					<h2 class="title">Categories</h2>
				</div>
				<div class="category-widget">
					<ul>
						@foreach($category_widget as $hasil)
						<li><a href="{{ route('blog.category', $hasil->slug) }}">{{ $hasil->name }}<span>{{ $hasil->posts->count() }}</span></a></li>
						@endforeach
					</ul>
				</div>
			</div>
			<!-- /category widget -->

		</div>
	</div>
</div>