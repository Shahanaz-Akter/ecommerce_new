
{{-- content start --}}

@extends('backend.layouts.master_page')

@section('title')
<title>Add Color</title>
@endsection

@section('content')

<div class="content">
    <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ route('colors') }}">Colors</a></li>
        <li class="breadcrumb-item"><a href="{{ route('add.color') }}">Add Color </a></li>
        {{-- <li class="breadcrumb-item active">Default</li> --}}
      </ol>
    </nav>

    <form class="mb-9" method="post" action="{{ route('post.color') }}" enctype="multipart/form-data">

        @csrf

      <div class="row g-3 flex-between-end mb-5">
        <div class="col-auto">
          <h2 class="mb-2"></h2>
          <h5 class="text-body-tertiary fw-semibold">Add Color</h5>
        </div>
        <div class="col-auto">
          <button class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="button">Discard</button>
          <button class="btn btn-phoenix-primary me-2 mb-2 mb-sm-0" type="button">Save draft</button>
          <button type="submit" class="btn btn-primary mb-2 mb-sm-0" type="submit">Publish Color</button>
        </div>
      </div>

      <div class="row g-5">

                <div class="col-12 col-xl-8">
                    <h4 class="mb-2">Color Code</h4>
                    <input class="form-control mb-5" type="text"  name="color_code" placeholder="#567bhH" required/>
                </div>



                <div class="col-12 col-xl-8">
                    <h4 class="mb-2">Name</h4>
                    <input class="form-control mb-5" type="text"  name="color" placeholder="Write Name..." required/>
                    

                    <div class="mb-2">
                        <h4 class="mb-3"> Description</h4>
                        <textarea class="tinymce" name="description" data-tinymce='{"height":"15rem","placeholder":"Write a description here..."}'></textarea>
                    </div>

                </div>

               
    </div>
    </form>

   
  </div>

@endsection()
{{-- content end --}}