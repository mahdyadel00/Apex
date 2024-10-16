@extends('layouts.Frontend.master')
@section('content')

<!-- blog -->
<div class="container" style="display: flex;align-items: center;flex-direction: column;">
    <div class="card mb-3 col-md-10" style="border: none;margin: 25px 0;">
      <div class="p-2 m-2">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text"><small class="text-body-secondary">{{ $post->created_at->format('d M Y') }}</small></p>
      </div>
        @foreach($post->media as $media)
            @if($media->name == 'thumb')
                <img height="500px" class="card-img-top col-md-10" src="{{ asset("storage/" . $media->path) }}"  alt="..." >
            @endif
        @endforeach
      <div class="card-body">
        <p class="card-text text-center m-2">
            {!! nl2br($post->description) !!}
        </p>
      </div>
    </div>
</div>
@include('layouts.Frontend._message')
  <!-- comment -->

  <div class="container mb-4" style="display: flex;align-items: center;flex-direction: column; ">
    <div class="card mb-3 col-md-10 p-4" style="border:1px solid black; border-radius: 3px;">
      <div class="p-2 m-2 ">
        <h3 class="card-title" style="font-size: 24px;">{{ __('dashboard.no_comment') }}</h3>
        <h5 class="card-title mt-5">{{ __('dashboard.leave_comment') }}</h5>
        <p class="card-text"><small class="text-body-secondary">{{ __('dashboard.your_email_address_well_not_be_published_mandatory_fields_are_marked') }}</small></p>
      </div>
      <form action="{{ route('comments.store' , $post->id) }}" class="mt-2 p-3" method="POST">
        @csrf
        <div class="mb-3 ">
          <label class="mb-2">{{ __('dashboard.comment') }}</label>
          <textarea name="body" class="form-control form-control-lg" type="text" placeholder="{{ __('dashboard.comment') }} "style="font-size:1rem;"
            aria-label=".form-control-lg example" rows="5" cols="20"></textarea>
        </div>
        <div class="mt-2 mb-3" style="display: flex; justify-content: space-between;flex-wrap: wrap; width: 100%;">
          <div class="mb-3">
            <label class="mb-2">{{ __('dashboard.name') }}</label>
            <input name="name" class="form-control form-control-lg" type="text" placeholder="{{ __('dashboard.name') }}"style="font-size:1rem;"
              aria-label=".form-control-lg example" />
          </div>
          <div class="mb-3">
            <label class="mb-2">{{ __('dashboard.email') }}</label>
            <input name="email" class="form-control form-control-lg" type="email" placeholder="{{ __('dashboard.email') }}"style="font-size:1rem;"
              aria-label=".form-control-lg example" />
          </div>
          <div class="mb-3">
            <label class="mb-2">{{ __('dashboard.phone') }}</label>
            <input name="phone" class="form-control form-control-lg" type="text" placeholder="{{ __('dashboard.phone') }}"style="font-size:1rem;"
              aria-label=".form-control-lg example" />
          </div>
        </div>
        <div class="mt-4 col-md-12" style="display: flex; justify-content:center; align-items: center;">
          <button class="btn btn-primary p-2 col-md-3" style="border-radius: 3px;">{{ __('dashboard.post_comment') }}</button>
        </div>
      </form>
    </div>
  </div>

@include('layouts.Frontend._footer')
@endsection
