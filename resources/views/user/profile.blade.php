@extends('adminlte::page')

@section('title', __('user.profile'))

@section('content_header')
    <h1>@lang('user.profile')</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">@lang('user.profile')</h3>
            </div>
            <!-- /.card-header -->
            {!! Form::model($user, ['method' => 'PATCH', 'route' => ['user.update', $user->id]]) !!}
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('name', __('user.name') . ' *') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', __('user.email') . ' *') !!}
                    {!! Form::text('email', null, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('phone', __('user.phone') . ' *') !!}
                    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', __('user.password')) !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    <span>@lang('user.password_regex')</span>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('user.index') }}" class="btn btn-secondary">@lang('button.back')</a>
                <button type="submit" class="btn btn-primary">@lang('button.update')</button>
            </div>
            <!-- /.card-footer -->
            {!! Form::close() !!}
        </div>
        <!-- /.card -->
    </div>
</div>
@stop

@section('css')
    
@stop

@section('js')
    
@stop