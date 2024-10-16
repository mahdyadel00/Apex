@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{ __('dashboard.qaysegp') }} <small>{{ __('dashboard.show_student_system') }}</small>
            </h3>
        </div>
        <div class="block-content block-content-full">
            <table class="table table-bordered table-striped table-vcenter">
                <thead>
                <tr>
                    <th class="text-center">{{ __('dashboard.person_image') }}</th>
                    <td class="text-center">
                        @foreach ($student_system->media as $media)
                            @if($media->name == 'person_image')
                            <img src="{{ asset("storage/" . $media->path) }}" width="100px" height="100px"
                                 alt="{{ $student_system->title }}" class="img-thumbnail" style="margin: 10px"/>
                            @endif
                        @endforeach
                    </td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.school_logo') }}</th>
                    <td class="text-center">
                        @foreach ($student_system->media as $media)
                            @if($media->name == 'school_logo')
                            <img src="{{ asset("storage/" . $media->path) }}" width="100px" height="100px"
                                 alt="{{ $student_system->title }}" class="img-thumbnail" style="margin: 10px"/>
                            @endif
                        @endforeach
                    </td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.education_name') }}</th>
                    <td class="text-center">{{ $student_system->education_name }}</td>

                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.person_name') }}</th>
                    <td class="text-center">{{ $student_system->person_name }}</td>

                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.person_phone') }}</th>
                    <td class="text-center">{{ $student_system->person_phone }}</td>

                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.band_name') }}</th>
                    <td class="text-center">{{ $student_system->band_name }}</td>

                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.ranking') }}</th>
                    <td class="text-center">{{ $student_system->ranking }}</td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.grading_data') }}</th>
                    <td class="text-center">{{ $student_system->grading_data }}</td>
                </tr>

                <tr>
                    <th class="text-center">{{ __('dashboard.created_at') }}</th>
                    <td class="text-center">{{ date('Y-m-d', strtotime($student_system->created_at)) }}</td>

                </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table with Export Buttons -->
@endsection
