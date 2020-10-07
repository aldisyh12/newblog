@extends('template_frontend.content')
@section('isi')
<div class="col-md-8 hot-post-left">
    <!-- post -->
    @foreach($post as $fpost)
    @if($fpost->id == 6)
    <div class="post post-thumb">
        <a class="post-img" href="blog-post.html"><img src="{{ $fpost->gambar }}" width="508px" height="508px" alt=""></a>
        <div class="post-body">
            <div class="post-category">
                <a href="category.html">{{ $fpost->categoy_name}}</a>
            </div>
            <h3 class="post-title title-lg"><a href="{{ route('blog.isi_post', $fpost->slug ) }}">{{ $fpost->judul}}</a></h3>
            <ul class="post-meta">
                <li><a href="author.html">{{ $fpost->users->name }}</a></li>
                <li>{{ $fpost->created_at }}</li>
                <li><a href="{{ route('blog.isi_post', $fpost->slug ) }}#disqus_thread">Post a comment</a></li>
            </ul>
        </div>
    </div>
    @endif
    @endforeach
    <!-- /post -->
</div>
<div class="col-md-4 hot-post-right">
    <!-- post -->
    @foreach($post as $fpost1)
    @if($fpost1->id == 10)
    <div class="post post-thumb">
        <a class="post-img" href="blog-post.html"><img src="{{ $fpost1->gambar}}" width="250px" height="250px" alt=""></a>
        <div class="post-body">
            <div class="post-category">
                <a href="category.html">{{ $fpost1->categoy_name }}</a>
            </div>
            <h3 class="post-title"><a href="{{ route('blog.isi_post', $fpost1->slug ) }}">{{ $fpost1->judul}}</a></h3>
            <ul class="post-meta">
                <li><a href="author.html">{{ $fpost1->users->name }}</a></li>
                <li>{{ date('d-F-Y', strtotime($fpost1->created_at)) }}</li> 
                <li><a href="{{ route('blog.isi_post', $fpost1->slug ) }}#disqus_thread">Post a comment</a></li>
            </ul>
        </div>
    </div>
    @endif
    @endforeach
    <!-- /post -->
    <!-- post -->
    @foreach($post as $fpost2)
    @if($fpost2->id == 3)
    <div class="post post-thumb">
        <a class="post-img" href="blog-post.html"><img src="{{ $fpost2->gambar}}" width="250px" height="250px" alt=""></a>
        <div class="post-body">
            <div class="post-category">
                <a href="category.html">{{ $fpost1->categoy_name }}</a>
            </div>
            <h3 class="post-title"><a href="{{ route('blog.isi_post', $fpost2->slug ) }}">{{ $fpost2->judul}}</a></h3>
            <ul class="post-meta">
                <li><a href="author.html">{{ $fpost2->users->name }}</a></li>
                <li>{{ date('d-F-Y', strtotime($fpost2->created_at)) }}</li>
                <li><a href="{{ route('blog.isi_post', $fpost2->slug ) }}#disqus_thread">Post a comment</a></li>
            </ul>
        </div>
    </div>
    @endif
    @endforeach
    <!-- /post -->
</div>
<!-- /container -->
</div>
<!-- /SECTION -->
<!-- SECTION -->
<div class="section">
<!-- container -->
<div class="container">
<!-- row -->
<div class="row">
<div class="col-md-8">
    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="section-title">
                <h2 class="title">Postingan Terbaru</h2>
            </div>
        </div>
        <!-- post -->
        @foreach($data as $post_terbaru)
        <div class="col-md-6">
            <div class="post">
                <a class="post-img" href="{{ route('blog.isi_post', $post_terbaru->slug ) }}"><img src="{{ $post_terbaru->gambar }}" alt="" style="height: 200px"></a>
                <div class="post-body">
                    <div class="post-category">
                        <a href="{{ route('blog.category', $post_terbaru->category->slug) }}">{{ $post_terbaru->category->name }}</a>
                    </div>
                    <h3 class="post-title"><a href="{{ route('blog.isi_post', $post_terbaru->slug ) }}">{{ $post_terbaru->judul }}</a></h3>
                    <ul class="post-meta">
                        <li><a href="#">{{ $post_terbaru->users->name }}</a></li>
                        <li>{{ $post_terbaru->created_at }}</li>
                        <li><a href="{{ route('blog.isi_post', $post_terbaru->slug ) }}#disqus_thread">Post a comment</a></li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- /row -->
</div>
<!-- /row -->
@endsection
