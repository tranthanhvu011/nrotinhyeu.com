@extends('fe.layout.page')

@section('title', $post->title)

@section('content')
    <div class="row">
        <div class="col-12 pl-4 pr-4">
        <h2 style="font-weight: 600; color: red"> Tựa Đề </h2>
            <h3>{{ $post->title }}</h3>
            <ul class="post-meta list-inline">
                <li class="list-inline-item">
                    <i class="fa fa-user-circle-o"></i> <strong>{{ $post->user->account->player->name }}</strong>
                </li>
                <li class="list-inline-item">
                    <i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                </li>
            </ul>
            <div class="text-left">   
            <h2 style="font-weight: 600; color: blue"> Nội Dung </h2>
             <h4>   {!! $post->content !!} </h4>
            </div>
            <hr>
            @if(auth()->check())
            <div class="form-group">
                <button class="btn btn-nro add-comment" type="button"><i class="fa fa-plus"></i> Tạo bình luận</button>
            </div>
            <div class="col-12 pl-4 pr-4 mb-4 d-none" id="comment-form">
                <h2>Bình luận</h2>
                {!! Form::open(['route' => ['comment.create', $post->id], 'method' => 'POST', 'autocomplete' => 'off']) !!}
                    <div class="form-outline mb-4">
                      {!! Form::textarea('content', null, ['class' => "form-control tinyMCE", 'placeholder' => "Nhập bình luận ở đây", 'autocomplete' => 'off']) !!}
                    </div>
                    <div class="d-flex justify-content-end">
                      <button type="submit" class="btn btn-nro gradient-custom-4 radius-3">Gửi bình luận</button>
                      <button type="button" id="btn-cancel-comment" class="ml-2 btn btn-danger gradient-custom-4">Hủy bình luận</button>
                    </div>
                  {!! Form::close() !!}
            </div>
            <hr>
            @endif
            <table class="table table-borderless">
                <tbody>
                    @foreach ($comments as $comment)
                    <tr>
                        <td width="80px">
                            <div class="text-center" style="margin-left: -10px;">
                                @php
                                $avatar_url = asset('assets/images/avatar15.png');
                                switch($comment->user->account->player->gender){
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
                                <img src="{{ $avatar_url }}" style="width: 30px; "><br>
                                <div style="font-size: 9px; padding-top: 5px"><strong>{{ $comment->user->account->player->name }}</strong></div>
                            </div>
                        </td>
                        <td>
                            <div class="bg bg-light mb-2 p-2">
                                <div class="row" style="font-size: 9px; padding-bottom: 5px;">
                                    <div class="col-12">
                                      <span><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                                      <div class="float-right">
                                        @if(auth()->check() && auth()->user()->account->is_admin == 1)
                                        <button type="button" class="btn btn-sm text-danger btn-link delete-item" data-toggle="tooltip" data-title="Xóa bình luận" data-form="form-delete-{{$comment->id}}"><i class="fa fa-trash"></i></button>
                                        {!! Form::open(['method' => 'POST', 'id' => "form-delete-" . $comment->id, 'route' => ['comment.destroy', $comment->id]]) !!}
                                        {!! Form::close() !!}
                                        @endif
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-12">
                                      {!! $comment->content !!}
                                    </div>
                                  </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if(auth()->check())
                @if($comments->isNotEmpty())
                <hr>
                <div class="form-group">
                    <button class="btn btn-nro add-comment" type="button"><i class="fa fa-plus"></i> Tạo bình luận</button>
                </div>
                @endif
            @endif
            <div class="float-right">
                @if($comments)
                {!! $comments->appends(request()->all())->render() !!}
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

        .post-meta {
            margin-bottom: 20px;
        }

        .post-meta li:not(:last-child) {
            margin-right: 10px;
        }

        .post-meta li{
            color: #999;
            font-size: 13px;
        }

        .post-meta li a:hover {
            color: #4782d3;
        }

        .post-meta li i {
            margin-right: 5px;
        }

        .post-meta li:after {
            margin-top: -5px;
            content: "/";
            margin-left: 10px;
        }

        .post-meta li:last-child:after {
            display: none;
        }
        p{
            margin-bottom: 5px;
        }
    </style>
@stop

@section('js')
<script>
    jQuery(document).ready(function($){
        $(document).on('click', '.add-comment', function(e){
            e.preventDefault();
            var comment_form = $('#comment-form');
            comment_form.removeClass('d-none');
            $('html, body').animate({
                scrollTop: comment_form.offset().top
            }, 1000);
        });
        $(document).on('click', '#btn-cancel-comment', function(e){
            e.preventDefault();
            var comment_form = $('#comment-form');
            comment_form.addClass('d-none');
            comment_form.find('textarea.tinyMCE').summernote('code', '');
        });
    });
    $('textarea.tinyMCE').summernote({
      height: 150,
      toolbar: [
          // [ 'style', [ 'style' ] ],
          [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
          // [ 'fontname', [ 'fontname' ] ],
          // [ 'fontsize', [ 'fontsize' ] ],
          // [ 'color', [ 'color' ] ],
          [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
          [ 'table', [ 'table' ] ],
          [ 'insert', [ 'link'] ],
          [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
      ],
      placeholder: 'Nhập bình luận ở đây'
    });
  </script>
@stop