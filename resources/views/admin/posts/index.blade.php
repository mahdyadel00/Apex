@extends('layouts.admin.app')

@section('content')
    <!-- Dynamic Table with Export Buttons -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                {{__('dashboard.qaysegp')}}  <small>{{ __('dashboard.all_posts') }}</small>
            </h3>
        </div>
        <div style="margin: 10px 10px 0 0;">
            @can('create_post')
                <a class="btn btn-primary" href="{{ route('admin.posts.create') }}">{{ __('dashboard.add_post') }}</a>
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
                        <th class="text-center">{{ __('dashboard.category') }}</th>
                        <th class="text-center">{{ __('dashboard.post_name') }}</th>
                        {{-- <th class="text-center">{{ __('dashboard.is_active') }}</th> --}}
                        <th class="text-center">{{ __('dashboard.created_at') }}</th>
                        <th class="text-center">{{ __('dashboard.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td class="text-center">{{ $post->id }}</td>
                            <td class="text-center">
                                {{ $post->category->data->where('lang_id', $lang_id)->first() != null?
                               $post->category->data->where('lang_id', $lang_id)->first()->name :
                               $post->category->data->first()->name }}
                            </td>
                            <td class="text-center">{{ $post->title }}</td>
                            {{-- <td class="text-center">
                                @if ($post->is_active == 1)
                                    <span class="badge bg-success">{{ __('dashboard.active') }}</span>
                                @else
                                    <span class="badge bg-danger">{{ __('dashboard.not_active') }}</span>
                                @endif
                            </td> --}}
                            <td class="text-center">{{ date('Y-m-d', strtotime($post->created_at)) }}</td>
                            <td class="text-center">
                                @can('show_post')
                                    <button class="btn btn-success">
                                        <a href="{{ route('admin.posts.show', [$post->id]) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Show post">
                                            <i class="fa fa-eye"></i>
                                        </a></button>
                                @endcan
                                @can('edit_post')
                                    <button class="btn btn-info">
                                        <a href="{{ route('admin.posts.edit', [$post->id]) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Edit post">
                                            <i class="fa fa-edit"></i>
                                        </a></button>
                                @endcan
                                @can('delete_post')
                                    <form action="{{ route('admin.posts.destroy', [$post->id]) }}" method="post" style="display: inline-block">
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
