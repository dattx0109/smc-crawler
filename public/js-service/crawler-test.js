(function ($) {
    $(function () {
        const $btnCrawlerTest = $('#crawTest');
        const $urlCrawler = $("[name='link_url_test']");

        const $job_name = $("[name='job_name']");
        const $company_name = $("[name='company_name']");
        const $workplace = $("[name='workplace']");
        const $company_address = $("[name='company_address']");
        const $company_size = $("[name='company_size']");
        const $company_description = $("[name='company_description']");
        const $company_hotline = $("[name='company_hotline']");
        const $company_website = $("[name='company_website']");
        const $company_email = $("[name='company_email']");
        const $company_logo = $("[name='company_logo']");
        const $company_image = $("[name='company_image']");
        const $salary_origin = $("[name='salary_origin']");
        const $salary_kpi = $("[name='salary_kpi']");
        const $date_expired = $("[name='date_expired']");
        const $date_publish = $("[name='date_publish']");
        const $date_period = $("[name='date_period']");
        const $experience = $("[name='experience']");
        const $degree = $("[name='degree']");
        const $employee_quantity = $("[name='employee_quantity']");
        const $sex = $("[name='sex']");
        const $age = $("[name='age']");
        const $job_description = $("[name='job_description']");
        const $working_form = $("[name='working_form']");
        const $role = $("[name='role']");
        const $probationary_period = $("[name='probationary_period']");
        const $benefits = $("[name='benefits']");
        const $other_requirements = $("[name='other_requirements']");
        const $application_type = $("[name='application_type']");
        const $job_contact_name = $("[name='job_contact_name']");
        const $job_contact_phone = $("[name='job_contact_phone']");
        const $job_contact_email = $("[name='job_contact_email']");
        const $job_contact_description = $("[name='job_contact_description']");
        const $tag_name = $("[name='tag_name']");


        // text crawler
        const $degree_noti = $(".degree");
        const $job_name_noti = $(".job_name");
        const $company_name_noti = $(".company_name");
        const $workplace_noti = $(".workplace");
        const $company_address_noti = $(".company_address");
        const $company_size_noti = $(".company_size");
        const $company_description_noti = $(".company_description");
        const $company_hotline_noti = $(".company_hotline");
        const $company_website_noti = $(".company_website");
        const $company_email_noti = $(".company_email");
        const $company_logo_noti = $(".company_logo");
        const $company_image_noti = $(".company_image");
        const $salary_origin_noti = $(".salary_origin");
        const $salary_kpi_noti = $(".salary_kpi");
        const $date_expired_noti = $(".date_expired");
        const $date_publish_noti = $(".date_publish");
        const $date_period_noti = $(".date_period");
        const $experience_noti = $(".experience");
        const $employee_quantity_noti = $(".employee_quantity");
        const $sex_noti = $(".sex");
        const $age_noti = $(".age");
        const $job_description_noti = $(".job_description");
        const $working_form_noti = $(".working_form");
        const $role_noti = $(".role");
        const $probationary_period_noti = $(".probationary_period");
        const $benefits_noti = $(".benefits");
        const $other_requirements_noti = $(".other_requirements");
        const $application_type_noti = $(".application_type");
        const $job_contact_name_noti = $(".job_contact_name");
        const $job_contact_phone_noti = $(".job_contact_phone");
        const $job_contact_email_noti = $(".job_contact_email");
        const $job_contact_description_noti = $(".job_contact_description");
        const $tag_name_noti = $(".tag_name");


        // text crawler 2
        const $degree_noti2 = $(".degree2");
        const $job_name_noti2 = $(".job_name2");
        const $company_name_noti2 = $(".company_name2");
        const $workplace_noti2 = $(".workplace2");
        const $company_address_noti2 = $(".company_address2");
        const $company_size_noti2 = $(".company_size2");
        const $company_description_noti2 = $(".company_description2");
        const $company_hotline_noti2 = $(".company_hotline2");
        const $company_website_noti2 = $(".company_website2");
        const $company_email_noti2 = $(".company_email2");
        const $company_logo_noti2 = $(".company_logo2");
        const $company_image_noti2 = $(".company_image2");
        const $salary_origin_noti2 = $(".salary_origin2");
        const $salary_kpi_noti2 = $(".salary_kpi2");
        const $date_expired_noti2 = $(".date_expired2");
        const $date_publish_noti2 = $(".date_publish2");
        const $date_period_noti2 = $(".date_period2");
        const $experience_noti2 = $(".experience2");
        const $employee_quantity_noti2 = $(".employee_quantity2");
        const $sex_noti2 = $(".sex2");
        const $age_noti2 = $(".age2");
        const $job_description_noti2 = $(".job_description2");
        const $working_form_noti2 = $(".working_form2");
        const $role_noti2 = $(".role2");
        const $probationary_period_noti2 = $(".probationary_period2");
        const $benefits_noti2 = $(".benefits2");
        const $other_requirements_noti2 = $(".other_requirements2");
        const $application_type_noti2 = $(".application_type2");
        const $job_contact_name_noti2 = $(".job_contact_name2");
        const $job_contact_phone_noti2 = $(".job_contact_phone2");
        const $job_contact_email_noti2 = $(".job_contact_email2");
        const $job_contact_description_noti2 = $(".job_contact_description2");
        const $tag_name_noti1 = $(".tag_name2");

        // noti 3
        const $degree_noti3 = $(".degree3");
        const $job_name_noti3 = $(".job_name3");
        const $company_name_noti3 = $(".company_name3");
        const $workplace_noti3 = $(".workplace3");
        const $company_address_noti3 = $(".company_address3");
        const $company_size_noti3 = $(".company_size3");
        const $company_description_noti3 = $(".company_description3");
        const $company_hotline_noti3 = $(".company_hotline3");
        const $company_website_noti3 = $(".company_website3");
        const $company_email_noti3 = $(".company_email3");
        const $company_logo_noti3 = $(".company_logo3");
        const $company_image_noti3 = $(".company_image3");
        const $salary_origin_noti3 = $(".salary_origin3");
        const $salary_kpi_noti3 = $(".salary_kpi3");
        const $date_expired_noti3 = $(".date_expired3");
        const $date_publish_noti3 = $(".date_publish3");
        const $date_period_noti3 = $(".date_period3");
        const $experience_noti3 = $(".experience3");
        const $employee_quantity_noti3 = $(".employee_quantity3");
        const $sex_noti3 = $(".sex3");
        const $age_noti3 = $(".age3");
        const $job_description_noti3 = $(".job_description3");
        const $working_form_noti3 = $(".working_form3");
        const $role_noti3 = $(".role3");
        const $probationary_period_noti3 = $(".probationary_period3");
        const $benefits_noti3 = $(".benefits3");
        const $other_requirements_noti3 = $(".other_requirements3");
        const $application_type_noti3 = $(".application_type3");
        const $job_contact_name_noti3 = $(".job_contact_name3");
        const $job_contact_phone_noti3 = $(".job_contact_phone3");
        const $job_contact_email_noti3 = $(".job_contact_email3");
        const $job_contact_description_noti3 = $(".job_contact_description3");
        const $tag_name_noti3 = $(".tag_name3");

        const $loadingDom = '<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>';

        $btnCrawlerTest.on('click', function () {

            var rawDataPosting = {
                'job_name': $job_name.val(),
                'company_name': $company_name.val(),
                'workplace': $workplace.val(),
                'company_address': $company_address.val(),
                'company_size': $company_size.val(),
                'company_description': $company_description.val(),
                'company_hotline': $company_hotline.val(),
                'company_website': $company_website.val(),
                'company_email': $company_email.val(),
                'company_logo': $company_logo.val(),
                'company_image': $company_image.val(),
                'salary_origin': $salary_origin.val(),
                'salary_kpi': $salary_kpi.val(),
                'date_expired': $date_expired.val(),
                'date_publish': $date_publish.val(),
                'date_period': $date_period.val(),
                'experience': $experience.val(),
                'employee_quantity': $employee_quantity.val(),
                'sex': $sex.val(),
                'age': $age.val(),
                'job_description': $job_description.val(),
                'working_form': $working_form.val(),
                'role': $role.val(),
                'probationary_period': $probationary_period.val(),
                'benefits': $benefits.val(),
                'other_requirements': $other_requirements.val(),
                'application_type': $application_type.val(),
                'job_contact_name': $job_contact_name.val(),
                'job_contact_phone': $job_contact_phone.val(),
                'job_contact_email': $job_contact_email.val(),
                'job_contact_description': $job_contact_description.val(),
                'degree': $degree.val(),
                'url': $urlCrawler.val(),
                'tag_name': $tag_name.val()
            };

            // let urlCheckCrawler = 'http://127.0.0.1:8000/api/crawler-data-detail';
            let urlCheckCrawler = 'http://54.255.197.54/api/crawler-data-detail';
            let checkCrawler = $.post(urlCheckCrawler, rawDataPosting);

            $btnCrawlerTest.html($loadingDom);
            $btnCrawlerTest.attr("disabled", true);

            checkCrawler
                .then(function (response) {
                    $btnCrawlerTest.html('<i class="fa fa-send"></i> Crawler test');
                    $btnCrawlerTest.attr("disabled", false);

                     $job_name_noti.html('');
                     $company_name_noti.html('');
                     $workplace_noti.html('');
                     $company_address_noti.html('');
                     $company_size_noti.html('');
                     $company_description_noti.html('');
                     $company_hotline_noti.html('');
                     $company_website_noti.html('');
                     $company_email_noti.html('');
                     $company_logo_noti.html('');
                     $company_image_noti.html('');
                     $salary_origin_noti.html('');
                     $salary_kpi_noti.html('');
                     $date_expired_noti.html('');
                     $date_publish_noti.html('');
                     $date_period_noti.html('');
                     $experience_noti.html('');
                     $employee_quantity_noti.html('');
                     $sex_noti.html('');
                     $age_noti.html('');
                     $job_description_noti.html('');
                     $working_form_noti.html('');
                     $role_noti.html('');
                     $probationary_period_noti.html('');
                     $benefits_noti.html('');
                     $other_requirements_noti.html('');
                     $application_type_noti.html('');
                     $job_contact_name_noti.html('');
                     $job_contact_phone_noti.html('');
                     $job_contact_email_noti.html('');
                     $job_contact_description_noti.html('');
                     $degree_noti.html();
                     $tag_name_noti.html();


                    if (typeof response.degree !== 'undefined') {
                        console.log('vao roi nhe fjldjsfljsdklfjldsjf');
                        $degree_noti.html(response.degree.value);
                        $degree_noti2.text(response.degree.html);
                        $degree_noti3.html('Số kết quả tìm thấy: ' + response.degree.total);
                    }

                    if (typeof response.job_name !== 'undefined') {
                        $job_name_noti.html(response.job_name.value);
                        $job_name_noti2.text(response.job_name.html);
                        $job_name_noti3.html('Số kết quả tìm thấy: ' + response.job_name.total);
                    }

                    if (typeof response.company_name !== 'undefined') {
                        $company_name_noti.html(response.company_name.value);
                        $company_name_noti2.text(response.company_name.html);
                        $company_name_noti3.html('Số kết quả tìm thấy: ' + response.company_name.total);
                    }

                    if (typeof response.workplace !== 'undefined') {
                        $workplace_noti.html(response.workplace.value);
                        $workplace_noti2.text(response.workplace.html);
                        $workplace_noti3.html('Số kết quả tìm thấy: ' + response.workplace.total);
                    }

                    if (typeof response.company_address !== 'undefined') {
                        $company_address_noti.html(response.company_address.value);
                        $company_address_noti2.text(response.company_address.html);
                        $company_address_noti3.html('Số kết quả tìm thấy: ' + response.company_address.total);
                    }

                    if (typeof response.company_size !== 'undefined') {
                        $company_size_noti.html(response.company_size.value);
                        $company_size_noti2.text(response.company_size.html);
                        $company_size_noti3.html('Số kết quả tìm thấy: ' + response.company_size.total);
                    }

                    if (typeof response.company_description !== 'undefined') {
                        $company_description_noti.html(response.company_description.value);
                        $company_description_noti2.text(response.company_description.html);
                        $company_description_noti3.html('Số kết quả tìm thấy: ' + response.company_description.total);
                    }

                    if (typeof response.company_hotline !== 'undefined') {
                        $company_hotline_noti.html(response.company_hotline.value);
                        $company_hotline_noti2.text(response.company_hotline.html);
                        $company_hotline_noti3.html('Số kết quả tìm thấy: ' + response.company_hotline.total);
                    }

                    if (typeof response.company_website !== 'undefined') {
                        $company_website_noti.html(response.company_website.value);
                        $company_website_noti2.text(response.company_website.html);
                        $company_website_noti3.html('Số kết quả tìm thấy: ' + response.company_website.total);
                    }

                    if (typeof response.company_email !== 'undefined') {
                        $company_email_noti.html(response.company_email.value);
                        $company_email_noti2.text(response.company_email.html);
                        $company_email_noti3.html('Số kết quả tìm thấy: ' + response.company_email.total);
                    }

                    if (typeof response.company_logo !== 'undefined') {
                        $company_logo_noti.html(response.company_logo.value);
                        $company_logo_noti2.text(response.company_logo.html);
                        $company_logo_noti3.html('Số kết quả tìm thấy: ' + response.company_logo.total);
                    }

                    if (typeof response.company_image !== 'undefined') {
                        $company_image_noti.html(response.company_image.value);
                        $company_image_noti2.text(response.company_image.html);
                        $company_image_noti3.html('Số kết quả tìm thấy: ' + response.company_image.total);
                    }

                    if (typeof response.salary_origin !== 'undefined') {
                        $salary_origin_noti.html(response.salary_origin.value);
                        $salary_origin_noti2.text(response.salary_origin.html);
                        $salary_origin_noti3.html('Số kết quả tìm thấy: ' + response.salary_origin.total);
                    }

                    if (typeof response.salary_kpi !== 'undefined') {
                        $salary_kpi_noti.html(response.salary_kpi.value);
                        $salary_kpi_noti2.text(response.salary_kpi.html);
                        $salary_kpi_noti3.html('Số kết quả tìm thấy: ' + response.salary_kpi.total);
                    }

                    if (typeof response.date_expired !== 'undefined') {
                        $date_expired_noti.html(response.date_expired.value);
                        $date_expired_noti2.text(response.date_expired.html);
                        $date_expired_noti3.html('Số kết quả tìm thấy: ' + response.date_expired.total);
                    }

                    if (typeof response.date_publish !== 'undefined') {
                        $date_publish_noti.html(response.date_publish.value);
                        $date_publish_noti2.text(response.date_publish.html);
                        $date_publish_noti3.html('Số kết quả tìm thấy: ' + response.date_publish.total);
                    }

                    if (typeof response.date_period !== 'undefined') {
                        $date_period_noti.html(response.date_period.value);
                        $date_period_noti2.text(response.date_period.html);
                        $date_period_noti3.html('Số kết quả tìm thấy: ' + response.date_period.total);
                    }

                    if (typeof response.experience !== 'undefined') {
                        $experience_noti.html(response.experience.value);
                        $experience_noti2.text(response.experience.html);
                        $experience_noti3.html('Số kết quả tìm thấy: ' + response.experience.total);
                    }

                    if (typeof response.employee_quantity !== 'undefined') {
                        $employee_quantity_noti.html(response.employee_quantity.value);
                        $employee_quantity_noti2.text(response.employee_quantity.html);
                        $employee_quantity_noti3.html('Số kết quả tìm thấy: ' + response.employee_quantity.total);
                    }

                    if (typeof response.sex !== 'undefined') {
                        $sex_noti.html(response.sex.value);
                        $sex_noti2.text(response.sex.html);
                        $sex_noti3.html('Số kết quả tìm thấy: ' + response.sex.total);
                    }

                    if (typeof response.age !== 'undefined') {
                        $age_noti.html(response.age.value);
                        $age_noti2.text(response.age.html);
                        $age_noti3.html('Số kết quả tìm thấy: ' + response.age.total);
                    }

                    if (typeof response.job_description !== 'undefined') {
                        $job_description_noti.html(response.job_description.value);
                        $job_description_noti2.text(response.job_description.html);
                        $job_description_noti3.html('Số kết quả tìm thấy: ' + response.job_description.total);
                    }

                    if (typeof response.working_form !== 'undefined') {
                        $working_form_noti.html(response.working_form.value);
                        $working_form_noti2.text(response.working_form.html);
                        $working_form_noti3.html('Số kết quả tìm thấy: ' + response.working_form.total);
                    }

                    if (typeof response.role !== 'undefined') {
                        $role_noti.html(response.role.value);
                        $role_noti2.text(response.role.html);
                        $role_noti3.html('Số kết quả tìm thấy: ' + response.role.total);
                    }
                    if (typeof response.probationary_period !== 'undefined') {
                        $probationary_period_noti.html(response.probationary_period.value);
                        $probationary_period_noti2.text(response.probationary_period.html);
                        $probationary_period_noti3.html('Số kết quả tìm thấy: ' + response.probationary_period.total);
                    }

                    if (typeof response.benefits !== 'undefined') {
                        $benefits_noti.html(response.benefits.value);
                        $benefits_noti2.text(response.benefits.html);
                        $benefits_noti3.html('Số kết quả tìm thấy: ' + response.benefits.total);
                    }
                    if (typeof response.other_requirements !== 'undefined') {
                        $other_requirements_noti.html(response.other_requirements.value);
                        $other_requirements_noti2.text(response.other_requirements.html);
                        $other_requirements_noti3.html('Số kết quả tìm thấy: ' + response.other_requirements.total);
                    }

                    if (typeof response.application_type !== 'undefined') {
                        $application_type_noti.html(response.application_type.value);
                        $application_type_noti2.text(response.application_type.html);
                        $application_type_noti3.html('Số kết quả tìm thấy: ' + response.application_type.total);
                    }

                    if (typeof response.job_contact_name !== 'undefined') {
                        console.log(response.job_contact_name.value);
                        console.log('=====');
                        $job_contact_name_noti.html(response.job_contact_name.value);
                        $job_contact_name_noti2.text(response.job_contact_name.html);
                        $job_contact_name_noti3.html('Số kết quả tìm thấy: ' + response.job_contact_name.total);
                    }

                    if (typeof response.job_contact_phone !== 'undefined') {
                        $job_contact_phone_noti.html(response.job_contact_phone.value);
                        $job_contact_phone_noti2.text(response.job_contact_phone.html);
                        $job_contact_phone_noti3.html('Số kết quả tìm thấy: ' + response.job_contact_phone.total);
                    }

                    if (typeof response.job_contact_email !== 'undefined') {
                        $job_contact_email_noti.html(response.job_contact_email.value);
                        $job_contact_email_noti2.text(response.job_contact_email.html);
                        $job_contact_email_noti3.html('Số kết quả tìm thấy: ' + response.job_contact_email.total);
                    }

                    if (typeof response.job_contact_description !== 'undefined') {
                        // console.log(response.job_contact_description);
                        // console.log('ngon nroi nhe');
                        $job_contact_description_noti.html(response.job_contact_description.value);
                        $job_contact_description_noti2.text(response.job_contact_description.html);
                        $job_contact_description_noti3.html('Số kết quả tìm thấy: ' + response.job_contact_description.total);
                    }

                    if (typeof response.tag_name !== 'undefined') {
                        // console.log(response.tag_name);
                        console.log('ngon nroi nhe ========');
                        $tag_name_noti.html(response.tag_name.value);
                        $tag_name_noti2.text(response.tag_name.html);
                        $tag_name_noti3.html('Số kết quả tìm thấy: ' + response.tag_name.total);
                    }

                })
                .catch(function (response) {
                    $btnCrawlerTest.html('<i class="fa fa-send"></i> Crawler test');
                    $btnCrawlerTest.attr("disabled", false);
                    confirm("Hệ thống không thể crawler được do lỗi định dạng input.");
                })
            ;
        });
    })
})(window.jQuery);
