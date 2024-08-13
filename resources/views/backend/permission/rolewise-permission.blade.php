@extends('backend.layouts.master_page')
@section('title')
<title>Rolewise Permission</title>
@endsection
@section('content')

<div class="content">

    @if(session('success'))
    <div class="alert alert-primary">
      {{ session('success') }}
    </div>
    @endif

    <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="#!">Role</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles') }}">Roles</a></li>
        {{-- <li class="breadcrumb-item active">Default</li> --}}
      </ol>
    </nav>

    <div>  

     <div class="row g-3 flex-between-end mb-5">
       
    </div>

    <div class="mb-9">

      <div class="row g-3 mb-4">
        <div class="col-auto">
          {{-- <h2 class="mb-0">List of Roles amd Permissions</h2> --}}
         <div> All Role with their Permission List</div>
        </div>
      </div>

     
        <div id="roles" data-list='{"valueNames":["product","price","category","tags","vendor","time"],"page":10,"pagination":true}'>
                

        <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-body-emphasis border-top border-bottom border-translucent position-relative top-1">
    <div class="">



            
<div class="row p-4">

    <div class="col-12 col-md-6 col-lg-6 col-xl-6">

       <div>Roles Name</div>
       <hr>
      
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-6">

        <div>Permission Name</div>
<hr>
       
     </div>

    @foreach ($roles as $role)

         <div class="col-12 col-md-6 col-lg-6 col-xl-6">

            <div for="role_{{$role->id}}"> ➨ {{strtoupper($role->name) }} </div>
          
        </div>

        <div class="col-12 col-md-6 col-lg-6 col-xl-6">
          
            <ul>
                @foreach ($role->permissions as $permission)
                <li>{{$permission->name}}</li>
                <li>{{$permission->alias}}</li>
                @endforeach
            </ul>
           
        <br>

        </div>
       
      
    @endforeach



                        
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