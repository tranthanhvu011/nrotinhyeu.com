@extends('fe.layout.page')

@section('title', __('👑 Sự Kiện Noel Ngọc Rồng Tình Yêu 👑 '))

@section('content')
    <div class="row">
        <div class="col pl-4 pr-4">
            <h1 style="font-weight: 700; color: #F4E869">Sự Kiện Noel</h1>
            <div class="text-left"> 
            <h2 class="text-danger">⚠️ Xoá dữ liệu trước khi vô lại game để cập nhật⚠️</h2>
           <p> ❄️ Sự Kiện Noel Ngọc Rồng Tình Yêu ! -
           ❄️ Thời gian từ ngày 21/12 <br>
           1️⃣ Nhập GIFTCODE<br>
           ❄️ Thời gian: Từ 20/12 đến tết<br>
           ❄️ Mã Giftcode: noel2023<br>
           ❄️ Nhập mã tại NPC trong nhà<br>
           ❄️ Phần quà bao gồm: 1 Tỷ Vàng,  Xe heo tuần lộc<br>
           ⚠️ Lưu ý: chừa chỗ trống hành trang trước khi nhập Giftcode<br>
           2️⃣Khuyến Mãi Quy Đổi <br>
           ❄️Khi quy đổi thỏi vàng vào game mệnh giá 10k sẽ nhận thêm 1 "Hộp Quà Quy Đổi"<br>
           ⚠️Trong hộp quà quy đổi có nhiều vật phẩm như:<br>
           ❄️ Thú cưỡi tuần lộc🦌<br>
           ❄️ Hộp quà giáng sinh🎁<br>
           ❄️ Ngọc rồng các loại <br>
           ☃️ Rất nhiều vật phẩm tuyệt vời khác đang chờ đón các bạn<br>
           3️⃣ Rồng Băng giá<br>
           ❄️Mỗi ngày các cư dân đánh quái để nhặt được 1 Ngọc Băng 1-7 sao tương ứng với các ngày trong tuần (CN-1⭐,T2-2⭐,T3-3⭐,...)<br>
           ❄️Thu thập đủ bộ Ngọc Băng 1-7 sao để triệu hồi Rồng Băng giá với các điều ước 🔍 đặc biệt như:<br>
           🎁Đổi Skill 2 3 4 đệ tử<br>
           🎁Đổi Skill 5 đệ tử<br>
           🎁10% HP KI SĐ 30p phút<br>
           ⚠️Ngọc Băng có thể Giao dịch<br>
           ⚠️Không giới hạn số lần Triệu hồi Rồng Băng giá.<br>
           4️⃣Ông già noel<br>
           ❄️ Xuất hiện ngẫu nhiên <br>các máp, sẽ thả rơi "Hộp Quà Tất Giáng Sinh"<br>
           ❄️ Có "Tất giáng sinh" trong hành trang mới nhặt được "Hộp Quà Tất Giáng Sinh"<br>
           ☃️ Tại ông già noel ở Đảo Kame mở bán các vật phẩm sự kiện như:<br>
           ❄️Tất Giáng Sinh<br>
           ❄️"Gói quà" là nguyên liệu để đổi Thú cưỡi và Pet<br>
           ❄️Danh hiệu "Ông Già Noel"<br>
           Ông già noel không chỉ tặng quà,bán hàng mà còn trao đổi vật phẩm như:<br>
           ❄️Đổi Pet: Cần x99 "Chuông đồng", "Kẹo người tuyết", "Bánh quy" và 9 Gói quà<br>
           ❄️Đổi Thú Cưỡi: Cần x299 "Chuông đồng", "Kẹo người tuyết", "Bánh quy" và 29 Gói quà<br>
           6️⃣Đua Top Noel<br>
           🔝Cuộc đua top gay cần cùng nhiều phần quá thú vị đang chờ các bạn thể lệ như sau:<br>
           ⚠️Xài 1 "Hộp Quà Quy Đổi" nhận 5 điểm sự kiện<br>
           ⚠️"Hộp Quà Tất Giáng Sinh": 1 lần nhận 1 điểm sự kiện<br>
           ⚠️Đổi Pet: 1 lần nhận 10 điểm sự kiện<br>
           ⚠️Đổi Thú Cưỡi: 1 lần nhận 30 điểm sự kiện<br>
           Top 1🥇: Nhận Cải trang " Ông Già Noel" 40% Sức Đánh, Hp, Ki, x999 ma thạch, x99 đá ngũ sắc<br>
           Top 2: Nhận Cải trang " Ông Già Noel" 38% Sức Đánh, Hp, Ki, x799 ma thạch, x99 đá ngũ sắc<br>
           TOP 3: Nhận Cải trang " Ông Già Noel" 36% Sức Đánh, Hp, Ki, x599 ma thạch, x99 đá ngũ sắc<br>
           TOP 4-6: Nhận Cải trang " Ông Già Noel" 34% Sức Đánh, Hp, Ki, x399 ma thạch, x99 đá ngũ sắc<br>
           TOP 7-10: Nhận Cải trang " Ông Già Noel" 32% Sức đánh, Hp, Ki, x199 ma thạch, x99 đá ngũ sắc<br>
              </p>
             <h2 class="text-center text-danger">😘 Chúc anh em chơi game vui vẻ😘</h2>
            </div>
            <div class="text-center mb-5 image-container">
                <img class="rounded" src="{{ asset('assets/images/412566625_120203813675690182_9175857319792462828_n.jpg') }}" style="max-width: 100%; height: auto; ">
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