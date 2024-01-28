@extends('fe.layout.page')

@section('title', __('Đổi mật khẩu'))

@section('content')
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="" style="border-radius: 15px;">
            <div class="card-body bg-body-content p-5">
              <h2 class="text-uppercase text-center mb-5">Đổi mật khẩu</h2>
              {!! Form::open(['route' => ['change-password'], 'method' => 'POST', 'autocomplete' => 'off']) !!}
                <div class="form-outline mb-4">
                  {!! Form::label('old_password', 'Mật khẩu hiện tại', ['class' => 'form-label']) !!}
                  {!! Form::password('old_password', ['class' => "form-control", 'placeholder' => "Mật khẩu hiện tại"]) !!}
                </div>

                @if(auth()->user()->account->mkc2)
                <div class="form-outline mb-4">
                  {!! Form::label('password2', 'Mật khẩu cấp 2', ['class' => 'form-label']) !!}
                  {!! Form::password('password2', ['class' => "form-control", 'placeholder' => "Mật khẩu cấp 2"]) !!}
                </div>
                @endif

                <div class="form-outline mb-4">
                  {!! Form::label('password', 'Mật khẩu mới', ['class' => 'form-label']) !!}
                  {!! Form::password('password', ['class' => "form-control", 'placeholder' => "Mật khẩu mới"]) !!}
                </div>

                <div class="form-outline mb-4">
                  {!! Form::label('password_confirmation', 'Nhập lại mật khẩu mới', ['class' => 'form-label']) !!}
                  {!! Form::password('password_confirmation', ['class' => "form-control", 'placeholder' => "Nhập lại mật khẩu"]) !!}
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" id="change-password-button" class="btn btn-nro btn-block gradient-custom-4">Đổi mật khẩu</button>
                </div>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
@stop

@section('css')
    
@stop

@section('js')

@stop