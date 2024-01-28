@extends('fe.layout.page')

@section('title', __('👑 SỰ KIỆN HALLOWEEN 👑 '))

@section('content')
    <div class="row">
        <div class="col pl-4 pr-4">
            <h1 style="font-weight: 700; color: #F4E869">🌹- Sự Kiện Ngày  20/11 Ngọc Rồng Tình Yêu ! -🌹</h1>
            <div class="text-left"> 
            <h2 class="text-danger">⚠️ Xoá dữ liệu trước khi vô lại game để cập nhật⚠️</h2>
                <p class="text-danger">1) Nhập GIFTCODE🎁</p>
                <p>- Thời gian: Từ 18/11 đến 18/12 </p> 
                <p>- Mã Giftcode: tinhyeu2011</p>
                <p>- Nhập mã tại NPC trong nhà</p>
                <p>- Phần quà bao gồm: 1 Tỷ Vàng, Bó hoa hồng, 1 hộp hoa tươi(x2 tnsm, tác dụng 10p), 1 tổ yến thầy cô(x5 tnsm, tác dụng 10p) </p>
                <p>- Hộp hoa tươi và tổ yến thầy cô có thể sử dụng chung được, Một tài khoản chỉ được nhập 1 lần</p>
                <p>(*)Lưu ý: chừa chỗ trống hành trang trước khi nhập Giftcode</p>
                <p class="text-danger">2) Khuyến Mãi Quy Đổi</p>
                <p>- Khi quy đổi thỏi vàng vào game mệnh giá 20k sẽ nhận thêm 1 "Hộp Quà Quy Đổi"</p>
                <p>- "Hộp Quà Quy Đổi" mở ra nhận </p>
                <p>👑 1 Tỷ Vàng, Bó hoa hồng(HSD,Vĩnh Viễn), 1 hộp hoa tươi(x2 tnsm, tác dụng 10p, hsd 30 ngày), 1 tổ yến thầy cô(x5 tnsm, tác dụng 10p, hsd 30 ngày)</p>
                <p class="text-danger">3) NPC Thầy Cô</p>
                <p>- Đánh quái có tỉ lệ rớt "Hoa đỏ" ,"Hoa xanh dương", "Hoa vàng"</p>
                <p>*Mở bán vật phẩm "Hoa hồng"</p>
                <p>*Mở bán "Rỗ Hoa"</p>
                <p>*Mở bán danh hiệu "Nhà Giáo Việt Nam"</p>
                <p>- Đổi Phụ Kiện: x99 Bó Hoa đỏ, Bó xanh dương,Bó vàng + 10 Rổ Hoa  đổi phụ kiện đeo lưng </p>
                <p>- Đổi PET: x299 Bó Hoa đỏ, Bó xanh dương, Bó vàng + 30 Rổ Hoa đổi pet</p>
                <p>--------------------------------------------</p>
                <p>- Boss Thầy Cô sẽ xuất hiện ngẫu nhiên ở các máp, có "Hoa hồng" trong hành trang đến gần Boss Thầy Cô chát " chuc mung" sẽ được nhận ngẫu nhiên:
</p>
                <p> * Item Nụ Đỏ, Nụ Vàng , Nụ Xanh</p>
                <p> * Ngọc rồng</p>
                <p>- Hộp quà Halloween chứa nhiều vật phẩm quý hiếm bên trong như là ! </p>
                <p> * Thẻ sưu tầm</p>
                <p> * Hộp hoa tươi</p>
                <p class="text-danger">4) ĐUA TOP 20/11💥</p>
                <p>- "chuc mung": 1 lần nhận 1 điểm sự kiện </p>
                <p>- Đổi Phụ Kiện: 1 lần nhận 10 điểm sự kiện </p>
                <p>- Đổi Pet: 1 lần nhận 30 điểm sự kiện</p>
                <p>👑TOP 1: Nhận Cải trang " 20/11" 40% Sức Đánh, Hp, Ki, x999 ma thạch, x99 đá ngũ sắc</p>
                <p>👑TOP 2: Nhận Cải trang " 20/11" 38% Sức Đánh, Hp, Ki, x799 ma thạch, x99 đá ngũ sắc</p>
                <p>👑TOP 3: Nhận Cải trang " 20/11" 36% Sức Đánh, Hp, Ki, x599 ma thạch, x99 đá ngũ sắc</p>
               <p>👑TOP 4-6: Nhận Cải trang " 20/11" 34% Sức Đánh, Hp, Ki, x399 ma thạch, x99 đá ngũ sắc</p>
                <p>👑TOP 8-10: Nhận Cải trang " 20/11" 32% Sức đánh, Hp, Ki, x199 ma thạch, x99 đá ngũ sắc</p>
                <p class="text-danger">5) Update - Chỉnh Sửa :</p>
                <p>- Cho phép nâng cấp các trang bị lên cấp 8</p>
                <p>- Mở bán danh hiệu "Tình Yêu" và "Tích Xanh" ở Npc Satan</p>
                <p>- Khi nâng cấp trang bị cấp 8 mà không dùng đá bảo vệ khi thất bại sẽ rớt cấp</p>
                <p>- Thay đổi cơ chế dùng đá bảo vệ khi nâng cấp đồ (Phải bỏ vào để có thể dùng)</p>
                <p>- Fix 1 số lỗi</p>
             <h2 class="text-center text-danger">😘 Chúc anh em chơi game vui vẻ😘</h2>
            </div>
            <div class="text-center mb-5 image-container">
                <img class="rounded" src="{{ asset('assets/images/403160086_122119396526045357_2718403320510022059_n.jpg') }}" style="max-width: 100%; height: auto; ">
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