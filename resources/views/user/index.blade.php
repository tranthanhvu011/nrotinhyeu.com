@extends('adminlte::page')

@section('title', __('user.index'))

@section('content_header')
    <h1>@lang('user.index')</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['class' => 'row', 'method' => 'GET']) !!}
                <div class="col-sm-3 col-xs-4">
                    <label for="s">@lang('user.label_search')</label>
                    {!! Form::text('s', request()->s, ['class' => 'form-control', 'placeholder' => __('user.placeholder_search')]) !!}
                </div>

                <div class="col-sm-4 col-xs-12">
                    <div><label>&nbsp;</label></div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-search"></i>
                    </button>

                    @include('components.button-clear-filter')
                    @hasPermission('user.create')
                    <a href="{{ route('user.create') }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="{{ __('user.create') }}"><i class="fa fa-plus"></i></a>
                    @endhasPermission
                </div>
            {!! Form::close() !!}

            <hr>

            <div class="table-responsive text-nowrap">
                <table id="user-table" class="table table-bordered table-hover dataTable dtr-inline">
                    <thead>
                        <tr>
                            <th>@lang('user.name')</th>
                            <th>@lang('user.email')</th>
                            <th>@lang('user.phone')</th>
                            <th>@lang('user.role')</th>
                            <th class="w-150"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ @$item->role->name }}</td>
                                <td>
                                    @hasPermission('user.edit')
                                    <a href="{{ route('user.edit', $item->id) }}" class="btn btn-warning">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    @endhasPermission
                                    @hasPermission('user.destroy')
                                    <button type="button" class="btn btn-danger delete-item" data-form="form-delete-{{$item->id}}"><i class="fa fa-trash"></i></button>
                                    {!! Form::open(['method' => 'DELETE', 'id' => "form-delete-" . $item->id, 'route' => ['user.destroy', $item->id]]) !!}
                                    {!! Form::close() !!}
                                    @endhasPermission
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
        <div class="col-md-12">
            @if($items)
                {!! $items->appends(request()->all())->render() !!}
            @endif
        </div>
    </div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop