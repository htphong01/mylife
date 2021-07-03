@extends('layouts.admin')

@section('page-name', 'Người dùng')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Danh sách người dùng</h3>
        </div>
        <!-- ./card-header -->
        <div class="card-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên người dùng</th>
                <th>Email</th>
                <th>Giới tính</th>
                <th>Ngày tham gia</th>
                <th>Kiểm soát</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $index=>$user)
                <tr data-widget="expandable-table" aria-expanded="false">
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $user->created_at->format('H:i:s d-m-Y') }}</td>
                    <td>
                        <label class="switch">
                            <input type="checkbox" <?php echo ($user->isActive == 1 ? 'checked' : ''); ?> >
                            <span class="slider round" data-userId={{ $user->id }}></span>
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
                {{ $users->links("pagination::bootstrap-4") }}
            </div>
        </div>
      </div>
      <!-- /.card -->
    </div>
</div>

<script src="{{ asset('js/admin/user.js') }}"></script>
@endsection
