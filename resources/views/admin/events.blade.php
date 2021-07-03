@extends('layouts.admin')

@section('page-name', 'Sự kiện')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Danh sách sự kiện</h3>
        </div>
        <!-- ./card-header -->
        <div class="card-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>STT</th>
                <th>Người tổ chức</th>
                <th>Tiêu đề</th>
                <th>Nội dung</th>
                <th>Hình ảnh</th>
                <th>Thời gian</th>
                <th>Kiểm soát</th>
              </tr>
            </thead>
            <tbody>
              @foreach($events as $index=>$event)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->content }}</td>
                    <td>
                        <img src="{{ asset($event->image) }}" alt="Ảnh" style="max-width: 120px;">
                    </td>
                    <td style="width: 15%;">
                        {{ date("H:i d/m/Y ", strtotime($event->date_start)) }} - <br/> 
                        {{ date("H:i d/m/Y ", strtotime($event->date_end)) }}
                    </td>
                    <td style="width: 10%;">
                        <label class="switch">
                            <input type="checkbox" <?php echo ($event->isActive == 1 ? 'checked' : ''); ?> >
                            <span class="slider round" data-eventId={{ $event->id }}></span>
                        </label>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-muted">
            <div class="d-flex justify-content-center">
                {{ $events->links("pagination::bootstrap-4") }}
            </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
</div>

<script>
  $(document).ready(() => {
    var locationHref = $(location).attr('href');
    var path = locationHref.slice(0 , locationHref.indexOf('admin'));
    $('.slider.round').on('click', function(event) {
                var eventId = $(this).attr('data-eventId');
                $.ajax({
                    url: `${path}admin/events/` + eventId,
                    type: 'get',
                    success: function( _response ){
                        console.log('thành công');
                    },
                    error: function( _response ){
                        console.log('thất bại');
                    }
                });
            });
  });
</script>
@endsection
