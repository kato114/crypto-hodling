@extends('layouts.user')
@section('body')
    <div class="main-content-container container-fluid px-4">
      <div class="row">
        <div class="col-lg-8 mx-auto mt-4">
          <!-- Edit User Details Card -->
          <div class="card card-small edit-user-details mb-4">
            <div class="card-header p-0">
              <div class="edit-user-details__bg">
                <img src="{{ asset('assets/dashboard/images/user-profile/up-user-details-background.jpg') }}" alt="User Details Background Image">
              </div>
            </div>
            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('update_profile', Auth::user())}}" class="py-4" method="POST">
            <div class="card-body p-0">
                {{ csrf_field() }}
                {{ method_field('patch') }}
                <div class="form-row mx-4">
                  <div class="col mb-3">
                    <h6 class="form-text m-0">General</h6>
                    <p class="form-text text-muted m-0">Setup your general profile details.</p>
                    <hr>
                  </div>
                </div>
                <div class="form-row mx-4">
                  <div class="col-lg-4">
                    <label for="userProfilePicture" class="text-center w-100 mb-4">Profile Picture</label>
                    <div class="edit-user-details__avatar m-auto">
                        <a href="#" onclick="changeProfile()">
                        @if(Auth::user()->profile_photo_path == NULL)
                            <img src="{{ asset('assets/images/'.$gs->user_image) }}" alt="User Avatar">
                        @else
                            <img src="{{ asset('/assets/images/users/' . Auth::user()->profile_photo_path) }}" alt="User Avatar">
                        @endif
                        </a>
                    </div>
                    <a href="javascript:void(0)" onclick="changeProfile()" class="btn btn-sm btn-white d-table mx-auto mt-4"
                       style="text-decoration: none">
                        <i class="material-icons">&#xE2C3;</i> Upload Image
                    </a>
                  </div>
                  <div class="col-lg-8">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="userName">Username</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="emailAddress">Email</label>
                        <div class="input-group input-group-seamless">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="material-icons">&#xE0BE;</i>
                            </div>
                          </div>
                          <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="firstName">First Name</label>
                        <input id="firstname" type="text" class="form-control" name="firstname" value="{{ Auth::user()->firstname }}">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="lastName">Last Name</label>
                        <input id="lastname" type="text" class="form-control" name="lastname" value="{{ Auth::user()->lastname }}">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="userLocation">Location</label>
                        <div class="input-group input-group-seamless">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="material-icons">&#xE0C8;</i>
                            </div>
                          </div>
                          <input type="text" class="form-control" name="location" value="{{ Auth::user()->location }}">
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="phoneNumber">Phone Number</label>
                        <div class="input-group input-group-seamless">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="material-icons">&#xE0CD;</i>
                            </div>
                          </div>
                          <input type="text" class="form-control" name="phonenumber" value="{{ Auth::user()->phonenumber }}">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <label for="userBio">Bio</label>
                    <textarea id="userBio" class="form-control" rows="8" name="bio">{{ Auth::user()->bio }}</textarea>
                  </div>
                </div>
                <div class="form-row mx-4 mt-4">
                  <div class="col">
                    <h6 class="form-text m-0">Social</h6>
                    <p class="form-text text-muted m-0">Setup your social profiles info.</p>
                    <hr>
                  </div>
                </div>
                <div class="form-row mx-4">
                  <div class="form-group col-md-4">
                    <label for="socialFacebook">Facebook</label>
                    <div class="input-group input-group-seamless">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fab fa-facebook-f"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" id="socialFacebook" name="facebook" value="{{ Auth::user()->facebook }}">
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="socialTwitter">Twitter</label>
                    <div class="input-group input-group-seamless">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fab fa-twitter"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" id="socialTwitter" name="twitter" value="{{ Auth::user()->twitter }}">
                    </div>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="socialDribbble">Dribbble</label>
                    <div class="input-group input-group-seamless">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fab fa-dribbble"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" id="socialDribbble" name="dribbble" value="{{ Auth::user()->dribbble }}">
                    </div>
                  </div>
                </div>
            </div>
            <div class="card-footer border-top">
              <button type="submit" class="btn btn-sm btn-accent ml-auto d-table mr-3">Save Changes</button>
            </div>
            </form>
            <form method="post" id="profile-form" action="{{route('update_image_profile', Auth::user())}}"
                  enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('patch') }}
                <input name="photo" id="profile" type="file" style="display: none"
                       accept="image/png, image/jpeg">
            </form>
          </div>
          <!-- End Edit User Details Card -->
        </div>
      </div>
    </div>
@endsection
@section('script')
    <script>
        function changeProfile() {
            $("#profile").trigger('click')
        }

        $(document).ready(function () {
            $("#profile").on('change', function () {
                document.getElementById('profile-form').submit();
            });
        });
    </script>
@endsection
