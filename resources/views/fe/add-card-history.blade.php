@extends('fe.layout.page')

@section('title', __('Lịch sử nạp thẻ'))

@section('content')
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-10">
          <h2 class="text-uppercase text-center mb-5">Lịch sử nạp thẻ</h2>
          <table class="table">
            <thead>
              <tr>
                <th>Tài khoản</th>
                <th>Mệnh giá</th>
                <th>Loại thẻ</th>
                <th>Trạng thái</th>
                <th>Thời gian</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($items as $item)
                <tr>
                  <td>{{ $item->name }}</td>
                  <td>{{ number_format($item->amount, 0, ',', '.') }}</td>
                  <td>{{ $item->type }}</td>
                  <td>
                    @switch($item->status)
                      @case(\app\Models\FE\TransLog::STATUS_PROCESSING)
                        Đang xử lý
                        @break
                      @case(\app\Models\FE\TransLog::STATUS_SUCCESS)
                        Thành công
                        @break
                      @case(\app\Models\FE\TransLog::STATUS_WRONG_AMOUNT)
                        Lỗi mệnh giá
                        @break
                      @case(\app\Models\FE\TransLog::STATUS_ERROR)
                        Thẻ lỗi
                        @break
                      @default
                        Lỗi hệ thống
                    @endswitch
                  </td>
                  <td>{{ $item->date }}</td>
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
    
@stop

@section('js')

@stop