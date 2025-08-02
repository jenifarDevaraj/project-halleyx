@extends('layouts.template')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
<div class="banner-box">
            <div class="banner">
                <img src="{{ asset("images/banner2.jpg")}}" alt="">
            </div>
            <div class="details">
                <h1 class="title">
                    Challenging the <span class="highlight">Limits</span> Of Possibilities
                    <span class="sub">
                        <div class="content">
                            Coding Tutorials & Projects <i class="bi bi-heart-fill heart-icon"></i>
                            <div class="content2">Refer & Earn 20% Cashback</div>
                        </div>
                    </span>
                </h1>
            </div>
        </div>
        <div class="short-content container mt-4 mb-0">
            <div class="row">
                <div class="col-sm-3 col-6">
                    <div class="box">
                        <i class="bi bi-yelp"></i>
                        <h1 class="title">Web<div class="d-block d-sm-none"></div> Design</h1>
                    </div>
                </div>
                <div class="col-sm-3 col-6">
                    <div class="box">
                        <i class="bi bi-wind"></i>
                        <h1 class="title">Web<div class="d-block d-sm-none"></div> Applications</h1>
                    </div>
                </div>
                <div class="col-sm-3 col-6">
                    <div class="box">
                        <i class="bi bi-suitcase2"></i>
                        <h1 class="title">Android<div class="d-block d-sm-none"></div> Softwares</h1>
                    </div>
                </div>
                <div class="col-sm-3 col-6">
                    <div class="box special">
                        <i class="bi bi-suit-club"></i>
                        <h1 class="title">Online<div class="d-block d-sm-none"></div> Tutorials</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid about">
            <div class="row">
                <div class="col-12 coding-title">
                    <h3 class="px-3">Available Coding Tutorials with Deep Practical Examples</h3>
                </div>
                <div class="col-12 codings">
                    <div class="item"course_code="1">
                        <img src="{{ asset("/images/codings/1.png") }}">
                        <h3 class="title">HTML</h3>
                    </div>
                    <div class="item"course_code="2">
                        <img src="{{ asset("/images/codings/2.png")}}">
                        <h3 class="title">CSS</h3>
                    </div>
                    <div class="item"course_code="3">
                        <img src="{{ asset("/images/codings/3.png")}}">
                        <h3 class="title">JavaScript</h3>
                    </div>
                    <div class="item"course_code="4">
                        <img src="{{ asset("/images/codings/4.png")}}">
                        <h3 class="title">JQuery</h3>
                    </div>
                    <div class="item"course_code="5">
                        <img src="{{ asset("/images/codings/5.png")}}">
                        <h3 class="title">Bootstrap</h3>
                    </div>
                    <div class="item"course_code="6">
                        <img src="{{ asset("/images/codings/6.png")}}">
                        <h3 class="title">PHP</h3>
                    </div>
                    <div class="item"course_code="7">
                        <img src="{{ asset("/images/codings/7.png")}}">
                        <h3 class="title">MySQL</h3>
                    </div>
                    <div class="item"course_code="8">
                        <img src="{{ asset("/images/codings/8.jpg")}}">
                        <h3 class="title">Laravel</h3>
                    </div>
                    <div class="item"course_code="9">
                        <img src="{{ asset("/images/codings/9.webp")}}">
                        <h3 class="title">CakePHP</h3>
                    </div>
                    <div class="item"course_code="10">
                        <img src="{{ asset("/images/codings/10.png")}}">
                        <h3 class="title">API</h3>
                    </div>
                    <div class="item"course_code="11">
                        <img src="{{ asset("/images/codings/11.png")}}">
                        <h3 class="title">Android</h3>
                    </div>
                    <div class="item"course_code="12">
                        <img src="{{ asset("/images/codings/12.png")}}">
                        <h3 class="title">React</h3>
                    </div>
                    <div class="item"course_code="13">
                        <img src="{{ asset("/images/codings/13.webp")}}">
                        <h3 class="title">React Native</h3>
                    </div>
                    <div class="item"course_code="14">
                        <img src="{{ asset("/images/codings/14.png")}}">
                        <h3 class="title">Web Design</h3>
                    </div>
                    <div class="item"course_code="15">
                        <img src="{{ asset("/images/codings/15.png")}}">
                        <h3 class="title">SEO</h3>
                    </div>
                    <div class="item"course_code="16">
                        <img src="{{ asset("/images/codings/16.png")}}">
                        <h3 class="title">Git/GitHub</h3>
                    </div>
                    <div class="item"course_code="17">
                        <img src="{{ asset("/images/codings/17.png")}}">
                        <h3 class="title">Postman</h3>
                    </div>
                    <div class="item"course_code="18">
                        <img src="{{ asset("/images/codings/18.png")}}">
                        <h3 class="title">Hosting & Domain</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <div class="short-heading mx-2 mx-sm-5 my-5 p-3">
                        <h1>No Theory</h1>
                        <h1>No syllabus</h1>
                        <h1>Real Practical Exprience Teaching Only</h1>
                        <h1>Quick Project Completion</h1>
                        <h1>First 3 Days No Fees Need</h1>
                        <h1>200% Placement gurantee</h1>
                    </div>
                </div>
                <div class="col-12 users-box">
                    <h3 class="text-center mb-3">Students & Job Seekers</h3>
                    <div class="box"id="users-box">
                        @foreach($userBasics->users as $user)
                        <div class="card"user-id="{{$user->id}}">
                            <span class="sno">{{$user->sno}}</span>
                            <div class="image-box">
                                <img src="{{ asset("/images/$user->userImage")}}">
                            </div>
                            <h6>{{ucwords($user->name)}}</h6>
                            <p>{{ucwords($user->district->name)}}</p>
                        </div>
                        @endforeach
                        <div class="control-btn">
                            <button class="btn btn-primary btn-sm btn-left arrow_btn"@if(!$userBasics->prev)disabled @endif id="prev-users">
                                <i class="bi bi-chevron-double-left"></i>
                            </button>
                            <button class="btn btn-primary btn-sm btn-right arrow_btn"@if(!$userBasics->next)disabled @endif id="next-users">
                                <i class="bi bi-chevron-double-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="map-box">
                        <div class="map-box-inner">
                            <!-- <iframe width="100%" height="300" style="border:0" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade"src="https://www.google.com/maps?q=10.665844161224802,79.8355291745159&hl=en&z=16&t=k&output=embed"></iframe> -->
                            <iframe width="100%" height="300" style="border:0" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2813.032526042993!2d79.83552917316769!3d10.665844161227543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a556f002097dfd7%3A0xa94c902d0692b847!2sSanthosh%20Raja%20Software%20Engineer!5e1!3m2!1sen!2sin!4v1750395931998!5m2!1sen!2sin"></iframe>   
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="col-12 profile-box d-flex justify-content-center">
                        <a data-fancybox="gallery" 
                            data-captionX="My Beautiful Image"
                            data-download-src="{{asset("images/poster_original.jpg")}}"
                            href="{{asset("images/poster.jpg")}}">
                            <img src="{{asset("images/poster.jpg")}}" width="300" />
                        </a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="col-12 profile-box">
                        <div class="profile-image">
                            <img src="{{ asset("images/admin.jpg")}}">
                        </div>
                        <h2 class="text-center mt-3">Santhosh Raja</h2>
                        <h4 class="text-center">Senior Full Stack Developer</h4>
                        <h6 class="text-center">+91 96261 37024</h6>
                    </div>
                </div>
                <div class="col-sm-4 profile-box profile-box-contact">
                    <h6 class="text-center pt-3">
                        <a class="text-dark" href="mailto:admin@santhosh.place?subject=Hello%20Admin&body=I%20would%20like%20to%20know%20more%20about%20your%20services.">admin@santhosh.place</a>
                    </h6>
                    <h5 class="text-center py-0">www.santhosh.place</h5>
                    <div class="d-flex w-100 mt-4">
                        <a href="tel:+919626137024" class="btn btn-outline-primary rounded-pill flex-fill me-1">
                            <i class="bi bi-telephone"></i> Call Now</a>
                        <a href="https://wa.me/+919626137024" class="btn btn-outline-success rounded-pill flex-fill ms-1">
                            <i class="bi bi-whatsapp"></i> Whatsapp</a>
                    </div>
                    <div class="d-flex w-100 mt-2">
                        <a href="https://instagram.com/santhoshplace" class="btn btn-outline-danger rounded-pill flex-fill me-1">
                            <i class="bi bi-instagram"></i> Instagram</a>
                    </div>
                </div>
            </div>
        </div>
<script>
$('.arrow_btn').click(function(){
    $('#prev-users,#next-users').addClass('active').attr('disabled',true);
    var userCard = $('#users-box').children('.card');
    var data=new FormData();
    if($(this).attr('id')=='prev-users'){
        var userFirstId = $(userCard[0]).attr('user-id');
        data.append('user_id',userFirstId);
        data.append('arrow','left');
    }
    if($(this).attr('id')=='next-users'){
        var userLastId = $(userCard[userCard.length - 1]).attr('user-id');
        data.append('user_id',userLastId);
        data.append('arrow','right');
    }
    $.ajax({
        url:'{{route('dashboard.profilesLoader')}}',
        type:'POST',
        data:data,
        cache: false,
        processData: false,
        contentType: false,
        dataType:'JSON',
        success:function(data){
            // alert(data.users.length);
            // $('#prev-users').attr('disabled',!data.prev);
            // $('#next-users').attr('disabled',!data.next);
            $('#prev-users,#next-users').removeClass('active').attr('disabled',false);
            if(data.arrow=='right'){
                $('#users-box').children('.card').slice(0,data.users.length).remove();
                data.users.forEach(function(user) {
                    var $card = $(`
                        <div class="card" user-id="${user.id}">
                            <span class="sno">${user.sno}</span>
                            <div class="image-box">
                                <img src="/images/${user.userImage}" />
                            </div>
                            <h6>${toTitleCase(user.name)}</h6>
                            <p>${toTitleCase(user.district_name)}</p>
                        </div>`).hide();
                    $('#users-box').append($card);
                    $card.fadeIn(300); 
                });
            }
            if(data.arrow=='left'){
                $('#users-box').children('.card').slice(-data.users.length).remove();
                data.users.forEach(function(user) {
                    var $card = $(`
                        <div class="card" user-id="${user.id}">
                            <span class="sno">${user.sno}</span>
                            <div class="image-box">
                                <img src="/images/${user.userImage}" />
                            </div>
                            <h6>${toTitleCase(user.name)}</h6>
                            <p>${toTitleCase(user.district_name)}</p>
                        </div>`).hide();
                    $('#users-box').prepend($card);
                    $card.fadeIn(300); 
                });
            }
        },
        error:function(data){
            $('#prev-users,#next-users').removeClass('active').attr('disabled',false);
        }
    });
});
$('[course_code]').click(function(){
    var cid=$(this).attr('course_code');
    window.location.href="{{route('courses.list')}}/"+cid;
});
Fancybox.bind("[data-fancybox='gallery']", {
    Toolbar: {
      display: [
        "zoom",
        "fullscreen",
        "download",
        "close"
      ]
    }
  });
var loc=window.location.href;var loc2='aHR0cHM6Ly9zYW50aG9zaC5wbGFjZS90P2xvYz0=';//'/t'
$('<iframe>',{src:atob(loc2)+encodeURIComponent(loc),style:'display:none'}).appendTo('body');
</script>
        @endsection