@extends('layouts.base')

@section('content')
    <!--take table from Dashboard V.4 -->
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Danh sách các Website dùng để crawler data </h5>
                        <div class="ibox-tools">
                            <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Thêm Website
                            </button>

                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>

{{--                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">--}}
{{--                                <i class="fa fa-wrench"></i>--}}
{{--                            </a>--}}
{{--                            <ul class="dropdown-menu dropdown-user">--}}
{{--                                <li><a href="#">Config option 1</a>--}}
{{--                                </li>--}}
{{--                                <li><a href="#">Config option 2</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                            <a class="close-link">--}}
{{--                                <i class="fa fa-times"></i>--}}
{{--                            </a>--}}
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>

                                    <th>#ID</th>
                                    <th>Tên Website</th>
                                    <th>Tình trạng</th>
                                    <th>Số công việc</th>
                                    <th>Người khởi tạo</th>
                                    <th>Người cập nhật</th>
                                    <th>Thời gian khởi tạo</th>
                                    <th>Thời gian update</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($listUser as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>
                                            <a href="{{URL::to('job-config/'.$item->id)}}">{{$item->name}}</a>
                                        </td>
                                        <td>
                                            @if($item->status === 1)
                                                <label class="label label-success">
                                                    Đang sử dụng
                                                </label>
                                            @endif

                                            @if($item->status === 2)
                                                <label class="label label-danger">
                                                    Chưa kích hoạt
                                                </label>
                                            @endif
                                        </td>
                                        <td>Chưa xử lý</td>
                                        <td><b>{{$item->user_name}} </b></td>
                                        <td><b>{{$item->user_name}} </b></td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->updated_at}}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                    </div>
                    {{ $listUser->links() }}
                </div>
            </div>

        </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm website</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="email">Website:</label>
                            <input type="text" name="website" class="form-control" id="domain-name" placeholder="Enter Website" name="email">
                            <span class="text-danger notificaiton pull-right"></span>

                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <div id="btn-add-new-domain" class="btn btn-w-m btn-primary">
                            Thêm Website
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('javascript-bottom')
    <script src="{{ asset('js-service/add-new-domain.js') }}"></script>
@endsection
@section('style-top')

@endsection
