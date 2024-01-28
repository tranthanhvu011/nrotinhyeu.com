@extends('adminlte::page')

@section('title', __('class.create'))

@section('content_header')
    <h1>@lang('class.create')</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">@lang('class.create')</h3>
            </div>
            <!-- /.card-header -->
            @if(isset($class))
            {!! Form::model($class, ['method' => 'PATCH', 'route' => ['class.update', $class->id]]) !!}
            @else
            {!! Form::open(['route' => 'class.store']) !!}
            @endif
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('name', __('class.name') . ' *') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('teachers', __('class.teacher') . ' *') !!}
                    {!! Form::select('teachers', $teachers, null, ['class' => 'form-control select2']) !!}
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('class.index') }}" class="btn btn-secondary">@lang('button.back')</a>
                <button type="submit" class="btn btn-primary">@lang('button.submit')</button>
            </div>
            <!-- /.card-footer -->
            {!! Form::close() !!}
        </div>
        <!-- /.card -->
    </div>
</div>
@stop

@section('css')
    <style>
        ul{
            list-style: none;
        }
    </style>
@stop

@section('js')
    <script>
        jQuery(document).ready(function($){
            $(document).on('click', '.checkall', function(e) {
                var parent = $(this).closest('.parent_permissions');
                parent.find('input[type="checkbox"]').prop('checked', this.checked);
            });
            $(document).on('click', '.child_permissions a, .child_permissions input[type="checkbox"]', function(e) {
                var parent = $(this).closest('.parent_permissions');
                var child = $(this).closest('.child_permissions');
                if(child.find('input[type="checkbox"]:checked').length == child.find('input[type="checkbox"]').length){
                    parent.find('.checkall[type="checkbox"]').prop('checked', true);
                }else{
                    parent.find('.checkall[type="checkbox"]').prop('checked', false);
                }
            });
        });
    </script>
@stop