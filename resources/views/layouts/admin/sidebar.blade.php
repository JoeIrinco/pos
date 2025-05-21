
        <!--left sidebar start-->
        <div class="left-sidebar">
            <nav class="sidebar-menu">
                <ul id="nav-accordion">
                     @if(Auth::user()->is_admin== 2 || 1)

                            <li class="sub-menu">
                                @if ($user_permissions->store != 0)
                                <a href="javascript:;">
                                    <i class=" fa fa-medkit"></i>
                                    <span>Store</span>
                                </a>
                                 @endif
                                <ul class="sub">
                                    @if ($user_permissions->dashboard != 0)
                                        <li><a  href="pos-dashboard">Dashboard</a></li>
                                    @endif
                                    @if ($user_permissions->pos != 0)
                                        <li><a  href="pos">POS</a></li>
                                    @endif
                                    @if ($user_permissions->general_report != 0)
                                        <li><a  href="reports">Generate Report</a></li>
                                    @endif
                                    @if ($user_permissions->transaction_history != 0)
                                        <li><a  href="transaction-history">Transaction History</a>
                                    @endif
                                    @if ($user_permissions->ar != 0)
                                        <li><a  href="ar">A.R</a>
                                    @endif
                                    @if ($user_permissions->pending_document != 0)
                                        <li><a  href="pending-documents">Pending Documents</a>
                                    @endif   
                                    {{-- <li><a  href="purchase-order">Make P.O</a></li> --}}
                                    {{-- <li><a  href="item-lists">Product Lists</a></li> --}}
                                    {{-- not sure if admin or superadmin --}}
                                    {{-- <li><a  href="add-store-product">Stock In</a></li> --}}
                                    {{-- <li><a  href="void-request">Void Request</a> --}}
                                    {{-- <li><a  href="back-entry">Back Entry</a> --}}
                                    <!--<li><a  href="purchase-order-list">P.O Lists</a>-->
                                </ul>
                            </li>

                    @endif


                    {{-- <li class="sub-menu">
                        <a href="javascript:;">
                            <i class=" icon-grid"></i>
                            <span>Settings</span>
                        </a>
                        <ul class="sub">
                            <li class="sub-menu">
                                @auth
                                @if(Auth::user()->is_admin==1)

                                    <li><a href="{{ route('register') }}">{{ __('Register User') }}</a></li>
                                    <li><a href="{{ route('user-permission-view') }}">{{ __('User Permission') }}</a></li>
                                    @endif
                                    @endauth
<!--                                    <li><a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form></li>-->
                            </li>
                        </ul>
                    </li> --}}


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
