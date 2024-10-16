@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{ __('dashboard.qaysegp') }} <small>{{ __('dashboard.show_slider') }}</small>
            </h3>
        </div>
        <div class="block-content block-content-full">
            <table class="table table-bordered table-striped table-vcenter">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('dashboard.image') }}</th>
                        <td class="text-center">
                            @foreach($slider->media as $media)
                                <img src="{{ asset('storage/' . $media->path) }}" alt="{{ $slider->data->first()->title }}"
                                     width="100px" height="100px" class="img-thumbnail" style="margin: 10px"/>
                            @endforeach
                        </td>
                    <tr>
                        <th class="text-center">{{ __('dashboard.title') }}</th>
                        <td class="text-center">
                            {{ $slider->data->where('lang_id', $lang_id)->first() != null?
                                $slider->data->where('lang_id', $lang_id)->first()->title :
                                $slider->data->first()->title }}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center">{{ __('dashboard.description') }}</th>
                        <td class="text-center">
                            {!! $slider->data->where('lang_id', $lang_id)->first() != null?
                                $slider->data->where('lang_id', $lang_id)->first()->description :
                                $slider->data->first()->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center">{{ __('dashboard.status') }}</th>
                        @if ($slider->status == 1)
                            <td class="text-center">
                                <span class="badge badge-pill bg-success">{{ __('dashboard.active') }}</span>
                            </td>
                        @else
                            <td class="text-center">
                                <span class="badge badge-pill bg-danger">{{ __('dashboard.inactive') }}</span>
                            </td>
                        @endif
                    <tr>
                        <th class="text-center">{{ __('dashboard.created_at') }}</th>
                        <td class="text-center">{{ date('Y-m-d', strtotime($slider->created_at)) }}</td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table with Export Buttons -->
@endsection
