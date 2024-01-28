@extends('fe.layout.page')

@section('title', __('Đăng nhập'))

@section('content')
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="" style="border-radius: 15px;">
            <div class="card-body bg-body-content p-5">
              <h2 class="text-uppercase text-center mb-5">Nhập thông tin đăng nhập</h2>
              {!! Form::open(['route' => ['login'], 'method' => 'POST', 'autocomplete' => 'off']) !!}
                <div class="form-outline mb-4">
                  {!! Form::label('username', 'Tên đăng nhập', ['class' => 'form-label']) !!}
                  {!! Form::text('username', null, ['class' => "form-control", 'placeholder' => "Tên đăng nhập", 'autocomplete' => 'off']) !!}
                </div>

                <div class="form-outline mb-4">
                  {!! Form::label('password', 'Mật khẩu', ['class' => 'form-label']) !!}
                  {!! Form::password('password', ['class' => "form-control", 'placeholder' => "Mật khẩu"]) !!}
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" id="login-button" class="btn btn-nro btn-block gradient-custom-4">Đăng nhập</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Bạn chưa có tài khoản? <a href="{{ route('register') }}"
                    class="fw-bold text-body"><u>Đăng ký</u></a></p>
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