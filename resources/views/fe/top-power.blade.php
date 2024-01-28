@extends('fe.layout.page')

@section('title', __('Bảng xếp hạng'))

@section('content')
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-10">
          <h2 class="text-uppercase text-center mb-5">Bảng xếp hạng đua top</h2>
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Nhân vật</th>
                <th>Sức mạnh</th>
                <th>Đệ tử</th>
                <th>Hành tinh</th>
                <th>Tổng</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($items as $index => $item)
                @php
                  $item = collect($item);
                  $second_value = $item['second_value'];
                  $power = '';
                  if ($second_value != '') {
                      if ($second_value > 1000000000) {
                        $power = number_format($second_value / 1000000000, 1, '.', '') . ' tỷ';
                      } elseif ($second_value > 1000000) {
                        $power = number_format($second_value / 1000000, 1, '.', '') . ' Triệu';
                      } elseif ($second_value >= 1000) {
                        $power = number_format($second_value / 1000, 1, '.', '') . ' k';
                      } else {
                        $power = number_format($second_value, 0, ',', '');
                      }
                  } else {
                    $power = 'Không có chỉ số sức mạnh';
                  }
                  $detu_sm = $item['detu_sm'];
                  $child_power = '';
                  if ($detu_sm != '') {
                      if ($detu_sm > 1000000000) {
                        $child_power = number_format($detu_sm / 1000000000, 1, '.', '') . ' tỷ';
                      } elseif ($detu_sm > 1000000) {
                        $child_power = number_format($detu_sm / 1000000, 1, '.', '') . ' Triệu';
                      } elseif ($detu_sm >= 1000) {
                        $child_power = number_format($detu_sm / 1000, 1, '.', '') . ' k';
                      } else {
                        $child_power = number_format($detu_sm, 0, ',', '');
                      }
                  } else {
                    $child_power = 'Không có chỉ số sức mạnh';
                  }
                  $tongdiem = $item['tongdiem'];
                  $total_power = '';
                  if ($tongdiem != '') {
                      if ($tongdiem > 1000000000) {
                        $total_power = number_format($tongdiem / 1000000000, 1, '.', '') . ' tỷ';
                      } elseif ($tongdiem > 1000000) {
                        $total_power = number_format($tongdiem / 1000000, 1, '.', '') . ' Triệu';
                      } elseif ($tongdiem >= 1000) {
                        $total_power = number_format($tongdiem / 1000, 1, '.', '') . ' k';
                      } else {
                        $total_power = number_format($tongdiem, 0, ',', '');
                      }
                  } else {
                    $total_power = 'Không có chỉ số sức mạnh';
                  }
                @endphp
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $item['name'] }}</td>
                  <td>{{ $power }}</td>
                  <td>{{ $child_power }}</td>
                  <td>
                    @switch($item['gender'])
                      @case(0)
                        Trái đất
                        @break
                      @case(1)
                        Namec
                        @break
                      @case(2)
                        Xayda
                        @break
                      @default
                        
                    @endswitch
                  </td>
                  <td>{{ $total_power }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
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