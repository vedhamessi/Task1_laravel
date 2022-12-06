@extends('layouts/index')
@section('content')
<style>
html, body{
    /*background: #1b1c1b;*/
    background-color: #1b1c1b;
    background-image: url({{ asset('images/login-backdrop.jpg') }});
    /*background-size: cover;*/
    background-repeat: no-repeat;
    background-position: center top;
    background-blend-mode: difference;
}
.login-h-img{
    margin: auto;
    margin-left: -200px;
    /*background: #fff;*/
    height: 500px;
    background: url({{ asset('images/login-side.jpg') }});
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}

</style>
<div class=""> 
        <div class="row">
            <!-- <div class="col-lg-3 col-md-2"></div> -->
            <div class="col-lg-12 col-md-12 login-fl">
            <div class="col-lg-5 col-md-5 login-box">
                <div class="login-box1">
                <!-- <div class="col-lg-12 login-title">
                    <h2>LOGIN</h2>
                </div> -->
                @if (Session::has('Login_Failed'))
                    <div class="col-lg-12 login-title login_valid">
                        <p>{!! session::get('Login_Failed') !!}</p>
                    </div>
                @endif
                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        @if (Session::has('login_res'))
                        <div style="text-align: center;font-size: 20px;color: red;padding-bottom: 20px;">
                        {!! session::get('login_res') !!}
                        </div>
                        @endif
                        <?php
                            if(!empty($success_msg)){
                                echo '<p class="alert alert-success">'.$success_msg.'</p>';
                            } elseif(!empty($error_msg)){ 
                                echo '<p class="alert alert-danger">'.$error_msg.'</p>';
                            }
                        ?>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{ url('login_process') }}" id="login_form">
                        @csrf
                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input type="text" name="email" class="form-control" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Password</label>
                                <input type="password" name="password" class="form-control" i>
                            </div>

                            <div class="col-lg-12 loginbttm">
                                
                                <div class="col-lg-12 login-btm login-button">
                                    <input type="submit" value="submit" class="btn btn-outline-primary" name="loginSubmit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-md-2"></div> -->
            </div>
            </div>
            <div class="col-lg-10 col-md-10 login-h-img">
                <!-- <img src="https://images.wallpaperscraft.com/image/cube_shape_3d_144105_1920x1080.jpg" alt=""> -->
            </div>
        </div>
        </div>
    </div>
@stop 