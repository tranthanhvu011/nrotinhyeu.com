@extends('fe.layout.page')

@section('title', __('Tạo bài viết mới'))

@section('content')
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-8 col-xl-8">
          <div class="" style="border-radius: 15px;">
            <div class="card-body bg-body-content p-5">
              
              <h2 class="text-uppercase text-center mb-5">Tạo bài viết</h2>
              {!! Form::open(['route' => ['forum.store'], 'method' => 'POST', 'autocomplete' => 'off']) !!}
                <div class="form-outline mb-4">
                  {!! Form::label('title', 'Tiêu đề', ['class' => 'form-label']) !!}
                  {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-outline mb-4">
                  {!! Form::label('content', 'Nội dung', ['class' => 'form-label']) !!}
                  {!! Form::textarea('content', null, ['class' => 'form-control tinyMCE']) !!}
                </div>
                <div class="d-flex justify-content-center">
                  <button type="submit" id="add-card-button" class="btn btn-nro btn-block gradient-custom-4">Đăng bài</button>
                </div>
              {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div>
@stop

@section('css')
    
@stop

@section('js')
<script>
  $('textarea.tinyMCE').summernote({
    height: 250,
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
    ]
  });
</script>
@stop