<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile border-bottom">
      <a href="{{'w-profile'}}" class="nav-link flex-column">
        <div class="nav-profile-image">
          <img src="{{asset('assets')}}/images/faces/face1.jpg" alt="profile" />
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex ml-0 mb-3 flex-column">
          <span class="font-weight-semibold mb-1 mt-2 text-center">{{ Auth::user()->name}}</span>
          <!-- <span class="text-secondary icon-sm text-center">$3499.00</span> -->
        </div>
      </a>
    </li>
 
    <li class="nav-item">
      <a class="nav-link" href="{{url('warehouse/dashboard')}}">
        <i class="mdi mdi-compass-outline menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <!-- <li class="nav-item">
      <a class="nav-link" href="{{url('admin/user')}}">
        <i class="mdi mdi-account-multiple menu-icon"></i>
        <span class="menu-title">User</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/shopkeeper')}}">
        <i class="mdi mdi-account-network menu-icon"></i>
        <span class="menu-title">Shopkeeper</span>
      </a>
    </li> -->

    <!-- <li class="nav-item">
      <a class="nav-link" href="{{url('admin/supplier')}}">
        <i class="mdi mdi-nature-people menu-icon"></i>
        <span class="menu-title">Supplier</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/warehouse')}}">
        <i class="mdi mdi-store menu-icon"></i>
        <span class="menu-title">Warehouse</span>
      </a>
    </li> -->

    <!-- <li class="nav-item">
      <a class="nav-link" href="{{ url('supplier/s-product') }}">
        <i class="mdi mdi-buffer menu-icon"></i>
        <span class="menu-title">Product</span>
      </a>
    </li> -->

    <!-- <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-account-multiple menu-icon"></i>
        <span class="menu-title">Addons</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{url('admin/city')}}">City</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/unit') }}">Unit</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/brand') }}">Brand</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/category') }}">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('admin/sub_category') }}">Sub Category</a>
          </li>
        </ul>
      </div>
    </li> -->

    <!-- <li class="nav-item">
            <a class="nav-link" href="pages/icons/mdi.html">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Icons</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/forms/basic_elements.html">
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              <span class="menu-title">Forms</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/charts/chartjs.html">
              <i class="mdi mdi-chart-bar menu-icon"></i>
              <span class="menu-title">Charts</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/tables/basic-table.html">
              <i class="mdi mdi-table-large menu-icon"></i>
              <span class="menu-title">Tables</span>
            </a>
          </li>
          <li class="nav-item pt-3">
            <a class="nav-link" href="http://bootstrapdash.com/demo/plus-free/documentation/documentation.html" target="_blank">
              <i class="mdi mdi-file-document-box menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li> -->
  </ul>
</nav>