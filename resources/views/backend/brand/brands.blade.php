@extends('backend.layouts.master_page')
@section('title')
<title>Brands</title>
@endsection
@section('content')

<div class="content">


    @if(session('success'))
    <div  class="alert alert-primary success-alert">
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


    <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="#!">Brand</a></li>
        <li class="breadcrumb-item"><a href="{{ route('brands')}}">Brands</a></li>
        {{-- <li class="breadcrumb-item active">Default</li> --}}
      </ol>
    </nav>
    <div class="mb-9">
      <div class="row g-3 mb-4">
        <div class="col-auto">
          <h2 class="mb-2"></h2>
          <h5 class="text-body-tertiary fw-semibold">List of Brands</h5>
        </div>
        <div class="col-auto">
          <h2 class="mb-0"></h2>
          
        </div>
      </div>
      <ul class="nav nav-links mb-3 mb-lg-2 mx-n3">
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#"><span>All </span><span class="text-body-tertiary fw-semibold">(68817)</span></a></li>
       
      </ul>
      <div id="products" data-list='{"valueNames":["product","price","category","tags","vendor","time"],"page":10,"pagination":true}'>
        <div class="mb-4">
          <div class="d-flex flex-wrap gap-3">
            <div class="search-box">
              <form class="position-relative">
                <input class="form-control search-input search" type="search" placeholder="Search users" aria-label="Search" />
                <span class="fas fa-search search-box-icon"></span>

              </form>
            </div>

            
            <div class="ms-xxl-auto">
              <button class="btn btn-link text-body me-4 px-0"><span class="fa-solid fa-file-export fs-9 me-2"></span>Export</button>
              <a href="{{ route('add.brand') }}"> <button class="btn btn-primary" id="addBtn"><span class="fas fa-plus me-2"></span>Add Brand</button></a> 
            </div>
          </div>
        </div>

        <div class="mx-n4 px-4 mx-lg-n6 px-lg-6 bg-body-emphasis border-top border-bottom border-translucent position-relative top-1">
          <div class="table-responsive scrollbar mx-n1 px-1">
            <table class="table fs-9 mb-0">

              <thead>
                <tr>
                  <th class="white-space-nowrap fs-9 align-middle ps-0" style="max-width:20px; width:18px;">
                    <div class="form-check mb-0 fs-8">
                      <input class="form-check-input" id="checkbox-bulk-products-select" type="checkbox" data-bulk-select='{"body":"products-table-body"}' />
                    </div>
                  </th>
                  <th class="sort white-space-nowrap align-middle fs-10" scope="col" style="width:70px;"></th>
                  {{-- <th class="sort white-space-nowrap align-middle ps-4" scope="col" style="width:350px;" data-sort="product">First Name</th>
                  <th class="sort white-space-nowrap align-middle ps-4" scope="col" style="width:350px;" data-sort="product">Last Name</th> --}}
                  <th class="sort white-space-nowrap align-middle ps-4" scope="col" style="width:350px;" data-sort="product">Name</th>
                  <th class="sort white-space-nowrap align-middle ps-4" scope="col" style="width:350px;" data-sort="product">Description</th>
                  <th class="sort white-space-nowrap align-middle ps-4" scope="col" style="width:350px;" data-sort="product">Date</th>
                  <th class="sort white-space-nowrap align-middle ps-4" scope="col" style="width:350px;" data-sort="product">Actions</th>
                </tr>
              </thead>

              <tbody class="list" id="products-table-body">


            @foreach ($brands as $brand)
                <tr class="position-static">

                    <td class="fs-9 align-middle">
                      <div class="form-check mb-0 fs-8">
                        <input class="form-check-input" type="checkbox" data-bulk-select-row='{"product":"iPhone 13 pro max-Pacific Blue-128GB storage","productImage":"/products/2.png","price":"$87","category":"Furniture","tags":["Class","Camera","Discipline","invincible","Pro","Swag"],"star":true,"vendor":"Beatrice Furnitures","publishedOn":"Nov 11, 7:36 PM"}' />
                      </div>
                    </td>
  
                    <td class="align-middle white-space-nowrap py-0">
                        {{-- {{ $brand->brand_image_id }} --}}
                        @if($brand->image_id!=null)
                        <a class="d-block border border-translucent rounded-2" href="../../../apps/e-commerce/landing/product-details.html">
                            <img src="{{$brand->brandImage->absolute_path}}" alt="" width="53" />
                        </a>
                        @else
                        <img src="../../../assets/img//products/2.png" alt="" width="53" />
                      @endif
                  </td>

                <td class="product align-middle ps-4">
                    <a class="fw-semibold line-clamp-3 mb-0" href="../../../apps/e-commerce/landing/product-details.html">
                       {{ $brand->name }}            
                    </a>
                </td>

              <td class="product align-middle ps-4">
                <a class="fw-semibold line-clamp-3 mb-0" href="../../../apps/e-commerce/landing/product-details.html">
                {!! $brand->description !!}            
                </a>
            </td> 
            
                <td class="product align-middle ps-4">
                  <a class="fw-semibold line-clamp-3 mb-0" href="../../../apps/e-commerce/landing/product-details.html">
                     {{ $brand->created_at }}            
                  </a>
               </td>

                    <td class="align-middle white-space-nowrap  ps-4 btn-reveal-trigger">
                      <div class="btn-reveal-trigger position-static">
                        <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10"></span></button>
  
                        <div class="dropdown-menu dropdown-menu-end py-2">
                          <a class="dropdown-item" href="{{ route('edit.brand', $brand->id) }}">Edit</a>
                          <a class="dropdown-item text-danger" href="{{ route('remove.brand', $brand->id) }}">Remove</a>
                        </div>
                      </div>
                    </td>
              </tr>
             @endforeach

              </tbody>
            </table>
          </div>
          <div class="row align-items-center justify-content-between py-2 pe-0 fs-9">
            <div class="col-auto d-flex">
              <p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body" data-list-info="data-list-info"></p><a class="fw-semibold" href="#!" data-list-view="*">View all<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a><a class="fw-semibold d-none" href="#!" data-list-view="less">View Less<span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
            </div>
            <div class="col-auto d-flex">
              <button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
              <ul class="mb-0 pagination"></ul>
              <button class="page-link pe-0" data-list-pagination="next"><span class="fas fa-chevron-right"></span></button>
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

  

@endsection