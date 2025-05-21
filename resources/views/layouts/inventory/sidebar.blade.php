
        <!--left sidebar start-->
        <div class="left-sidebar">
            <nav class="sidebar-menu">
                <ul id="nav-accordion">
                   
                    @if ($user_permissions->purchase_order != 0)
                    <li class="sub-menu">
                        <a href="inventory" class="{{ (request()->is('inventory/purchaseOrder') || request()->is('inventory/invoice-list')  || request()->is('inventory/return-list') ||request()->is('inventory/purchase_order-list')) ? 'active' : '' }}">
                            <i class="ti-archive"></i>
                            <span>Purchase Order</span>
                        </a>
                        <ul class="sub">
                            @if ($user_permissions->purchase_order_list != 0)
                                <li class="{{ (request()->is('inventory/purchase_order-list')) ? 'active' : '' }}"><a  href="{{ url('inventory/purchase_order-list') }}">Purchase Order List</a></li>
                            @endif
                            @if ($user_permissions->purchase_order_form != 0)
                                <li class="{{ (request()->is('inventory/purchaseOrder')) ? 'active' : '' }}"><a  href="{{ url('inventory/purchaseOrder') }}">Purchase Order Form</a></li>
                            @endif
                            @if ($user_permissions->purchase_invoice_list != 0)
                                <li class="{{ (request()->is('inventory/invoice-list')) ? 'active' : '' }}"><a  href="{{ url('inventory/invoice-list') }}">Purchased Invoices List</a></li>
                            @endif      
                            @if ($user_permissions->requestDelete_nav != 0)
                                <li class="{{ (request()->is('inventory/return-list')) ? 'active' : '' }}"><a  href="{{ url('inventory/return-list') }}">Request Return/Replace List</a></li>                               
                            @endif   
                            

                        </ul>
                    </li>
                    @endif
                 
                    @if ($user_permissions->inventory != 0)
                    <li class="sub-menu">
                        <a href="inventory" class="{{ (request()->is('inventory/expired-Product') || request()->is('inventory/critical-Product')   ||request()->is('inventory/Product-inventory')) ? 'active' : '' }}">
                            <i class=" ti-pencil-alt"></i>
                            <span>Inventory</span>
                        </a>
                        <ul class="sub">
                             @if ($user_permissions->product_inventory != 0)
                                <li class="{{ (request()->is('inventory/Product-inventory')) ? 'active' : '' }}"><a  href="{{ url('inventory/Product-inventory') }}">Product Inventory</a></li>
                            @endif
                            @if ($user_permissions->near_expiry_product_list != 0)
                                <li class="{{ (request()->is('inventory/expired-Product')) ? 'active' : '' }}"><a  href="{{ url('inventory/expired-Product') }}">Near Expiry Product List</a></li>
                            @endif
                            @if ($user_permissions->critical_level_product_list != 0)
                                <li class="{{ (request()->is('inventory/critical-Product')) ? 'active' : '' }}"><a  href="{{ url('inventory/critical-Product') }}">Critical Level Product List</a></li>
                            @endif
                            
                        </ul>
                    </li>
                    @endif                 
                    @if ($user_permissions->product_manual_adjust != 0)
                    <li class="sub-menu">
                        <a href="inventory" class="{{ (request()->is('inventory/addProductInventory') || request()->is('inventory/list-addProductInventory')|| request()->is('inventory/edit-adjustment') || request()->is('inventory/import-productdata')||request()->is('inventory/product-price-adjust')) ? 'active' : '' }}">
                            <i class="fa fa-institution"></i>
                            <span>Product Manual Adjustment</span>
                        </a>
                        <ul class="sub">
                            @if ($user_permissions->product_manual_add_list != 0)
                                <li class="{{ (request()->is('inventory/list-addProductInventory')) ? 'active' : '' }}"><a  href=" {{ url('inventory/list-addProductInventory') }}">Product Manual Add/Minus list </a></li>
                            @endif
                            @if ($user_permissions->add_minus_product_qty != 0)
                                <li class="{{ (request()->is('inventory/addProductInventory')) ? 'active' : '' }}"><a  href="{{ url('inventory/addProductInventory') }}">Add/Minus Product QTY</a></li>
                            @endif
                            @if ($user_permissions->import_product_data != 0)
                                <li class="{{ (request()->is('inventory/import-productdata')) ? 'active' : '' }}"><a  href="{{ url('inventory/import-productdata') }}">Import Product data</a><li>     
                            @endif
                            @if ($user_permissions->adjust_product_price_manual != 0)
                                <li class="{{ (request()->is('inventory/product-price-adjust')) ? 'active' : '' }}"><a  href="{{ url('inventory/product-price-adjust') }}">Adjust Product Price Manual</a><li>    
                            @endif
                                                                               
                        </ul>
                    </li>
                    @endif
                 
                    @if ($user_permissions->product_management != 0)
                    <li class="sub-menu">
                        <a href="inventory" class="{{ (request()->is('inventory/product-management')) ? 'active' : '' }}">
                            <i class=" ti-home"></i>
                            <span>Product Management</span>
                        </a>
                        <ul class="sub">      
                            @if ($user_permissions->product_list != 0)               
                            <li class="{{ (request()->is('inventory/product-management')) ? 'active' : '' }}"><a  href="{{ url('inventory/product-management') }}">Product List</a></li>   
                            @endif

                        </ul>
                                                
                    </li>
                    @endif
                 
                    @if ($user_permissions->supplier_management != 0)
                    <li class="sub-menu">
                        
                        <a href="inventory" class="{{ (request()->is('inventory/supplier-list')) ? 'active' : '' }}">
                            <i class="fa fa-institution"></i>
                            <span>Supplier Management</span>
                        </a>
                        <ul class="sub">
                            @if ($user_permissions->supplier_list != 0)               
                                <li class="{{ (request()->is('inventory/expired-Product')) ? 'active' : '' }}"><a  href="{{ url('inventory/supplier-list') }}">Supplier List</a></li>
                            @endif
                            
                        </ul>
                    </li>
                    @endif
                 
                    @if ($user_permissions->setting != 0)

                    <li class="sub-menu">
                        <a href="inventory" class="{{ (request()->is('inventory/brand-management') || request()->is('inventory/unit-management') || request()->is('inventory/user-management') || request()->is('inventory/location-management') || request()->is('inventory/branch-management')) ? 'active' : '' }}">
                            <i class="  icon-equalizer"></i>
                            <span>Settings</span>
                        </a>
                        <ul class="sub">
                            <li class="{{ (request()->is('inventory/brand-management')) ? 'active' : '' }}"><a  href="{{ url('inventory/brand-management') }}">Brand Management</a></li>
                            @if ($user_permissions->product_manual_add_list != 0)
                                <li class="{{ (request()->is('inventory/branch-management')) ? 'active' : '' }}"><a  href="{{ url('inventory/branch-management') }}">Branches Management</a></li>
                            @endif
                            @if ($user_permissions->add_minus_product_qty != 0)
                                <li class="{{ (request()->is('inventory/unit-management')) ? 'active' : '' }}"><a  href="{{ url('inventory/unit-management') }}">Units Management</a></li>
                            @endif
                            @if ($user_permissions->import_product_data != 0)
                                <li class="{{ (request()->is('inventory/location-management')) ? 'active' : '' }}"><a  href="{{ url('inventory/location-management') }}">Location Management</a></li>
                            @endif
                            @if ($user_permissions->adjust_product_price_manual != 0)
                                <li class="{{ (request()->is('inventory/user-management')) ? 'active' : '' }}"><a  href="{{ url('inventory/user-management') }}">User Management</a></li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    <li class="sub-menu">
                        <a href="inventory" class="{{ (request()->is('inventory/unit-management') || request()->is('inventory/user-management') || request()->is('inventory/location-management') || request()->is('inventory/branch-management')) ? 'active' : '' }}">
                            <i class="fa fa-paperclip"></i>
                            <span>Attachment</span>
                        </a>
                        <ul class="sub">
                            @if ($user_permissions->product_manual_add_list != 0)
                                <li class=""><a  href="{{ url('public/attachment/BIN_CARD.xlsx') }}">BIN CARD</a></li>
                            @endif
                            @if ($user_permissions->add_minus_product_qty != 0)
                                <li class=""><a  href="{{ url('public/attachment/INVENTORY_CARD.xlsx') }}">INVENTORY CARD</a></li>
                            @endif
                            
                        </ul>
                    </li>


                    <li class="sub-menu">
                        <a href="inventory" class="{{ (request()->is('inventory/unit-management') || request()->is('inventory/user-management') || request()->is('inventory/location-management') || request()->is('inventory/branch-management')) ? 'active' : '' }}">
                            <i class="fa fa-file"></i>
                            <span>Reports</span>
                        </a>
                        <ul class="sub">                         
                                <li class=""><a  href="{{ url('public/attachment/BIN_CARD.xlsx') }}">BIN CARD</a></li>                                            
                                <li class=""><a  href="{{ url('public/attachment/INVENTORY_CARD.xlsx') }}">INVENTORY CARD</a></li>
                            
                        </ul>
                    </li>


                    <li class="nav-title">
                        <h5 class="text-uppercase">Other Projects</h5>
                    </li>

                   {{--  <li>
                        <a href="{{ url('pos') }}">
                            <i class="fa fa-dot-circle-o text-danger"></i>
                            <span>POS</span>
                        </a>
                    </li> --}}

                    <li>
                        <a href="{{ url('inventory') }}">
                            <i class="fa fa-dot-circle-o text-primary"></i>
                            <span>Dashboard</span>
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