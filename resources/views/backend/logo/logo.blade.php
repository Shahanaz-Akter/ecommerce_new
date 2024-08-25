
{{-- content start --}}

@extends('backend.layouts.master_page')

@section('title')
<title>logos</title>
@endsection

@section('content')

<div class="content">
   

    <form class="mb-9" method="post" action="{{ route('post.logos') }}" enctype="multipart/form-data">
        @csrf

      <div class="row g-3 flex-between-end mb-5">
        <div class="col-auto">
          <h2 class="mb-2"></h2>
          <h5 class="text-body-tertiary fw-semibold"></h5>
        </div>
        <div class="col-auto">
          <button class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="button">Discard</button>
          <button class="btn btn-phoenix-primary me-2 mb-2 mb-sm-0" type="button">Save draft</button>
          <button type="submit" class="btn btn-primary mb-2 mb-sm-0" type="submit">Submit</button>
        </div>
      </div>



     <div class="row g-5">

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

     <div>Logo (change)</div>

        <div class="col-12 col-xl-4 col-md-4 col-lg-4 mb-2">
            <div class="">Text</div>
            <div class="">
                <input class="form-control" type="text"   name="logo_text" placeholder="Logo Name" />
            </div>
        </div>  

        <div class="col-12 col-xl-4 col-md-4 col-lg-4 mb-2">
            <div class="">Logo Image</div>
            <div class="">
                <input class="form-control" type="file" name="logo_img"  required/>
            </div>
        </div>   


      <hr>
        <span>Static Banner (Change)</span>

        <div class="col-12 col-xl-4 col-md-4 col-lg-4 mb-2">
            <div class="">Text</div>
            <div class="">
                <input class="form-control" type="text" name="banner_text" placeholder="Logo Name" />
            </div>
        </div> 

        <div class="col-12 col-xl-4 col-md-4 col-lg-4 mb-2">
            <div class="">Banner Images</div>
            <div class="">
                <input class="form-control" type="file" multiple  name="campaign_img[]"  required/>
            </div>
        </div>  
        <hr>

    </div>
    </form>

  </div>

@endsection()
{{-- content end --}}