
{{-- content start --}}

@extends('backend.layouts.master_page')

@section('content')

<div class="content">
    <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ route('users') }}">users</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users') }}">user</a></li>
        {{-- <li class="breadcrumb-item active">Default</li> --}}
      </ol>
    </nav>

    <form action="{{ route('post.add.user') }}" method="POST" enctype="multipart/form-data">
              
      @csrf

    <div class="mb-9">

      <div class="row g-3 flex-between-end mb-5">
        <div class="col-auto">
          {{-- <h2 class="mb-2">Add User</h2> --}}
          <h5 class="text-body-tertiary fw-semibold">Add User</h5>
        </div>

        <div class="col-auto">
          <button class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="button">Discard</button>
          <button class="btn btn-phoenix-primary me-2 mb-2 mb-sm-0" type="button">Save draft</button>
          <button class="btn btn-primary mb-2 mb-sm-0" type="submit">Publish User</button>
        </div>
      </div>

     

        @if($errors->any())
        
            @foreach($errors->all() as $error)
            <div class="alert alert-secondary p-2">{{ $error }}</div>
            @endforeach

        @endif


        <div class="row g-3 mb-3">
            <div class="col-sm-6">
                <label class="" for="user_img">User Image</label>
                <input class="form-control" id="user_img" type="file"  name="user_img" value="{{ old('user_img') }}"/>
            </div>
   
            <div class="col-sm-6">
                <label class="" for="datepicker"> Date</label>
                <input class="form-control datetimepicker flatpickr-input" id="datepicker" name="date" type="text" placeholder="dd/mm/yyyy" 
                
                {{-- data-options="{&quot;disableMobile&quot;:true,&quot;dateFormat&quot;:&quot;d/m/Y&quot;}" readonly="readonly"> --}}

                data-options="{
                  &quot;disableMobile&quot;:true,
                  &quot;dateFormat&quot;:&quot;d/m/Y&quot;, 
                  &quot;minDate&quot;: &quot;today&quot;
              }"  readonly="readonly">

                
            </div>
   
          </div>

          <div class="row g-3 mb-3">
            <div class="col-sm-6">
                <label class="" for="name">User Name</label>
         <input class="form-control" id="name" type="text" placeholder="User Name" name="user_name" value="{{ old('user_name') }}"/>
            </div>
   
            <div class="col-sm-6">
                <label class="" for="email">Email address</label>
                <input class="form-control" id="email" type="email" placeholder="example@gmail.com" name="email" value="{{ old('email') }}" />
            </div>
   
          </div>

       <div class="row g-3 mb-3">
         <div class="col-sm-6">
           <label class="" for="password">Password</label>
           <input class="form-control form-icon-input" id="password" type="password" placeholder="Password"  name="password" value="{{ old('password') }}"/>
         </div>

         <div class="col-sm-6">
           <label class="" for="password_confirmation ">Confirm Password</label>
           <input class="form-control form-icon-input" id="password_confirmation " type="password" placeholder="Confirm Password"  name="password_confirmation"/>
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
  {{-- <button type="submit" class="btn btn-primary w-100 mb-3">User Register</button> --}}

  </form>

@endsection()
{{-- content end --}}