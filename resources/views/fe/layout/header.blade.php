<div class="top-header">
                <a href="{{ route('home') }}">
                    <img style="width:1113px; border: 1px solid red; border-radius: 10px" src="{{ asset('assets/images/anhkia.png') }}" alt="Logo" class="logo">
                </a>
            </div>
<div class="container" >

    <div class="header bg-header pb-3 ">
       
        </div>
        <div class="middle-header">
           <div class="text-center">
            <img src="https://i.imgur.com/tDj5pCs.png" style="width:165px" alt="Button Image">
            <div class="text-center pt-2">
                <div class="d-inline-block">
                    <a href="{{ route('download-game-android') }}">
                        <img src="{{ asset('assets/images/android.png') }}" alt="Download for android" class="icon-download download-android">
                    </a>
                    <br>
                    <small class="text-dark">2.3.1</small>
                </div>
                <div class="d-inline-block">
                    <a href="{{ route('download-game-pc') }}">
                        <img src="{{ asset('assets/images/pc.png') }}" alt="Download for PC" class="icon-download download-pc">
                    </a>
                    <br>
                    <small class="text-dark">2.3.1</small>
                </div>
                <div class="d-inline-block">
                    <a href="{{ route('download-game-ios') }}">
                        <img src="{{ asset('assets/images/ip.png') }}" alt="Download for IOS" class="icon-download download-ios">
                    </a>
                    <br>
                    <small class="text-dark">2.3.1</small>
                </div>
            </div>
</div>
            <div class="text-center">
                <img height="12" src="{{ asset('assets/images/12.png') }}" style="vertical-align: middle;">
                <small style="font-size: 10px" id="hour3">Dành cho người chơi trên 12 tuổi. Chơi quá 180
                    phút mỗi ngày sẽ hại sức khỏe.</small>
            </div>
        </div>
        @if(auth()->check())
        <div class="bottom-header mt-3">
            <div class="text-center">
                @php
                    $account_info = auth()->user()->account;
                    $name = $account_info->player->name;
                    $gender = $account_info->player->gender;
                    $tichdiem = $account_info->tichdiem;
                    $admin = $account_info->admin;
                    $avatar_url = "";
                    if ($gender == 1) {
                        if (date('m') == 12 && date('d') == 25) {
                            $avatar_url = asset('assets/images/avatar15.png');
                        } else {
                            $avatar_url = asset('assets/images/avatar1.png');
                        }
                    } elseif ($gender == 0) {
                        if (date('m') == 12 && date('d') == 25) {
                            $avatar_url = asset('assets/images/avatar16.png');
                        } else {
                            $avatar_url = asset('assets/images/avatar2.png');
                        }
                    } else {
                        if (date('m') == 12 && date('d') == 25) {
                            $avatar_url = asset('assets/images/avatar17.png');
                        } else {
                            $avatar_url = asset('assets/images/avatar0.png');
                        }
                    }
                    $color = "";
                    if ($tichdiem >= 500) {
                        $danh_hieu = "(Chuyên Gia)";
                        $color = "#800000"; // sets color to red
                    } elseif ($tichdiem >= 300) {
                        $danh_hieu = "(Hỏi Đáp)";
                        $color = "#A0522D"; // sets color to yellow
                    } elseif ($tichdiem >= 200) {
                        $danh_hieu = "(Người Bắt Chuyện)";
                        $color = "#6A5ACD";
                    } else {
                        $danh_hieu = "";
                        $color = "";
                    }
                    $name_str = '<p class="text-main font-weight-bold pt-1 mb-0">' . $name . '</p>';
                    if ($danh_hieu !== "") {
                        $name_str .= '<div style="font-size: 9px; padding-top: 5px"><span style="color:' . $color . ' !important">' . $danh_hieu . '</span></div>';
                    }
                @endphp
                {!! '<div><img src="' . $avatar_url . '" alt="Avatar" style="width: 50px"></div>' !!}
                {!! $name_str !!}

                <p class="pt-0">Số dư: <strong>{{ number_format($account_info->vnd, 0, ',', '.') }} VNĐ</strong></p>
            </div>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-10 text-center">
                    <div class="button-column">
                        <a href="{{ route('home') }}" class="btn btn-nro mb-2"><i class="fa fa-home" aria-hidden="true"></i> Trang chủ</a>
                        <a href="{{ route('profile') }}" class="btn btn-nro mb-2">
                            <span class="fas fa-user" aria-hidden="true"></span>
                            {{ $name }}
                        </a>
                        <a class="btn btn-nro mb-2" href="{{ route('add-card') }}"><i class="fa fa-money" aria-hidden="true"></i> Nạp số dư</a>
                        <div class="btn-group"> <button type="button" class="btn btn-nro dropdown-toggle mb-2" data-toggle="dropdown">
                            <i class="fas fa-lock"></i> Bảo mật </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('change-password') }}">Đổi mật khẩu</a>
                                <a class="dropdown-item" href="{{ route('password-2') }}">Mật khẩu cấp 2</a>
                                @if($account_info->mkc2)
                                <a class="dropdown-item" href="{{ route('delete-password-2') }}">Xóa mật khẩu cấp 2</a>
                                @endif
                            </div>
                        </div>
                        <a href="{{ route('logout') }}" class="btn btn-nro mb-2"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất</a>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="bottom-header mt-3">
            <div class="row">
                <div class="col-4 ">
                    <div class="button-column pl-3">
                        <a href="{{ route('home') }}" class="btn btn-nro form-control">Trang chủ</a>
                    </div>
                </div>
                <div class="col-4 ">
                    <div class="button-column">
                        <a href="{{ route('login') }}" class="btn btn-nro form-control">Đăng nhập</a>
                    </div>
                </div>
                <div class="col-4 ">
                    <div class="button-column pr-3">
                        <a href="{{ route('register') }}" class="btn btn-nro form-control">Đăng ký</a>
                    </div>
                </div>    
            </div>
            <div class="bottom-header mt-3">
            <div class="row justify-content-center">
                <div class="col-2">
                    <div class="button-column pl-3">
                        <a href="{{ route('home') }}" class="btn btn-nro form-control">Nhóm Zalo</a>
                    </div>
                </div>
                <div class="col-2 ">
                    <div class="button-column">
                        <a href="{{ route('login') }}" class="btn btn-nro form-control">Nhóm Facebook</a>
                    </div>
                </div>
                <div class="col-3 ">
                    <div class="button-column pr-3">
                        <a href="{{ route('register') }}" class="btn btn-nro form-control">Fanpage Facebook</a>
                    </div>
                </div>    
                <div class="col-2 ">
                    <div class="button-column pr-3">
                        <a href="{{ route('add-card') }}" class="btn btn-nro form-control">Nạp Thỏi Vàng</a>
                    </div>
                </div>  
            </div>
        </div>
        @endif
    </div>
</div>