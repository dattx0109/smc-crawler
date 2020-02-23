@extends('layouts.base')

@section('content')

@if(isset($message) || session('message_config_detail'))
    <div>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            Cập nhật thành công.
        </div>
    </div>
@endif

<div class="tabs-container">
    <ul class="nav nav-tabs">
        <li class="
            {{ (! session('message_config_detail') &&
            ! (
            ($errors->has('company_name'))
            || ($errors->has('sex'))
            || ($errors->has('age'))
            || ($errors->has('experience'))
            || ($errors->has('degree'))
            || ($errors->has('salary_origin'))
            || ($errors->has('benefits'))
            || ($errors->has('job_description'))
            ||($errors->has('job_name'))
            || ($errors->has('link_url_test'))
            || session('message'))  && ! $errors->has('list_tag')) ? 'active' : '' }} ">
        <a data-toggle="tab" href="#tab-1" aria-expanded="true">Cấu hình cơ bản</a></li>
        <li class="{{ (
            ($errors->has('company_name'))
            || ($errors->has('sex'))
            || ($errors->has('age'))
            || ($errors->has('experience'))
            || ($errors->has('degree'))
            || ($errors->has('salary_origin'))
            || ($errors->has('benefits'))
            || ($errors->has('job_description'))
            ||($errors->has('job_name'))
            || ($errors->has('link_url_test'))
            || session('message')) ? 'active' : ''}} ">
        <a data-toggle="tab" href="#tab-2" aria-expanded="false">Cấu hình chi tiết</a></li>
        <li class="{{ ($errors->has('list_tag') || session('message_config_detail')) ? 'active' : ''}} "><a data-toggle="tab" href="#tab-3" aria-expanded="false">Cấu hình bộ điều kiện*</a></li>
    </ul>
    <div class="tab-content">
        <div id="tab-1" class="tab-pane {{
            (! session('message_config_detail') &&
            ! (($errors->has('company_name'))
            || ($errors->has('sex'))
            || ($errors->has('age'))
            || ($errors->has('experience'))
            || ($errors->has('degree'))
            || ($errors->has('salary_origin'))
            || ($errors->has('benefits'))
            || ($errors->has('job_description'))
            ||($errors->has('job_name'))
            || ($errors->has('link_url_test'))
            || session('message'))  && ! $errors->has('list_tag')) ? 'active' : '' }}">
            <div class="panel-body">
                <div class="col-sm-6">
                    <h3 class="pull-left"> <b class="">Tên website: </b><span>{{$domainName->name}}</span></h3>
                    <button {{$isStatusCrawlerRunning ? "disabled" : ''}} type="button" class="btn btn-primary pull-right" data-toggle="modal"
                            data-target="#addNewLink">
                        <i class="fa fa-plus"></i> Thêm link
                    </button>
                </div>
                <div class="row">
                    <div class="col-sm-6 pull-right">
                     <b>Bật tắt crawler:</b>    <input {{$isStatusCrawlerRunning ? "disabled" : ''}} type="checkbox" name="status_crawler" @if($configJobCrawler==true) checked @endif  data-toggle="toggle">
                    </div>
                </div>
                <br>
                <div class="row">
                    <!-- link bat dau -->
                    <div class="col-lg-6">
                        <div class="ibox ">
                            <div class="ibox-title ibox-left">
                                <h5>Link bắt đầu  </h5>
                                <div class="ibox-tools">
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#" class="dropdown-item">Config option 1</a>
                                        </li>
                                        <li><a href="#" class="dropdown-item">Config option 2</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="ibox-content">

                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>URL Link</th>
                                        <th>Định dạng URL</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i2 = 1 ?>
                                    @foreach($rawDataListUrl as $list)
                                    <tr>
                                        @if(($list->type)==1)
                                            <td>{{$i2}}</td>
                                            <td>{{$list->url}}</td>
                                            <td>{{$list->format_url}}</td>
                                            <?php $i2++ ?>
                                        @endif
                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- link chan-->
                    <div class="col-lg-6">
                        <div class="ibox ">
                            <div class="ibox-title ibox-right">
                                <h5>Link chặn  </h5>
                                <div class="ibox-tools">
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#" class="dropdown-item">Config option 1</a>
                                        </li>
                                        <li><a href="#" class="dropdown-item">Config option 2</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="ibox-content">

                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>URL Link</th>
                                        <th>Định dạng URL</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1 ?>
                                    @foreach($rawDataListUrl as $blacklist)
                                        <tr>
                                            @if(($blacklist->type==2))
                                                <td>{{$i}}</td>
                                                <td>{{$blacklist->url}}</td>
                                                <td>{{$blacklist->format_url}}</td>
                                                <?php $i ++ ?>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <!-- link chi tiet-->
                    <div class="col-lg-6">
                        <div class="ibox">
                            <div class="ibox-title" style="background-color: #33bed6; color: white;">
                                <h5>Link chi tiết công việc</h5>
                                <div class="ibox-tools">
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#" class="dropdown-item">Config option 1</a>
                                        </li>
                                        <li><a href="#" class="dropdown-item">Config option 2</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="ibox-content">

                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>URL Link</th>
                                        <th>Định dạng URL</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1 ?>
                                    @foreach($rawDataListUrl as $formatUrl)
                                        <tr>
                                            @if(($formatUrl->type==3))
                                                <td>{{$i}}</td>
                                                <td>{{$formatUrl->url}}</td>
                                                <td>{{$formatUrl->format_url}}</td>
                                                <?php $i ++ ?>
                                            @endif
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6"></div>
                </div>

            </div>
        </div>
        <div id="tab-2" class="tab-pane {{
            (($errors->has('company_name'))
            || ($errors->has('sex'))
            || ($errors->has('age'))
            || ($errors->has('experience'))
            || ($errors->has('degree'))
            || ($errors->has('salary_origin'))
            || ($errors->has('benefits'))
            || ($errors->has('job_description'))
            ||($errors->has('job_name'))
            || ($errors->has('link_url_test'))
            || session('message')) ? 'active' : ''}} ">
            <form action="{{url('job-config/'.request()->route()->parameters['id'])}}" method="post">
            <div class="panel-body">
                <div class="row jobConfig__headRow headRow-scroll">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-sm btn-primary pull-left" data-toggle="modal" data-target="#myModal"><i class="fa fa-support"></i> Hướng dẫn</button>
                        <div class="col-sm-8 pull-right">
                            <div class="jobConfig__headBar">
                                <div class="jobConfig__headInput">
                                    <input type="text" class="form-control" value="{{isset($jobConfig->link_url_test) ? $jobConfig->link_url_test : ''}}" name="link_url_test" placeholder="Link url crawler test" >
                                    <span>
                                        @if($errors->has('link_url_test'))
                                        <p class="text-danger pull-right">
                                            {{$errors->first('link_url_test')}}
                                        </p>
                                        @endif
                                    </span>
                                </div>
                                <div class="jobConfig__headBtn">
                                    <span class="input-group-append pull-right">
                                         <button type="button" class="btn btn-primary" id="crawTest">
                                             <i class="fa fa-send"></i>
                                             Crawler test
                                         </button>
                                    </span>
                                    <button {{$isStatusCrawlerRunning ? "disabled" : ''}} type="submit" class="btn btn-w-m btn-primary pull-right"><i class="fa fa-save"></i> Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="jobConfig__Container">
                        <div class="ibox float-e-margins jobConfig__Ibox">
                            <div class="ibox-title">
                                <h5>Thông tin công ty</h5>

                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="jobConfig__iboxInner">
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Tiêu đề - Tên job</label>
                                                <p class="text-danger pull-right job_name3"></p>
                                                <input type="text" name="job_name" value="{{isset($jobConfig->job_name) ? $jobConfig->job_name : ''}}" class="form-control">
                                                @if($errors->has('job_name'))
                                                    <p class="text-danger pull-right">
                                                        {{$errors->first('job_name')}}
                                                    </p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info job_name"></b>
                                                    <i class="text-dark pull-right job_name2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Tên công ty</label>
                                                <p class="text-danger pull-right company_name3"></p>
                                                <input type="text" name="company_name" value="{{isset($jobConfig->company_name) ? $jobConfig->company_name : ''}}" class="form-control">
                                                <span>
                                                    @if($errors->has('company_name'))
                                                    <p class="text-danger pull-right">
                                                    {{$errors->first('company_name')}}
                                                    </p>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info company_name"></b>
                                                    <i class="text-dark pull-right company_name2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Địa chỉ công ty</label>
                                                <p class="text-danger pull-right company_address3"></p>
                                                <input type="text" name="company_address" value="{{isset($jobConfig->company_address) ? $jobConfig->company_address : ''}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info company_address"></b>
                                                    <i class="text-dark pull-right company_address2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Quy mô công ty</label>
                                                <p class="text-danger pull-right company_size3"></p>
                                                <input type="text" name="company_size" value="{{isset($jobConfig->company_size) ? $jobConfig->company_size : ''}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info company_size"></b>
                                                    <i class="text-dark pull-right company_size2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Mô tả công ty</label>
                                                <p class="text-danger pull-right company_description3"></p>
                                                <input type="text" name="company_description" value="{{isset($jobConfig->company_description) ? $jobConfig->company_description : ''}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info company_description"></b>
                                                    <i class="text-dark pull-right company_description2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Hotline công ty</label>
                                                <p class="text-danger pull-right company_hotline3"></p>
                                                <input type="text" name="company_hotline" value="{{isset($jobConfig->company_hotline) ? $jobConfig->company_hotline : ''}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info company_hotline"></b>
                                                    <i class="text-dark pull-right company_hotline2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Website công ty</label>
                                                <p class="text-danger pull-right company_website3"></p>
                                                <input type="text" name="company_website" value="{{isset($jobConfig->company_website) ? $jobConfig->company_website : ''}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info company_website"></b>
                                                    <i class="text-dark pull-right company_website2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Email công ty</label>
                                                <p class="text-danger pull-right company_email3"></p>
                                                <input type="text" name="company_email" value="{{isset($jobConfig->company_email) ? $jobConfig->company_email : ''}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info company_email"></b>
                                                    <i class="text-dark pull-right company_email2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Logo công ty</label>
                                                <p class="text-danger pull-right company_logo3"></p>
                                                <input type="text" name="company_logo" value="{{isset($jobConfig->company_logo) ? $jobConfig->company_logo : ''}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info company_logo"></b>
                                                    <i class="text-dark pull-right company_logo2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Hình ảnh công ty</label>
                                                <p class="text-danger pull-right company_image3"></p>
                                                <input type="text" name="company_image" value="{{isset($jobConfig->company_image) ? $jobConfig->company_image : ''}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info company_image"></b>
                                                    <i class="text-dark pull-right company_image2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ibox float-e-margins jobConfig__Ibox">
                            <div class="ibox-title">
                                <h5>Thông tin công việc</h5>

                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="jobConfig__iboxInner">
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Địa điểm làm việc</label>
                                                <p class="text-danger pull-right workplace3"></p>
                                                <input type="text" name="workplace" value="{{isset($jobConfig->workplace) ? $jobConfig->workplace : ''}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info workplace"></b>
                                                    <i class="text-dark pull-right workplace2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Lương khởi điểm</label>
                                                <p class="text-danger pull-right salary_origin3"></p>
                                                <input type="text" name="salary_origin" value="{{isset($jobConfig->salary_origin) ? $jobConfig->salary_origin : ''}}" class="form-control">
                                                <span>
                                                    @if($errors->has('salary_origin'))
                                                        <p class="text-danger pull-right">
                                                        {{$errors->first('salary_origin')}}
                                                    </p>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info salary_origin"></b>
                                                    <i class="text-dark pull-right salary_origin2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Lương doanh số</label>
                                                <p class="text-danger pull-right salary_kpi3"></p>
                                                <input type="text" name="salary_kpi" value="{{isset($jobConfig->salary_kpi) ? $jobConfig->salary_kpi : ''}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info salary_kpi"></b>
                                                    <i class="text-dark pull-right salary_kpi2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Ngày hết hạn</label>
                                                <p class="text-danger pull-right date_expired3"></p>
                                                <input type="text" name="date_expired" value="{{isset($jobConfig->date_expired) ? $jobConfig->date_expired : ''}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info date_expired"></b>
                                                    <i class="text-dark pull-right date_expired2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Ngày đăng tin</label>
                                                <p class="text-danger pull-right date_publish3"></p>
                                                <input type="text" name="date_publish" value="{{isset($jobConfig->date_publish) ? $jobConfig->date_publish : ''}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info date_publish"></b>
                                                    <i class="text-dark pull-right date_publish2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Khoảng thời gian hết hạn</label>
                                                <p class="text-danger pull-right date_period3"></p>
                                                <input type="text" name="date_period" value="{{isset($jobConfig->date_period) ? $jobConfig->date_period : ''}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info date_period"></b>
                                                    <i class="text-dark pull-right date_period2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Tên thẻ</label>
                                                <p class="text-danger pull-right tag_name3"></p>
                                                <input type="text" name="tag_name" value="{{isset($jobConfig->tag_name) ? $jobConfig->tag_name : ''}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info tag_name"></b>
                                                    <i class="text-dark pull-right tag_name2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ibox float-e-margins jobConfig__Ibox">
                            <div class="ibox-title">
                                <h5>Thông tin chi tiết công việc</h5>

                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="jobConfig__iboxInner">
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Kinh nghiệm</label>
                                                <p class="text-danger pull-right date_period3"></p>
                                                <input type="text" name="experience" value="{{isset($jobConfig->experience) ? $jobConfig->experience : ''}}" class="form-control">
                                                <span>
                                                    @if($errors->has('experience'))
                                                    <p class="text-danger pull-right">
                                                    {{$errors->first('experience')}}
                                                    </p>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info experience"></b>
                                                    <i class="text-dark pull-right experience2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Bằng cấp</label>
                                                <p class="text-danger pull-right degree3"></p>
                                                <input type="text" name="degree" value="{{isset($jobConfig->degree) ? $jobConfig->degree : ''}}" class="form-control">
                                                <span>
                                                    @if($errors->has('degree'))
                                                        <p class="text-danger pull-right">
                                                        {{$errors->first('degree')}}
                                                    </p>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info degree"></b>
                                                    <i class="text-dark pull-right degree2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Số lượng tuyển dụng</label>
                                                <p class="text-danger pull-right employee_quantity3"></p>
                                                <input type="text" name="employee_quantity" value="{{isset($jobConfig->employee_quantity) ? $jobConfig->employee_quantity : ''}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info employee_quantity"></b>
                                                    <i class="text-dark pull-right employee_quantity2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Giới tính</label>
                                                <p class="text-danger pull-right sex3"></p>
                                                <input type="text" name="sex" value="{{isset($jobConfig->sex) ? $jobConfig->sex : ''}}" class="form-control">
                                                <span>
                                                    @if($errors->has('sex'))
                                                        <p class="text-danger pull-right">
                                                        {{$errors->first('sex')}}
                                                    </p>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info sex"></b>
                                                    <i class="text-dark pull-right sex2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Tuổi</label>
                                                <p class="text-danger pull-right age3"></p>
                                                <input type="text" name="age" value="{{isset($jobConfig->age) ? $jobConfig->age : ''}}" class="form-control">
                                                <span>
                                                    @if($errors->has('age'))
                                                        <p class="text-danger pull-right">
                                                    {{$errors->first('age')}}
                                                    </p>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info age"></b>
                                                    <i class="text-dark pull-right age2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Mô tả công việc</label>
                                                <p class="text-danger pull-right job_description3"></p>
                                                <input type="text" name="job_description" value="{{isset($jobConfig->job_description) ? $jobConfig->job_description : ''}}" class="form-control">
                                            <span>
                                            @if($errors->has('job_description'))
                                            <p class="text-danger pull-right">
                                                {{$errors->first('job_description')}}
                                            </p>
                                            @endif
                                            </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info job_description"></b>
                                                    <i class="text-dark pull-right job_description2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Hình thức làm việc (part-time/full-time)</label>
                                                <p class="text-danger pull-right working_form3"></p>
                                                <input type="text" name="working_form" value="{{isset($jobConfig->working_form) ? $jobConfig->working_form : ''}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info working_form"></b>
                                                    <i class="text-dark pull-right working_form2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Vai trò</label>
                                                <p class="text-danger pull-right role3"></p>
                                                <input type="text" name="role" value="{{isset($jobConfig->role) ? $jobConfig->role : ''}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info role"></b>
                                                    <i class="text-dark pull-right role2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Thời gian thử việc</label>
                                                <p class="text-danger pull-right probationary_period3"></p>
                                                <input type="text" name="probationary_period" value="{{isset($jobConfig->probationary_period) ? $jobConfig->probationary_period : ''}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info probationary_period"></b>
                                                    <i class="text-dark pull-right probationary_period2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Phúc lợi/ chế độ đãi ngộ</label>
                                                <p class="text-danger pull-right benefits3"></p>
                                                <input type="text" name="benefits" value="{{isset($jobConfig->benefits) ? $jobConfig->benefits : ''}}" class="form-control">
                                                <span>
                                            @if($errors->has('benefits'))
                                                        <p class="text-danger pull-right">
                                                {{$errors->first('benefits')}}
                                            </p>
                                                    @endif
                                            </span>
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info benefits"></b>
                                                    <i class="text-dark pull-right benefits2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Yêu cầu khác</label>
                                                <p class="text-danger pull-right other_requirements3"></p>
                                                <input type="text" name="other_requirements" value="{{isset($jobConfig->other_requirements) ? $jobConfig->other_requirements : ''}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info other_requirements"></b>
                                                    <i class="text-dark pull-right other_requirements2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                    <div class="col-sm-5 col-md-5 col-xs-12">
                                        <div class="jobConfig__Title">
                                            <label>Hình thức ứng tuyển</label>
                                            <p class="text-danger pull-right application_type3"></p>
                                            <input type="text" name="application_type" value="{{isset($jobConfig->application_type) ? $jobConfig->application_type : ''}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-7 col-md-7 col-xs-12">
                                        <div class="jobConfig__Content">
                                            <div class="form-group jobConfig__contentInner">
                                                <b class="text-info application_type"></b>
                                                <i class="text-dark pull-right application_type2"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="ibox float-e-margins jobConfig__Ibox">
                            <div class="ibox-title">
                                <h5>Thông tin liên hệ</h5>

                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="jobConfig__iboxInner">
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Người liên hệ</label>
                                                <p class="text-danger pull-right job_contact_name3"></p>
                                                <input type="text" name="job_contact_name" value="{{isset($jobConfig->job_contact_name) ? $jobConfig->job_contact_name : ''}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info job_contact_name"></b>
                                                    <i class="text-dark pull-right job_contact_name2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Số điện thoại liên hệ</label>
                                                <p class="text-danger pull-right job_contact_phone3"></p>
                                                <input type="text" name="job_contact_phone" value="{{isset($jobConfig->job_contact_phone) ? $jobConfig->job_contact_phone : ''}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info job_contact_phone"></b>
                                                    <i class="text-dark pull-right job_contact_phone2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                        <div class="col-sm-5 col-md-5 col-xs-12">
                                            <div class="jobConfig__Title">
                                                <label>Email liên hệ</label>
                                                <p class="text-danger pull-right job_contact_email3"></p>
                                                <input type="text" name="job_contact_email" value="{{isset($jobConfig->job_contact_email) ? $jobConfig->job_contact_email : ''}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-7 col-md-7 col-xs-12">
                                            <div class="jobConfig__Content">
                                                <div class="form-group jobConfig__contentInner">
                                                    <b class="text-info job_contact_email"></b>
                                                    <i class="text-dark pull-right job_contact_email2"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="jobConfig__Item">
                                    <div class="col-sm-5 col-md-5 col-xs-12">
                                        <div class="jobConfig__Title">
                                            <label>Thông tin liên hệ</label>
                                            <p class="text-danger pull-right job_contact_description3"></p>
                                            <input type="text" name="job_contact_description" value="{{isset($jobConfig->job_contact_description) ? $jobConfig->job_contact_description : ''}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-7 col-md-7 col-xs-12">
                                        <div class="jobConfig__Content">
                                            <div class="form-group jobConfig__contentInner">
                                                <b class="text-info job_contact_description"></b>
                                                <i class="text-dark pull-right job_contact_description"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

{{--                <button type="submit" class="btn btn-w-m btn-primary pull-right"><i class="fa fa-save"></i> Save</button>--}}
            </div>
        </form>
        </div>
        <div id="tab-3" class="tab-pane {{ ($errors->has('list_tag') || session('message_config_detail')) ? 'active' : ''}}">
            <form action="{{url('job-config-detail/'.request()->route()->parameters['id'])}}" method="post">
                <div class="panel-body">
                    <div class="row jobConfig__headRow">
                        <div class="col-sm-12">
                            <button type="button" class="btn btn-sm btn-primary pull-left" data-toggle="modal" data-target="#tagModal"><i class="fa fa-support"></i> Hướng dẫn</button>
                            <div class="col-sm-8 pull-right">
                                <div class="jobConfig__headBar">
                                    <div class="jobConfig__headInput">
                                        <span>

                                        </span>
                                    </div>
                                    <div class="jobConfig__headBtn pull-right">
                                        <button {{$isStatusCrawlerRunning ? "disabled" : ''}} type="submit" class="btn btn-w-m btn-primary pull-right"><i class="fa fa-save"></i> Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="jobConfig__Container">
                            <div class="tagForm__Item">
                                <label class="tagForm__Label">Danh sách tags</label>
                                <p class="text-danger pull-right tag_name3">
                                @if($errors->has('list_tag'))
                                    <p class="text-danger pull-right">
                                        {{$errors->first('list_tag')}}
                                    </p>
                                 @endif
                                </p>
                                <input type="text" name="list_tag" value="{{isset($jobConfigDetailService['list_tag']) ? $jobConfigDetailService['list_tag'] : ''}}" data-role="tagsinput" class="tagForm__Input form-control" placeholder="Nhập tags..." />
                            </div>
                            <div class="tagForm__Item tagForm__Item--half chosen-select-no-search mr10">
                                <label>Định dạng ngày bắt đầu (vd: yyyy/mm/dd)</label>
                                <select name="date_start" class="form-control chosen-select chosen-width-drop">
                                    <option value="mm/dd/yyyy" {{(isset($jobConfigDetailService['date_start']) && $jobConfigDetailService['date_start'] === 'mm/dd/yyyy') ? 'selected' : ''}} >mm/dd/yyyy</option>
                                    <option value="mm/dd/yy" {{(isset($jobConfigDetailService['date_start']) && $jobConfigDetailService['date_start'] === 'mm/dd/yy') ? 'selected' : ''}} >mm/dd/yy</option>
                                    <option value="dd/mm/yyyy" {{(isset($jobConfigDetailService['date_start']) && $jobConfigDetailService['date_start'] === 'dd/mm/yyyy') ? 'selected' : ''}}>dd/mm/yyyy</option>
                                    <option value="dd/mm/yy" {{(isset($jobConfigDetailService['date_start']) && $jobConfigDetailService['date_start'] === 'dd/mm/yy') ? 'selected' : ''}}>dd/mm/yy</option>
                                    <option value="dd-mm-yyyy" {{(isset($jobConfigDetailService['date_start']) && $jobConfigDetailService['date_start'] === 'dd-mm-yyyy') ? 'selected' : ''}}>dd-mm-yyyy</option>
                                    <option value="dd-mm-yy" {{(isset($jobConfigDetailService['date_start']) && $jobConfigDetailService['date_start'] === 'dd-mm-yy') ? 'selected' : ''}}>dd-mm-yy</option>
                                    <option value="mm-dd-yyyy" {{(isset($jobConfigDetailService['date_start']) && $jobConfigDetailService['date_start'] === 'mm-dd-yyyy') ? 'selected' : ''}}>mm-dd-yyyy</option>
                                    <option value="mm-dd-yy" {{(isset($jobConfigDetailService['date_start']) && $jobConfigDetailService['date_start'] === 'mm-dd-yy') ? 'selected' : ''}}>mm-dd-yy</option>
                                    <option value="yyyy-mm-dd" {{(isset($jobConfigDetailService['date_start']) && $jobConfigDetailService['date_start'] === 'yyyy-mm-dd') ? 'selected' : ''}}>yyyy-mm-dd</option>
                                    <option value="m/d/yyyy" {{(isset($jobConfigDetailService['date_start']) && $jobConfigDetailService['date_start'] === 'm/d/yyyy') ? 'selected' : ''}}>m/d/yyyy</option>
                                    <option value="m/d/yy" {{(isset($jobConfigDetailService['date_start']) && $jobConfigDetailService['date_start'] === 'm/d/yy') ? 'selected' : ''}}>m/d/yy</option>
                                    <option value="d/m/yyyy" {{(isset($jobConfigDetailService['date_start']) && $jobConfigDetailService['date_start'] === 'd/m/yyyy') ? 'selected' : ''}}>d/m/yyyy</option>
                                    <option value="d/m/yy" {{(isset($jobConfigDetailService['date_start']) && $jobConfigDetailService['date_start'] === 'd/m/yy') ? 'selected' : ''}}>d/m/yy</option>
                                    <option value="m-d-yyyy" {{(isset($jobConfigDetailService['date_start']) && $jobConfigDetailService['date_start'] === 'm-d-yyyy') ? 'selected' : ''}}>m-d-yyyy</option>
                                    <option value="m-d-yy" {{(isset($jobConfigDetailService['date_start']) && $jobConfigDetailService['date_start'] === 'm-d-yy') ? 'selected' : ''}}>m-d-yy</option>
                                    <option value="d-m-yyyy" {{(isset($jobConfigDetailService['date_start']) && $jobConfigDetailService['date_start'] === 'd-m-yyyy') ? 'selected' : ''}}>d-m-yyyy</option>
                                    <option value="d-m-yy" {{(isset($jobConfigDetailService['date_start']) && $jobConfigDetailService['date_start'] === 'd-m-yy') ? 'selected' : ''}}>d-m-yy</option>
                                </select>
{{--                                <input type="text" name="date_start" value="{{isset($jobConfig->date_start) ? $jobConfig->date_start : ''}}" class="form-control">--}}
{{--                                <p class="text-danger date_start3">Lỗi file không đúng định dạng, vui lòng thử lại</p>--}}
                            </div>
                            <div class="tagForm__Item tagForm__Item--half chosen-select-no-search mr10">
                                <label>Định dạng ngày kết thúc (vd: yyyy/mm/dd)</label>
                                <select name="date_end" class="form-control chosen-select chosen-width-drop">
                                    <option value="mm/dd/yyyy" {{(isset($jobConfigDetailService['date_end']) && $jobConfigDetailService['date_end'] === 'mm/dd/yyyy') ? 'selected' : ''}} >mm/dd/yyyy</option>
                                    <option value="mm/dd/yy" {{(isset($jobConfigDetailService['date_end']) && $jobConfigDetailService['date_end'] === 'mm/dd/yy') ? 'selected' : ''}} >mm/dd/yy</option>
                                    <option value="dd/mm/yyyy" {{(isset($jobConfigDetailService['date_end']) && $jobConfigDetailService['date_end'] === 'dd/mm/yyyy') ? 'selected' : ''}}>dd/mm/yyyy</option>
                                    <option value="dd/mm/yy" {{(isset($jobConfigDetailService['date_end']) && $jobConfigDetailService['date_end'] === 'dd/mm/yy') ? 'selected' : ''}}>dd/mm/yy</option>
                                    <option value="dd-mm-yyyy" {{(isset($jobConfigDetailService['date_end']) && $jobConfigDetailService['date_end'] === 'dd-mm-yyyy') ? 'selected' : ''}}>dd-mm-yyyy</option>
                                    <option value="dd-mm-yy" {{(isset($jobConfigDetailService['date_end']) && $jobConfigDetailService['date_end'] === 'dd-mm-yy') ? 'selected' : ''}}>dd-mm-yy</option>
                                    <option value="mm-dd-yyyy" {{(isset($jobConfigDetailService['date_end']) && $jobConfigDetailService['date_end'] === 'mm-dd-yyyy') ? 'selected' : ''}}>mm-dd-yyyy</option>
                                    <option value="mm-dd-yy" {{(isset($jobConfigDetailService['date_end']) && $jobConfigDetailService['date_end'] === 'mm-dd-yy') ? 'selected' : ''}}>mm-dd-yy</option>
                                    <option value="yyyy-mm-dd" {{(isset($jobConfigDetailService['date_end']) && $jobConfigDetailService['date_end'] === 'yyyy-mm-dd') ? 'selected' : ''}}>yyyy-mm-dd</option>
                                    <option value="m/d/yyyy" {{(isset($jobConfigDetailService['date_end']) && $jobConfigDetailService['date_end'] === 'm/d/yyyy') ? 'selected' : ''}}>m/d/yyyy</option>
                                    <option value="m/d/yy" {{(isset($jobConfigDetailService['date_end']) && $jobConfigDetailService['date_end'] === 'm/d/yy') ? 'selected' : ''}}>m/d/yy</option>
                                    <option value="d/m/yyyy" {{(isset($jobConfigDetailService['date_end']) && $jobConfigDetailService['date_end'] === 'd/m/yyyy') ? 'selected' : ''}}>d/m/yyyy</option>
                                    <option value="d/m/yy" {{(isset($jobConfigDetailService['date_end']) && $jobConfigDetailService['date_end'] === 'd/m/yy') ? 'selected' : ''}}>d/m/yy</option>
                                    <option value="m-d-yyyy" {{(isset($jobConfigDetailService['date_end']) && $jobConfigDetailService['date_end'] === 'm-d-yyyy') ? 'selected' : ''}}>m-d-yyyy</option>
                                    <option value="m-d-yy" {{(isset($jobConfigDetailService['date_end']) && $jobConfigDetailService['date_end'] === 'm-d-yy') ? 'selected' : ''}}>m-d-yy</option>
                                    <option value="d-m-yyyy" {{(isset($jobConfigDetailService['date_end']) && $jobConfigDetailService['date_end'] === 'd-m-yyyy') ? 'selected' : ''}}>d-m-yyyy</option>
                                    <option value="d-m-yy" {{(isset($jobConfigDetailService['date_end']) && $jobConfigDetailService['date_end'] === 'd-m-yy') ? 'selected' : ''}}>d-m-yy</option>
                                </select>
{{--                                <input type="text" name="date_end" value="{{isset($jobConfig->date_end) ? $jobConfig->date_end : ''}}" class="form-control">--}}
{{--                                <p class="text-danger date_end3">Lỗi file không đúng định dạng</p>--}}
                            </div>
                            <div class="tagForm__Item tagForm__Item--half">
                                <label>Khoảng thời gian (số ngày)</label>
                                <input type="number" min="0" name="period" value="{{isset($jobConfigDetailService['period']) ? $jobConfigDetailService['period'] : ''}}" class="form-control">
{{--                                <p class="text-danger date_period3">Lỗi file không đúng định dạng</p>--}}
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

    <!-- The Modal new domain -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Hướng dẫn config hệ thống crawler</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                    <div class="modal-body">
                        <p>Thao tác với DOM sử dụng các thuộc tính</p> <br/>
                        <p class="text-danger">Ghi chú: Muốn lấy vị trí trong list kết quả tìm thấy thêm kí tự & + vitri. </p> <br/>
                        <b class="text-danger"> Ví dụ: .mw-box-item&2</b>
                    </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tagModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Hướng dẫn config tag hệ thống crawler</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <p>Thao tác với DOM sử dụng các thuộc tính</p> <br/>
                    <p class="text-danger">Ghi chú: Muốn lấy vị trí trong list kết quả tìm thấy thêm kí tự & + vitri. </p> <br/>
                    <b class="text-danger"> Ví dụ: .mw-box-item&2</b>
                </div>
            </div>
        </div>
    </div>
    <!--Model add new link-->
    <div class="modal fade" id="addNewLink">
    <div class="modal-dialog modal-dialog-centered text-center">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title text-center">Thêm link</h2>
            </div>
            <!-- Modal body -->
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="website" class="pull-left">URL Link:</label>
                        <input type="text" name="website" class="form-control" id="url" name="email">
                        <span class="text-danger notificaiton pull-right"></span>
                    </div>
                    <div class="form-group" id="div_link">
                        <label for="website" class="pull-left">Link thuộc thẻ div</label>
                        <input type="text" name="div" class="form-control" id="div">
                        <span class="text-danger notificaiton pull-right"></span>
                    </div>
                    <div class="form-group">
                        <label for="" class="pull-left">Định dạng URL:</label>
                        <input type="text" name="url_link_detail" class="form-control" id="format_url" name="email">
                        <span class="text-danger notificaitonUrl pull-right"></span>
                    </div>
                    <br>
                    <div class="form-group">
                        <div class="i-checks form-check-inline">
                         <label> <input type="radio"  name="type" value="1" checked="checked" id="check1"> <i></i> Link bắt đầu </label>
                            &emsp;
                        <label> <input type="radio"  name="type" value="2" id="check2" > <i></i> Link Chặn </label>
                            &emsp;
                        <label> <input type="radio"  name="type" value="3" id="check3" > <i></i> Link Chi tiết </label>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer text-center">
                    <div  id="btn-add-new-url" class="btn btn-w-m btn-primary">
                        <i class="fa fa-save"></i> Save
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('javascript-bottom')
    <script src="{{ asset('js-service/add-new-url.js')}}"></script>
    <script src="{{ asset('js-service/hide_div.js')}}"></script>
    <script src="/js-service/crawler-test.js"></script>

    <script src="{{asset('js/plugins/iCheck/icheck.min.js')}}"></script>
    <script src="{{asset('js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script src="{{asset('js/plugins/chosen/chosen.jquery.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>

    <script>
        var $wrawperBody = $('#wrapper');

        // disable event enter
        $wrawperBody.keypress(function (event) {
            if (event.keyCode === 10 || event.keyCode === 13) {
                event.preventDefault();
            }
        });


        jQuery(document).ready(function ($) {
            // Add chosen select option style
            $('.chosen-select').chosen({width: "100%"});
            // Check scroll top when scrolling
            var previousScroll = 0;
            $(window).scroll(function(){
                var currentScroll = $(this).scrollTop();
                console.log(previousScroll);
                console.log(currentScroll);

                if (previousScroll > currentScroll && currentScroll > 0){
                    $('.headRow-scroll').addClass('headRow-active');
                }
                else if(currentScroll == 0){
                    $('.headRow-scroll').removeClass('headRow-active');
                }
                else{
                    $('.headRow-scroll').removeClass('headRow-active');
                }

                previousScroll = currentScroll;

            });
            // Job Config tags input
            $('.tagForm__Input').tagsinput();
        });
    </script>
@endsection
@section('style-top')
    <link href="{{asset('css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet">
    <link href="{{asset('css/plugins/chosen/bootstrap-chosen.css')}}" rel="stylesheet">

@endsection
