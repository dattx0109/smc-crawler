@extends('layouts.base')

@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <form action="/domain-job" method="get">
                        <div class="ibox-title domainJob-ibox-title">
                            <h3 class="head-title-top">Danh sách các công việc đã lấy được </h3>
                            <div class="ibox-tools domainJobFilter__Container">
                                <div class="domainJobFilter">
                                    <div class="domainJobFilter__Item">
                                        <label>Lọc theo website/link:</label>
                                        <select name="domain_id" class="chosen-select chosen-width-drop">
                                            <option @if(!isset(request()->domain_id)) selected @endif value="">Tất cả
                                            </option>
                                            @foreach($domains as $domain)

                                                <option
                                                    @if(isset(request()->domain_id) && request()->domain_id==$domain->id ) selected
                                                    @endif value="{{$domain->id}}">{{$domain->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="domainJobFilter__Item chosen-select-no-search">
                                        <label>Khoảng thời gian:</label>
                                        <select name="time_interval" class="chosen-select chosen-width-drop">

                                            <option @if(!isset(request()->time_interval)) selected @endif value=""> Tất cả
                                            </option>
                                            <option @if(isset(request()->time_interval) && request()->time_interval==1 ) selected
                                                    @endif value="1"> cách đây 1 Ngày</option>
                                            <option @if(isset(request()->time_interval) && request()->time_interval==3 ) selected
                                                    @endif value="3">cách đây 3 Ngày</option>
                                            <option @if(isset(request()->time_interval) && request()->time_interval==7 ) selected
                                                    @endif value="7">cách đây 1 Tuần</option>
                                            <option @if(isset(request()->time_interval) && request()->time_interval==30 ) selected
                                                    @endif value="30">cách đây 1 Tháng </option>
                                        </select>
                                    </div>
                                    <div class="domainJobFilter__Item chosen-select-no-search">
                                        <label>Trạng thái lấy về:</label>
                                        <select name="status" class="chosen-select chosen-width-drop">
                                            <option @if(!isset(request()->status)) selected @endif value="0">Tất cả
                                            </option>
                                            <option @if(isset(request()->status) && request()->status==1 ) selected
                                                    @endif value="1">Thành công
                                            </option>
                                            <option @if(isset(request()->status) && request()->status==2 ) selected
                                                    @endif value="2">Thất bại
                                            </option>
                                        </select>
                                    </div>
                                    <div class="domainJobFilter__Item chosen-select-no-search">
                                        <label>Trạng thái chuyển:</label>
                                        <select name="convert_status" class="chosen-select chosen-width-drop">
                                            <option @if(!isset(request()->convert_status)) selected @endif value="0">Tất
                                                cả
                                            </option>
                                            <option
                                                @if(isset(request()->convert_status) && request()->convert_status==1 ) selected
                                                @endif value="1">Đã chuyển
                                            </option>
                                            <option
                                                @if(isset(request()->convert_status) && request()->convert_status==2 ) selected
                                                @endif value="2">Chưa chuyển
                                            </option>
                                            <option @if(isset(request()->convert_status) && request()->convert_status==3 ) selected
                                                    @endif value="3">Cập nhật
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-w-m btn-primary pull-right config-head-btn-bottom">
                                    <i class="fa fa-search"></i> Lọc
                                </button>
                                <button id="convert_job" type="button" class="btn btn-w-m btn-danger pull-right config-head-btn-bottom"><i class="fa fa-cogs"></i> Đồng bộ sang SAMACOM</button>
                            </div>
                        </div>
                    </form>
                    <div class="ibox-content">
                        <div class="text-right domainJobFilter__resultText"> Số kết quả tìm kiếm:
                            <b>{{$domainJobs->Total()}}</b></div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Nguồn lấy về</th>
                                    <th>Tên công việc</th>
                                    <th>Trạng thái lấy về</th>
                                    <th>Trạng thái chuyển</th>
                                    <th>Ngày lấy về</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($domainJobs as $domainJob)
                                    <tr>
                                        <td>{{isset($domainJob->jobId)?$domainJob->jobId:''}}</td>
                                        <td>
                                            <a href="">{{isset($domainJob->name)?$domainJob->name:''}}</a>
                                        </td>
                                        <td>
                                            <a href="/job-craw-detail/{{$domainJob->id_job}}">{{isset($domainJob->job_name)?$domainJob->job_name:''}}</a>
                                        </td>
                                        <td>
                                            @if($domainJob->status==1)
                                                <b class="label label-success">Thành công</b>
                                            @else
                                                <b class="label label-danger">Thất bại</b>
                                            @endif
                                            @if(isset($domainJob->report_total))
                                                <label class="label label-info">
                                                    {{isset($domainJob->report_total)?$domainJob->report_total:''}}
                                                </label>
                                            @endif

                                        </td>
                                        <td>
                                            @if($domainJob->status_convert == 1)
                                                <b class="label label-success">Đã chuyển</b>
                                            @elseif($domainJob->status_convert == 3)
                                                <b class="label label-warning">Cập nhật</b>
                                            @else
                                                <b class="label label-danger">Chưa chuyển</b>
                                            @endif
                                        </td>
                                        <td>
                                          {{ date("d/m/Y", strtotime($domainJob->created_at))}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $domainJobs->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('javascript-bottom')
    <script src="{{asset('js/plugins/chosen/chosen.jquery.js')}}"></script>
    <script src="{{asset('js-service/domain-job.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.chosen-select').chosen({width: "100%"});
        });
    </script>

@endsection
@section('style-top')
    <link href="{{asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/chosen/bootstrap-chosen.css')}}" rel="stylesheet">
@endsection

