@extends('fe.layout.page')

@section('title', __('Danh sách tài khoản'))

@section('content')
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-10">
          <h2 class="text-uppercase text-center mb-5">Danh sách tài khoản</h2>
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Tài khoản</th>
                <th>Ngày đăng ký</th>
                <th>Trạng thái</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($items as $item)
                <tr>
                  <td>{{ $item->id }}</td>
                  <td>{{ $item->username }}</td>
                  <td>{{ $item->create_time }}</td>
                  <td>
                    @if($item->active == 1)
                    <span class="text-success">Đã kích hoạt</span>
                    @else
                    <span class="text-danger">Chưa kích hoạt</span>
                    @endif
                  </td>
                  <td>
                    @if($item->active != 1)
                    <button type="button" class="btn btn-success active-item" data-form="form-active-{{$item->id}}"><i class="fa fa-check-circle" aria-hidden="true"></i> Kích hoạt</button>
                    {!! Form::open(['method' => 'POST', 'id' => "form-active-" . $item->id, 'route' => ['active-account', $item->id]]) !!}
                    {!! Form::close() !!}
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>

          @if($items)
            
              {!! $items->appends(request()->all())->render() !!}
            
          @endif
        </div>
      </div>
@stop

@section('css')
    <style>
      .table th, .table td {
        vertical-align: middle;
      }
    </style>
@stop

@section('js')
      <script>
        jQuery(document).ready(function($){
            $(document).on('click', '.active-item', function(e) {
                e.preventDefault();
                $("#" + $(this).data('form')).submit();
                // Swal.fire({
                //     icon: 'warning',
                //     title: '{{ __('messages.confirm') }}',
                //     timer: null,
                //     showCancelButton: true,
                //     showConfirmButton: true,
                //     cancelButtonText: '{{ __('messages.cancel') }}',
                //     confirmButtonText: '{{ __('messages.accept') }}',
                // }).then(({ isConfirmed }) => {
                //     if (isConfirmed) {
                //         $("#" + $(this).data('form')).submit();
                //     }
                // });
            });
        });
      </script>
@stop