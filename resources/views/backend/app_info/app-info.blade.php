
{{-- content start --}}

@extends('backend.layouts.master_page')

@section('title')
<title>logos</title>
@endsection

@section('content')

<div class="content">
   

    <form class="mb-9" method="post" action="{{ route('post.app.info') }}" enctype="multipart/form-data">
        @csrf

      <div class="row g-3 flex-between-end mb-5">
        <div class="col-auto">
          <h2 class="mb-2"></h2>
          <h5 class="text-body-tertiary fw-semibold"></h5>
        </div>
        <div class="col-auto">
          <button class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="button">Discard</button>
          <button class="btn btn-phoenix-primary me-2 mb-2 mb-sm-0" type="button">Save draft</button>
          <button type="submit" class="btn btn-primary mb-2 mb-sm-0">Submit</button>
        </div>
      </div>



     <div class="row g-5 bg-white p-4">

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

        <h5>System Setup(change)</h5>

        <div class="col-12 col-xl-5 col-md-5 col-lg-5 mb-2">
            <div class="mb-1">System Name</div>
            <div class="">
                <input class="form-control" type="text"  name="system_name" placeholder="Logo Name" required/>
            </div>
        </div>  

        {{-- <div class="col-12 col-xl-5 col-md-5 col-lg-5 mb-2">
                <label class="mb-1" for="customFile">Site Icon</label>
                <input class="form-control" id="customFile" type="file" name="system_img" required/>
        </div>     --}}

        <div class="col-12 col-xl-4 col-md-4 col-lg-4 mb-2">
            <div class="mb-1">Site Icon (512 × 512)</div>
            <input class="form-control" id="customFile" type="file" name="system_img" onchange="previewImage(event)" required/>
        </div>
        
        <div class="col-12 col-xl-2 col-md-2 col-lg-2 mb-2">
            <div class="mb-1"></div>
            <img src="../assets/img/blog/blog-1.png" class="rounded-circle" alt="Not available" height="100" width="100" id="src_img" style="cursor:pointer;">
        </div>

        {{-- SWwitch image source --}}
        <script>
            function previewImage(event) {
                let input = event.target;
                let reader = new FileReader();
                
                reader.onload = function() {
                    let dataURL = reader.result;
                    // console.log(dataURL);

                    let output = document.getElementById('src_img');
                    let modalOutput = document.getElementById('modal_img');
                    output.src = dataURL;
                    // modalOutput.src = dataURL;
                };
        
                reader.readAsDataURL(input.files[0]);
            }
        </script>
        
        <div class="col-12 col-xl-5 col-md-5 col-lg-5 mb-2">
            <div class="mb-1">Contact Email</div>
            <div class="">
                <input class="form-control" type="email"  name="system_email" placeholder="example@gmail.com" required/>
            </div>
        </div>  

        <div class="col-12 col-xl-5 col-md-5 col-lg-5 mb-2">
            <div class="mb-1">System Phone</div>
            <div class="">
                <input class="form-control" type="text"  name="system_phone" placeholder="01*********" required pattern="01[3-9][0-9]{8}" 
                maxlength="11" title="Please enter a valid 11-digit number. Starting with 01"/>
            </div>
         </div>

         <div class="col-12 col-xl-5 col-md-5 col-lg-5 mb-2">
            <div class="mb-1">Short Description</div>
            <div class="">                
                <textarea class="form-control" id="exampleTextarea" rows="3" name="system_description" required> </textarea>
            </div>
        </div>  
        </div>  

        

    </div>
    </form>

  </div>

@endsection()
{{-- content end --}}