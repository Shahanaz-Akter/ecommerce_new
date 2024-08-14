
{{-- content start --}}

@extends('backend.layouts.master_page')

@section('title')
<title>Edit Category</title>
@endsection

@section('content')

<div class="content">
    <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ route('categories') }}">Categories</a></li>
        <li class="breadcrumb-item"><a href="{{ route('add.category') }}">Add Category </a></li>
        {{-- <li class="breadcrumb-item active">Default</li> --}}
      </ol>
    </nav>

    <form class="mb-9" method="post" action="{{ route('post.edit.category', $category->id) }}" enctype="multipart/form-data">

        @csrf

      <div class="row g-3 flex-between-end mb-5">
        <div class="col-auto">
          <h2 class="mb-2"></h2>
          <h5 class="text-body-tertiary fw-semibold">Add Category</h5>
        </div>
        <div class="col-auto">
          <button class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="button">Discard</button>
          <button class="btn btn-phoenix-primary me-2 mb-2 mb-sm-0" type="button">Save draft</button>
          <button type="submit" class="btn btn-primary mb-2 mb-sm-0" type="submit">Submit Category</button>
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

                   @if(session('success'))
                    <div class="alert alert-primary alert-dismissible fade show text-center" role="alert">
                            {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="col-12 col-xl-8">
                        <div class="mb-3">Name</div>
                        <input class="form-control mb-0" type="text"  name="category" placeholder="Category Name" value="{{ $category->name }}" />
                    </div>

                    <div class="col-12 col-xl-8">
                        <div class="mb-3">Parent</div>

                          <select class="form-select form-select-sm" aria-label="form-select-sm example" name="parent_category" >
                            <option value="0">Select Parent</option>
                            @foreach ($tree_cate as $cate)
                                <option value="{{ $cate->id }}" {{ $cate->parent_category_id == $category->id ? 'selected' : ''}} >{{ $cate->name }}</option>
                            @endforeach
                          </select>

                    </div>
                  
                    <div class="col-12 col-xl-8">
                        <div>
                            <div class="mb-3">Image</div>
                            <input class="form-control mb-5" type="file"  name="category_image" placeholder=""  />
                        </div>
                        
                        <div>
                            @if($category->category_image_id!=null)
                            <img src="{{ $category->ImageFile->absolute_path }}" alt="Not Available" height="150px" width="150px">
                        @endif
                        </div>                       
                    </div>

    </div>
    </form>

   
  </div>

@endsection()
{{-- content end --}}