@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{ __('dashboard.qaysegp') }} <small>{{ __('dashboard.show_step_system') }}</small>
            </h3>
        </div>
        <div class="block-content block-content-full">
            <table class="table table-bordered table-striped table-vcenter">
                <thead>

                <tr>
                    <th class="text-center">{{ __('dashboard.country') }}</th>
                    <td class="text-center">
                        {{ $step_system->country->data->where('lang_id', $lang_id)->first() != null?
                               $step_system->country->data->where('lang_id', $lang_id)->first()->name :
                               $step_system->country->data->first()->name }}
                    </td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.id_image') }}</th>
                    <td class="text-center">
                        @foreach ($step_system->media as $media)
                            @if($media->name == 'id_image')
                            <img src="{{ asset("storage/" . $media->path) }}" width="100px" height="100px"
                                 alt="{{ $step_system->title }}" class="img-thumbnail" style="margin: 10px"/>
                            @endif
                        @endforeach
                    </td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.person_image') }}</th>
                    <td class="text-center">
                        @foreach ($step_system->media as $media)
                            @if($media->name == 'person_image')
                            <img src="{{ asset("storage/" . $media->path) }}" width="100px" height="100px"
                                 alt="{{ $step_system->title }}" class="img-thumbnail" style="margin: 10px"/>
                            @endif
                        @endforeach
                    </td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.center_name') }}</th>
                    <td class="text-center">{{ $step_system->center_name }}</td>

                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.controller_name') }}</th>
                    <td class="text-center">{{ $step_system->controller_name }}</td>

                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.type') }}</th>
                    <td class="text-center">
                        @if ($step_system->type == 'Step4a')Step4a
                        @else
                            Step4b
                        @endif
                    </td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.lab_name') }}</th>
                    <td class="text-center">{{ $step_system->lab_name }}</td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.id_number') }}</th>
                    <td class="text-center">{{ $step_system->id_number }}</td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.name_ar') }}</th>
                    <td class="text-center">{{ $step_system->name_ar }}</td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.name_en') }}</th>
                    <td class="text-center">{{ $step_system->name_en }}</td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.grades') }}</th>
                    <td class="text-center">{{ $step_system->grades }}</td>
                </tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.writing_grade') }}</th>
                    <td class="text-center">{{ $step_system->writing_grade }}</td>
                </tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.reading_grade') }}</th>
                    <td class="text-center">{{ $step_system->reading_grade }}</td>
                </tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.listening_grade') }}</th>
                    <td class="text-center">{{ $step_system->listening_grade }}</td>
                </tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.estimates') }}</th>
                    <td class="text-center">
                        @if($step_system->estimates == 'fluent')
                            {{ __('dashboard.fluent') }}
                        @elseif($step_system->estimates == 'good')
                            {{ __('dashboard.good') }}
                        @else
                            {{ __('dashboard.acceptable') }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th class="text-center">{{ __('dashboard.notes') }}</th>
                    <td class="text-center">{!! $step_system->notes !!}</td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.created_at') }}</th>
                    <td class="text-center">{{ date('Y-m-d', strtotime($step_system->created_at)) }}</td>

                </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table with Export Buttons -->
@endsection
