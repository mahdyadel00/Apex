@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{__('dashboard.qaysegp')}}  <small>{{ __('dashboard.all_companies') }}</small>
            </h3>
        </div>
        <div style="margin: 10px 10px 0 0;">
            @can('create_company')
                <a class="btn btn-primary" href="{{ route('admin.companies.create') }}">{{ __('dashboard.add_company') }}</a>
            @endcan
            @include('layouts.admin._message')
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <div class="table-responsive">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">

                <thead>
                    <tr>
                        <th class="text-center" style="width: 80px;">#</th>
                        <th class="text-center">{{ __('dashboard.logo') }}</th>
                        <th class="text-center">{{ __('dashboard.sector_name') }}</th>
                        <th class="text-center">{{ __('dashboard.name') }}</th>
                        <th class="text-center">{{ __('dashboard.email') }}</th>
                         <th class="text-center">{{ __('dashboard.phone') }}</th>
                         <th class="text-center">{{ __('dashboard.company_type') }}</th>
                        <th class="text-center">{{ __('dashboard.created_at') }}</th>
                        <th class="text-center">{{ __('dashboard.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr>
                            <td class="text-center">{{ $company->id }}</td>
                            <td class="text-center">
                                @foreach ($company->media as $media)
                                        <img src="{{ asset("storage/" . $media->path) }}" width="100px" height="100px"
                                             alt="{{ $company->title }}" class="img-thumbnail" style="margin: 10px"/>
                                @endforeach
                            </td>
                            <td class="text-center">
                                {{ $company->sector?->data->where('lang_id', $lang_id)->first() != null?
                               $company->sector?->data->where('lang_id', $lang_id)->first()->name :
                               $company->sector?->data->first()->name }}
                            </td>
                            <td class="text-center">
                                {{ $company->data->where('lang_id', $lang_id)->first() != null?
                               $company->data->where('lang_id', $lang_id)->first()->name :
                               $company->data->first()->name }}
                            </td>
                            <td class="text-center">{{ $company->email }}</td>
                            <td class="text-center">{{ $company->phone }}</td>
                            <td class="text-center">
                                @if($company->type == 'step')
                                    {{ __('dashboard.step_system') }}
                                @elseif($company->type == 'student')
                                    {{ __('dashboard.student_system') }}
                                @elseif($company->type == 'certificate')
                                    {{ __('dashboard.certificate_integrity') }}
                                @endif
                            </td>
                            <td class="text-center">{{ date('Y-m-d', strtotime($company->created_at)) }}</td>
                            <td class="text-center">
                                @can('show_company')
                                    <button class="btn btn-warning">
                                        <a href="{{ route('admin.companies.change_password', [$company->id]) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Change Password">
                                            <i class="fa fa-key"></i>
                                        </a>
                                    </button>
                                @endcan
                                    @can('show_company')
                                    <button class="btn btn-success">
                                        <a href="{{ route('admin.companies.show', [$company->id]) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Show company">
                                            <i class="fa fa-eye"></i>
                                        </a></button>
                                @endcan
                                @can('edit_company')
                                    <button class="btn btn-info">
                                        <a href="{{ route('admin.companies.edit', [$company->id]) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Edit company">
                                            <i class="fa fa-edit"></i>
                                        </a></button>
                                @endcan
                                @can('delete_company')
                                    <form action="{{ route('admin.companies.destroy', [$company->id]) }}" method="post" style="display: inline-block">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button class="btn btn-danger" type="submit">
                                            <a href="#" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Delete City">
                                                <i class="fa fa-trash"></i>
                                            </a></button>
                                    @endcan
                                </form><!-- end of form -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table with Export Buttons -->
@endsection
