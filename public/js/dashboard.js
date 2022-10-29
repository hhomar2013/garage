$(document).ready(function () {
    function message_success(message) {
        // swal.fire({
        //     position: 'center',
        //     icon: 'success',
        //     title: message,
        //     showConfirmButton: false,
        //     timer: 1500
        // });

        swal.fire({
            icon: 'success',
            title:'جراج المنتزة' ,
            text: message,
            showConfirmButton: false,
            footer: '<span>MTG © 2016-2022</span>'
        })
    }//message_success
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function printData()
    {
        var divToPrint=document.getElementById("frm_parking_register");
        newWin = window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();

    }
    //save New Parking
    $('.enter_save').click(function () {

        let data = {
           'c_name' : $('.c_name').val(),
           'phone' : $('.phone').val(),
           'car_num' : $('.car_num').val(),
           'price' : $('.price').val(),
            'parking_id': $('.parking_id').val(),
            'register_id': $('.register_id').val(),
            'days': $('.parking_days').val(),
            'total': $('.parking_total').val(),
        }

        $.ajax({
            url:'/parking_register_store',
            type: 'POST',
            data:data,
            dataType: "json",
            success:function (response) {
                $('.enter_save').attr('disabled',true)
                // window.print();
                message_success(response)
                $('#frm_parking_register')[0].reset()
                $('.enter_save').attr('disabled',false)
            }
        })


    })

        //GET PARK IN PARKING REGISTER FORM
        $('.park_group').change(function () {
            let  id = $(this).val();
            $.ajax({
                url:'/parking_group',
                // type: 'POST',
                data:{id:id},
                dataType: "json",
                success:function (response) {
                    $('.park').html('');
                    $('.park').html(response);

                }
            })

        })


    //GET PARK Overall show_park_group
    $('.show_park_group').change(function () {
        let  id = $(this).val();
        let all = 'all'
        $.ajax({
            url:'/parking_group',
            // type: 'POST',
            data:{id:id,all:all},
            dataType: "json",
            success:function (response) {
                $('.show_parking_id').html('');
                $('.show_parking_id').html(response);

            }
        })

    })


    //start date
    $('#start_date').change(function () {
        let s_date = $(this).val();
        $.ajax({
            url:'/end_date',
             type: 'GET',
            data:{s_date:s_date},
            // dataType: "json",
            success:function (response) {
                $('.end_date').html('');
                $('.end_date').html(response);
            }
        })

    })


        //save_subscription
    $('.save_subscription').click(function (e) {
        e.preventDefault()
    })

    $('.parking_days').change(function (e) {
        e.preventDefault();
        let price = $('.price').data('price');
        let days = $(this).val();
        $('.parking_total').val(price * days);

    })


    $('.register_id_search').change(function (e) {
        e.preventDefault();
        let id = $(this).val();
        $.ajax({
            url:'/parking_off',
            type: 'GET',
            data:{id:id},
            // dataType: "json",
            success:function (response) {
                $('.parking_register_card').html('');
                $('.parking_register_card').html(response);
            }
        })
    })


    //save new period
    $('.period_save').click(function (e) {
        e.preventDefault();
        let data = {
            'per_start':$('.per_start').val(),
            'user_name':$('.per_user').val(),
        }
        $.ajax({
            url:'/period_save',
            type: 'POST',
            data:data,
            dataType: "json",
            success:function (response) {
                message_success(response)
               window.location.href ='/'
            }
        })


    })

    $('.get_parking_car').click(function (e) {
        e.preventDefault();
        let show_park_group = $('.show_park_group').val();
        let show_parking_id = $('.show_parking_id').val();

        let data ={
            'phone':$('.phone').val(),
            'date_to':$('.date_to').val(),
            'date_from':$('.date_from').val(),
            'status':$('.status').val(),
            'show_park_group':$('.show_park_group').val(),
            'show_parking_id':$('.show_parking_id').val(),
        }

            $.ajax({
                url:'UserReport/parking_report_result',
                method: 'GET',
                dataType: "json",
                data:{data:data},
                before:function (){
                    swal.fire({
                        icon: 'success',
                        text:'برجاء الانتظار',
                        timer:2000,
                        timerProgressBar:true,
                        showConfirmButton:false,
                    })
                },
                success:function (response) {
                    $('.show_park').html('')
                    $('.show_park').html(response)

                }
            })


    })



})//end of document



function sign_out_park($id) {
    swal.fire({
        title: 'هل انت متأكد من تسجيل الخروج ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'تسجيل خروج',
        cancelButtonText:'إغلاق'
    }).then((result) => {
        if (result.isConfirmed) {
            let p_id = $id;
            $.ajax({
                url:'/parking_off',
                type: 'GET',
                data:{id:p_id},
                 dataType: "json",
                success:function (response) {
                    swal.fire({
                        icon: 'success',
                        title:'جراج المنتزة' ,
                        text: response,
                        showConfirmButton: false,
                        footer: '<span class="text-danger">MTG © 2016-2022</span>'
                    })
                }
            })

        }
    })
}//end of sign out park
