@extends('layouts.template')
@section('content')
<div class="container-fluid py-3">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="col-sm-12 bg-light-skyblue p-3 login_form">
                    <form method="POST"action=""onsubmit="return false">
                    @csrf
                        <h3 class="text-center text-info fw-bold">Log In</h3>
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email"autocomplete="off">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                        </div>
                        <div class="text-center mt-2 mb-2">
                            <span class="text-danger d-none mb-2"error_field="error"></span>
                        </div>
                        <div class="text-center d-flex justify-content-center"style="flex-flow: wrap;">
                            <button class="btn btn-primary text-white"id="btn_login"style="wrap-afterx: flex;">
                                Login
                                <i class="bi bi-arrow-repeat spin-icon d-none"></i>
                            </button>
                        </div>
                        <div class="alert alert-danger text-center py-1 mt-3 error_msg d-none">
                            Invalid Credientials
                        </div>
                    </form>
                    <a href="{{route('register.page')}}"class="d-block text-center">Create New Account / Register</a>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
<script type="text/javascript">
$('#btn_login').on('click',function(){
    $(this).prop('disabled',true).find('.spin-icon').removeClass('d-none');
    $('.error_msg').addClass('d-none');
    var formData=new FormData();
    formData.append('action',$('#password').val());
    formData.append('email',$('#email').val());
    formData.append('password',$('#password').val());
    $.ajax({
        url:"{{route('login')}}",
        method:'POST',
        data:formData,
        dataType:'JSON',
        cache:false,
        contentType: false,
        processData: false,
        success:function(data){
            console.log(data);
            if(data.status=='success'){window.location.reload();}
            else{
                $('.error_msg').removeClass('d-none').html(data.message);
                $('#btn_login').prop('disabled',false).find('.spin-icon').addClass('d-none');
            }
        }
    });
});
</script>
@endsection