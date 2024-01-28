@extends('fe.layout.page')

@section('title', __('Trang chủ'))

@section('content')
    <div class="row">
        <div class="col-12 pl-4 pr-4">
        <p class="text-left" style="font-size: 20px; padding-bottom: 2px; font-weight: 600; color:#402B3A"> Thông Báo Mới </p>
            <div class="khung-all" style="background-color: #F8F4EC; border: 5px solid #D9EDBF; border-radius: 10px">
            <div class="box-stt0">
            <div class="box-stt">
                <div style="width: 40px; float:left; margin-right: 5px;">
                    <img src="{{ asset('assets/images/avatar3.png') }}" style="width: 35px">
                </div>
                <div class="box-right">
                    <div class="khungdep" style="display: flex; justify-content: space-between; align-items: center; ">
                    <a href="mo-thanh-vien" class="important"> Mở Thành Viên 1 Đồng <img src="{{ asset('assets/images/hot.gif') }} "></a>
                    <img style="width:25px; margin-right: 20px; padding-top: 8px" src="{{ asset('assets/images/image-18.png') }}" >
</div>
                    <div class="box-name" style="font-size: 9px; font-weight: 600;"> bởi ADMIN </div>
                </div>
            </div>
</div>
<div class="box-stt0">
                     <div class="box-stt">
                <div style="width: 40px; float:left; margin-right: 5px;">
                    <img src="{{ asset('assets/images/avatar4.png') }}" style="width: 35px">
                </div>
                <div class="box-right">
                <div class="khungdep" style="display: flex; justify-content: space-between; align-items: center; ">
                    <a href="SuKienNoel" class="important">Sự Kiện Noel<img src="{{ asset('assets/images/hot.gif') }}"></a>
                    <img style="width:25px; margin-right: 20px; padding-top: 8px" src="{{ asset('assets/images/image-18.png') }}" >
                    </div>
                    <div class="box-name" style="font-size: 9px;"> bởi ADMIN </div>
                </div>
            </div>
</div>
<div class="box-stt0">

                      <div class="box-stt">
                <div style="width: 40px; float:left; margin-right: 5px;">
                    <img src="{{ asset('assets/images/avatar4.png') }}" style="width: 35px">
                </div>
                <div class="box-right">
                <div class="khungdep" style="display: flex; justify-content: space-between; align-items: center; ">
                    <a href="LinhThu" class="important">Nâng Cấp Linh Thú<img src="{{ asset('assets/images/hot.gif') }}"></a>
                    <img style="width:25px; margin-right: 20px; padding-top: 8px" src="{{ asset('assets/images/image-18.png') }}" >
</div>
                    <div class="box-name" style="font-size: 9px;"> bởi ADMIN </div>
                    
                </div>
            </div>
</div>
<div class="box-stt0">

                     <div class="box-stt">
                <div style="width: 40px; float:left; margin-right: 5px;">
                    <img src="{{ asset('assets/images/avatar9.png') }}" style="width: 35px">
                </div>
                <div class="box-right">
                <div class="khungdep" style="display: flex; justify-content: space-between; align-items: center; ">
                    <a href="QuyDoi" class="important">Quy Đổi Thỏi Vàng Nhận Đá Ma Thuật<img src="{{ asset('assets/images/hot.gif') }}"></a>
                    <img style="width:25px; margin-right: 20px; padding-top: 8px" src="{{ asset('assets/images/image-18.png') }}" >
</div>
                    <div class="box-name" style="font-size: 9px;"> bởi ADMIN </div>
                </div>
            </div>
</div>
<div class="box-stt0">


                         <div class="box-stt">
                <div style="width: 40px; float:left; margin-right: 5px;">
                    <img src="{{ asset('assets/images/avatar6.png') }}" style="width: 35px">
                </div>
                <div class="box-right">
                <div class="khungdep" style="display: flex; justify-content: space-between; align-items: center; ">

                    <a href="halloween" class="important">SỰ KIỆN 20-11 NRO TÌNH YÊU<img src="{{ asset('assets/images/hot.gif') }}"></a>
                    <img style="width:25px; margin-right: 20px; padding-top: 8px" src="{{ asset('assets/images/image-18.png') }}" >
</div>
                    <div class="box-name" style="font-size: 9px;"> bởi ADMIN </div>
                </div>
            </div>
</div>

<div class="box-stt0">

                  <div class="box-stt">
                <div style="width: 40px; float:left; margin-right: 5px;">
                    <img src="{{ asset('assets/images/avatar9.png') }}" style="width: 35px">
                </div>
                <div class="box-right">
                <div class="khungdep" style="display: flex; justify-content: space-between; align-items: center; ">

                    <a href="su-kien-moi" class="important"> CHÍNH THỨC OPEN NGỌC RỒNG TÌNH YÊU <img src="{{ asset('assets/images/hot.gif') }}"></a>
                    <img style="width:25px; margin-right: 20px; padding-top: 8px" src="{{ asset('assets/images/image-18.png') }}" >
                    </div>

                    <div class="box-name" style="font-size: 9px;"> bởi ADMIN </div>
                </div>
            </div>
</div>

<div class="box-stt0">

            <div class="box-stt">
                <div style="width: 40px; float:left; margin-right: 5px;">
                    <img src="{{ asset('assets/images/avatar11.png') }}" style="width: 35px">
                </div>
                <div class="box-right">
                <div class="khungdep" style="display: flex; justify-content: space-between; align-items: center; ">
                    <a href="Huong-Dan-Tan-Thu" class="important"> Hướng Dẫn Tân Thủ Ngọc Rồng Tình Yêu Và GIFTCODE <img src="{{ asset('assets/images/hot.gif') }}"></a>
                    <img style="width:25px; margin-right: 20px; padding-top: 8px" src="{{ asset('assets/images/image-18.png') }}" >
</div>
                    <div class="box-name" style="font-size: 9px;"> bởi ADMIN </div>
                </div>
            </div>
</div>
</div>


            <!--<div class="box-stt">-->
            <!--    <div style="width: 40px; float:left; margin-right: 5px;">-->
            <!--        <img src="{{ asset('assets/images/avatar6.png') }}" style="width: 35px">-->
            <!--    </div>-->
            <!--    <div class="box-right">-->
            <!--        <a href="{{ route('top-power') }}" class="important"> Bảng Xếp Hạng Đua Top Sức Mạnh<img src="{{ asset('assets/images/hot.gif') }}"></a>-->
            <!--        <div class="box-name" style="font-size: 9px;"> bởi ADMIN </div>-->

            <!--        <div class="border-secondary border-top"></div>-->
            <!--        <div class="container pt-2 pb-2 text-white">-->
            <!--            <div class="row">-->
            <!--                <div class="col">-->
            <!--                    <div class="text-center">-->
            <!--                        <div style="font-size: 13px" class="text-dark">-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->

        </div>
        <div class="col-12 pl-4 pr-4 mb-2">
            <a href="{{ route('forum.index') }}" class="btn btn-nro">Diễn đàn bình luận</a>
        </div>
    </div>
@stop

@section('css')
    <style>
        .box-stt {
            font-size: 16px;
            margin-bottom: 10px;
        }
        .box-stt0 {
            font-size: 20px;
            margin-bottom: 10px;
            border: 3px solid #FDFFAB; border-radius: 10px; border-right: 3px solid #E5E1DA; border-bottom: 3px solid #E5E1DA; padding-top: 10px; padding-left: 10px; background-color: #FBF9F1; box-shadow: 2px 2px 10px rgb(170, 215, 217);
        }
        .box-stt a {
            text-decoration: none !important;
            color: black;
            font-weight: bold;
        }
        p{
            margin-bottom: 5px;
        }
    </style>
@stop

@section('js')

@stop
