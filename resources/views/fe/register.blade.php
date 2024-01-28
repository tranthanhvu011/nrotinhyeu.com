@extends('fe.layout.page')

@section('title', __('Đăng ký tài khoản'))

@section('content')
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="" style="border-radius: 15px;">
            <div class="card-body bg-body-content p-5">
              <h2 class="text-uppercase text-center mb-5">Nhập thông tin đăng ký</h2>
              {!! Form::open(['route' => ['register'], 'method' => 'POST', 'autocomplete' => 'off']) !!}
                <div class="form-outline mb-4">
                  {!! Form::label('username', 'Tên đăng nhập', ['class' => 'form-label']) !!}
                  {!! Form::text('username', null, ['class' => "form-control", 'placeholder' => "Tên đăng nhập", 'autocomplete' => 'off']) !!}
                </div>

                <div class="form-outline mb-4">
                  {!! Form::label('password', 'Mật khẩu', ['class' => 'form-label']) !!}
                  {!! Form::password('password', ['class' => "form-control", 'placeholder' => "Mật khẩu"]) !!}
                </div>

                <div class="form-outline mb-4">
                  {!! Form::label('password_confirmation', 'Nhập lại mật khẩu', ['class' => 'form-label']) !!}
                  {!! Form::password('password_confirmation', ['class' => "form-control", 'placeholder' => "Nhập lại mật khẩu"]) !!}
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" id="register-button" class="btn btn-nro btn-block gradient-custom-4">Đăng ký</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Bạn đã có tài khoản? <a href="{{ route('login') }}"
                    class="fw-bold text-body"><u>Đăng nhập</u></a></p>
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