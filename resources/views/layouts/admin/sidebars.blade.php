
        <!--left sidebar start-->
        <div class="left-sidebar">
            <nav class="sidebar-menu">
                <ul id="nav-accordion">
                   

                    <li class="sub-menu">
                        <a href="inventory" class="{{ (request()->is('inventory/purchaseOrder') ||request()->is('inventory/purchase_order-list')) ? 'active' : '' }}">
                            <i class="ti-archive"></i>
                            <span>Purchase Order</span>
                        </a>
                        <ul class="sub">
                            <li class="{{ (request()->is('inventory/purchase_order-list')) ? 'active' : '' }}"><a  href="{{ url('inventory/purchase_order-list') }}">Purchase Order List</a></li>
                            <li class="{{ (request()->is('inventory/purchaseOrder')) ? 'active' : '' }}"><a  href="{{ url('inventory/purchaseOrder') }}">Purchase Order Form</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="inventory" class="{{ (request()->is('inventory/expired-Product') /* ||request()->is('inventory/purchase_order-list') */) ? 'active' : '' }}">
                            <i class=" ti-pencil-alt"></i>
                            <span>Inventory</span>
                        </a>
                        <ul class="sub">
                            <li class="{{ (request()->is('inventory/expired-Product')) ? 'active' : '' }}"><a  href="{{ url('inventory/expired-Product') }}">Product Inventory</a></li>
                            <li class="{{-- {{ (request()->is('inventory/expired-Product')) ? 'active' : '' }} --}}"><a  href="#">Critical Product list </a></li>
                            <li class="{{ (request()->is('inventory/expired-Product')) ? 'active' : '' }}"><a  href="{{ url('inventory/expired-Product') }}">Expired Product list</a></li>
                            <li class="{{ (request()->is('inventory/po-receive-list')) ? 'active' : '' }}"><a  href="{{ url('inventory/po-receive-list') }}">PO Receive</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="inventory" class="{{ (request()->is('inventory/product-management')) ? 'active' : '' }}">
                            <i class=" ti-home"></i>
                            <span>Product Management</span>
                        </a>
                        <ul class="sub">
                            {{-- <li class="{{ (request()->is('inventory')) ? 'active' : '' }}"><a  href="{{ url('inventory') }}">Product Management</a></li> --}}
                            {{-- <li class="{{ (request()->is('')) ? 'active' : '' }}"><a  href="{{ url('inventory') }}">Inventory</a></li> --}}
                            <li class="{{ (request()->is('inventory/product-management')) ? 'active' : '' }}"><a  href="{{ url('inventory/product-management') }}">Product List</a></li>                            
                        </ul>
                                                
                    </li>
                    <li class="sub-menu">
                        <a href="inventory" class="{{ (request()->is('inventory/supplier-list') /* ||request()->is('inventory/purchase_order-list') */) ? 'active' : '' }}">
                            <i class="fa fa-institution"></i>
                            <span>Supplier Management</span>
                        </a>
                        <ul class="sub">
                            <li class="{{ (request()->is('inventory/expired-Product')) ? 'active' : '' }}"><a  href="{{ url('inventory/supplier-list') }}">Supplier List</a></li>
                            
                        </ul>
                    </li>


                    <li class="sub-menu">
                        <a href="inventory" class="{{ (request()->is('inventory/unit-management') ||request()->is('inventory/branch-management')) ? 'active' : '' }}">
                            <i class="  icon-equalizer"></i>
                            <span>Settings</span>
                        </a>
                        <ul class="sub">
                            <li class="{{ (request()->is('inventory/branch-management')) ? 'active' : '' }}"><a  href="{{ url('inventory/branch-management') }}">Branches Management</a></li>
                            <li class="{{ (request()->is('inventory/unit-management')) ? 'active' : '' }}"><a  href="{{ url('inventory/unit-management') }}">Units Management</a></li>
                            <li class="{{ (request()->is('inventory/unit-management')) ? 'active' : '' }}"><a  href="{{ url('inventory/unit-management') }}">User Management</a></li>
                        </ul>
                    </li>


                    <li class="nav-title">
                        <h5 class="text-uppercase">Other Projects</h5>
                    </li>

                    <li>
                        <a href="{{ url('pos') }}">
                            <i class="fa fa-dot-circle-o text-danger"></i>
                            <span>POS</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('inventory') }}">
                            <i class="fa fa-dot-circle-o text-primary"></i>
                            <span>INVENTORY</span>
                        </a>
                    </li>
                  {{--   <li>
                        <a href="index-2.html">
                            <i class="fa fa-dot-circle-o text-warning"></i>
                            <span>Landing Website</span>
                        </a>
                    </li> --}}
                </ul>
            </nav>
        </div>
        <!--left sidebar end-->