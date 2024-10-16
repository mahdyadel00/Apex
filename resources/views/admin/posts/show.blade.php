@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{ __('dashboard.qaysegp') }} <small>{{ __('dashboard.show_quiz') }}</small>
            </h3>
        </div>
        <div class="block-content block-content-full">
            <table class="table table-bordered table-striped table-vcenter">
                <thead>

                <tr>
                    <th class="text-center">{{ __('dashboard.category') }}</th>
                    <td class="text-center">
                        {{ $post->category->data->where('lang_id', $lang_id)->first() != null?
                               $post->category->data->where('lang_id', $lang_id)->first()->name :
                               $post->category->data->first()->name }}
                    </td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.post_name') }}</th>
                    <td class="text-center">
                        {{ $post->title }}
                    </td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.post_image') }}</th>
                    <td class="text-center">
                        @foreach ($post->media as $media)
                            @if($media->name == 'thumb')
                            <img src="{{ asset("storage/" . $media->path) }}" width="100px" height="100px"
                                 alt="{{ $post->title }}" class="img-thumbnail" style="margin: 10px"/>
                            @endif
                        @endforeach
                    </td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.post_cover') }}</th>
                    <td class="text-center">
                        @foreach ($post->media as $media)
                            @if($media->name == 'full_img')
                                <img src="{{ asset("storage/" . $media->path) }}" width="100px" height="100px"
                                     alt="{{ $post->title }}" class="img-thumbnail" style="margin: 10px"/>
                            @endif
                        @endforeach
                    </td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.description') }}</th>
                    <td class="text-center">{{ $post->description }}</td>

                </tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.created_at') }}</th>
                    <td class="text-center">{{ date('Y-m-d', strtotime($post->created_at)) }}</td>

                </tr>
                </thead>
            </table>
        </div>
        <div class="block-content block-content-full">
            <table class="table table-bordered table-striped table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('dashboard.user_name') }}</th>
                        <th class="text-center">{{ __('dashboard.email') }}</th>
                        <th class="text-center">{{ __('dashboard.phone') }}</th>
                        <th class="text-center">{{ __('dashboard.comment') }}</th>
                        <th class="text-center">{{ __('dashboard.created_at') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($post->comments as $comment)
                        <tr>
                            <td class="text-center">{{ $comment->name }}</td>
                            <td class="text-center">{{ $comment->email }}</td>
                            <td class="text-center">{{ $comment->phone }}</td>
                            <td class="text-center">{{ $comment->body }}</td>
                            <td class="text-center">{{ date('Y-m-d', strtotime($comment->created_at)) }}</td>
                        </tr>
                    @endforeach
            </table>
        </div>
    </div>
    <!-- END Dynamic Table with Export Buttons -->
@endsection
