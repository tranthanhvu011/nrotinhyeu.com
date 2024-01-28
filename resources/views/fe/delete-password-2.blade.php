@extends('fe.layout.page')

@section('title', __('Xóa mật khẩu cấp 2'))

@section('content')
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="" style="border-radius: 15px;">
            <div class="card-body bg-body-content p-5">
              <h3 class="text-uppercase text-center mb-5">Yêu cầu xóa mật khẩu cấp 2</h3>
              @if(auth()->user()->account->del_pass2)
                {!! Form::open(['route' => ['check-date-delete-password-2'], 'method' => 'POST', 'autocomplete' => 'off']) !!}

                <div class="d-flex justify-content-center">
                  <button type="submit" id="check-delete-password2-button" class="btn btn-nro btn-block gradient-custom-4">Kiểm tra thời gian xóa mật khẩu cấp 2</button>
                </div>

                {!! Form::close() !!}
                {!! Form::open(['route' => ['cancel-delete-password-2'], 'method' => 'POST', 'autocomplete' => 'off']) !!}

                <div class="d-flex justify-content-center mt-3">
                  <button type="submit" id="cancel-delete-password2-button" class="btn btn-nro btn-block gradient-custom-4">Hủy yêu cầu xóa mật khẩu cấp 2</button>
                </div>

                {!! Form::close() !!}
              @else
              {!! Form::open(['route' => ['delete-password-2'], 'method' => 'POST', 'autocomplete' => 'off']) !!}

                <div class="form-outline mb-4">
                  {!! Form::label('password', 'Mật khẩu hiện tại', ['class' => 'form-label']) !!}
                  {!! Form::password('password', ['class' => "form-control", 'placeholder' => "Mật khẩu"]) !!}
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" id="delete-password2-button" class="btn btn-nro btn-block gradient-custom-4">Gửi yêu cầu</button>
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