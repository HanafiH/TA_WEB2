@extends('layouts.frontend')



@section('content')
<section class="banner-area relative about-banner" id="home">	
    <div class="overlay overlay-bg"></div>
    <div class="container">				
        <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
                <h1 class="text-white">
                    Pendaftaran			
                </h1>	
                <p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="about.html"> Daftar</a></p>
            </div>	
        </div>
    </div>
</section>

<section class="search-course-area relative" style="background: unset;">
    <div class="overlay "></div>
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-6 col-md-6 search-course-left">
                <h1 class="">
                    Pendaftaran online <br>
                    Bergabung bersama kami!
                </h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita iusto veniam atque labore molestias illo optio consectetur iure dignissimos? Qui, accusamus. Voluptate similique nam amet exercitationem excepturi molestias officiis aut. 
                </p>
                <!-- <div class="row details-content">
                    <div class="col single-detials">
                        <span class="lnr lnr-graduation-hat"></span>
                        <a href="#"><h4>Expert Instructors</h4></a>		
                        <p>
                            Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                        </p>						
                    </div>
                    <div class="col single-detials">
                        <span class="lnr lnr-license"></span>
                        <a href="#"><h4>Certification</h4></a>		
                        <p>
                            Usage of the Internet is becoming more common due to rapid advancement of technology and power.
                        </p>						
                    </div>								
                </div> -->
            </div>
            <div class="col-lg-6 col-md-6 search-course-right section-gap" style="background-color: #ddd;">
                {!! Form::open(['url' => '/postregister', 'class' => 'form-wrap']) !!}
                    <h4 class=" pb-20 text-center mb-30">Daftar</h4>
                    {!!Form::text('nama','', ['class' => 'form-control', 'placeholder' => 'Nama Lengkap'])!!}
                    {!!Form::text('agama','', ['class' => 'form-control', 'placeholder' => 'Agama'])!!}
                    {!!Form::textarea('alamat','', ['class' => 'form-control', 'placeholder' => 'Alamat'])!!}
                    <div class="form-select" id="service-select">
                        {!!Form::select('gender', ['l' => 'Laki-Laki', 'p' => 'Perempuan'], null, ['placeholder' => 'Jenis Kelamin ...'])!!}
                    </div>
                    {!!Form::email('email','', ['class' => 'form-control', 'placeholder' => 'Email'])!!}
                    {!!Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password'])!!}

                    <input type="submit" class="primary-btn text-uppercase" value="Kirim">
                {!! Form::close() !!}
            </div>
        </div>
    </div>	
</section>
@endsection