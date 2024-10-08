
{{-- content start --}}

@extends('backend.layouts.master_page')

@section('title')
<title>Edit Unit</title>
@endsection

@section('content')

<div class="content">
    <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ route('units') }}">Units</a></li>
        <li class="breadcrumb-item"><a href="{{ route('add.unit') }}">Add Unit </a></li>
        {{-- <li class="breadcrumb-item active">Default</li> --}}
      </ol>
    </nav>

    <form class="mb-9" method="post" action="{{ route('post.edit.unit', $unit->id) }}" enctype="multipart/form-data">

        @csrf

      <div class="row g-3 flex-between-end mb-5">
        <div class="col-auto">
          <h2 class="mb-2"></h2>
          <h5 class="text-body-tertiary fw-semibold">Add Unit</h5>
        </div>
        <div class="col-auto">
          <button class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="button">Discard</button>
          <button class="btn btn-phoenix-primary me-2 mb-2 mb-sm-0" type="button">Save draft</button>
          <button type="submit" class="btn btn-primary mb-2 mb-sm-0" type="submit">Publish Unit</button>
        </div>
      </div>

      <div class="row g-5">

            @if(session('success'))
            <div class="alert alert-primary alert-dismissible fade show text-center" role="alert">
                    {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>

         <div class="col-12 col-xl-6">
            <div class="mb-3">Unit Type </div>
            <input class="form-control mb-5" type="text"  name="unit_type" placeholder="Unit Type" value="{{ $unit->unit_type}}"/>
        </div>

        <div class="col-12 col-xl-6">
            <div class="mb-3">Base Unit Name</div>
            <input class="form-control mb-5" type="text"  name="base_unit_name" placeholder="Base Unit Name" value="{{ $unit->base_unit_name}}"/>
        </div>
        <div class="col-12 col-xl-6">
            <div class="mb-3">Symbol</div>
            <input class="form-control mb-5" type="text"  name="symbol" placeholder="Symbol" value="{{ $unit->symbol}}"/>
        </div>
        <div class="col-12 col-xl-6">
            <div class="mb-3">Unit Conversion</div>
            <input class="form-control mb-5" type="number"  name="unit_conversion" placeholder="Unit Conversion" value="{{ $unit->unit_conversion}}"/>
        </div>

    </div>
    </form>

   
  </div>

@endsection()
{{-- content end --}}