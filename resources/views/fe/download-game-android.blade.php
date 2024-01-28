@extends('fe.layout.page')

@section('title', __('Tải game phiên bản android'))

@section('content')
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="" style="border-radius: 15px;">
            <div class="card-body bg-body-content p-5">
              <h2 class="text-uppercase text-center mb-5">Phiên bản Android</h2>
            <p style="font-size: 20px;">- Phiên Bản Mới Nhất Update Mượt Nhất: <a href="{{ asset('download/UpdateTinhYeu.apk') }}" class="text-bold text-dark">Tại đây</a></p>
            <p style="font-size: 20px;">- Phiên Bản Mượt Và Đã Ký Gửi Được: <a href="{{ asset('download/NROTinhYeu123.apk') }}" class="text-bold text-dark">Tại đây</a></p>
              <p style="font-size: 20px;">- Phiên Bản Fix All Lỗi Cực Mượt Cho Apk: <a href="{{ asset('download/NROTinhYeu.apk') }}" class="text-bold text-dark">Tại đây</a></p>
            </div>
          </div>
        </div>
      </div>
@stop

@section('css')
    
@stop

@section('js')

@stop