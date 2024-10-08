
 @extends('backend.layouts.master_page')

@section('content')

<div class="content">
    
    <nav class="mb-2" aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="#!">Product</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('products') }}">Products</a></li>
        {{-- <li class="breadcrumb-item active">Default</li> --}}
      </ol>
    </nav>


    @if($errors->any())
    @foreach($errors->all() as $error)
        @php
            // Extract field name from the error message
            $field = explode(' ', $error)[0];
        @endphp

        @if(in_array($field, [ 'name', 'total_qty', 'brand_id', 'unit_id', 'stock_status', 'status', 'min_qty', 'shipping_cost','vendor_id', 'tags', 'product_images'])) 

            <div class="alert alert-secondary p-2">{{ $error }}</div>

        @endif
    @endforeach
@endif


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
            {{-- @error('name')
            <div class="alert alert-danger mb-2 p-1">{{ $message }}</div>
           @enderror --}}

         

            <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-4">
                <div class="mb-2">Name</div>
                <input class="form-control" type="text" placeholder="Saree" name="product_name" {{ old('product_name') }} />
            </div>
           
            
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-4">
                <div class="mb-2">Total Qty</div>
                <input class="form-control" type="number" placeholder="200" name="total_qty" />
            </div>
         
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-4">
                <div class="mb-2"> Brand <span> <a class="fw-bold fs-9 text-end" data-bs-toggle="modal" data-bs-target="#brand">Add new brand</a></span></div> 
                <div class="mb-0">
                 
                <select class="form-select" aria-label="brand_id"  name="brand_id" id="brandId">
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
                    <select class="form-select" aria-label="unit" name="unit_id" id="unitId" >
                        <option value=" ">Select unit</option>
                        @foreach($units as $unit) 
                        <option value="{{ $unit->id }}">{{ $unit->symbol }}</option>
                        @endforeach
                    </select>
                </div>  
                </div>        
                </div>
                
                <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <div class="mb-3">Discount Type</div>
                    <input class="form-control mb-5" type="text" placeholder="Old dress" name="discount_type" />
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <div class="mb-3">Discount(%)</div>
                    <input class="form-control mb-5" type="number" placeholder="10%" name="discount" />
                </div>
               
                <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-4">
                    <div class="mb-3">Stock Status</div>
                    <select class="form-select" aria-label="stock_status" name="stock_status" >
                        <option value="">Select</option>
                        <option value="stock-in">Stock-in</option>
                        <option value="stock-out">Stock-out</option>
                    </select>
                </div>
                
                <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-4">
                    <div class="mb-2">Min Qty</div>
                    <input class="form-control" type="integer" placeholder="6" name="min_qty" />
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
                <div class="mb-3">Status</div>
                <select class="form-select" aria-label="status" name="status" >
                    <option value=" " selected>Select</option>
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>
          
            {{-- <div class="col-12 mb-4 d-none">
                <div class="mb-3">Select Images</div>
                <div class="dropzone dropzone-multiple p-0 mb-5" id="my-awesome-dropzone" data-dropzone="data-dropzone">
                    <div class="fallback">
                        <input type="file" name="array_img" multiple />
                    </div>
                    <div class="dz-preview d-flex flex-wrap">
                        <div class="border border-translucent bg-body-emphasis rounded-3 d-flex flex-center position-relative me-2 mb-2" style="height:80px;width:80px;">
                            <img class="dz-image" src="" alt="..." data-dz-thumbnail="data-dz-thumbnail" />
                            <a class="dz-remove text-body-quaternary" href="#!" data-dz-remove="data-dz-remove">
                                <span data-feather="x"></span>
                            </a>
                        </div>
                    </div>
                    <div class="dz-message text-body-tertiary text-opacity-85" data-dz-message="data-dz-message">Drag your photo here
                        <span class="text-body-secondary px-1">or</span>
                        <button class="btn btn-link p-0" type="button">Browse from device</button>
                        <br /><img class="mt-3 me-2" src="../../../assets/img/icons/image-icon.png" width="40" alt="" />
                    </div>
                </div>
            </div> --}}
    
            <div class="col-12 mb-4">
                <div class="mb-3">(First image will be displayed image left will be gallery images)</div>
                <input class="form-control" type="file" placeholder="6" name="product_images[]" multiple  />
            </div>
           
            {{-- <div class="col-12 mb-4 d-none">
                <div class="dropzone dropzone-multiple p-0" id="dropzone-multiple" data-dropzone="data-dropzone" action="#!">
                    <div class="fallback">
                    <input name="file" type="file" multiple="multiple" />
                    </div>
                    <div class="dz-message" data-dz-message="data-dz-message"><img class="me-2" src="../../../assets/img/icons/cloud-upload.svg" width="25" alt="" />Drop your files here</div>
                    <div class="dz-preview dz-preview-multiple m-0 d-flex flex-column">
                    <div class="d-flex mb-3 pb-3 border-bottom border-translucent media">
                        <div class="border p-2 rounded-2 me-2"><img class="rounded-2 dz-image" src="../../../assets/img/icons/file.png" alt="..." data-dz-thumbnail="data-dz-thumbnail" /></div>
                        <div class="flex-1 d-flex flex-between-center">
                        <div>
                            <h6 data-dz-name="data-dz-name"></h6>
                            <div class="d-flex align-items-center">
                            <p class="mb-0 fs-9 text-body-quaternary lh-1" data-dz-size="data-dz-size"></p>
                            <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>
                            </div><span class="fs-10 text-danger" data-dz-errormessage="data-dz-errormessage"></span>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-link text-body-tertiary btn-sm dropdown-toggle btn-reveal dropdown-caret-none" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h"></span></button>
                            <div class="dropdown-menu dropdown-menu-end border border-translucent py-2"><a class="dropdown-item" href="#!" data-dz-remove="data-dz-remove">Remove File</a></div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div> --}}
           
            <div class="mb-1 mt-4">
                <div class="mb-2"> Description</div>
                <textarea class="tinymce" name="product_description" data-tinymce='{"height":"15rem","placeholder":"Write a description here..."}'></textarea>
            </div>
            
        </div>
        
        <div class="mb-4 mt-3">

          <h5 class="mb-3">Inventory Product Data</h5>
          <div class="row g-0 border-top border-bottom">
            <div class="col-sm-4">
              <div class="nav flex-sm-column border-bottom border-bottom-sm-0 border-end-sm fs-9 vertical-tab h-100 justify-content-between" role="tablist" aria-orientation="vertical">
                
                <a class="nav-link border-end border-end-sm-0 border-bottom-sm text-center text-sm-start cursor-pointer outline-none d-sm-flex align-items-sm-center active" id="pricingTab" data-bs-toggle="tab" data-bs-target="#pricingTabContent" role="tab" aria-controls="pricingTabContent" aria-selected="true"> <span class="me-sm-2 fs-4 nav-icons" data-feather="tag"></span><span class="d-none d-sm-inline">Pricing</span></a>
                
                <a class="nav-link border-end border-end-sm-0 border-bottom-sm text-center text-sm-start cursor-pointer outline-none d-sm-flex align-items-sm-center" id="restockTab" data-bs-toggle="tab" data-bs-target="#restockTabContent" role="tab" aria-controls="restockTabContent" aria-selected="false"> <span class="me-sm-2 fs-4 nav-icons" data-feather="package"></span><span class="d-none d-sm-inline">Restock</span></a>
                
                <a class="nav-link border-end border-end-sm-0 border-bottom-sm text-center text-sm-start cursor-pointer outline-none d-sm-flex align-items-sm-center" id="shippingTab" data-bs-toggle="tab" data-bs-target="#shippingTabContent" role="tab" aria-controls="shippingTabContent" aria-selected="false"> <span class="me-sm-2 fs-4 nav-icons" data-feather="truck"></span><span class="d-none d-sm-inline">Shipping</span></a>
              

                {{-- <a class="nav-link border-end border-end-sm-0 border-bottom-sm text-center text-sm-start cursor-pointer outline-none d-sm-flex align-items-sm-center" id="attributesTab" data-bs-toggle="tab" data-bs-target="#attributesTabContent" role="tab" aria-controls="attributesTabContent" aria-selected="false"> <span class="me-sm-2 fs-4 nav-icons" data-feather="sliders"></span><span class="d-none d-sm-inline">Attributes</span></a> --}}
                
                

                <a class="nav-link border-end border-end-sm-0 border-bottom-sm text-center text-sm-start cursor-pointer outline-none d-sm-flex align-items-sm-center" id="reviewsTab" data-bs-toggle="tab" data-bs-target="#reviewsTabContent" role="tab" aria-controls="reviewsTabContent" aria-selected="false"> <span class="me-sm-2 fs-4 nav-icons" data-feather="star"></span><span class="d-none d-sm-inline">Reviews</span></a>

                <a class="nav-link border-end border-end-sm-0 border-bottom-sm text-center text-sm-start cursor-pointer outline-none d-sm-flex align-items-sm-center" id="metaTab" data-bs-toggle="tab" data-bs-target="#metaTabContent" role="tab" aria-controls="metaTabContent" aria-selected="false"> <span class="me-sm-2 fs-4 nav-icons" data-feather="link"></span><span class="d-none d-sm-inline">Meta</span></a>

                <a class="nav-link border-end border-end-sm-0 border-bottom-sm text-center text-sm-start cursor-pointer outline-none d-sm-flex align-items-sm-center" id="variationsTab" data-bs-toggle="tab" data-bs-target="#variationsTabContent" role="tab" aria-controls="variationsTabContent" aria-selected="false"> <span class="me-sm-2 fs-4 nav-icons" data-feather="layers"></span><span class="d-none d-sm-inline">Variations</span></a>

            </div>

            </div>
            <div class="col-sm-8">
              <div class="tab-content py-3 ps-sm-4 h-100">

                <div class="tab-pane fade show active" id="pricingTabContent" role="tabpanel">
                  <h4 class="mb-3 d-sm-none">Pricing</h4>
                  
                  <div class="row g-3">
                    <div class="col-12 col-lg-6">
                      <h5 class="mb-2 text-body-highlight">Regular price</h5>
                      <input class="form-control" type="text" placeholder="$500"  name="p_regular_price" />
                    </div>

                    <div class="col-12 col-lg-6">
                      <h5 class="mb-2 text-body-highlight">Sale price</h5>
                      <input class="form-control" type="text" placeholder="$400" name="p_sale_price" />
                    </div>

                    <div class="col-12 col-lg-6">
                      <h5 class="mb-2 text-body-highlight">Purchase price</h5>
                      <input class="form-control" type="text" placeholder="$200" name="p_purchase_price" />
                    </div>

                  </div>

                </div>

                <div class="tab-pane fade h-100" id="restockTabContent" role="tabpanel" aria-labelledby="restockTab">
                  <div class="d-flex flex-column h-100">
                    <h5 class="mb-3 text-body-highlight">Add to Stock</h5>
                    <div class="row g-3 flex-1 mb-4">
                      <div class="col-sm-7">
                        <input class="form-control" type="number" placeholder="300" name="restock_value" />
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
                        <select class="form-select" aria-label="brand" name="shipping_type" >
                            <option value="">Select</option>
                            <option value="free">Free</option>
                            <option value="with pay">With Pay</option>
                        </select>
                      </div>
                     
                      <div class="mb-4">
                        <h5 class="mb-2 text-body-highlight">Shipping Cost</h5>
                        <input class="form-control" type="text" placeholder="$200" name="shipping_cost" />
                      </div>

                    </div>
                    <p class="fs-9 fw-semibold mb-0">See our <a class="fw-bold" href="#!">Delivery terms and conditions </a>for details.</p>
                  </div>
                </div>
                
             
               
               
                
                <div class="tab-pane fade" id="metaTabContent" role="tabpanel" aria-labelledby="metaTab">
                    <h5 class="mb-3 text-body-highlight">Meta Information</h5>

                    <div class="row g-3">
                        
                        <div class="col-12 col-lg-6">
                            <h5 class="mb-2 text-body-highlight">Title</h5>
                            <input class="form-control" type="text" placeholder=""  name="meta_title"/>
                          </div>

                          
                          
                          <div class="col-12 col-lg-12">
                            <h5 class="mb-2 text-body-highlight">Description</h5>
                            <textarea class="form-control"  name="meta_description"> </textarea>
                        </div>

                      </div>
                </div>

                  <div class="tab-pane fade" id="reviewsTabContent" role="tabpanel" aria-labelledby="reviewsTab">
                    <span class="mb-3 text-body-highlight">Reviews</span> 
                    <span></span>
                    <span class="btn btn-primary btn-sm" onclick="addReview()">+ Add New</span> 
                    <div class="container-review-wrapper">
                      
                      {{-- first child  --}}
                      <div class="row g-3 container-review">
                        
                        <div class="col-12 col-lg-4">
                            <h5 class="mb-2 text-body-highlight">Name</h5>
                            <input class="form-control" type="text" placeholder="Review Title"  name="review_name[]"/>
                          </div>

                          <div class="col-12 col-lg-4">
                            <h5 class="mb-2 text-body-highlight">Rating</h5>
                          <input class="form-control" type="number" placeholder="2"  name="review_rating[]"/>
                        </div>
                        <div class="col-12 col-lg-4">
                          <h5 class="mb-2 text-body-highlight">Heart</h5>
                            <input class="form-control" type="number" placeholder="4"  name="review_heart[]"/>
                          </div>
                          <div class="col-12 col-lg-4">
                            <h5 class="mb-2 text-body-highlight">Status</h5>
                            <input class="form-control" type="text" placeholder="Best"  name="review_status[]"/>
                          </div>
                      
                          <div class="col-12 col-lg-4">
                            <h5 class="mb-2 text-body-highlight">Thumbps Up</h5>
                            <input class="form-control" type="number" placeholder="5"  name="thump_ups[]"/>
                          </div>
                          <div class="col-12 col-lg-4">
                            <h5 class="mb-2 text-body-highlight">Image</h5>
                            <input class="form-control" type="file" name="review_images[]"/>
                          </div>

                          <div class="col-12 col-lg-6">
                            <h5 class="mb-2 text-body-highlight">Comments</h5>
                            <textarea class="form-control" name="comments[]"> </textarea>
                          </div>

                          <div class="col-12 col-lg-1">
                            <div class="mb-3"></div>
                              <div class="btn btn-danger mt-4 remove_review">Delete</div>
                            </div>
                            <br><br>
                      </div>

                    </div>

                </div>

                <div class="tab-pane fade" id="variationsTabContent" role="tabpanel" aria-labelledby="variationsTab">
                    <h5 class="mb-3 text-body-highlight">Variants</h5> 
                    <br>
                    <div class="btn btn-primary btn-sm fw-bold fs-9" data-bs-target="#attribute" data-bs-toggle="modal">+Add Attribute</div>

                    <div class="btn btn-primary btn-sm" onclick="addVariant()">Add Variants</div> 
                    <br><br>

                    <div class="row g-3">

                    <div class="col-12">

                      <div class="border-bottom border-translucent border-dashed border-sm-0 border-bottom-xl pb-4">

                         <div class="d-flex flex-wrap mb-2 d-none">
                            <div class="text-body-highlight me-2">Select Attribute</div>
                          </div>
                      <div class="container-variant-wrapper">
                        {{-- first child  start--}}
                        <div class="container-variant row mb-3">
                          

                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                              <select class="form-select mb-3 attribute_value" name="attribute_ids[]" onchange="fetchAttributeValues(this)" id="attributeId">
                                <option value="" selected>Attribute</option>
                                @foreach($attributes as $attribute) 
                                    <option value="{{ $attribute->id }}">{{ $attribute->attribute_name }}</option>
                                @endforeach
                              </select>
                            </div>

                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                                {{-- Append attribute values --}}
                              <div class="product-variant-select-menu">
                                <select class="form-select mb-3 attribute-values-select" name="attribute_values[]">
                                  <option value="" selected>Values</option>
                                </select>
                              </div>
                            </div>
                            
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                              <div class="mb-3">Select Images</div>
                              <input class="form-control" type="file" placeholder="" name="variant_images[]" id="variants"  onclick="imgV1(this)"/>
                            </div>

                            <input class="form-control" type="hidden" placeholder="" id="variantGroup" name="variant_group[]" />
                            <input class="form-control" type="hidden" placeholder="" id="imageInput" name="imageFiles[]" />


                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                              <div class="mb-3">Regular Price</div>
                              <input class="form-control" type="number" placeholder="200" name="attribute_regular_prices[]" />
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                              <div class="mb-3">Sale Price</div>
                              <input class="form-control" type="number" placeholder="200" name="attribute_sale_prices[]" />
                            </div>

                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                              <div class="mb-3">Purchase Price</div>
                              <input class="form-control" type="number" placeholder="100" name="attribute_Purchase_prices[]"/>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                              <div class="mb-3">Quantity</div>
                              <input class="form-control" type="number" placeholder="10" name="attribute_quantities[]"/>
                            </div>

                            {{-- <div class="col-12 col-md-1 col-lg-1 col-xl-1">
                              <div class="mb-3"></div>
                              <div class="btn btn-danger mt-4 remove_variant">Remove</div>
                            </div> --}}
                           <span class="mb-3"></span>

                        </div>
                       
                        {{-- first child end--}}

                        {{-- append child here --}}
                          {{-- second child  start--}}

                            {{-- second child  start--}}
                    
                      </div>
                      
                      </div>


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
                          <div class="d-flex flex-wrap mb-2">
                            <div class="mb-2 text-body-highlight me-2">Category</div>
                          <a class="fw-bold fs-9" href="#!" data-bs-toggle="modal" data-bs-target="#category">Add Category</a>
                          </div>
                          {{-- <div class="col-12">
                            <div class="mb-3">Sub Category</div>
                            <input class="form-control mb-0" type="text"  name="sub_category" placeholder="Category Name" />
                        </div> --}}
                        
                        <div class="col-12">
                            <div class="mb-3">Parent</div>
                              <select class="form-select form-select-sm" aria-label=".form-select-sm example"  name="parent_category_id" id="categoryId">
                                <option selected value="0">Select Parent</option>
                                @foreach ($parent_cate as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                              </select>
                        </div>
                            {{-- <select class="form-select mb-3" aria-label="category" name="category_id">
                                <option value="">Select</option>

                                    @foreach($all_cates as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                               
                            </select> --}}
                            {{-- <ul style="list-style: none; border:1px solid transparent;height: 100px; overflow-y: auto;">
                              @foreach($categories as $category)

                                  <li class="list-decoration-none">
                                      --{{ $category['name'] }}
                                      @if(!empty($category['all_children']))
                                          @include('categories.partials.category', ['children' => $category['all_children']])
                                      @endif
                                  </li>
                              @endforeach
                          </ul> --}}


                        </div>
                    </div>

                    {{-- <div class="col-12 col-sm-6 col-xl-12">
                        <div class="mb-4">
                            <select class="form-select mb-3" aria-label="category" name="category_id">
                                <option value="">Select</option>
                    
                                <ul>
                                    @foreach($all_cates as $category)
                                        @include('backend.products.partials.category-item', ['category' => $category])
                                    @endforeach
                                </ul>
                            </select>
                        </div> --}}
                    </div>

                    {{-- <div class="col-12 col-sm-6 col-xl-12 d-none">
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
                    </div> --}}

                    <div class="col-12 col-sm-6 col-xl-12">
                      <div class="mb-4">
                        <div class="d-flex flex-wrap mb-2">
                          <div class="mb-0 text-body-highlight me-2">Vendor</div>
                          <a class="fw-bold fs-9" href="#!" data-bs-toggle="modal" data-bs-target="#vendor">Add new vendor</a>
                        </div>
                        <select class="form-select mb-3" aria-label="attribute"  name="vendor_id" id="append_vendor">
                            <option value=" ">Select Vendor</option>
                            
                            @if(count($vendors) > 0)

                                @foreach($vendors as $vendor) 
                                   <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                @endforeach

                            @endif 
                        </select>
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

 {{-- custom js and cdn--}}
@section('custom_js')

 <script>
  function fetchAttributeValues(tag) {
    // console.log(tag.value);
  $.ajax({
    url: "/attribute/attribute-values/" + tag.value,
    type: 'GET',
    dataType: 'json', 

    success: function(res) {
      let $containerVariant = $(tag).closest('.container-variant');

      let $attributeValuesSelect = $containerVariant.find('.attribute-values-select');

      $attributeValuesSelect.empty();
      $attributeValuesSelect.append('<option value="" selected>Select Values</option>');

      $.each(res, function(index, value) {
        $attributeValuesSelect.append('<option value="' + value.id + '">' + value.value + '</option>');
      });
    }
  });
}

function addVariant() {

    let wrapper = document.querySelector('.container-variant-wrapper');
    let firstChild = document.querySelector('.container-variant');
    let newVariant = firstChild.cloneNode(true);

// Reset form values in the cloned variant
newVariant.querySelectorAll('input, select, textarea').forEach(input => {
        if (input.type ==='file') {
          input.value = '';
        } else {
          input.value = '';
        }
});

// Create the delete button element
let deleteBtn = document.createElement('div');
deleteBtn.className = "col-12 col-md-1 col-lg-1 col-xl-1";

deleteBtn.innerHTML = `
    <div class="mb-3"></div>
    <div class="btn btn-danger mt-4 remove_variant">Remove</div>`;
                            
newVariant.appendChild(deleteBtn);
wrapper.appendChild(newVariant);

    let remove_variants= document.querySelectorAll('.remove_variant'); 
    // console.log(remove_variants);

    remove_variants.forEach(button=>{

          button.addEventListener('click', function() {
            let tag= this.closest('.container-variant');
            tag.style.display = 'none'; // Hide the specific variant set
          });
      });

    }

 let imageFiles= [];
let parentArr = [];

function imgV(tag) {
   
    tag.addEventListener('change', function() {

        let files = tag.files;
        console.log("List: " , files);

        if (files.length > 0) {
            // Clear the previous contents of arr if needed
            arr = [];
            arr1 = [];

            for (let file of files) {
                arr.push(file.name);

                // arr1.push(file);
                convertToBase64(file, (base64) => {
                arr1.push({
                    name: file.name,
                    type: file.type,
                    size: file.size,
                    base64: base64
                });

            });
            }
        }
        else {

            console.log('No files selected.');
        }

        // Push a copy of arr and arr1 into parentArr
        parentArr.push([...arr]);
        
        imageFiles.push([...arr1]);

        console.log( 'file Arr: ', imageFiles);

        let group = document.querySelector('#variantGroup');
        group.setAttribute('value', JSON.stringify(parentArr));

        let inputFileImg = document.querySelector('#imageInput');
        inputFileImg.setAttribute('value', JSON.stringify(imageFiles));


        console.log(`Each File Name: ${JSON.stringify(parentArr)}`);
 
    });
   
}

function convertToBase64(file, callback) {
    let reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function () {
        callback(reader.result);
    };
    reader.onerror = function (error) {
        console.error('Error converting file to Base64:', error);
    };
}

// Output: Array: [[apparel.jpg,fashion.jpg], [clothing.jpg,dress.jpg] ]

    function addReview() {
    let wrapper = document.querySelector('.container-review-wrapper');
    let firstChild = document.querySelector('.container-review');
    let newReview = firstChild.cloneNode(true);

    newReview.querySelectorAll('input, textarea').forEach(input=>{
      if (input.type ==='file') {
          input.value = '';
        } else {
          input.value = '';
        }
    });

    wrapper.appendChild(newReview);
    let remove_reviews= document.querySelectorAll('.remove_review'); 
    // console.log(remove_reviews);

    remove_reviews.forEach(delete_btn=>{

      delete_btn.addEventListener('click', function() {
            let tag= this.closest('.container-review');
            tag.style.display = 'none'; // Hide the specific variant set
          });
      });

    }
</script>  

<script>
        let fileInputs = document.querySelectorAll('.selectedImages'); 
        console.log(fileInputs);
        
        fileInputs.forEach(fileInput=>{
            fileInput.addEventListener('change', function() {
                        // Get the files from the input
                        const files = fileInput.files;

                        // Check if any files are selected
                        if (files.length > 0) {
                            console.log(`Selected files:`);
                            // Loop through the FileList and log file names
                            for (const file of files) {
                                console.log(`${file.name}`);
                            }
                        } else {
                            console.log('No files selected.');
                        }
                    });
        });
</script>

@endsection



