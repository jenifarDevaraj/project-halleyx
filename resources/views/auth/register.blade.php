@extends('layouts.template')
@section('content')
{{ Auth::user() }}
<div class="container-fluid py-3">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="col-sm-12 bg-light-skyblue p-3 register_form">
                    <form onsubmit="return false"id="form_register_1">
                        @csrf
                        <h3 class="text-center text-info fw-bold">Register</h3>
                        <div class="mb-3 mt-3">
                            <label for="first_name" class="form-label">First Name:</label>
                            <input type="text" class="form-control" id="first_name" placeholder="Enter First Name" name="first_name"autocomplete="off"required>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="last_name" class="form-label">Last Name:</label>
                            <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name" name="last_name"autocomplete="off"required>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email"autocomplete="off"required>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password"pattern=".{6,30}"required>
                        </div>
                        <div class="text-center d-flex justify-content-center"style="flex-flow: wrap;">
                            <button class="btn btn-primary btn_register text-white"id="btn_register"style="wrap-afterx: flex;">
                                Register
                                <i class="bi bi-arrow-repeat spin-icon d-none"></i>
                            </button>
                        </div>
                        <div class="alert alert-danger text-center py-1 mt-3 error_msg d-none">
                            Invalid Credientials
                        </div>
                    </form>
                    <p class="text-center">
                        Already have an account? 
                        <a href="{{route('home')}}"class="text-center">Login</a> 
                    </p>                   
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
<script type="text/javascript">
$('.btn_register').on('click',function(){
    $(this).prop('disabled',true).find('.spin-icon').removeClass('d-none');
    $('.error_msg').addClass('d-none');
    var formData=new FormData();
    formData.append('first_name',$('#first_name').val());
    formData.append('last_name',$('#last_name').val());
    formData.append('email',$('#email').val());
    formData.append('password',$('#password').val());
    $.ajax({
        url:'{{ route('register.submit') }}',
        method:'POST',
        data:formData,
        dataType:'JSON',
        cache:false,
        contentType: false,
        processData: false,
        success:function(data){
            // alert(data);
            if(data.status=='success'){window.location.reload();}
            else{
                $('.error_msg').removeClass('d-none').html(data.message);
                $('#btn_register').prop('disabled',false).find('.spin-icon').addClass('d-none');
            }
        }
    });
});
</script>
@endsection