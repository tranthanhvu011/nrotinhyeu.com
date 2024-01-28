@extends('fe.layout.page')

@section('title', __('Tải game phiên bản PC'))

@section('content')
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="" style="border-radius: 15px;">
            <div class="card-body bg-body-content p-5">
              <h2 class="text-uppercase text-center mb-5">Phiên bản PC</h2>
                <p style="font-size: 20px;" >- Phiên Bản Update Mới Nhất Và Mượt Nhất: <a href="{{ asset('download/UpdateTinhYeu.zip') }}" class="text-bold text-dark">Tại đây</a></p>
              <p style="font-size: 20px;" >- Tải Phiên Bản Mới và Mới Nhất: <a href="{{ asset('download/PC - Love.zip') }}" class="text-bold text-dark">Tại đây</a></p>
            </div>
          </div>
        </div>
      </div>
@stop

@section('css')
    
@stop

@section('js')

@stop