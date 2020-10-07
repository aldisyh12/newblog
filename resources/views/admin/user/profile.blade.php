@extends('template_backend.home')
@section('sub-judul','Profile')
@section('content')

<div class="section-body">
  <h2 class="section-title">Hi, {{ Auth::user()->name }}</h2>
  <p class="section-lead">
    Change information about yourself on this page.
  </p>

  <div class="row mt-sm-4">
    <div class="col-12 col-md-12 col-lg-12">
      <div class="card profile-widget">
        <div class="profile-widget-header">                     
          <img alt="image" src="{{ Auth::user()->avatar }}" class="rounded-circle profile-widget-picture">
          <div class="profile-widget-items">
            <div class="profile-widget-item">
              <div class="profile-widget-item-label">Posts</div>
              <div class="profile-widget-item-value">{{ $post->count() }}</div>
            </div>
            @foreach($user as $hasil)
            <div class="profile-widget-item">
              
              <div class="profile-widget-item-label">Type</div>
              <td>
                @if($hasil->tipe)
                  <h6><span class="badge badge-info">Administrator</span></h6>
                  @else
                  <h6><span class="badge badge-warning">Author</span></h6>
                @endif
              </td>
            </div>
            @endforeach
          </div>
        </div>

        <div class="card-footer text-center">
          <div class="font-weight-bold mb-2">Follow Ujang On</div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection