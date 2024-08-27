<nav class="navbar navbar-vertical navbar-expand-lg">

{{-- bullet point with each menu --}}
<style>
.bullet-items{
        height: 5px; 
        width:5px;
    }
</style>


<script>
    var navbarStyle = window.config.config.phoenixNavbarStyle;
    if (navbarStyle && navbarStyle !== 'transparent') {
    document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
    }
</script>
    

<div class="collapse navbar-collapse" id="navbarVerticalCollapse">
<!-- scrollbar removed-->
<div class="navbar-vertical-content">

<ul class="navbar-nav flex-column" id="navbarVerticalNav">

{{-- Dashboard --}}
<li class="nav-item" data-nav="dashboard">
    <!-- parent pages-->
    <div class="nav-item-wrapper">
        <a class="nav-link label-1" href="{{ route('admin.dashboard') }}" role="button" data-bs-toggle="" aria-expanded="false">
        <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="grid"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Dashboard</span></span><span class="fa-solid fa-circle text-info ms-1 new-page-indicator" style="font-size: 6px"></span>
        </div>
        </a>
    </div>
</li>
        

{{-- User menu --}}
<li class="nav-item" data-nav="user">
<!-- label--> 
<hr class="navbar-vertical-line" />
<!-- parent pages-->
<div class="nav-item-wrapper">

<a class="nav-link dropdown-indicator label-1" href="#nv-user" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="nv-user">
    
<div class="d-flex align-items-center">
    <div class="dropdown-indicator-icon">
        <span class="fas fa-caret-right"></span>
    </div>

    <span class="nav-link-icon">
        <span data-feather="users"></span>
    </span>
    <span class="nav-link-text">Users</span>
</div>
</a>

 <div class="parent-wrapper label-1">
    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-user">
        <li class="collapsed-nav-item-title d-none">Users
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ route('users') }}">
        <div class="d-flex align-items-center"><span class="nav-link-text">
            <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Users</span>
        </div>
        </a>
        <!-- more inner pages-->
    </li>
        
    <li class="nav-item">
        <a class="nav-link" href="{{ route('add.user') }}">
        <div class="d-flex align-items-center"><span class="nav-link-text"><i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Add User</span>
        </div>
    </a>
    <!-- more inner pages-->
    </li>
    <li class="nav-item"><a class="nav-link" href="{{ route('roles') }}">
        <div class="d-flex align-items-center"><span class="nav-link-text"><i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Roles</span>
        </div>
    </a>
    <!-- more inner pages-->
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('add.role') }}">
        <div class="d-flex align-items-center"><span class="nav-link-text">   <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Add Role</span>
        </div>
    </a>
    <!-- more inner pages-->
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('role.permission') }}">
        <div class="d-flex align-items-center"><span class="nav-link-text"><i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Permission Association</span>
        </div>
    </a>
    <!-- more inner pages-->
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('rolewise.permission') }}">
        <div class="d-flex align-items-center"><span class="nav-link-text">   <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Permissions</span>
        </div>
    </a>
    <!-- more inner pages-->
    </li>
    </ul>
</div>

</div>
</li>

{{-- Product menu --}}
<li class="nav-item" data-nav="product">
<!-- label--> 
<hr class="navbar-vertical-line" />
<!-- parent pages-->
<div class="nav-item-wrapper">

    <a class="nav-link dropdown-indicator label-1" href="#nv-product" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-PRODUCT">
        
    <div class="d-flex align-items-center">
        <div class="dropdown-indicator-icon">
            <span class="fas fa-caret-right"></span>
        </div>

        <span class="nav-link-icon">
            <span data-feather="package"></span>
        </span>
        <span class="nav-link-text">Products</span>

        {{-- <div class="dropdown-indicator-icon">
            <span class="fas fa-caret-right"></span>
        </div> --}}
    </div>
    </a>

    <div class="parent-wrapper label-1">
    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-product">
        <li class="collapsed-nav-item-title d-none">Products
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ route('products') }}">
        <div class="d-flex align-items-center"><span class="nav-link-text">
            <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Product</span>
        </div>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('add.product') }}">
        <div class="d-flex align-items-center"><span class="nav-link-text">
            <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Add Product</span>
        </div>
        </a>
    </li>
        
    <li class="nav-item">
        <a class="nav-link" href="{{ route('variant.list') }}">
        <div class="d-flex align-items-center"><span class="nav-link-text"><i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Product Variant</span>
        </div>
    </a>
    </li>
    
    </ul>

    </div>

</div>
</li>

 {{-- Customer menu --}}
 <li class="nav-item" data-nav="customer">
    <!-- label--> 
    <hr class="navbar-vertical-line" />
    <!-- parent pages-->
    <div class="nav-item-wrapper">

        <a class="nav-link dropdown-indicator label-1" href="#nv-customer" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-PRODUCT">
            
        <div class="d-flex align-items-center">
            <div class="dropdown-indicator-icon">
                <span class="fas fa-caret-right"></span>
            </div>

            <span class="nav-link-icon">
                <span data-feather="users"></span>
            </span>
            <span class="nav-link-text">Customers</span>

            {{-- <div class="dropdown-indicator-icon">
              <span class="fas fa-caret-right"></span>
            </div> --}}
        </div>
      </a>

      <div class="parent-wrapper label-1">
        <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-customer">
          <li class="collapsed-nav-item-title d-none">Customer
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('customers') }}">
            <div class="d-flex align-items-center"><span class="nav-link-text">
                <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Customers</span>
            </div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('add.user') }}">
            <div class="d-flex align-items-center"><span class="nav-link-text">
                <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Add Customer</span>
            </div>
            </a>
        </li>
        </ul>
      </div>

    </div>
  </li>

    {{-- Setting  menu --}}
    <li class="nav-item" data-nav="setting">
        <!-- label--> 
        <hr class="navbar-vertical-line" />
        <!-- parent pages-->
        <div class="nav-item-wrapper">

            <a class="nav-link dropdown-indicator label-1" href="#nv-setting" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-SETTING">
                
            <div class="d-flex align-items-center">
                <div class="dropdown-indicator-icon">
                    <span class="fas fa-caret-right"></span>
                </div>
                <span class="nav-link-icon">
                    <span data-feather="settings"></span>
                </span>
                <span class="nav-link-text">Setting</span>
            </div>
            </a>

            <div class="parent-wrapper label-1">
            <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-setting">
                <li class="collapsed-nav-item-title d-none">Setting
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('brands') }}">
                <div class="d-flex align-items-center"><span class="nav-link-text">
                    <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Brands</span>
                </div>
                </a>
            </li>
                
            <li class="nav-item">
                <a class="nav-link" href="{{ route('add.brand') }}">
                <div class="d-flex align-items-center"><span class="nav-link-text">
                    <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Add Brand</span>
                </div>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories') }}">
                <div class="d-flex align-items-center"><span class="nav-link-text">
                    <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Categories</span>
                </div>
                </a>
            </li>
                
            <li class="nav-item">
                <a class="nav-link" href="{{ route('add.category') }}">
                <div class="d-flex align-items-center"><span class="nav-link-text">
                    <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Add Category</span>
                </div>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('units') }}">
                <div class="d-flex align-items-center"><span class="nav-link-text">
                    <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i> Units</span>
                </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('add.unit') }}">
                <div class="d-flex align-items-center"><span class="nav-link-text">
                    <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Add Unit</span>
                </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('colors') }}">
                <div class="d-flex align-items-center"><span class="nav-link-text">
                    <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i> Colors</span>
                </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('add.color') }}">
                <div class="d-flex align-items-center"><span class="nav-link-text">
                    <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Add Color</span>
                </div>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('attributes') }}">
                <div class="d-flex align-items-center"><span class="nav-link-text">
                    <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i> Attributes</span>
                </div>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="{{ route('add.attribute') }}">
                <div class="d-flex align-items-center"><span class="nav-link-text">
                    <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Add Attribute</span>
                </div>
                </a>
            </li>
            
            </ul>
            </div>

        </div>
    </li>


 
    {{-- order menu --}}
 <li class="nav-item" data-nav="order">
    <!-- label--> 
    <hr class="navbar-vertical-line" />
    <!-- parent pages-->
    <div class="nav-item-wrapper">

        <a class="nav-link dropdown-indicator label-1" href="#nv-order" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-ORDER">
            
        <div class="d-flex align-items-center">
            <div class="dropdown-indicator-icon">
                <span class="fas fa-caret-right"></span>
            </div>

            <span class="nav-link-icon">
                <span data-feather="shopping-cart"></span>
            </span>
            <span class="nav-link-text">Orders</span>

            {{-- <div class="dropdown-indicator-icon">
              <span class="fas fa-caret-right"></span>
            </div> --}}
        </div>
      </a>

      <div class="parent-wrapper label-1">
        <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-order">
          <li class="collapsed-nav-item-title d-none">Orders
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('orders') }}">
            <div class="d-flex align-items-center"><span class="nav-link-text">
                <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Orders</span>
            </div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('add.order') }}">
            <div class="d-flex align-items-center"><span class="nav-link-text">
                <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Add Order</span>
            </div>
            </a>
        </li>
         
        </ul>
      </div>

    </div>
  </li>

 
  {{-- Marketing menu --}}
 
 
 
  <li class="nav-item">
<!-- label--> 
<hr class="navbar-vertical-line" />
<!-- parent pages-->
<div class="nav-item-wrapper">

    <a class="nav-link dropdown-indicator label-1" href="#nv-marketing" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-MARKETING">
        
    <div class="d-flex align-items-center">
        <div class="dropdown-indicator-icon">
            <span class="fas fa-caret-right"></span>
        </div>

        <span class="nav-link-icon">
            <span data-feather="trending-up"></span>
        </span>
        <span class="nav-link-text">Marketing</span>

        {{-- <div class="dropdown-indicator-icon">
            <span class="fas fa-caret-right"></span>
        </div> --}}
    </div>
    </a>

    <div class="parent-wrapper label-1">

    <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-marketing">
        <li class="collapsed-nav-item-title d-none">Marketing
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ route('campaigns') }}">
        <div class="d-flex align-items-center"><span class="nav-link-text">
            <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Campaigns</span>
        </div>
        </a>
    </li>
    </ul>
    </div>

</div>
</li>

  {{-- System Settings menu --}}
<li class="nav-item" data-nav="system-setup">
    <!-- label--> 
    <hr class="navbar-vertical-line" />
    <!-- parent pages-->
    <div class="nav-item-wrapper">

        <a class="nav-link dropdown-indicator label-1" href="#nv-setup" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-SETUP">
            
        <div class="d-flex align-items-center">
            <div class="dropdown-indicator-icon">
                <span class="fas fa-caret-right"></span>
            </div>

            <span class="nav-link-icon">
                {{-- sliders --}}
                <span data-feather="tool"></span>
            </span>
            <span class="nav-link-text">System Setup</span>

            {{-- <div class="dropdown-indicator-icon">
              <span class="fas fa-caret-right"></span>
            </div> --}}
        </div>
      </a>

      <div class="parent-wrapper label-1">

        <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-setup">
          <li class="collapsed-nav-item-title d-none">System Setup
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('app.info') }}">
            <div class="d-flex align-items-center"><span class="nav-link-text">
                <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>General Setting</span>
            </div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('app.view') }}">
            <div class="d-flex align-items-center"><span class="nav-link-text">
                <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>General View</span>
            </div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('email.setting') }}">
            <div class="d-flex align-items-center"><span class="nav-link-text">
                <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Email  Setting</span>
            </div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('language.setting') }}">
            <div class="d-flex align-items-center"><span class="nav-link-text">
                <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Language  Setting</span>
            </div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('social.login') }}">
            <div class="d-flex align-items-center"><span class="nav-link-text">
                <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i> Social Login</span>
            </div>
            </a>
        </li>
        </ul>
      </div>

    </div>
</li>
 
  {{-- Report menu --}}
 <li class="nav-item" data-nav="report">
    <!-- label--> 
    <hr class="navbar-vertical-line" />
    <!-- parent pages-->
    <div class="nav-item-wrapper">

        <a class="nav-link dropdown-indicator label-1" href="#nv-report" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-REPORT">
            
        <div class="d-flex align-items-center">
            <div class="dropdown-indicator-icon">
                <span class="fas fa-caret-right"></span>
            </div>

            <span class="nav-link-icon">
                <span data-feather="file-text"></span>
            </span>
            <span class="nav-link-text">Reports</span>

            {{-- <div class="dropdown-indicator-icon">
              <span class="fas fa-caret-right"></span>
            </div> --}}
        </div>
      </a>

      <div class="parent-wrapper label-1">
        <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-report">
          <li class="collapsed-nav-item-title d-none">Reports
          </li>
          
        <li class="nav-item">
            <a class="nav-link" href="{{ route('report.product') }}">
            <div class="d-flex align-items-center"><span class="nav-link-text">
                <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Product Report</span>
            </div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('report.order') }}">
            <div class="d-flex align-items-center"><span class="nav-link-text">
                <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Order Report</span>
            </div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('report.stock') }}">
            <div class="d-flex align-items-center"><span class="nav-link-text">
                <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Stock Report</span>
            </div>
            </a>
        </li>
         
        </ul>
      </div>

    </div>
  </li>

    {{-- Message Chatbox --}}
    <li class="nav-item" data-nav="message">
        <!-- parent pages-->
        <div class="nav-item-wrapper">
            <a class="nav-link label-1" href="{{ route('message') }}" role="button" data-bs-toggle="" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="message-circle"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Messages</span></span>
            </div>
          </a>
        </div>
      </li>

     {{-- Support --}}
     <li class="nav-item" data-nav="support">
        <!-- parent pages-->
        <div class="nav-item-wrapper">
            <a class="nav-link label-1" href="{{ route('support') }}" role="button" data-bs-toggle="" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="help-circle"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Support</span></span>
            </div>
          </a>
        </div>
      </li>

    {{-- Logout --}}
     <li class="nav-item" data-nav="logout">
        <!-- parent pages-->
        <div class="nav-item-wrapper">
            <a class="nav-link label-1" href="{{ route('logout') }}" role="button" data-bs-toggle="" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="log-out"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Logout</span></span>
            </div>
          </a>
        </div>
      </li>

        </ul>
      </div>
    
    </div>

    <div class="navbar-vertical-footer">
      <button class="btn navbar-vertical-toggle border-0 fw-semibold w-100 white-space-nowrap d-flex align-items-center"><span class="uil uil-left-arrow-to-left fs-8"></span><span class="uil uil-arrow-from-right fs-8"></span><span class="navbar-vertical-footer-text ms-2">Collapsed View</span></button>
    </div>

  </nav>


{{-- User menu --}}
<li class="nav-item d-none" data-nav="user">
    <!-- label--> 
    <hr class="navbar-vertical-line" />

    <!-- parent pages-->
    <div class="nav-item-wrapper">
    
    <a class="nav-link dropdown-indicator label-1" href="#nv-user" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="nv-user">
    <div class="d-flex align-items-center">
        <div class="dropdown-indicator-icon">
            <span class="fas fa-caret-right"></span>
        </div>
    
        <span class="nav-link-icon">
            <span data-feather="users"></span>
        </span>
        <span class="nav-link-text">Users</span>
    </div>
    </a>
    
     <div class="parent-wrapper label-1">
        <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-user">
            <li class="collapsed-nav-item-title d-none">Users
            </li>

            <li class="nav-item">
            <a class="nav-link" href="{{ route('users') }}">
            <div class="d-flex align-items-center"><span class="nav-link-text">
                <i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Users</span>
            </div>
            </a>
            <!-- more inner pages-->
        </li>
            
        <li class="nav-item">
            <a class="nav-link" href="{{ route('add.user') }}">
            <div class="d-flex align-items-center"><span class="nav-link-text"><i class="fa-solid fa-circle me-1 mb-1 bullet-items"></i>Add User</span>
            </div>
        </a>
        <!-- more inner pages-->
        </li>
       
        </ul>
    </div>
    
    </div>
</li>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get the current URL path
        var currentUrl = window.location.href;

        console.log('Current Url: ' + currentUrl);

        // Loop through each nav-link in the sidebar
        document.querySelectorAll('.nav-link').forEach(function (link) {
            if (currentUrl.includes(link.href)) {
                // nav-link-text

                let textParent = link.parentNode.parentNode.parentNode.parentNode;
                console.log(textParent);

                // Check if textParent or any of its children contains the 'nav-link-text' class
                if (textParent.querySelector('.nav-link-text')) {
                    // If found, apply the desired styles or class
                    textParent.querySelector('.nav-link-text').style.color = 'blue'; // Example: make it blue
                    textParent.querySelector('.nav-link-text').classList.add('active');
                    // console.log('dfgdg');
                } else {
                    console.log('No element with class nav-link-text found in textParent or its children.');
                }

                // Add active class to the current link
                link.classList.add('active');
                // let parentText = document.querySelector('.nav-link-text');
                link.classList.add('active');

                // Expand the parent section if it's collapsible
                var parentCollapse = link.closest('.collapse');
                if (parentCollapse) {
                    parentCollapse.classList.add('show');
                }

                // Change caret direction to indicate expanded section
                var dropdownIndicatorIcon = link.closest('.nav-item').querySelector('.dropdown-indicator-icon .fas');
                if (dropdownIndicatorIcon) {
                    dropdownIndicatorIcon.classList.remove('fa-caret-right');
                    dropdownIndicatorIcon.classList.add('fa-caret-down');
                }
            }
        });
    });
</script>
