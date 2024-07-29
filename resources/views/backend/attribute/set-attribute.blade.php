
{{-- content start --}}

@extends('backend.layouts.master_page')

@section('title')
<title>Add Attribute</title>
@endsection

@section('content')

<div class="content">
    <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ route('attributes') }}">Attributes</a></li>
        <li class="breadcrumb-item"><a href="{{ route('add.attribute') }}">Add Attribute </a></li>
        {{-- <li class="breadcrumb-item active">Default</li> --}}
      </ol>
    </nav>

    <form class="mb-9" method="post" action="{{ route('post.set.attribute.value', $value) }}" enctype="multipart/form-data">

        @csrf

      <div class="row g-3 flex-between-end mb-5">
        <div class="col-auto">
          <h2 class="mb-2"></h2>
          <h5 class="text-body-tertiary fw-semibold">Set Attribute Values</h5>
        </div>
        <div class="col-auto">
          <button class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="button">Discard</button>
          <button class="btn btn-phoenix-primary me-2 mb-2 mb-sm-0" type="button">Save draft</button>
          <button type="submit" class="btn btn-primary mb-2 mb-sm-0" type="submit">Publish Attribute Values</button>
        </div>
      </div>

                <div class="row g-5">

                        <div class="col-12 col-xl-8">
                            <h4 class="mb-2">Attribute Value</h4>
                            <input class="form-control mb-5" type="text"  name="attribute" placeholder="You can type one or more than one value. such as  value1, value2, ...." required/>
                        </div>

                      
                        
                </div>
        </form>

   
  </div>

@endsection()
{{-- content end --}}