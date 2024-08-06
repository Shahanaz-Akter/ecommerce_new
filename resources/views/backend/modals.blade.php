{{-- Vendor Modal --}}
<div class="modal fade" id="vendor" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
     <div class="modal-content">
     <div class="modal-header">
        <h5 class="modal-title" id="scrollingLongModalLabel2">Vendor Information</h5>
        <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-xmark fs-9" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <span class="fas fa-times fs-9"></span> Font Awesome fontawesome.com --></button>
    </div>

    <form class="mb-2" method="post" action="{{route('post.vendor')}}">
        @csrf

      <div class="modal-body">
        <div>      
            <div class="row g-5">
                <div class="col-12">

                    <h4 class="mb-3">Vendor Name</h4>
                    <input class="form-control mb-5" type="text"  name="vendor" placeholder="Vendor Name" />
                    
                    <div class="mb-6">
                        <h4 class="mb-3"> Description</h4>
                        <textarea class="form-control" rows="5" cols="" name="description" ></textarea>
                    </div>

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

{{-- Brand Modal --}}
<div class="modal fade" id="brand" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
     <div class="modal-content">
     <div class="modal-header">
        <h5 class="modal-title" id="scrollingLongModalLabel2">Brand Information</h5>
        <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-xmark fs-9" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <span class="fas fa-times fs-9"></span> Font Awesome fontawesome.com --></button>
    </div>

    <form class="mb-2" method="post" action="{{route('post.brand')}}" enctype="multipart/form-data">
        @csrf

      <div class="modal-body">
        <div>      
            <div class="row g-5">
                        <div class="col-12">
                            <h4 class="mb-2">Image</h4>
                          
                            <div class="mb-0">
                                <input class="form-control mb-2" type="file"  name="brand_img" placeholder=""  required/>
                            </div>
                        </div>

                        <div class="col-12">
                        <h4 class="mb-2">Name</h4>
                        <input class="form-control mb-5" type="text"  name="brand" placeholder="Write Name here..." required/>
                        
                        <div class="mb-4">
                            <h4 class="mb-3"> Description</h4>
                            <textarea class="form-control" name="description" rows="10" cols=""></textarea>
                        </div>
    
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

{{-- Unit Modal --}}
<div class="modal fade" id="unit" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
     <div class="modal-content">
     <div class="modal-header">
        <h5 class="modal-title" id="scrollingLongModalLabel2">Unit Information</h5>
        <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-xmark fs-9" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <span class="fas fa-times fs-9"></span> Font Awesome fontawesome.com --></button>
    </div>

    <form class="mb-2" method="post" action="{{route('post.unit')}}" enctype="multipart/form-data">
        @csrf

      <div class="modal-body">
        <div>      
            <div class="row g-5">

                <div class="col-12">
                    <h4 class="mb-2">Unit Type </h4>
                    <input class="form-control mb-2" type="text"  name="unit_type" placeholder="Unit Type"/>
                </div>
        
                <div class="col-12">
                    <h4 class="mb-2">Base Unit Name</h4>
                    <input class="form-control mb-2" type="text"  name="base_unit_name" placeholder="Base Unit Name" />
                </div>
                <div class="col-12">
                    <h4 class="mb-2">Symbol</h4>
                    <input class="form-control mb-2" type="text"  name="symbol" placeholder="Symbol" />
                </div>
                <div class="col-12">
                    <h4 class="mb-3">Unit Conversion</h4>
                    <input class="form-control mb-5" type="text"  name="unit_conversion" placeholder="Unit Conversion"/>
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

{{-- Category Modal --}}
<div class="modal fade" id="category" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
     <div class="modal-content">
     <div class="modal-header">
        <h5 class="modal-title" id="scrollingLongModalLabel2">Category Information</h5>
        <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-xmark fs-9" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <span class="fas fa-times fs-9"></span> Font Awesome fontawesome.com --></button>
    </div>

    <form class="mb-2" method="post" action="{{route('post.category')}}" enctype="multipart/form-data">
        @csrf

      <div class="modal-body">
        <div>      
            <div class="row g-5">
                <div class="col-12">
                    <h4 class="mb-3">Name</h4>
                    <input class="form-control mb-0" type="text"  name="category" placeholder="Category Name" required/>
                </div>
                
                <div class="col-12">
                    <h4 class="mb-3">Parent</h4>
                      <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="parent_category">
                        <option selected value="0">Select Parent</option>
                        @foreach ($parent_cate as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                      </select>
                </div>
                
                <div class="col-12">
                    <h4 class="mb-3">Image</h4>
                    <input class="form-control mb-5" type="file"  name="category_image" placeholder="" />
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

{{-- attribute moda; --}}
<div class="modal fade" id="attribute" tabindex="-1" aria-labelledby="scrollingLongModalLabel2" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
     <div class="modal-content">
     <div class="modal-header">
        <h5 class="modal-title" id="scrollingLongModalLabel2">Attribute Information</h5>
        <button class="btn p-1" type="button" data-bs-dismiss="modal" aria-label="Close"><svg class="svg-inline--fa fa-xmark fs-9" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="xmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path></svg><!-- <span class="fas fa-times fs-9"></span> Font Awesome fontawesome.com --></button>
    </div>

    <form class="mb-2" method="post" action="{{route('post.attribute')}}">
        @csrf

      <div class="modal-body">
        <div>      
            <div class="row g-5">

                <div class="col-12 col-xl-8">
                    <h4 class="mb-2">Name</h4>
                    <input class="form-control mb-5" type="text"  name="attribute" placeholder="Attribute Name"/>
                </div>
                
                <div class="col-12 col-xl-8">
                    <h4 class="mb-2">Slug</h4>
                    <input class="form-control mb-5" type="text"  name="slug" placeholder="Slug Name..."/>
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

