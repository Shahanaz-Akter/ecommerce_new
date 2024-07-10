  {{--Left sidebar start --}}
  <nav class="navbar navbar-vertical navbar-expand-lg">
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

          <li class="nav-item">

            <!-- Dashboard parent pages-->
            <div class="nav-item-wrapper">
                <a class="nav-link label-1" href="{{ route('admin.dashboard') }}" role="button" data-bs-toggle="" aria-expanded="false">
                <div class="d-flex align-items-center">
                    <span class="nav-link-icon"><span data-feather="grid"></span></span>
                    <span class="nav-link-text-wrapper"><span class="nav-link-text">Dashboard</span></span>
                </div>
              </a>
            </div>
          </li>

          <li class="nav-item">
            <!-- label-->
            <p class="navbar-vertical-label">Apps
            </p>
            <hr class="navbar-vertical-line" />

               <!--Products parent pages-->
            <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-product" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-product">
                <div class="d-flex align-items-center">
                  <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="shopping-bag"></span></span><span class="nav-link-text">Products</span>
                </div>
              </a>
              <div class="parent-wrapper label-1">
                <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-product">
                  <li class="collapsed-nav-item-title d-none">Product
                  </li>

                  <li class="nav-item"><a class="nav-link" href="{{ route('add.product') }}">
                    <div class="d-flex align-items-center"><span class="nav-link-text">-Add Product</span>
                    </div>
                  </a>
                  <!-- more inner pages-->
                </li>

                  <li class="nav-item"><a class="nav-link" href="/product/products">
                      <div class="d-flex align-items-center"><span class="nav-link-text">-Products</span>
                      </div>
                    </a>
                    <!-- more inner pages-->
                  </li>
                <li class="nav-item"><a class="nav-link" href="/product/categories">
                    <div class="d-flex align-items-center"><span class="nav-link-text">-Categories</span>
                    </div>
                  </a>
                </li>

                </ul>
              </div>
            </div>


            <!--Customers parent pages-->
        <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-customer" role="button" data-bs-toggle="collapse" aria-expanded="false"  aria-controls="nv-customer">
                <div class="d-flex align-items-center">
                <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="user-check"></span></span><span class="nav-link-text">Customers</span>
                </div>
            </a>

            <div class="parent-wrapper label-1">
                <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-customer">
                <li class="collapsed-nav-item-title d-none">Customers
                </li>
                <li class="nav-item"><a class="nav-link" href="/customer/add-customer">
                    <div class="d-flex align-items-center"><span class="nav-link-text">-Add Customer</span>
                    </div>
                </a>
                <!-- more inner pages-->
                </li>
                <li class="nav-item"><a class="nav-link" href="/customer/customers">
                    <div class="d-flex align-items-center"><span class="nav-link-text">-Customers</span>
                    </div>
                    </a>
                    <!-- more inner pages-->
                </li>
                
                <li class="nav-item"><a class="nav-link" href="/customer/invoice">
                    <div class="d-flex align-items-center"><span class="nav-link-text">-Invoice</span>
                    </div>
                  </a>
                  <!-- more inner pages-->
                </li>
                </ul>
            </div>
         </div>

          <!-- staff parent pages-->
          <div class="nav-item-wrapper"><a class="nav-link label-1" href="/staffs" role="button" data-bs-toggle="" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="user"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Staff</span></span>
            </div>
        </a>
        </div>

            <!--Orders parent pages-->
        <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-order" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-order">
                <div class="d-flex align-items-center">
                <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="compass"></span></span><span class="nav-link-text">Orders</span>
                </div>
            </a>

            <div class="parent-wrapper label-1">
                <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-order">
                <li class="collapsed-nav-item-title d-none">Customers
                </li>
                <li class="nav-item"><a class="nav-link" href="/order/add-order">
                    <div class="d-flex align-items-center"><span class="nav-link-text">-Add Order</span>
                    </div>
                </a>
                <!-- more inner pages-->
                </li>
                <li class="nav-item"><a class="nav-link" href="/order/orders">
                    <div class="d-flex align-items-center"><span class="nav-link-text">-Orders</span>
                    </div>
                    </a>
                    <!-- more inner pages-->
                </li>
                
                </ul>
            </div>
            </div>

            <!-- ecommerce parent pages-->
            <div class="nav-item-wrapper">
                <a class="nav-link dropdown-indicator label-1" href="#nv-e-commerce" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-e-commerce">
                <div class="d-flex align-items-center">
                  <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="shopping-cart"></span></span><span class="nav-link-text">E commerce</span>
                </div>
              </a>
              <div class="parent-wrapper label-1">
                <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-e-commerce">
                  <li class="collapsed-nav-item-title d-none">E commerce
                  </li>
                  <li class="nav-item"><a class="nav-link dropdown-indicator" href="#nv-admin" data-bs-toggle="collapse" aria-expanded="true" aria-controls="nv-admin">
                      <div class="d-flex align-items-center">
                        <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-text">Admin</span>
                      </div>
                    </a>
                    <!-- more inner pages-->
                    <div class="parent-wrapper">
                      <ul class="nav collapse parent show" data-bs-parent="#e-commerce" id="nv-admin">
                        <li class="nav-item"><a class="nav-link" href="{{ route('add.product') }}">
                            <div class="d-flex align-items-center"><span class="nav-link-text">Add product</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="apps/e-commerce/admin/products.html">
                            <div class="d-flex align-items-center"><span class="nav-link-text">Products</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="apps/e-commerce/admin/customers.html">
                            <div class="d-flex align-items-center"><span class="nav-link-text">Customers</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="apps/e-commerce/admin/customer-details.html">
                            <div class="d-flex align-items-center"><span class="nav-link-text">Customer details</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="apps/e-commerce/admin/orders.html">
                            <div class="d-flex align-items-center"><span class="nav-link-text">Orders</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="apps/e-commerce/admin/order-details.html">
                            <div class="d-flex align-items-center"><span class="nav-link-text">Order details</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="apps/e-commerce/admin/refund.html">
                            <div class="d-flex align-items-center"><span class="nav-link-text">Refund</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item"><a class="nav-link dropdown-indicator" href="#nv-customer" data-bs-toggle="collapse" aria-expanded="true" aria-controls="nv-customer">
                      <div class="d-flex align-items-center">
                        <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-text">Customer</span>
                      </div>
                    </a>
                    <!-- more inner pages-->
                    <div class="parent-wrapper">
                      <ul class="nav collapse parent show" data-bs-parent="#e-commerce" id="nv-customer">
                        <li class="nav-item"><a class="nav-link" href="apps/e-commerce/landing/homepage.html">
                            <div class="d-flex align-items-center"><span class="nav-link-text">Homepage</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="apps/e-commerce/landing/product-details.html">
                            <div class="d-flex align-items-center"><span class="nav-link-text">Product details</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="apps/e-commerce/landing/products-filter.html">
                            <div class="d-flex align-items-center"><span class="nav-link-text">Products filter</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="apps/e-commerce/landing/cart.html">
                            <div class="d-flex align-items-center"><span class="nav-link-text">Cart</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="apps/e-commerce/landing/checkout.html">
                            <div class="d-flex align-items-center"><span class="nav-link-text">Checkout</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="apps/e-commerce/landing/shipping-info.html">
                            <div class="d-flex align-items-center"><span class="nav-link-text">Shipping info</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="apps/e-commerce/landing/profile.html">
                            <div class="d-flex align-items-center"><span class="nav-link-text">Profile</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="apps/e-commerce/landing/favourite-stores.html">
                            <div class="d-flex align-items-center"><span class="nav-link-text">Favourite stores</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="apps/e-commerce/landing/wishlist.html">
                            <div class="d-flex align-items-center"><span class="nav-link-text">Wishlist</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="apps/e-commerce/landing/order-tracking.html">
                            <div class="d-flex align-items-center"><span class="nav-link-text">Order tracking</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="apps/e-commerce/landing/invoice.html">
                            <div class="d-flex align-items-center"><span class="nav-link-text">Invoice</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
                  
            <!-- chat parent pages-->
            <div class="nav-item-wrapper"><a class="nav-link label-1" href="/chat" role="button" data-bs-toggle="" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="message-square"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Chat</span></span>
                </div>
              </a>
            </div>
           
               

                <!-- coupons parent pages-->
                <div class="nav-item-wrapper"><a class="nav-link label-1" href="/coupons" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span data-feather="gift"></span></span><span class="nav-link-text-wrapper"><span class="nav-link-text">Coupons</span></span>
                    </div>
                </a>
                </div>


               <!-- Reports parent pages-->
             <div class="nav-item-wrapper"><a class="nav-link dropdown-indicator label-1" href="#nv-report" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="nv-report">
                <div class="d-flex align-items-center">
                  <div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div><span class="nav-link-icon"><span data-feather="square"></span></span><span class="nav-link-text">Reports</span>
                </div>
              </a>
              <div class="parent-wrapper label-1">
                <ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="nv-report">
                  <li class="collapsed-nav-item-title d-none">Report
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/product-details">
                    <div class="d-flex align-items-center"><span class="nav-link-text">-Product Details</span>
                    </div>
                  </a>
                  <!-- more inner pages-->
                </li>
                  <li class="nav-item"><a class="nav-link" href="/customer-details">
                      <div class="d-flex align-items-center"><span class="nav-link-text">-Customer Details</span>
                      </div>
                    </a>
                    <!-- more inner pages-->
                  </li>
                  <li class="nav-item"><a class="nav-link" href="/order-details">
                      <div class="d-flex align-items-center"><span class="nav-link-text">-Order Details</span>
                      </div>
                    </a>
                    <!-- more inner pages-->
                  </li>
                </ul>
              </div>
            </div>
          
          </li>
       

          <li class="nav-item">
            <!-- Logout parent pages-->
            <div class="nav-item-wrapper">
                <a class="nav-link label-1" href="#" role="button" data-bs-toggle="" aria-expanded="false">
                <div class="d-flex align-items-center">
                    <span class="nav-link-icon"><span data-feather="log-out"></span></span>
                    <span class="nav-link-text-wrapper">
                        <span class="nav-link-text">Logout</span>
                </span>
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
{{-- sidebar end --}}