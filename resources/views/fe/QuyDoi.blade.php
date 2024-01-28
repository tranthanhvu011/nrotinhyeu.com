@extends('fe.layout.page')

@section('title', __('👑 Quy Đổi Thỏi Vàng Nhận Đá Ma Thuật 👑 '))

@section('content')
    <div class="row">
        <div class="col pl-4 pr-4">
            <h1 style="font-weight: 700; color: #F4E869" class="text-center">🌹NÂNG CẤP LINH THÚ🌹</h1>
            <div class="text-center"> 
           <p class="text-center">   Chào các cư dân,
           Thông báo!!!🥰 <br>
           ⭐⭐⭐Update mới⭐⭐⭐<br>
⚡️Sự kiện quy đổi thỏi vàng nhận ngay đá ma thuật !<br>
- Diễn ra từ 4h sáng ngày 16-12 đến 4h sáng ngày 19 tháng 12<br>
Khi quy đổi mệnh giá 20k sẽ nhận được 1 đá ma thuật (Có cộng dồn cho mệnh giá cao hơn )<br>
Đá ma thuật dùng để ép tăng chỉ số linh thú bậc 2 (Sau này sẽ rất hiếm)<br>
              </p>
             <h2 class="text-center text-danger">😘 Chúc anh em chơi game vui vẻ😘</h2>
            </div>
            <div class="text-center mb-5 image-container">
                <img class="rounded" src="{{ asset('assets/images/quydoithoivang.png') }}" style="max-width: 100%; height: auto; ">
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .box-stt {
            font-size: 15px;
            margin-bottom: 10px;
        }
        .box-stt a {
            text-decoration: none !important;
            color: black;
            font-weight: bold;
        }
    </style>
@stop

@section('js')
    
@stop