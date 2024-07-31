
 @extends('backend.layouts.master_page')

@section('content')

<div class="content">
    
    <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="#!">Product</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('add.product') }}">Products</a></li>
        {{-- <li class="breadcrumb-item active">Default</li> --}}
      </ol>
    </nav>
    <form class="mb-9" action="{{ route('post.product') }}" method="post" enctype="multipart/form-data">
        @csrf

      <div class="row g-3 flex-between-end mb-5">
        <div class="col-auto">
          <h2 class="mb-2">Add product</h2>
        </div>
        <div class="col-auto">
          <button class="btn btn-phoenix-secondary me-2 mb-2 mb-sm-0" type="button">Discard</button>
          <button class="btn btn-phoenix-primary me-2 mb-2 mb-sm-0" type="button">Save draft</button>
          <button class="btn btn-primary mb-2 mb-sm-0" type="submit">Publish product</button>
        </div>
      </div>
      <div class="row g-5">

        <div class="col-12 col-xl-8">

          <div class="row">

            <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-4">
                <div class="mb-2">Name</div>
                <input class="form-control" type="text" placeholder="stock out" name="product_name" />
            </div>

            <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-4">
                <div class="mb-2">Total Qty</div>
                <input class="form-control" type="text" placeholder="Write title" name="total_qty" />
            </div>
         
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-4">
                <div class="mb-2"> Brand <span> <a class="fw-bold fs-9 text-end" data-bs-toggle="modal" data-bs-target="#brand">Add new brand</a></span></div> 
                <div class="mb-0">
                 
                  <select class="form-select" aria-label="brand" name="brand_id">
                      <option value=" ">Select Brand</option>
                      @foreach($brands as $brand) 
                      <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                      @endforeach
                  </select>
                 </div>        
              </div>
  
              <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-4">
                <div class="mb-2"> Unit <span> <a class="fw-bold fs-9 text-end" data-bs-toggle="modal" data-bs-target="#unit">Add new Unit</a></span></div> 
                  <div class="mb-0">
                    
                    <div class="mb-0">
                    <select class="form-select" aria-label="brand" name="unit_id">
                        <option value=" ">Select unit</option>
                        @foreach($units as $unit) 
                        <option value="{{ $unit->id }}">{{ $unit->base_unit_name }}</option>
                        @endforeach
                    </select>
                </div>  
                   </div>        
                </div>
               
                <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <div class="mb-3">Discount Type</div>
                    <input class="form-control mb-5" type="text" placeholder="Discount Type" name="discount_type" />
                </div>
               
              
                <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-4">
                    <div class="mb-3">Stock Status</div>
                    <input class="form-control" type="text" placeholder="stock out" name="stock_status" />
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-4">
                    <div class="mb-3">Rating</div>
                    <input class="form-control" type="integer" placeholder="6" name="rating" />
                </div>
            
                <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-4">
                    <div class="mb-3">Status</div>
                    <input class="form-control" type="integer" placeholder="" name="status" />
                </div>

                <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-4">
                    <label class="form-label" for="datepicker"> Discount Starting Date</label>
                <input class="form-control datetimepicker flatpickr-input" id="datepicker" name="start_date" type="text" placeholder="dd/mm/yyyy" data-options="{&quot;disableMobile&quot;:true,&quot;dateFormat&quot;:&quot;d/m/Y&quot;}" readonly="readonly">
            </div>

            <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-4">
                <label class="form-label" for="datepicker"> Discount Ending Date</label>
                <input class="form-control datetimepicker flatpickr-input" id="datepicker" name="end_date" type="text" placeholder="dd/mm/yyyy" data-options="{&quot;disableMobile&quot;:true,&quot;dateFormat&quot;:&quot;d/m/Y&quot;}" readonly="readonly">
            </div>

            <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-4">
                <div class="mb-2">Min Qty</div>
                <input class="form-control" type="integer" placeholder="6" name="min_qty" />
            </div>
           
            <div class="mb-1 mt-4">
                <div class="mb-2"> Description</div>
                <textarea class="tinymce" name="description" data-tinymce='{"height":"15rem","placeholder":"Write a description here..."}'></textarea>
            </div>

        </div>
        
        <div class="mb-4">
          <h4 class="mb-3">Inventory</h4>
          <div class="row g-0 border-top border-bottom">
            <div class="col-sm-4">
              <div class="nav flex-sm-column border-bottom border-bottom-sm-0 border-end-sm fs-9 vertical-tab h-100 justify-content-between" role="tablist" aria-orientation="vertical"><a class="nav-link border-end border-end-sm-0 border-bottom-sm text-center text-sm-start cursor-pointer outline-none d-sm-flex align-items-sm-center active" id="pricingTab" data-bs-toggle="tab" data-bs-target="#pricingTabContent" role="tab" aria-controls="pricingTabContent" aria-selected="true"> <span class="me-sm-2 fs-4 nav-icons" data-feather="tag"></span><span class="d-none d-sm-inline">Pricing</span></a><a class="nav-link border-end border-end-sm-0 border-bottom-sm text-center text-sm-start cursor-pointer outline-none d-sm-flex align-items-sm-center" id="restockTab" data-bs-toggle="tab" data-bs-target="#restockTabContent" role="tab" aria-controls="restockTabContent" aria-selected="false"> <span class="me-sm-2 fs-4 nav-icons" data-feather="package"></span><span class="d-none d-sm-inline">Restock</span></a><a class="nav-link border-end border-end-sm-0 border-bottom-sm text-center text-sm-start cursor-pointer outline-none d-sm-flex align-items-sm-center" id="shippingTab" data-bs-toggle="tab" data-bs-target="#shippingTabContent" role="tab" aria-controls="shippingTabContent" aria-selected="false"> <span class="me-sm-2 fs-4 nav-icons" data-feather="truck"></span><span class="d-none d-sm-inline">Shipping</span></a>
              

                <a class="nav-link border-end border-end-sm-0 border-bottom-sm text-center text-sm-start cursor-pointer outline-none d-sm-flex align-items-sm-center" id="attributesTab" data-bs-toggle="tab" data-bs-target="#attributesTabContent" role="tab" aria-controls="attributesTabContent" aria-selected="false"> <span class="me-sm-2 fs-4 nav-icons" data-feather="sliders"></span><span class="d-none d-sm-inline">Attributes</span></a><a class="nav-link text-center text-sm-start cursor-pointer outline-none d-sm-flex align-items-sm-center" id="advancedTab" data-bs-toggle="tab" data-bs-target="#advancedTabContent" role="tab" aria-controls="advancedTabContent" aria-selected="false"> <span class="me-sm-2 fs-4 nav-icons" data-feather="lock"></span><span class="d-none d-sm-inline">Advanced</span></a>

                <a class="nav-link border-end border-end-sm-0 border-bottom-sm text-center text-sm-start cursor-pointer outline-none d-sm-flex align-items-sm-center" id="reviewsTab" data-bs-toggle="tab" data-bs-target="#reviewsTabContent" role="tab" aria-controls="reviewsTabContent" aria-selected="false"> <span class="me-sm-2 fs-4 nav-icons" data-feather="star"></span><span class="d-none d-sm-inline">Reviews</span></a>

                <a class="nav-link border-end border-end-sm-0 border-bottom-sm text-center text-sm-start cursor-pointer outline-none d-sm-flex align-items-sm-center" id="metaTab" data-bs-toggle="tab" data-bs-target="#metaTabContent" role="tab" aria-controls="metaTabContent" aria-selected="false"> <span class="me-sm-2 fs-4 nav-icons" data-feather="link"></span><span class="d-none d-sm-inline">Meta</span></a>
            </div>
            </div>
            <div class="col-sm-8">
              <div class="tab-content py-3 ps-sm-4 h-100">
                <div class="tab-pane fade show active" id="pricingTabContent" role="tabpanel">
                  <h4 class="mb-3 d-sm-none">Pricing</h4>

                  <div class="row g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-2 text-body-highlight">Regular price</h5>
                      <input class="form-control" type="text" placeholder="$500"  name="regular_price"/>
                    </div>

                    <div class="col-12 col-lg-6">
                        <h5 class="mb-2 text-body-highlight">Purchase price</h5>
                        <input class="form-control" type="text" placeholder="$200" name="purchase_price"/>
                      </div>

                    <div class="col-12 col-lg-6">
                      <h5 class="mb-2 text-body-highlight">Sale price</h5>
                      <input class="form-control" type="text" placeholder="$400" name="sale_price"/>
                    </div>
                  </div>

                </div>
                <div class="tab-pane fade h-100" id="restockTabContent" role="tabpanel" aria-labelledby="restockTab">
                  <div class="d-flex flex-column h-100">
                    <h5 class="mb-3 text-body-highlight">Add to Stock</h5>
                    <div class="row g-3 flex-1 mb-4">
                      <div class="col-sm-7">
                        <input class="form-control" type="number" placeholder="Quantity" name="total_qty" />
                      </div>
                      <div class="col-sm">
                        <button class="btn btn-primary" type="button"><span class="fa-solid fa-check me-1 fs-10"></span>Confirm</button>
                      </div>
                    </div>
                    <table>
                      <thead>
                        <tr>
                          <th style="width: 200px;"></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-body-highlight fw-bold py-1">Product in stock now:</td>
                          <td class="text-body-tertiary fw-semibold py-1">$1,090
                            <button class="btn p-0" type="button"><span class="fa-solid fa-rotate text-body ms-1" style="--phoenix-text-opacity: .6;"></span></button>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-body-highlight fw-bold py-1">Product in transit:</td>
                          <td class="text-body-tertiary fw-semibold py-1">5000</td>
                        </tr>
                        <tr>
                          <td class="text-body-highlight fw-bold py-1">Last time restocked:</td>
                          <td class="text-body-tertiary fw-semibold py-1">30th June, 2021</td>
                        </tr>
                        <tr>
                          <td class="text-body-highlight fw-bold py-1">Total stock over lifetime:</td>
                          <td class="text-body-tertiary fw-semibold py-1">20,000</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="tab-pane fade h-100" id="shippingTabContent" role="tabpanel" aria-labelledby="shippingTab">
                  <div class="d-flex flex-column h-100">
                    <h5 class="mb-3 text-body-highlight">Shipping Type</h5>
                    <div class="flex-1">
                      <div class="mb-4">
                        <div class="form-check mb-1">
                          <input class="form-check-input" type="radio" name="shipping_type" id="fullfilledBySeller" />
                          <label class="form-check-label fs-8 text-body" for="fullfilledBySeller">Fullfilled by Seller</label>
                        </div>
                        <div class="ps-4">
                          <p class="text-body-secondary fs-9 mb-0">You’ll be responsible for product delivery. <br />Any damage or delay during shipping may cost you a Damage fee.</p>
                        </div>
                      </div>
                      <div class="mb-4">
                        <div class="form-check mb-1">
                          <input class="form-check-input" type="radio" name="shipping_type" id="fullfilledByPhoenix" checked="checked" />
                          <label class="form-check-label fs-8 text-body d-flex align-items-center" for="fullfilledByPhoenix">Fullfilled by Phoenix <span class="badge badge-phoenix badge-phoenix-warning fs-10 ms-2">Recommended</span></label>
                        </div>
                        <div class="ps-4">
                          <p class="text-body-secondary fs-9 mb-0">Your product, Our responsibility.<br />For a measly fee, we will handle the delivery process for you.</p>
                        </div>
                      </div>
                    </div>
                    <p class="fs-9 fw-semibold mb-0">See our <a class="fw-bold" href="#!">Delivery terms and conditions </a>for details.</p>
                  </div>
                </div>
               
                <div class="tab-pane fade" id="attributesTabContent" role="tabpanel" aria-labelledby="attributesTab">
                  <h5 class="mb-3 text-body-highlight">Attributes</h5>
                  <div class="form-check">
                    <input class="form-check-input" id="fragileCheck" type="checkbox" />
                    <label class="form-check-label text-body fs-8" for="fragileCheck">Fragile Product</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" id="biodegradableCheck" type="checkbox" />
                    <label class="form-check-label text-body fs-8" for="biodegradableCheck">Biodegradable</label>
                  </div>
                  <div class="mb-3">
                    <div class="form-check">
                      <input class="form-check-input" id="frozenCheck" type="checkbox" checked="checked" />
                      <label class="form-check-label text-body fs-8" for="frozenCheck">Frozen Product</label>
                      <input class="form-control" type="text" placeholder="Max. allowed Temperature" style="max-width: 350px;" />
                    </div>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" id="productCheck" type="checkbox" checked="checked" />
                    <label class="form-check-label text-body fs-8" for="productCheck">Expiry Date of Product</label>
                    <input class="form-control inventory-attributes datetimepicker" id="inventory" type="text" style="max-width: 350px;" placeholder="d/m/y" data-options='{"disableMobile":true}' />
                  </div>
                </div>

                <div class="tab-pane fade" id="advancedTabContent" role="tabpanel" aria-labelledby="advancedTab">
                  <h5 class="mb-3 text-body-highlight">Advanced</h5>
                  <div class="row g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-2 text-body-highlight">Product ID Type</h5>
                      <select class="form-select" aria-label="form-select-lg example" name="product_id_type">
                        <option selected="selected" value="ISBN">ISBN</option>
                        <option value="UPC">UPC</option>
                        <option value="EAN">EAN</option>
                        <option value="JAN">JAN</option>
                      </select>
                    </div>
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-2 text-body-highlight">Product ID</h5>
                      <input class="form-control" type="text" placeholder="ISBN Number" name="product_id"/>
                    </div>
                  </div>
                </div>

                <div class="tab-pane fade" id="reviewsTabContent" role="tabpanel" aria-labelledby="reviewsTab">
                    <h5 class="mb-3 text-body-highlight">Reviews</h5>

                    <div class="row g-3">
                        
                        <div class="col-12 col-lg-6">
                            <h5 class="mb-2 text-body-highlight">Name</h5>
                            <input class="form-control" type="text" placeholder=""  name="name"/>
                          </div>

                        <div class="col-12 col-lg-6">
                          <h5 class="mb-2 text-body-highlight">Rating</h5>
                          <input class="form-control" type="integer" placeholder=""  name="rating"/>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h5 class="mb-2 text-body-highlight">Heart</h5>
                            <input class="form-control" type="integer" placeholder=""  name="heart"/>
                          </div>
                          <div class="col-12 col-lg-6">
                            <h5 class="mb-2 text-body-highlight">Status</h5>
                            <input class="form-control" type="integer" placeholder=""  name="status"/>
                          </div>
                          <div class="col-12 col-lg-6">
                            <h5 class="mb-2 text-body-highlight">Thumbps Up</h5>
                            <input class="form-control" type="integer" placeholder=""  name="thumbs_up"/>
                          </div>
                          <div class="col-12 col-lg-6">
                            <h5 class="mb-2 text-body-highlight">Image</h5>
                            <input class="form-control" type="file" name="review_img"/>
                          </div>

                          <div class="col-12 col-lg-12">
                            <h5 class="mb-2 text-body-highlight">Comments</h5>
                            <textarea class="form-control"   name="comments"> </textarea>
                          </div>
                      </div>
                </div>




                <div class="tab-pane fade" id="metaTabContent" role="tabpanel" aria-labelledby="metaTab">
                    <h5 class="mb-3 text-body-highlight">Meta Information</h5>

                    <div class="row g-3">
                        
                        <div class="col-12 col-lg-6">
                            <h5 class="mb-2 text-body-highlight">Title</h5>
                            <input class="form-control" type="text" placeholder=""  name="name"/>
                          </div>
                          <div class="col-12 col-lg-6">
                            <h5 class="mb-2 text-body-highlight">Image Link</h5>
                            <input class="form-control" type="text" placeholder=""  name="name"/>
                          </div>
                          <div class="col-12 col-lg-12">
                            <h5 class="mb-2 text-body-highlight">Description</h5>
                            <textarea class="form-control"   name="meta_description"> </textarea>
                        </div>


                       
                       

                      
                      </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        </div>


        <div class="col-12 col-xl-4">
          <div class="row g-2">
            <div class="col-12 col-xl-12">
              <div class="card mb-3">
                <div class="card-body">
                  <h4 class="card-title mb-4">Organize</h4>
                  <div class="row gx-3">



                    <div class="col-12 col-sm-6 col-xl-12">
                        <div class="mb-4">
                            <select class="form-select mb-3" aria-label="category" name="category_id">
                                <ul>
                                    @foreach($all_cates as $category)
                                        @include('backend.products.partials.category-item', ['category' => $category])
                                    @foreach
                               
                            </select>
                        </div>
                    </div>




                    <div class="col-12 col-sm-6 col-xl-12 d-none">
                      <div class="mb-4">
                        <div class="d-flex flex-wrap mb-2">
                          <div class="mb-0 text-body-highlight me-2">Category</div><a class="fw-bold fs-9" data-bs-toggle="modal" data-bs-target="#category">Add new category</a>
                        </div>

                        <select class="form-select mb-3" aria-label="category" name="category_id">
                          <option value="men-cloth">Men's Clothing</option>
                          <option value="women-cloth">Womens's Clothing</option>
                          <option value="kid-cloth">Kid's Clothing</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-12">
                        <div class="mb-4">
                        <div class="mb-2 text-body-highlight">Added By</div>
                        <input class="form-control mb-xl-3" type="text" placeholder="Added By" name="added_by"/>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-xl-12">
                      <div class="mb-4">
                        <div class="d-flex flex-wrap mb-2">
                          <div class="mb-0 text-body-highlight me-2">Vendor</div><a class="fw-bold fs-9" href="#!" data-bs-toggle="modal" data-bs-target="#vendor">Add new vendor</a>
                        </div>
                        <select class="form-select mb-3" aria-label="attribute" name="vendor_id">
                            <option value=" ">Select Vendor</option>
                            @foreach($vendors as $vendor) 
                            <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>



                <div class="col-12 col-sm-6 col-xl-12">
                    <div class="mb-4">
                    <div class="mb-2 text-body-highlight">Collection</div>
                    <input class="form-control mb-xl-3" type="text" placeholder="Collection" name="collection"/>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl-12">
                    <div class="mb-4">
                    <div class="mb-2 text-body-highlight">Slug</div>
                    <input class="form-control mb-xl-3" type="text" placeholder="Slug" name="slug"/>
                    </div>
                </div>

               
                {{-- <div class="col-12 col-sm-6 col-xl-12">
                    <div class="d-flex flex-wrap mb-2">
                    <h5 class="mb-0 text-body-highlight me-2">Tags</h5><a class="fw-bold fs-9 lh-sm" href="#!">View all tags</a>
                    </div>
                    <select class="form-select" aria-label="category">
                    <option value="men-cloth">Men's Clothing</option>
                    <option value="women-cloth">Womens's Clothing</option>
                    <option value="kid-cloth">Kid's Clothing</option>
                    </select>
                </div> --}}
                <div class="col-12 col-sm-6 col-xl-12">
                    <div class="mb-4">
                    <div class="mb-2 text-body-highlight">Tags</div>
                    <input class="form-control mb-xl-3" type="text" placeholder="Tag"  name="tags"/>
                    </div>
                </div>

                  </div>
                </div>
              </div>
            </div>
           
          </div>
        </div>

        <div class="col-12 col-xl-12">
            <div class="card">
              <div class="card-body">
                <div class="card-title mb-4">Variants</div>
                <div class="row g-3">
                  <div class="col-12 col-sm-6 col-xl-6">
                    <div class="border-bottom border-translucent border-dashed border-sm-0 border-bottom-xl pb-4">
                      <div class="d-flex flex-wrap mb-2">
                        <div class="text-body-highlight me-2">Option 1</div><a class="fw-bold fs-9" href="#!">Remove</a>
                      </div>
                     
                      <select class="form-select mb-3" name="">
                          <option value=" ">Select Attribute</option>
                          @foreach($attributes as $attribute) 
                          <option value="{{ $attribute->id }}">{{ $attribute->attribute_name }}</option>
                          @endforeach
                      </select>



                      <div class="product-variant-select-menu">
                        <select class="form-select mb-3" data-choices="data-choices" multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}'>
                          <option value="size">4x6 in</option>
                          <option value="color">9x6 in</option>
                          <option value="weight">11x8 in</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-12 col-sm-6 col-xl-6">
                    <div class="d-flex flex-wrap mb-2">
                      <div class="text-body-highlight me-2">Option 2</div><a class="fw-bold fs-9" href="#!">Remove</a>
                    </div>
                     <select class="form-select mb-3" name="">
                          <option value=" ">Select Attribute</option>
                          @foreach($attributes as $attribute) 
                          <option value="{{ $attribute->id }}">{{ $attribute->attribute_name }}</option>
                          @endforeach
                      </select>
                    <div class="product-variant-select-menu mb-3">
                      <select class="form-select mb-3" data-choices="data-choices" multiple="multiple" data-options='{"removeItemButton":true,"placeholder":true}'>
                        <option value="size">4x6 in</option>
                        <option value="color">9x6 in</option>
                        <option value="weight">11x8 in</option>
                      </select>
                    </div>
                  </div>
                </div>
                <button class="btn btn-phoenix-primary w-100" type="button">Add another option</button>
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


    @include('backend.modals')

  </div>
@endsection() 



