@extends('backend.layouts.master_page')
@section('title')
<title>Products</title>
@endsection
@section('content')


@section('custom_css')
<style>

</style>
@endsection

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
        <li class="breadcrumb-item"><a href="#!">Product</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products') }}">Products</a></li>
        {{-- <li class="breadcrumb-item active">Default</li> --}}
      </ol>
    </nav>
    <div class="mb-9">
      <div class="row g-3 mb-4">
        <div class="col-auto">
          <h2 class="mb-0">Products</h2>
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
              <a href="{{ route('add.product') }}"> <button class="btn btn-primary" id="addBtn"><span class="fas fa-plus me-2"></span>Add Product</button></a> 
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
                  <th class="sort white-space-nowrap align-middle ps-4" scope="col" style="width:350px;" data-sort="product">Added By</th>
                  {{-- <th class="sort white-space-nowrap align-middle ps-4" scope="col" style="width:350px;" data-sort="product">description</th> --}}
                  <th class="sort align-middle ps-4" scope="col" data-sort="email" style="width:50px;">Total Qty</th>
                  <th class="sort align-middle ps-4" scope="col" data-sort="email" style="width:50px;">discount Type</th>
                  <th class="sort align-middle ps-4" scope="col" data-sort="email" style="width:50px;">Slug</th>
                  <th class="sort align-middle ps-4" scope="col" data-sort="role" style="width:50px;">Stock Status</th>
                  <th class="sort align-middle text-end ps-4" scope="col" data-sort="date" style="width:150px;">Tags</th>
                  <th class="sort align-middle text-end ps-4" scope="col" data-sort="date" style="width:150px;">Min_qty</th>
                  
                  {{-- <th class="sort align-middle text-end ps-4" scope="col" data-sort="date" style="width:150px;">Thumbnail_image_id</th>
                  <th class="sort align-middle text-end ps-4" scope="col" data-sort="date" style="width:150px;">Gallery_image_id</th> --}}
                  <th class="sort align-middle text-end ps-4" scope="col" data-sort="date" style="width:150px;">Unit</th>
                  <th class="sort align-middle text-end ps-4" scope="col" data-sort="date" style="width:150px;">Category</th>
                  <th class="sort align-middle text-end ps-4" scope="col" data-sort="date" style="width:150px;">Brand</th>

                  <th class="sort align-middle text-end ps-4" scope="col" data-sort="date" style="width:150px;">Vendor Name</th>
                  <th class="sort align-middle text-end ps-4" scope="col" data-sort="date" style="width:150px;">Shipping Type</th>
                  <th class="sort align-middle text-end ps-4" scope="col" data-sort="date" style="width:150px;">Shipping Cost</th>

                  <th class="sort align-middle text-end ps-4" scope="col" data-sort="date" style="width:150px;">Featured</th>
                  <th class="sort align-middle text-end ps-4" scope="col" data-sort="date" style="width:150px;">Trendy</th>
                  <th class="sort align-middle text-end ps-4" scope="col" data-sort="date" style="width:150px;">New_arrival</th>
                  <th class="sort align-middle text-end ps-4" scope="col" data-sort="date" style="width:150px;">Todays_deal</th>
                  <th class="sort text-end align-middle pe-0 ps-4" scope="col">Actions</th>
                </tr>
              </thead>

             


              <tbody class="list" id="products-table-body">


            @foreach ($products as $product)

                <tr class="position-static">

                    <td class="fs-9 align-middle">
                      <div class="form-check mb-0 fs-8">
                        <input class="form-check-input" type="checkbox" data-bulk-select-row='{"product":"iPhone 13 pro max-Pacific Blue-128GB storage","productImage":"/products/2.png","price":"$87","category":"Furniture","tags":["Class","Camera","Discipline","invincible","Pro","Swag"],"star":true,"vendor":"Beatrice Furnitures","publishedOn":"Nov 11, 7:36 PM"}' />
                      </div>
                    </td>
  
                    <td class="align-middle white-space-nowrap py-0"><a class="d-block border border-translucent rounded-2" href="../../../apps/e-commerce/landing/product-details.html"><img src="../../../assets/img//products/2.png" alt="" width="53" /></a>
                  </td>
  
                <td class="product align-middle ps-4">
                    <a class="fw-semibold line-clamp-3 mb-0" href="../../../apps/e-commerce/landing/product-details.html">
                       {{ $product->name }}            
                    </a>
                </td>
             
                  <td class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                    {{ $product->added_by }} 
                    </td>
                    {{-- <td class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                        {!! $product->description !!}
                    </td> --}}
                        <td class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                            {{ $product->total_qty }} 
                        </td>
                        <td class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                            {{ $product->discount_type }} 
                        </td>
                        <td class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                            {{ $product->slug }} 
                        </td>
                        {{-- {{ $product->stock_status }} --}}

                        
                    <td class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                        <select class="form-control dropdown-toggle" name="status_type" id="changeStatus" onchange="changeStatus(this, {{ $product->id }})">

                            <option value="">Select</option>

                            <option value="stock-in" {{ $product->stock_status=='stock-in' ? 'selected' : '' }}> stock-in</option>

                            <option value="stock-out" {{ $product->stock_status=='stock-out' ? 'selected' : '' }}> stock-out</option>

                        </select>
                    </td>
                   
                    <td class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                        {{ $product->tags }} 
                    </td>
                    <td class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                      {{ $product->min_qty }} 
                  </td>

                  <td class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                    {{ $product->unit->base_unit_name}} 
                </td>
                  <td class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                    {{ $product->category->name}} 
                </td>

                <td class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                    {{ $product->brand->name }} 
                </td>
                
                <td class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                    {{ $product->vendor->name }} 
                </td>
              
                <td class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                    {{ $product->shipping_type }} 
                </td>
                <td class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                    {{ $product->shipping_cost }} 
                </td>
               
                     <td class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">

                      <div class="form-check form-switch">
                      
                        @if($product->featured !=null)
                        
                        <input class="form-check-input" id="flexSwitchCheckChecked" checked type="checkbox" name="featured" id="featured" onchange="featured(this, {{ $product->id }})" value="on"/>
                        
                        @else 
                        <input class="form-check-input"  id="flexSwitchCheckChecked" type="checkbox" name="featured" id="featured" onchange="featured(this, {{ $product->id }})" value="off"/>

                        @endif
                      </div>
                    </td>

                    <td class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                      <div class="form-check form-switch">
                        <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox"  name="trendy" id="trendy" onchange="trendy(this,  {{ $product->id }} )"/>
                     </div>
                    </td>

                    <td class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                      <div class="form-check form-switch">
                        <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox"  name="new_arrival" id="new_arrival" onchage="arrival(this,  {{ $product->id }} )"/>
                     </div>     

                     </td>

                    <td class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                    
                      <div class="form-check form-switch">
                        <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox"  name="todays_deal" id="todays_deal" onchage="deal(this,  {{ $product->id }} )"/>
                     </div>    
                    </td>

                   

                     {{-- Name  Added By description  total_qty discount_type slug collection product_id product_id_type stock_status rating discount_start_date discount_end_date tags min_qty featured trendy new_arrival todays_deal thumbnail_image_id gallery_image_id category_id brand_id review_id vendor_name meta_title meta_description image_link shipping_type shipping_cost product_type date--}}
  
                    <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                      <div class="btn-reveal-trigger position-static">
                        <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs-10"></span></button>
  
                        <div class="dropdown-menu dropdown-menu-end py-2">
                          <a class="dropdown-item" href="{{ route('edit.product', $product->id)}}">Edit</a>
                          <a class="dropdown-item text-danger" href="{{ route('remove.product', $product->id)}}">Remove</a>
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

  

  @section('custom_js')

  <script>
   function changeStatus(tag, id){
        // console.log(id);
       let statusValue =  tag.value;
        console.log(statusValue);

        $.ajax({

        url: "{{ route('send.status',   ['status' => ':status', 'id' => ':id']) }}"
        .replace(':status', encodeURIComponent(statusValue))
        .replace(':id', id),
        type: 'GET',
        dataType: 'json', 

        success: function(res) {
            console.log('Response: ' + res);
           
            // $changeStatus.empty();
            // $changeStatus.setAttribute('value', ${res.data});

        }

  });

    }

// featured, new_arrival, todays_deal, trendy

    function featured(tag , id){

       console.log('Checked Value');
       let checkValue =  tag.value;
        console.log(checkValue);

        $.ajax({
        url: "{{ route('send.featured',   ['featured' => ':featured', 'id' => ':id']) }}"
        .replace(':featured', encodeURIComponent(checkValue))
        .replace(':id', id),
        type: 'GET',
        dataType: 'json', 

        success: function(res) {

        console.log('Response: ' + res);

        // $featured.empty();
        if(checkValue == 'off'){

            $('#featured').prop('checked', false);
        }
        else{
            $('#featured').prop('checked', true);

        }
            
           // $changeStatus.setAttribute('value', ${res.data});
           }

        });

  }

  function arrival(tag , id){

  }

  function deal(tag , id){

}

function trendy(tag , id){

}
    </script>

  @endsection

@endsection