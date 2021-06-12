@guest

@else
<div class="sl-sideleft">
    <div class="input-group input-group-search">
      <input type="search" name="search" class="form-control" placeholder="Search">
      <span class="input-group-btn">
        <button class="btn"><i class="fa fa-search"></i></button>
      </span><!-- input-group-btn -->
    </div><!-- input-group -->

    <label class="sidebar-label">Navigation</label>
    <div class="sl-sideleft-menu">
      <a href="{{ route('dashboard') }}" class="sl-menu-link @yield('dashboard')">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
          <span class="menu-item-label">Dashboard</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <a href="{{ route('index') }}" target="_blank" class="sl-menu-link">
          <div class="sl-menu-item">
            <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
            <span class="menu-item-label">Visit Site</span>
          </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
      <a href="{{ Route('admin.category') }}" class="sl-menu-link @yield('category')">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
          <span class="menu-item-label">Category</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <a href="{{ Route('admin.brand') }}" class="sl-menu-link @yield('brand')">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
          <span class="menu-item-label">Brand</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <a href="#" class="sl-menu-link @yield('product') @yield('products')">
        <div class="sl-menu-item">
          <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
          <span class="menu-item-label">Product</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="{{ Route('admin.create.product') }}" class="nav-link @yield('product')">Add Product</a></li>
        <li class="nav-item"><a href="{{ Route('admin.view.product') }}" class="nav-link @yield('products')">Manage Product</a></li>
      </ul>
      <a href="{{ Route('admin.coupons') }}" class="sl-menu-link @yield('coupon')">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
          <span class="menu-item-label">Coupon</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
    </div><!-- sl-sideleft-menu -->

    <br>
  </div>
  @endguest
