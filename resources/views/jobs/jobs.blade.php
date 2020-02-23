@extends('layouts.base')
@section('content')
    <div class="jobDetail-container">
        <div class="jobDetail__Item">
            <div class="jobDetail__Title">Thông tin công việc</div>
            <table class="table table-striped table-hover jobDetail__Table">
                <tr>
                    <th>Tên công việc</th>
                    <td>
                        <strong>{{$listJob->job_name}}</strong>
                    </td>
                </tr>
                <tr>
                    <th>Địa điểm làm việc</th>
                    <td>
                        {{isset($listJob->workplace)?$listJob->workplace:'Không có dữ liệu'}}
                    </td>
                </tr>
                <tr>
                    <th>Lương khởi điểm</th>
                    <td>
                        {{isset($listJob->salary_origin)?$listJob->salary_origin:'Không có dữ liệu'}}
                    </td>
                </tr>
                <tr>
                    <th>Lương doanh số</th>
                    <td>
                        {{isset($listJob->salary_kpi)?$listJob->salary_kpi:'Không có dữ liệu'}}
                    </td>
                </tr>
                <tr>
                    <th>Ngày hết hạn</th>
                    <td>
                        {{isset($listJob->date_expired)?$listJob->date_expired:'Không có dữ liệu'}}
                    </td>
                </tr>
                <tr>
                    <th>Ngày đăng tin</th>
                    <td>
                        {{isset($listJob->date_publish)?$listJob->date_publish:'Không có dữ liệu'}}
                    </td>
                </tr>
                <tr>
                    <th>Khoảng thời gian</th>
                    <td>
                        {{isset($listJob->date_period)?$listJob->date_period:'Không có dữ liệu'}}
                    </td>
                </tr>
                <tr>
                    <th>Kinh nghiệm</th>
                    <td>
                        {{isset($listJob->experience)?$listJob->experience:'Không có dữ liệu'}}
                    </td>
                </tr>
                <tr>
                    <th>Bằng cấp</th>
                    <td>
                        {{isset($listJob->degree)?$listJob->degree:'Không có dữ liệu'}}
                    </td>
                </tr>
                <tr>
                    <th>Số lượng tuyển dụng</th>
                    <td>
                        {{isset($listJob->employee_quantity)?$listJob->employee_quantity:'Không có dữ liệu'}}
                    </td>
                </tr>
                <tr>
                    <th>Giới tính</th>
                    <td>
                        @if($listJob->sex==1)
                            Nam
                        @else
                            Nữ
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Tuổi</th>
                    <td>
                        {{isset($listJob->age)?$listJob->age:'Không có dữ liệu'}}
                    </td>
                </tr>
                <tr>
                    <th>Mô tả công việc</th>
                    <td>
                        {{isset($listJob->job_description)?$listJob->job_description:'Không có dữ liệu'}}
                    </td>
                </tr>
                <tr>
                    <th>Hình thức làm việc</th>
                    <td>
                        @if($listJob->working_form==1)
                            Toàn thời gian
                        @else
                            Bán thời gian
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Vai trò công việc</th>
                    <td>
                        {{isset($listJob->role)?$listJob->role:'Không có dữ liệu'}}
                    </td>
                </tr>
                <tr>
                    <th>Thời gian thử việc</th>
                    <td>
                        {{isset($listJob->probationary_period)?$listJob->probationary_period:'Không có dữ liệu'}}
                    </td>
                </tr>
                <tr>
                    <th>Phúc lợi/chế độ đãi ngộ</th>
                    <td>
                        {{$listJob->benefits}}
                    </td>
                </tr>
                <tr>
                    <th>Yêu cầu khác</th>
                    <td>
                        {{isset($listJob->other_requirements)?$listJob->other_requirements:'Không có dữ liệu'}}
                    </td>
                </tr>
                <tr>
                    <th>Hình thức ứng tuyển</th>
                    <td>
                        {{isset($listJob->application_type)?$listJob->application_type:'Không có dữ liệu'}}
                    </td>
                </tr>
            </table>
        </div>
        <div class="jobDetail__Item">
            <div class="jobDetail__Title">Trạng thái crawl</div>
            <table class="table table-striped table-hover jobDetail__Table">
                <tr>
                    <th>Link crawl</th>
                    <td>
                        <a href="{{$listJob->link_crawler}}" target="_blank">{{$listJob->link_crawler}}</a>
                    </td>
                </tr>
                <tr>
                    <th>Trạng thái crawl</th>
                    <td>
                        @if($listJob->status==1)
                            <b class="label label-success">Thành công</b>
                        @else
                            <b class="label label-danger">Thất bại</b>
                        @endif

                    </td>
                </tr>
                <tr>
                    <th>Trạng thái convert</th>
                    <td>
                        @if($listJob->status_convert==1)
                            <b class="label label-success">Đã chuyển</b>
                        @else
                            <b class="label label-danger">Chưa chuyển</b>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
        <div class="jobDetail__Item">
            <div class="jobDetail__Title">Thông tin công ty</div>
            <table class="table table-striped table-hover jobDetail__Table">
                <tr>
                    <th>Tên công ty</th>
                    <td>
                        {{isset($listJob->company_name)?$listJob->company_name:'Không có dữ liệu'}}
                    </td>
                </tr>
                <tr>
                    <th>Địa chỉ</th>
                    <td>
                        {{isset($listJob->company_address)?$listJob->company_address:'Không có dữ liệu'}}
                    </td>
                </tr>
                <tr>
                    <th>Quy mô</th>
                    <td>
                        {{isset($listJob->company_size)?$listJob->company_size:'Không có dữ liệu'}}
                    </td>
                </tr>
                <tr>
                    <th>Mô tả/giới thiệu</th>
                    <td>
                        {{isset($listJob->company_description)?$listJob->company_description:'Không có dữ liệu'}}
                    </td>
                </tr>
                <tr>
                    <th>Hotline</th>
                    <td>
                        <a href="tel:{{$listJob->company_hotline}}">{{isset($listJob->company_hotline)?$listJob->company_hotline:'Không có dữ liệu'}}</a>
                    </td>
                </tr>
                <tr>
                    <th>Website</th>
                    <td>
                        <a href="{{$listJob->company_website}}" target="_blank">{{isset($listJob->company_website)?$listJob->company_website:'Không có dữ liệu'}}</a>
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>
                        <a href="mailto:{{$listJob->company_email}}">{{isset($listJob->company_email)?$listJob->company_email:'Không có dữ liệu'}}</a>
                    </td>
                </tr>
                <tr>
                    <th>Logo</th>
                    <td>
                        <img src="{{URL::to(isset($listJob->company_logo)?$listJob->company_logo:'')}}" alt="Ảnh logo">
                    </td>
                </tr>
                <tr>
                    <th>Ảnh công ty</th>
                    <td>
                        <img src="{{URL::to(isset($listJob->company_image)?$listJob->company_image:'')}}" alt="Ảnh công ty">
                    </td>
                </tr>
            </table>
        </div>
        <div class="jobDetail__Item">
            <div class="jobDetail__Title">Thông tin liên hệ</div>
            <table class="table table-striped table-hover jobDetail__Table">
                <tr>
                    <th>Người liên hệ</th>
                    <td>
                        {{isset($listJob->job_contact_name)?$listJob->job_contact_name:'Không có dữ liệu'}}
                    </td>
                </tr>
                <tr>
                    <th>SĐT liên hệ</th>
                    <td>
                        <a href="tel:{{$listJob->job_contact_phone}}">{{isset($listJob->job_contact_phone)?$listJob->job_contact_phone:'Không có dữ liệu'}}</a>
                    </td>
                </tr>
                <tr>
                    <th>Email liên hệ</th>
                    <td>
                        <a href="mailto:{{$listJob->job_contact_email}}">{{isset($listJob->job_contact_email)?$listJob->job_contact_email:'Không có dữ liệu'}}</a>
                    </td>
                </tr>
                <tr>
                    <th>Thông tin liên hệ</th>

                    <td>
                        {{isset($listJob->job_contact_description)?$listJob->job_contact_description:'Không có dữ liệu'}}
                    </td>
                </tr>
            </table>
        </div>
    </div>



@endsection
@section('javascript-bottom')
    <script>
        $(document).ready(function () {
            // $( "td" ).find( ":contains('Không có dữ liệu')" ).addClass('null-info-block')
            $( "td:contains('Không có dữ liệu')" ).addClass('null-info-block');
        });
    </script>
@endsection

@section('style-top')

@endsection
