@extends('adminlte::page')

@section('title', __('class.index'))

@section('content_header')
    <h1>@lang('class.index')</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::open(['class' => 'row', 'method' => 'GET']) !!}
                <div class="col-sm-3 col-xs-4">
                    <label for="s">@lang('class.label_search')</label>
                    {!! Form::text('s', request()->s, ['class' => 'form-control', 'placeholder' => __('class.placeholder_search')]) !!}
                </div>

                <div class="col-sm-4 col-xs-12">
                    <div><label>&nbsp;</label></div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-search"></i>
                    </button>

                    @include('components.button-clear-filter')
                    @hasPermission('class.create')
                    <a href="{{ route('class.create') }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="{{ __('class.create') }}"><i class="fa fa-plus"></i></a>
                    @endhasPermission
                </div>
            {!! Form::close() !!}

            <hr>

            <div class="table-responsive text-nowrap">
                <table id="user-table" class="table table-bordered table-hover dataTable dtr-inline">
                    <thead>
                        <tr>
                            <th>@lang('class.name')</th>
                            <th>@lang('class.teacher')</th>
                            <th class="w-150"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>
                                    @hasPermission('class.edit')
                                    <a href="{{ route('class.edit', $item->id) }}" class="btn btn-warning">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    @endhasPermission
                                    @hasPermission('class.destroy')
                                    <button type="button" class="btn btn-danger delete-item" data-form="form-delete-{{$item->id}}"><i class="fa fa-trash"></i></button>
                                    {!! Form::open(['method' => 'DELETE', 'id' => "form-delete-" . $item->id, 'route' => ['class.destroy', $item->id]]) !!}
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