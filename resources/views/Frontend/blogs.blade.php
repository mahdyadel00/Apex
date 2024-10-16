@extends('layouts.Frontend.master')
@section('content')


<!-- blogs -->
<div class="container" style="display: flex;align-items: center;flex-direction: column; ">
   @foreach($posts as $post)
        <div class="card m-2" style="max-width: 900px;border: none; border-bottom: 1px solid #dcdcdc;">
      <div class="row g-0">
        <div class="col-md-4 p-3">
            @foreach($post->media as $media)
                @if($media->name == 'thumb')
                    <img style="width:300px;height:200px;" src="{{ asset("storage/" . $media->path) }}" class="img-fluid rounded-start" alt="...">
                @endif
            @endforeach
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text"><small class="text-body-secondary">{{ $post->created_at->format('d M Y') }}</small></p>
            <p class="card-text">{{ Str::limit($post->description, 100) }}</p>
            <a class="mt-2 mb-2 btn btn-primary" href="{{ route('blog-details' , $post->id) }}">{{ __('dashboard.read_more') }}</a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>


  <!-- pagination -->
  <div style="    display: flex;justify-content: center;align-items: center;margin: 25px 0;">
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item">
          <a class="page-link" href="{{ $posts->previousPageUrl() }}" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        @for($i = 1; $i <= $posts->lastPage(); $i++)
            <li class="page-item"><a class="page-link" href="{{ $posts->url($i) }}">{{ $i }}</a></li>
        @endfor
        <li class="page-item">
          <a class="page-link" href="{{ $posts->nextPageUrl() }}" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>


    @include('layouts.Frontend._footer')
@endsection