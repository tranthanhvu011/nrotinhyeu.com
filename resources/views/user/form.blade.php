@extends('adminlte::page')

@section('title', __('user.create'))

@section('content_header')
    <h1>@lang('user.create')</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">@lang('user.profile')</h3>
            </div>
            <!-- /.card-header -->
            @if(isset($user))
            {!! Form::model($user, ['method' => 'PATCH', 'route' => ['user.update', $user->id]]) !!}
            @else
            {!! Form::open(['route' => 'user.store']) !!}
            @endif
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('name', __('user.name') . ' *') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', __('user.email') . ' *') !!}
                    {!! Form::text('email', null, ['class' => 'form-control',]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('phone', __('user.phone') . ' *') !!}
                    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('role_id', __('user.role') . ' *') !!}
                    {!! Form::select('role_id', $roles, null, ['class' => 'form-control select2']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', __('user.password') . ' *') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                    <span>@lang('user.password_regex')</span>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('user.index') }}" class="btn btn-secondary">@lang('button.back')</a>
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
    
@stop

@section('js')
    
@stop