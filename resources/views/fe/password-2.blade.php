@extends('fe.layout.page')

@if(auth()->user()->account->mkc2)
@section('title', __('Cập nhật mật khẩu cấp 2'))
@else
@section('title', __('Tạo mật khẩu cấp 2'))
@endif

@section('content')
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="" style="border-radius: 15px;">
            <div class="card-body bg-body-content p-5">
              @if(auth()->user()->account->mkc2)
              <h2 class="text-uppercase text-center mb-5">Đổi mật khẩu cấp 2</h2>
              {!! Form::open(['route' => ['change-password-2'], 'method' => 'POST', 'autocomplete' => 'off']) !!}

                <div class="form-outline mb-4">
                  {!! Form::label('current_password', 'Mật khẩu hiện tại', ['class' => 'form-label']) !!}
                  {!! Form::password('current_password', ['class' => "form-control", 'placeholder' => "Mật khẩu"]) !!}
                </div>

                <div class="form-outline mb-4">
                  {!! Form::label('old_password2', 'Mật khẩu cấp 2 hiện tại', ['class' => 'form-label']) !!}
                  {!! Form::password('old_password2', ['class' => "form-control", 'placeholder' => "Mật khẩu"]) !!}
                </div>

                <div class="form-outline mb-4">
                  {!! Form::label('password', 'Mật khẩu cấp 2 mới', ['class' => 'form-label']) !!}
                  {!! Form::password('password', ['class' => "form-control", 'placeholder' => "Mật khẩu"]) !!}
                </div>

                <div class="form-outline mb-4">
                  {!! Form::label('password_confirmation', 'Nhập lại mật khẩu cấp 2 mới', ['class' => 'form-label']) !!}
                  {!! Form::password('password_confirmation', ['class' => "form-control", 'placeholder' => "Nhập lại mật khẩu"]) !!}
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" id="password-2-button" class="btn btn-nro btn-block gradient-custom-4">Đổi mật khẩu</button>
                </div>
              {!! Form::close() !!}
              @else
              <h2 class="text-uppercase text-center mb-5">Tạo mật khẩu cấp 2</h2>
              {!! Form::open(['route' => ['password-2'], 'method' => 'POST', 'autocomplete' => 'off']) !!}

                <div class="form-outline mb-4">
                  {!! Form::label('current_password', 'Mật khẩu hiện tại', ['class' => 'form-label']) !!}
                  {!! Form::password('current_password', ['class' => "form-control", 'placeholder' => "Mật khẩu"]) !!}
                </div>

                <div class="form-outline mb-4">
                  {!! Form::label('password', 'Mật khẩu cấp 2', ['class' => 'form-label']) !!}
                  {!! Form::password('password', ['class' => "form-control", 'placeholder' => "Mật khẩu"]) !!}
                </div>

                <div class="form-outline mb-4">
                  {!! Form::label('password_confirmation', 'Nhập lại mật khẩu cấp 2', ['class' => 'form-label']) !!}
                  {!! Form::password('password_confirmation', ['class' => "form-control", 'placeholder' => "Nhập lại mật khẩu"]) !!}
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" id="password-2-button" class="btn btn-nro btn-block gradient-custom-4">Tạo mật khẩu</button>
                </div>
              {!! Form::close() !!}
              @endif
            </div>
          </div>
        </div>
      </div>
@stop

@section('css')
    
@stop

@section('js')

@stop