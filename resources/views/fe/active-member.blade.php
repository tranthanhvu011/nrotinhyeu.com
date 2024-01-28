@extends('fe.layout.page')

@section('title', __('Mở thành viên'))

@section('content')
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="" style="border-radius: 15px;">
            <div class="card-body bg-body-content p-5">
              <h2 class="text-uppercase text-center mb-5">MỞ THÀNH VIÊN</h2>
              <div> <strong>Thông tin mở thành viên:</strong><br>- Mở thành viên với chỉ <strong>1 VNĐ</strong>. <img src="{{ asset('assets/images/hot.gif') }}">
                <br>- Úp được sét kích hoạt xịn xò. <img src="{{ asset('assets/images/hot.gif') }}">
                <br>- Tận hưởng trọn vẹn các tính năng. <img src="{{ asset('assets/images/hot.gif') }}">
                <br>- Xây dựng, ủng hộ nrotinhyeu.com hoạt động. 
              </div>
              @if(auth()->user()->account->active != 1)
              {!! Form::open(['route' => ['active-member'], 'method' => 'POST', 'autocomplete' => 'off']) !!}
                <div class="d-flex justify-content-center mt-3">
                  <button type="submit" id="active-member-button" class="btn btn-nro btn-block gradient-custom-4">Mở ngay</button>
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