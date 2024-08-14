
{{-- content start --}}

@extends('backend.layouts.master_page')
@section('title')
<title>Edit Role</title>
@endsection
@section('content')

<div class="content">
    <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ route('roles') }}">roles</a></li>
        <li class="breadcrumb-item"><a href="{{ route('add.role') }}">add role </a></li>
        {{-- <li class="breadcrumb-item active">Default</li> --}}
      </ol>
    </nav>

    <form class="mb-9" method="post" action="{{ route('post.edit.role', $role->id) }}">
        @csrf

      <div class="row g-3 flex-between-end mb-5">
        <div class="col-auto">
          <h2 class="mb-2"></h2>
          <h5 class="text-body-tertiary fw-semibold">Add Role</h5>
        </div>
        <div class="col-auto">
          <button class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="button">Discard</button>
          <button class="btn btn-phoenix-primary me-2 mb-2 mb-sm-0" type="button">Save draft</button>
          <button type="submit" class="btn btn-primary mb-2 mb-sm-0" type="submit">Submit Role</button>
        </div>
      </div>

      <div class="row g-5">

            @if(session('success'))
            <div  class="alert alert-danger success-alert">
              {{ session('success') }}
            </div>
          @endif
      
        <script>
                let alerts = document.querySelectorAll('.success-alert');
                // console.log("Alert: ", alerts);
        
                alerts.forEach((alert)=>{
        
                        setTimeout(function() {
        
                                if (alert) {
                                    alert.style.transition = 'opacity 0.5s ease';
                                    alert.style.opacity = '0';
        
                                    setTimeout(function() {
                                        alert.style.display = 'none';
                                    }, 500);
                                }
                            }, 1000); // 1 second delay
                    });
                
        
        
        </script>

        <div class="col-12 col-xl-8">

          <h4 class="mb-3">Role Name</h4>
          <input class="form-control mb-5" type="text"  name="role" placeholder="Write Role here..."  value={{ $role->name }}/>
         
          <div class="mb-6">
            <h4 class="mb-3"> Role Description</h4>
            <textarea class="tinymce" name="description" data-tinymce='{"height":"15rem","placeholder":"Write a description here..."}'>{{ $role->description }}</textarea>
          </div>

      </div>
    </div>
    </form>

   
  </div>

@endsection()
{{-- content end --}}