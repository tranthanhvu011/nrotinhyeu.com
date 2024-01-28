@extends('fe.layout.page')

@section('title', __('Thảo luận'))

@section('content')
    <div class="row">
        <div class="col-12 pl-4 pr-4">
            <h2>Thảo luận</h2>
            <hr>
            @if($items->isEmpty())
            <p>Chưa có bài viết nào!</p>
            @endif
            @foreach ($items as $item)
            <div class="box-stt0">
            <div class="box-stt display-block w-100">
                <div style="width: 40px; float:left; margin-right: 5px;">
                    @php
                    $avatar_url = asset('assets/images/avatar15.png');
                    switch($item->user->account->player->gender){
                        case 1:
                            if (date('m') == 12 && date('d') == 25) {
                                $avatar_url = asset('assets/images/avatar15.png');
                            } else {
                                $avatar_url = asset('assets/images/avatar1.png');
                            }
                            break;
                        case 0:
                            if (date('m') == 12 && date('d') == 25) {
                                $avatar_url = asset('assets/images/avatar16.png');
                            } else {
                                $avatar_url = asset('assets/images/avatar2.png');
                            }
                            break;
                        default:
                            if (date('m') == 12 && date('d') == 25) {
                                $avatar_url = asset('assets/images/avatar17.png');
                            } else {
                                $avatar_url = asset('assets/images/avatar0.png');
                            }
                            break;
                        }
                    @endphp
                    <img src="{{ $avatar_url }}" style="width: 35px">
                </div>
                <div class="box-right">
                    <a href="{{ route('forum.show', $item->id) }}" class="important">{{ $item->title }}</a>
                    <div class="box-name" style="font-size: 9px;">
                        bởi <strong>{{ @$item->user->account->player->name }}</strong>
                        @if(auth()->check() && auth()->user()->account->is_admin == 1)
                        <button type="button" class="btn btn-sm text-danger btn-link delete-item" data-toggle="tooltip" data-title="Xóa bài viết" data-form="form-delete-{{$item->id}}"><i class="fa fa-trash"></i></button>
                        {!! Form::open(['method' => 'DELETE', 'id' => "form-delete-" . $item->id, 'route' => ['forum.destroy', $item->id]]) !!}
                        {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
                    </div>
            @endforeach
            
            <a class="btn btn-nro mb-2" href="{{ route('forum.create') }}">Tạo bài viết</a>
            <div class="float-right">
                @if($items)
                {!! $items->appends(request()->all())->render() !!}
                @endif
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
        p{
            margin-bottom: 5px;
        }
        .box-stt0 {
            font-size: 20px;
            margin-bottom: 10px;
            border: 3px solid #FDFFAB; border-radius: 10px; border-right: 3px solid #E5E1DA; border-bottom: 3px solid #E5E1DA; padding-top: 10px; padding-left: 10px; background-color: #FBF9F1; box-shadow: 2px 2px 10px rgb(170, 215, 217);
        }
    </style>
@stop

@section('js')
    
@stop