
{{-- content start --}}

@extends('backend.layouts.master_page')

@section('title')
<title>Edit Brand</title>
@endsection

@section('content')

<div class="content">
    <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ route('brands') }}">Brands</a></li>
        <li class="breadcrumb-item"><a href="{{ route('add.brand') }}">Add Brand </a></li>
        {{-- <li class="breadcrumb-item active">Default</li> --}}
      </ol>
    </nav>

    <form class="mb-9" method="post" action="{{ route('post.edit.brand', $brand->id) }}" enctype="multipart/form-data">

        @csrf

      <div class="row g-3 flex-between-end mb-5">
        <div class="col-auto">
          <h2 class="mb-2"></h2>
          <h5 class="text-body-tertiary fw-semibold">Add Brand</h5>
        </div>
        <div class="col-auto">
          <button class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="button">Discard</button>
          <button class="btn btn-phoenix-primary me-2 mb-2 mb-sm-0" type="button">Save draft</button>
          <button type="submit" class="btn btn-primary mb-2 mb-sm-0" type="submit">submit Brand</button>
        </div>
      </div>
     
     <div class="row g-5">

            {{-- @if ($errors->any())
            <div class="alert alert-primary text-center p-2">
              
                    @foreach ($errors->all() as $error)
                      {{ $error }}
                    @endforeach
              
            </div>
            @endif --}}
          
                @if ($errors->any())
                   <div class="alert alert-primary alert-dismissible fade show text-center" role="alert">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                 @endif

                <script>
                    document.addEventListener('DOMContentLoaded', function () {

                        setTimeout(function () {
                            let alertElement = document.querySelector('.alert-dismissible');
                            if (alertElement) {
                                alertElement.classList.add('fade');
                                setTimeout(function () {
                                    alertElement.classList.remove('show');
                                    alertElement.classList.add('d-none');
                                }, 150);
                            }
                        }, 5000); // 5000ms = 5 seconds

                    });
                </script>

                   @if(session('brand'))
                    <div class="alert alert-primary alert-dismissible fade show text-center" role="alert">
                            {{ session('brand') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif


                    <div class="col-12 col-xl-8">
                        <div class="mb-3">Image</div>
                        <div class="mb-2">
                            <input class="form-control mb-5" type="file"  name="brand_img" placeholder="Write Role here..." />
                        </div>
                            
                        @if($brand->image_id!=null)
                           <img src="{{ $brand->brandImage->absolute_path }}" alt="Not Available" height="150px" width="150px">
                        @endif
                
                    </div>
                    <div class="col-12 col-xl-8">
                    <div class="mb-3">Name</div>
                    <input class="form-control mb-5" type="text"  name="brand" placeholder="Write Role here..." value="{{ $brand->name }}" />
                    

                    <div class="mb-6">
                        <div class="mb-3"> Description</div>
                        <textarea class="tinymce" name="description" data-tinymce='{"height":"15rem","placeholder":"Write a description here..."}'>{{ $brand->description }}</textarea>
                    </div>

                </div>

     


    </div>
    </form>

   
  </div>

@endsection()
{{-- content end --}}