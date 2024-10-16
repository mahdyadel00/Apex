@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{ __('dashboard.qaysegp') }} <small>{{ __('dashboard.show_information') }}</small>
            </h3>
        </div>
        <div class="block-content block-content-full">
            <table class="table table-bordered table-striped table-vcenter">
                <thead>


                <tr>
                    <th class="text-center">{{ __('dashboard.name') }}</th>
                    <td class="text-center">
                        {{ $information->data->where('lang_id', $lang_id)->first() != null?
                             $information->data->where('lang_id', $lang_id)->first()->title :
                             $information->data->first()->title }}
                    </td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.description') }}</th>
                    <td class="text-center">
                        {{ $information->data->where('lang_id', $lang_id)->first() != null?
                             $information->data->where('lang_id', $lang_id)->first()->description :
                             $information->data->first()->description }}
                    </td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.image') }}</th>
                    <td class="text-center">
                        @foreach ($information->media as $media)
                            @if($media->name =='image')
                                <img src="{{ asset("storage/" . $media->path) }}" width="100px" height="100px"
                                     alt="{{ $information->data->isNotEmpty() ? $information->data->first()->name : ''  }}"
                                     class="img-thumbnail" style="margin: 10px"/>
                            @endif
                        @endforeach
                    </td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.is_active') }}</th>
                    <td class="text-center">
                        @if ($information->is_active == 1)
                            <span class="badge badge-pill bg-primary">{{ __('dashboard.active') }}</span>
                        @else
                            <span class="badge badge-pill bg-danger">{{ __('dashboard.inactive') }}</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.created_at') }}</th>
                    <td class="text-center">{{ date('Y-m-d', strtotime($information->created_at)) }}</td>

                </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table with Export Buttons -->
@endsection
