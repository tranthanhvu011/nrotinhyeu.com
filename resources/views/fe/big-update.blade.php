@extends('fe.layout.page')

@section('title', __('Cập nhật mới'))

@section('content')
    <div class="row">
        <div class="col pl-4 pr-4">
            <h1 style="font-weight: 700; color: #F4E869">Ngọc Rồng King - Update Mới Và X2 Quy Đổi Thỏi Vàng</h1>
            <div class="text-left"> 
                <p>Chào các cư dân,</p>
                <p>Thông báo!!!🥰</p>
                <p>👑 Linh thú được nở từ trứng sẽ là linh thú bậc 1</p>
                <p>🛑 Cần Xóa Dử Liệu - Tải lại để cập nhật các trang bị mới nhất🛑</p>
                <p>👑 Nâng Cấp Linh Thú - Địa điểm : Sân sau siêu thị - Bà Hạt Mít</p>
                <p>⭐ Dùng 1 Hồn tinh thạch để +1 EXP vào Linh thú</p>
                <p>-Khi Linh thú đủ điểm sẽ nâng cấp</p>
                <p>+Cấp 0 lên Cấp 1 cần : 50 điểm</p>
                <p>+Cấp 1 lên Cấp 2 cần : 100 điểm</p>
                <p>+Cấp 2 lên Cấp 3 cần : 250 điểm</p>
                <p>+Cấp 3 lên Cấp 4 cần : 500 điểm</p>
                <p>+Cấp 4 lên Cấp 5 cần : 1000 điểm</p>
                <p>+Cấp 5 lên Cấp 6 cần : 2500 điểm</p>
                <p>+Cấp 6 lên Cấp 7 cần : 5000 điểm</p>
                <p>- Mỗi cấp độ sẽ +1% chỉ số của cấp trước</p>
                <p>- Nâng Bậc Linh Thú - Địa điểm : Sân sau siêu thị - Bà Hạt Mít</p>
                <p>- Khi linh thú đạt Bậc 1 Cấp 7 sẽ được chuyển hóa lên Linh Thú bậc 2 </p>
                <p>- Cần 300 Thăng tinh Thạch</p>
                <p>- 50% Tỉ lệ thành công</p>
                <p>- Thất bại mất 300 Thăng tinh Thạch</p>
                <p>⭐ Mở chỉ số Linh Thú - Địa điểm : Sân sau siêu thị - Bà Hạt Mít</p>
                <p>- Linh thú bậc 2 sẽ có tính năng đập chỉ số ngẫu nhiên 5%HP,5%Ki,3%SD tối đa 8 lần</p>
                <p>- Mỗi lần sẽ cần 1 đá ma thuật </p>
                <p>⭐ Xóa chỉ số Linh Thú - Địa điểm : Sân sau siêu thị - Bà Hạt Mít</p>
                <p>- Khi Linh Thú mở ra chỉ số không như ý muốn có thể dùng 1 Đá Gallery để xóa toàn bộ chỉ số linh thú đã cộng</p>
                <p>- Mỗi lần sẽ cần 1 Đá Gallery</p>
                <p>⭐ Boss mới :</p>
                <p>- Cumber - Địa điểm : 4 Map thời không</p>
                <p>- Vật Phẩm rơi : Đá ma thuật, Hồn Linh Thú, Thăng Tinh Thạch,Trang bị thần linh , Trang bị Hủy Diệt , Ngọc rồng</p>
                <p>- Thời gian reset : 10p</p>
                <p>⭐ Đánh quái nhận vật phẩm:</p>
                <p>- Quái tại các 4 Map Thời Không khi tiêu diệt sẽ có tỉ lệ rơi vật phẩm cho linh thú</p>
                <p>- Vật Phẩm rơi : Đá ma thuật, Hồn Linh Thú, Thăng Tinh Thạch</p>
                <p>- Khi có danh hiệu Bất Phục sẽ được x3 tỉ lệ rơi</p>
                <p>⭐ Quy đổi nhận Đá Gallery - Danh hiệu mới</p>
                <p>- Khi quy đổi 20.000 các bạn sẽ nhận được 1 Đá Gallery</p>
                <p>- Khi quy đổi 50.000 các bạn sẽ nhận được 1 Đá Gallery và 1 Danh Hiệu Bất Phục</p>
                <p>⭐ Danh hiệu Bất Phục : </p>
                <p>- Ngẫu nhiên 5-10% HP</p>
                <p>- Ngẫu nhiên 5-10% Ki</p>
                <p>- Ngẫu nhiên 3-6%  SD </p>
                <p>- Ngẫu nhiên Vĩnh viễn hoặc có HSD từ 7-15 ngày</p>
                <p>🔷 Điều Chỉnh :</p>
                <p>- Khi sử dụng vật phẩm "Nhẫn thời không sai lệch" sẽ đưa bạn tới các map Thời không , Sau khi sử dụng sẽ mất</p>
                <p>- Không thể Dịch chuyển tức thời vào các map Thời không</p>
                <p>- Đá ma thuật , Hồn Linh Thú, Thăng tinh thạch sẽ có thể giao dịch</p>
                <p>- Đá Gallery không thể giao dịch</p>
                <p>⭐⭐⭐ CHÚC CÁC CƯ DÂN CHƠI GAME VUI VẺ!!!⭐⭐⭐</p>
            </div>
            <div class="text-center mb-5 image-container">
                <img class="rounded" src="{{ asset('assets/images/383222060_179493738521141_638761277196371521_n.jpg') }}" style="max-width: 100%; height: auto; ">
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