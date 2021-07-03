@extends('layouts.admin')

@section('page-name', 'Bình luận')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Danh sách bình luận</h3>
        </div>
        <!-- ./card-header -->
        <div class="card-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>STT</th>
                <th>Người bình luận</th>
                <th>Nội dung</th>
                <th>Bài viết</th>
                <th>Ngày bình luận</th>
                <th>Kiểm soát</th>
              </tr>
            </thead>
            <tbody>
              @foreach($comments as $index=>$comment)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $comment->name }}</td>
                    <td>
                        @if ($comment->type == 'image')
                            <img src="{{ asset($comment->comment) }}" alt="Ảnh" style="max-width: 120px;">
                        @else
                            {{ $comment->comment }}
                        @endif    
                    </td>
                    <td style="width: 20%;">
                        @if ($comment->description != '')
                            {{ $comment->description }}<br/>
                            <img src="{{ asset($comment->photo) }}" alt="Ảnh" style="max-width: 120px;">
                        @else
                            
                        @endif
                    </td>
                    <td>{{ $comment->created_at->format('H:i:s d-m-Y') }}</td>
                    <td>
                        <label class="switch">
                            <input type="checkbox" <?php echo ($comment->isActive == 1 ? 'checked' : ''); ?> >
                            <span class="slider round" data-commentId={{ $comment->id }}></span>
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
                {{ $comments->links("pagination::bootstrap-4") }}
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
                var commentId = $(this).attr('data-commentId');
                $.ajax({
                    url: `${path}admin/comments/` + commentId,
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
