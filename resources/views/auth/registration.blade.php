@extends('dashboard')
@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card card_margin">
                    <h3 class="card-header text-center">User registration</h3>
                    <div class="card-body">
                        <form action="{{ route('register.custom') }}" id="regform" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                            <label for="name" class="control-label">Full Name</label>
                            <p class="control">
                                <input type="text" placeholder="Ali Askar" id="name" class="form-control" name="name"
                                value="{{ old('name') }}" autofocus>
                                <p class="name_error"></p>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </p>
                            </div>
                            <div class="form-group mb-3">
                            <label for="email" class="control-label">Email</label>
                            <p class="control">
                                <input type="text" placeholder="name@example.com" id="email_address" class="form-control"
                                    name="email" value="{{ old('email') }}"  autofocus>
                                
                                <p class="email_error"></p>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </p>
                            </div>
                            <div class="form-group mb-3">
                            <label for="phone" class="control-label">Contact number</label>
                            <p class="control">
                                <input type="text" placeholder="+7 775 999 1133" id="phone_number" class="form-control"
                                    name="phone" value="{{ old('phone') }}" autofocus>
                                <p class="phone_error"></p>
                                @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif

                            </p>
                            </div>
                            <div class="form-group mb-3">
                            <label for="password" class="control-label">Password</label>
                            <p class="control">
                                <input type="password" placeholder="************" id="password" class="form-control"
                                    name="password" value="{{ old('password') }}">
                                
                                <p class="password_error"></p>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </p>
                            </div>
                            <div class="form-group mb-3">
                            <label for="photo" class="control-label">Profile Photo</label><hr/>
                            
                            <input type="file" id="profile_photo" placeholder="Choose image" name="photo" value="{{ old('photo') }}" onchange="loadPhoto(event)">
                            <img id="prev_image" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22200%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20200%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_184a23bc63c%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A10pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_184a23bc63c%22%3E%3Crect%20width%3D%22200%22%20height%3D%22200%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2274.41666603088379%22%20y%3D%22104.2%22%3E200x200%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" class="image rounded-circle" height="150" width="150" style="margin-top:10px;" />
                            <p class="photo_error" style="margin-top: 15px;"></p>    
                            @if ($errors->has('photo'))
                                <span class="text-danger">{{ $errors->first('photo') }}</span>
                                @endif
                            <hr/>
                            </div>
                        
                            <div class="d-grid mx-auto">
                                <button type="submit" id="formsubmit" class="btn btn-primary btn-block">Sign up</button>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
<script>
    
    let loadPhoto = function(event){
        let prev_photo = document.getElementById("prev_image");
        prev_photo.src = URL.createObjectURL(event.target.files[0])
    }

    

</script>
