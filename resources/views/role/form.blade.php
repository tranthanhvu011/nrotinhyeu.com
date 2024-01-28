@extends('adminlte::page')

@section('title', __('role.create'))

@section('content_header')
    <h1>@lang('role.create')</h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">@lang('role.create')</h3>
            </div>
            <!-- /.card-header -->
            @if(isset($role))
            {!! Form::model($role, ['method' => 'PATCH', 'route' => ['role.update', $role->id]]) !!}
            @else
            {!! Form::open(['route' => 'role.store']) !!}
            @endif
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('name', __('role.name') . ' *') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('permissions', __('role.permissions') . ' *') !!}
                    <div class="permission-tree">
                        <ul>
                        @foreach ($permissionList as $key => $value)
                            <li class="parent_permissions">
                                <input
                                    type="checkbox"
                                    class="checkboxs checkall"
                                    name="permissions[]"
                                    value="{{ $key }}"
                                    id="parent_{{ $key }}"
                                    {{ isset($role) && in_array($key, $role->permissions)?'checked':'' }}
                                />
                                <a href="#" class="checkall">
                                    <i class="fa fa-folder-open"></i>
                                    <label for="parent_{{ $key }}">{{ __("permissions.{$key}.all") }}</label>
                                </a>
                                @if(count($value) > 1)
                                <ul class="child_permissions child_{{ $key }}">
                                @foreach ($value as $v)
                                    @if($v != "all")
                                    <li>
                                        <input
                                            type="checkbox"
                                            class="checkboxs"
                                            name="permissions[]"
                                            value="{{ $v }}"
                                            id="child_{{ $v }}"
                                            {{ isset($role) && in_array($v, $role->permissions)?'checked':'' }}
                                        />
                                        <a href="javascript:void(0);">
                                            <i class="fa fa-folder-open"></i>
                                            <label for="child_{{ $v }}">{{ __("permissions.{$v}") }}</label>
                                        </a>
                                    </li>
                                    @endif
                                @endforeach
                                </ul>
                                @endif
                            </li>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('role.index') }}" class="btn btn-secondary">@lang('button.back')</a>
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