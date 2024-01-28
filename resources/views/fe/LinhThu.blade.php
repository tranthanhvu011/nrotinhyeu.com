@extends('fe.layout.page')

@section('title', __('👑 Nâng Cấp Linh Thú 👑 '))

@section('content')
    <div class="row">
        <div class="col pl-4 pr-4">
            <h1 style="font-weight: 700; color: #F4E869">🌹NÂNG CẤP LINH THÚ🌹</h1>
            <div class="text-left"> 
            <h2 class="text-danger">⚠️ Xoá dữ liệu trước khi vô lại game để cập nhật⚠️</h2>
           <p>    Chào các cư dân,
               Thông báo!!!🥰
               ⭐⭐⭐Update mới⭐⭐⭐
               + Sau bảo trì rạng sáng ngày 16/12 <br>
               + Cập nhập chức năng NÂNG CẤP LINH THÚ !<br>
               Đến sân sau siêu thị gặp QUẢ TRỨNG để nâng cấp linh thú từ cấp 0 lên cấp 7 (Dùng hồn linh thú)<br>
               + Cập nhập chức nâng NÂNG BẬC LINH THÚ ! <br>
               Khi linh thú lên cấp 7  tiếp tục nâng bậc linh thú lên bậc 2(Dùng thăng tinh thạch)<br>
               + Cập nhập chức năng ÉP ĐÁ TĂNG CHỈ SỐ LINH THÚ ! <br>
               Khi linh thú đạt bậc 2 thì có thể dùng ĐÁ MA THUẬT để ép vào<br>
               Tỉ lệ nâng cấp thành công cực kì cao ae vào trải nghiệm nhé ! <br>
              </p>
             <h2 class="text-center text-danger">😘 Chúc anh em chơi game vui vẻ😘</h2>
            </div>
            <div class="text-center mb-5 image-container">
                <img class="rounded" src="{{ asset('assets/images/linhthupng.png') }}" style="max-width: 100%; height: auto; ">
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