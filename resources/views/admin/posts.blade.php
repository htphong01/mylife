@extends('layouts.admin')

@section('page-name', 'Bài viết')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Danh sách bài viết</h3>
        </div>
        <!-- ./card-header -->
        <div class="card-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>STT</th>
                <th>Người đăng</th>
                <th>Nội dung</th>
                <th>Hình ảnh</th>
                <th>Ngày đăng</th>
                <th>Kiểm soát</th>
              </tr>
            </thead>
            <tbody>
              @foreach($posts as $index=>$post)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $post->name }}</td>
                    <td>{{ $post->description }}</td>
                    <td>
                      <img class="admin-image-view" data-postId={{ $post->id }} src="{{ asset($post->photo) }}" alt="Ảnh" style="max-width: 120px;">
                    </td>
                    <td>{{ $post->created_at->format('H:i:s d-m-Y') }}</td>
                    <td>
                        <label class="switch">
                            <input type="checkbox" <?php echo ($post->isActive == 1 ? 'checked' : ''); ?> >
                            <span class="slider round" data-postId={{ $post->id }}></span>
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
                {{ $posts->links("pagination::bootstrap-4") }}
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
                var postId = $(this).attr('data-postId');
                $.ajax({
                    url: `${path}admin/posts/` + postId,
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
