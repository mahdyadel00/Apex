@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{ __('dashboard.qaysegp') }} <small>{{ __('dashboard.all_contacts') }}</small>
            </h3>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
            <div class="table-responsive">
            <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                @can('create_contact')
                    <a class="btn btn-primary m-2" href="{{ route('admin.contacts.create') }}">{{ __('dashboard.add_contact') }}</a>
                @endcan
                @include('layouts.admin._message')
                <thead>
                    <tr>
                        <th class="text-center" style="width: 80px;">#</th>
                        <th class="text-center">{{ __('dashboard.name') }}</th>
                        <th class="text-center">{{ __('dashboard.email') }}</th>
                        <th class="text-center">{{ __('dashboard.phone') }}</th>
                        <th class="text-center">{{ __('dashboard.created_at') }}</th>
                        <th class="text-center">{{ __('dashboard.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td class="text-center">{{ $contact->id }}</td>

                            <td class="text-center">{{ $contact->name }}</td>
                            <td class="text-center">{{ $contact->email }}</td>
                            <td class="text-center">{{ $contact->phone }}</td>
                            <td class="text-center">{{ date('Y-m-d', strtotime($contact->created_at)) }}</td>
                            <td class="text-center">
                                @can('show_contact')
                                    <button class="btn btn-success">
                                        <a href="{{ route('admin.contacts.show', [$contact->id]) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Show contact">
                                            <i class="fa fa-eye"></i>
                                        </a></button>
                                @endcan
                                @can('delete_contact')
                                    <form action="{{ route('admin.contacts.destroy', [$contact->id]) }}" method="post"
                                        style="display: inline-block">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button class="btn btn-danger" type="submit">
                                            <a href="#" class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip" data-original-title="Delete contact">
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
