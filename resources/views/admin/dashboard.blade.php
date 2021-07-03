@extends('layouts.admin')

@section('page-name', 'Tổng quan')

@section('content')
    <div class="row">
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $data->user }}</h3>
    
                        <p>Người dùng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ URL::to('admin/users') }}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $data->event }}</h3>
    
                        <p>Sự kiện</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-calendar-alt"></i>
                    </div>
                    <a href="{{ URL::to('admin/events') }}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        <div class="col-lg-3 col-6">
        <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $data->post }}</h3>
                    <p>Bài viết</p>
                </div>
                <div class="icon">
                <i class="fas fa-edit"></i>
                </div>
                <a href="{{ URL::to('admin/comments') }}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
        <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $data->comment }}</h3>
                    <p>Bình luận</p>
                </div>
                <div class="icon">
                    <i class="fas fa-comment-dots"></i>
                </div>
                <a href="{{ URL::to('admin/comments') }}" class="small-box-footer">Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit mr-1"></i>
                        Bài viết
                    </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div>
                        <canvas id="dashboard-post-chart" style="height: 340px !important"></canvas>
                    </div>
                    <script>
                        var ctx = document.getElementById('dashboard-post-chart');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: [<?php foreach($postData as $item) echo '"' .$item->date .'",' ?>],
                                datasets: [{
                                    label: 'Số bài viết',
                                    data: [<?php foreach($postData as $item) echo $item->postCount. ',' ?>],
                                    backgroundColor: '#4B94BF',
                                    borderColor:'#4B94BF',
                                    borderWidth: 3
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                </div>
            </div>

            <div class="card bg-gradient-light">
                <div class="card-header border-0">
                    <h3 class="card-title">
                        <i class="ion ion-person-add"></i>
                        Người dùng
                    </h3>
                </div>
              <div class="card-body">
                    <div>
                        <canvas id="dashboard-user-chart" style="height: 340px !important"></canvas>
                    </div>
                    <script>
                        var ctx = document.getElementById('dashboard-user-chart');
                        var myChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: [<?php foreach($genders as $item) echo '"' .$item->gender .'",' ?>],
                                datasets: [{
                                    label: 'Lượng người dùng',
                                    data: [<?php foreach($genders as $item) echo $item->userCount. ',' ?>],
                                    backgroundColor: [
                                        '#4BC0C0',
                                        '#FF9020',
                                        '#FF6384',
                                        '#36A2EB'
                                    ],
                                    borderWidth: 3
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                </div>
              
            </div>
        </section>

        <section class="col-lg-5 connectedSortable">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Thông báo mới</h3>
              </div>
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                    @foreach($notifications as $notification)
                    <li class="item">
                        <div class="product-img">
                            <img src="{{ asset($notification->image) }}" alt="Product Image" class="img-size-50" style="border-radius: 50%;"/>
                        </div>
                        <div class="product-info">
                            <a href="javascript:void(0)" class="product-title">{!! substr($notification->content, 0, strpos($notification->content, 'của bạn')) !!}</a>
                            <span class="product-description">
                                {{ date("H:i d-m-Y", strtotime($notification->created_at)) }}
                            </span>
                        </div>
                    </li>
                    @endforeach
                </ul>
              </div>
              <div class="card-footer text-center">
                <a href="javascript:void(0)" class="uppercase">Xem tất cả thông báo</a>
              </div>
            </div>

            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">
                    <i class="fas fa-comment-dots"></i>
                    Bình luận
                </h3>
              </div>
              <div class="card-body">
                    <div>
                        <canvas id="dashboard-comment-chart" style="height: 340px !important"></canvas>
                    </div>
                    <script>
                        var ctx = document.getElementById('dashboard-comment-chart');
                        var myChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: [<?php foreach($commentData as $item) echo '"' .$item->date .'",' ?>],
                                datasets: [{
                                    label: 'Lượng bình luận',
                                    data: [<?php foreach($commentData as $item) echo $item->commentCount. ',' ?>],
                                    backgroundColor: [
                                        'rgba(255,255,255,0)'
                                    ],
                                    borderColor: '#FF2942',
                                    borderWidth: 3
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    </script>
                </div>
              
            </div>
        </section>
    </div>
@endsection
