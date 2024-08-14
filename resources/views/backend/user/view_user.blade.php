
{{-- content start --}}

@extends('backend.layouts.master_page')
@section('title')
<title>view User</title>
@endsection

@section('content')

<div class="content">

    <div class="pb-9">
      <div class="card mb-5">
        <div class="card-header hover-actions-trigger d-flex justify-content-center align-items-end position-relative mb-7 mb-xxl-0" style="min-height: 214px; ">
          
            @if($img!=null)
            <div class="bg-holder rounded-top" style="background-image:url({{ $img->absolute_path }});"> </div>
            @else
            <div class="bg-holder rounded-top" style="background-image:url('');"> </div>
            @endif
          <input class="d-none" id="upload-cover-image" type="file" />
          <label class="cover-image-file-input" for="upload-cover-image"></label>
          <div class="hover-actions end-0 bottom-0 pe-1 pb-2 text-white dark__text-gray-1100"><span class="fa-solid fa-camera me-2 overlay-icon"></span></div>
          <!--/.bg-holder-->

          <input class="d-none" id="upload-porfile-picture" type="file" />
          <div class="hoverbox feed-profile" style="width: 150px; height: 150px">
            <div class="hoverbox-content rounded-circle d-flex flex-center z-1" style="--phoenix-bg-opacity: .56;"><span class="fa-solid fa-camera fs-1 text-body-quaternary" data-bs-theme="light"></span></div>
            <div class="position-relative bg-body-quaternary rounded-circle cursor-pointer d-flex flex-center mb-xxl-7">
                @if($img!=null)
              <div class="avatar avatar-5xl"><img class="rounded-circle rounded-circle img-thumbnail shadow-sm border-0" src="{{ $img->absolute_path }}" alt="" /></div>
              @else
              <div class="avatar avatar-5xl"><img class="rounded-circle rounded-circle rounded-circle img-thumbnail shadow-sm border-0" src="" alt="Not available" /></div>
              @endif
              <label class="w-100 h-100 position-absolute z-1" for="upload-porfile-picture"></label>
            </div>
          </div>
        </div>


        <div class="card-body">
          <div class="row justify-content-xl-between">
            <div class="col-auto">
             
            </div>
            <div class="col-auto">
                <div class="row g-3 mb-3">

                    <div class="col-sm-12">
                        {{-- previous image --}}
                        {{-- <img src="{{ $img->absolute_path }}" alt="Not available" height="100" width="100"> --}}
                    </div>
                  {{-- <style>
                    .form-control{
                      border: 1px solid red!important;
                    }
                  </style> --}}

                    <div class="col-sm-6">
                        <label class="form-label" for="email">First Name</label>
                        <input class="form-control" id="first name" type="text" placeholder="First Name" name="first_name" value="{{ $user->first_name }}"  />
                    </div>
        
                    <div class="col-sm-6">
                        <label class="form-label" for="last-name">Last Name</label>
                        <input class="form-control" id="last name" type="text" placeholder="Last Name" name="last_name" value="{{ $user->last_name }}" />
                    </div>
        
                    <div class="col-sm-6">
                        <label class="form-label" for="name">User Name</label>
                 <input class="form-control" id="name" type="text" placeholder="User Name" name="user_name" value="{{ $user->username }}"/>
                 </div>
        
                    <div class="col-sm-6">
                        <label class="form-label" for="email">Email address</label>
                        <input class="form-control" id="email" type="email" placeholder="example@gmail.com" name="email" value="{{ $user->email }}" />
                    </div>
           
        
                    <div class="col-sm-6">
                        <label class="form-label" for="city">City</label>
                        <input class="form-control" id="city" type="text" placeholder="City" name="city" value="{{ $user->city}}" />
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="zip_code">Zip Code</label>
                        <input class="form-control" id="zip_code" type="text" placeholder="Zip Code" name="zip_code" value="{{ $user->zip_code }}" />
                    </div>
        
                    <div class="col-sm-6">
                        <label class="form-label" for="state">State</label>
                        <input class="form-control" id="state" type="text" placeholder="State" name="state" value="{{ $user->state }}" />
                    </div>
        
                    <div class="col-sm-6">
                        <label class="form-label" for="contact">Contact</label>
                        <input class="form-control" id="contact" type="text" placeholder="01*********" name="contact" value="{{ $user->contact_number }}" />
                    </div>

                        @if(isset($role->name) && !empty($role->name) )
                        <div class="col-sm-6">
                            <label class="form-label" for="role">Role</label>
                            <input class="form-control" id="role" type="text" placeholder="" name="role" value="{{ $role->name ?? 'Null' }}" />
                        </div>
                       
                        @endif

                       
                  </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <footer class="footer position-absolute">
        <div class="row g-0 justify-content-between align-items-center h-100">
          <div class="col-12 col-sm-auto text-center">
            <p class="mb-0 mt-2 mt-sm-0 text-body">Thank you for creating with Phoenix<span class="d-none d-sm-inline-block"></span><span class="d-none d-sm-inline-block mx-1">|</span><br class="d-sm-none" />2024 &copy;<a class="mx-1" href="https://themewagon.com">Themewagon</a></p>
          </div>
          <div class="col-12 col-sm-auto text-center">
            <p class="mb-0 text-body-tertiary text-opacity-85">v1.16.0</p>
          </div>
        </div>
      </footer>
  </div>

  @endsection