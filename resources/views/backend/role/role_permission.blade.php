@extends('backend.layouts.master_page')

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

    <form action="{{route('post.role.permission')}}" method="Post">  
        @csrf

     <div class="row g-3 flex-between-end mb-5">
        <div class="col-auto">
            {{-- <h2 class="mb-2"></h2> --}}
            <h5 class="text-body-tertiary fw-semibold">List of Roles amd Permissions</h5>
          </div>
          <div class="col-auto">
            {{-- <a href="{{ route('add.role') }}"><div type="" class="btn btn-primary mb-2 mb-sm-0">Add Role</div></a>  --}}
          </div>
        <div class="col-auto">
            
            <a data-bs-toggle="modal" data-bs-target="#role"><div type="" class="btn btn-primary mb-2 mb-sm-0">Add Role</div></a> 

          <button type="submit" class="btn btn-primary mb-2 mb-sm-0" type="submit">Role Permission Associate </button>
        </div>
    </div>

    <div class="mb-9">

      <div class="row g-3 mb-4">
        <div class="col-auto">
          {{-- <h2 class="mb-0">List of Roles amd Permissions</h2> --}}
        </div>
      </div>

     
        <div id="roles" data-list='{"valueNames":["product","price","category","tags","vendor","time"],"page":10,"pagination":true}'>
                

        <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-body-emphasis border-top border-bottom border-translucent position-relative top-1">
    <div class="">



            
<div class="row p-4">

<div class="col-12 col-md-6 col-lg-3 col-xl-3 mb-4">

    <div class="col-12 mb-4 fw-bold">Role Name</div>

    @foreach ($roles as $role)
        <div class="col-6 mb-5">
            <input type="radio" id="role_{{$role->id}}" name="role_id" value="{{$role->id}}">
            <label for="role_{{$role->id}}"> {{$role->name}} </label>
        </div>
    @endforeach
</div>

<div class="col-12 col-md-6 col-lg-9 col-xl-9 mb-4 fw-bold">

        <div class="row">
            <div class="col-3 mb-4 fw-bold">Permission Name</div>
            <div class="col-3 mb-4 fw-bold">Alias</div>
            <div class="col-3 mb-4 fw-bold">Group Name</div>
            <div class="col-3 mb-4 fw-bold">Description</div>
            @foreach ($permissions as $permission)

            <div class="col-3 mb-1">
            <input type="checkbox" id="permission_{{$permission->id}}" name="permissions[]" value="{{$permission->id}}">
            <label for="permission_{{$permission->id}}"> {{$permission->name}} </label>
            </div>

            <div class="col-3 mb-1">
            <label for="permission_id"> {{$permission->alias}} </label>
            </div>

            <div class="col-3 mb-1">
            <label for="permission_id"> {{$permission->permission_group}} </label>
            </div>
            <div class="col-3 mb-1">
            <label for="permission_id"> {{$permission->description}} </label>
            </div>
            
        @endforeach

        </div>
                
</div>
                        
    </div>
    </div>
          
    </div>
    </div>
    </div>

    </form>

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
  
  <div class="modal fade" id="searchBoxModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="true" data-phoenix-modal="data-phoenix-modal" style="--phoenix-backdrop-opacity: 1;">
    <div class="modal-dialog">
      <div class="modal-content mt-15 rounded-pill">
        <div class="modal-body p-0">
          <div class="search-box navbar-top-search-box" data-list='{"valueNames":["title"]}' style="width: auto;">
            <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
              <input class="form-control search-input fuzzy-search rounded-pill form-control-lg" type="search" placeholder="Search..." aria-label="Search" />
              <span class="fas fa-search search-box-icon"></span>

            </form>
            <div class="btn-close position-absolute end-0 top-50 translate-middle cursor-pointer shadow-none" data-bs-dismiss="search">
              <button class="btn btn-link p-0" aria-label="Close"></button>
            </div>
            <div class="dropdown-menu border start-0 py-0 overflow-hidden w-100">
              <div class="scrollbar-overlay" style="max-height: 30rem;">
                <div class="list pb-3">
                  <h6 class="dropdown-header text-body-highlight fs-10 py-2">24 <span class="text-body-quaternary">results</span></h6>
                  <hr class="my-0" />
                  <h6 class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">Recently Searched </h6>
                  <div class="py-2"><a class="dropdown-item" href="../../../apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">

                        <div class="fw-normal text-body-highlight title"><span class="fa-solid fa-clock-rotate-left" data-fa-transform="shrink-2"></span> Store Macbook</div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="../../../apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">

                        <div class="fw-normal text-body-highlight title"> <span class="fa-solid fa-clock-rotate-left" data-fa-transform="shrink-2"></span> MacBook Air - 13″</div>
                      </div>
                    </a>

                  </div>
                  <hr class="my-0" />
                  <h6 class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">Products</h6>
                  <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center" href="../../../apps/e-commerce/landing/product-details.html">
                      <div class="file-thumbnail me-2"><img class="h-100 w-100 fit-cover rounded-3" src="../../../assets/img/products/60x60/3.png" alt="" /></div>
                      <div class="flex-1">
                        <h6 class="mb-0 text-body-highlight title">MacBook Air - 13″</h6>
                        <p class="fs-10 mb-0 d-flex text-body-tertiary"><span class="fw-medium text-body-tertiary text-opactity-85">8GB Memory - 1.6GHz - 128GB Storage</span></p>
                      </div>
                    </a>
                    <a class="dropdown-item py-2 d-flex align-items-center" href="../../../apps/e-commerce/landing/product-details.html">
                      <div class="file-thumbnail me-2"><img class="img-fluid" src="../../../assets/img/products/60x60/3.png" alt="" /></div>
                      <div class="flex-1">
                        <h6 class="mb-0 text-body-highlight title">MacBook Pro - 13″</h6>
                        <p class="fs-10 mb-0 d-flex text-body-tertiary"><span class="fw-medium text-body-tertiary text-opactity-85 ms-2">30 Sep at 12:30 PM</span></p>
                      </div>
                    </a>

                  </div>
                  <hr class="my-0" />
                  <h6 class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">Quick Links</h6>
                  <div class="py-2"><a class="dropdown-item" href="../../../apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">

                        <div class="fw-normal text-body-highlight title"><span class="fa-solid fa-link text-body" data-fa-transform="shrink-2"></span> Support MacBook House</div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="../../../apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">

                        <div class="fw-normal text-body-highlight title"> <span class="fa-solid fa-link text-body" data-fa-transform="shrink-2"></span> Store MacBook″</div>
                      </div>
                    </a>

                  </div>
                  <hr class="my-0" />
                  <h6 class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">Files</h6>
                  <div class="py-2"><a class="dropdown-item" href="../../../apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">

                        <div class="fw-normal text-body-highlight title"><span class="fa-solid fa-file-zipper text-body" data-fa-transform="shrink-2"></span> Library MacBook folder.rar</div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="../../../apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">

                        <div class="fw-normal text-body-highlight title"> <span class="fa-solid fa-file-lines text-body" data-fa-transform="shrink-2"></span> Feature MacBook extensions.txt</div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="../../../apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">

                        <div class="fw-normal text-body-highlight title"> <span class="fa-solid fa-image text-body" data-fa-transform="shrink-2"></span> MacBook Pro_13.jpg</div>
                      </div>
                    </a>

                  </div>
                  <hr class="my-0" />
                  <h6 class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">Members</h6>
                  <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center" href="../../../pages/members.html">
                      <div class="avatar avatar-l status-online  me-2 text-body">
                        <img class="rounded-circle " src="../../../assets/img/team/40x40/10.webp" alt="" />

                      </div>
                      <div class="flex-1">
                        <h6 class="mb-0 text-body-highlight title">Carry Anna</h6>
                        <p class="fs-10 mb-0 d-flex text-body-tertiary">anna@technext.it</p>
                      </div>
                    </a>
                    <a class="dropdown-item py-2 d-flex align-items-center" href="../../../pages/members.html">
                      <div class="avatar avatar-l  me-2 text-body">
                        <img class="rounded-circle " src="../../../assets/img/team/40x40/12.webp" alt="" />

                      </div>
                      <div class="flex-1">
                        <h6 class="mb-0 text-body-highlight title">John Smith</h6>
                        <p class="fs-10 mb-0 d-flex text-body-tertiary">smith@technext.it</p>
                      </div>
                    </a>

                  </div>
                  <hr class="my-0" />
                  <h6 class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">Related Searches</h6>
                  <div class="py-2"><a class="dropdown-item" href="../../../apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">

                        <div class="fw-normal text-body-highlight title"><span class="fa-brands fa-firefox-browser text-body" data-fa-transform="shrink-2"></span> Search in the Web MacBook</div>
                      </div>
                    </a>
                    <a class="dropdown-item" href="../../../apps/e-commerce/landing/product-details.html">
                      <div class="d-flex align-items-center">

                        <div class="fw-normal text-body-highlight title"> <span class="fa-brands fa-chrome text-body" data-fa-transform="shrink-2"></span> Store MacBook″</div>
                      </div>
                    </a>

                  </div>
                </div>
                <div class="text-center">
                  <p class="fallback fw-bold fs-7 d-none">No Result Found.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  

{{-- role modal --}}
<div class="modal fade" id="role" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
     <div class="modal-content">
     <div class="modal-header">
        <h5 class="modal-title" id="scrollingLongModalLabel2">Attribute Information</h5>
        <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-xmark fs-9" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <span class="fas fa-times fs-9"></span> Font Awesome fontawesome.com --></button>
    </div>

<form class="mb-9" method="post" action="{{ route('post.role') }}">

    @csrf
      <div class="modal-body">
        <div>      
            <div class="row g-5">

                <div class="col-12 col-xl-8">
                    <h4 class="mb-2">Name</h4>
                    <input class="form-control mb-5" type="text"  name="role" placeholder="Attribute Name"/>
                </div>
                
                <div class="col-12 col-xl-8">
                    <h4 class="mb-3"> Role Description</h4>
                    <textarea class="tinymce" name="description" data-tinymce='{"height":"15rem","placeholder":"Write a description here..."}'></textarea>
                  </div>
            
            </div>    
         </div>
        </div>
          
        <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Submit</button>
            <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">Cancel</button>
        </div>

         </form>

    </div>
    </div>
</div>
@endsection