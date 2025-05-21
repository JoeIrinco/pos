
    <!--===========header start===========-->
    <header class="app-header navbar">

        <!--brand start-->
        <div class="navbar-brand">
            <a class="" href="{{ url('inventory') }}">
                <img src="{{asset('public/image/head-vallery-logo.png')}}" style="max-width: 150%; height: auto;" srcset="public/image/head-vallery-logo.png 2x" alt="">
            </a>
        </div>
        <!--brand end-->

        <!--left side nav toggle start-->
        <ul class="nav navbar-nav mr-auto">
            <li class="nav-item d-lg-none">
                <button class="navbar-toggler mobile-leftside-toggler" type="button"><i class="ti-align-right"></i></button>
            </li>
            <li class="nav-item d-md-down-none">
                <a class="nav-link navbar-toggler left-sidebar-toggler" href="#"><i class=" ti-align-right"></i></a>
            </li>
           
        </ul>
        <!--left side nav toggle end-->

        <!--right side nav start-->
        <ul class="nav navbar-nav ml-auto">


            <li class="nav-item dropdown dropdown-slide d-md-down-none">
              
                <div class="dropdown-menu dropdown-menu-right">

                    <div class="dropdown-header pb-3">
                        <strong>You have 6 Notifications</strong>
                    </div>

                    <a href="#" class="dropdown-item">
                        <i class="icon-basket-loaded text-primary"></i> New order
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="icon-user-follow text-success"></i> New registered member
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class=" icon-layers text-danger"></i> Server error report
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class=" icon-note text-warning"></i> Database report
                    </a>

                    <a href="#" class="dropdown-item">
                        <i class=" icon-present text-info"></i> Order confirmation
                    </a>

                </div>
            </li>
            <li class="nav-item dropdown dropdown-slide d-md-down-none">                
                <a class="nav-link nav-pill" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">                     
                    <i class=" ti-view-grid"></i>
                    <span class="badge " id="newNotify" style="display: @if($expiredCount>0 || $criticalLevel>0 ) block @else none @endif">
                        New
                   </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-ql-gird">

                    <div class="dropdown-header pb-3">
                        <strong>Quick Links</strong>
                    </div>

                    <div class="quick-links-grid">        
                                           
                        <a href="{{ url('inventory/expired-Product') }}" class="ql-grid-item">                                                                          
                            <i class="  ti-files text-primary">@if ($expiredCount>0) <span class="badge2">{{$expiredCount}}</span>@endif</i>                            
                            <span class="ql-grid-title">Near Expiry Products</span>                        
                        </a>
                        <a href="{{ url('inventory/critical-Product') }}" class="ql-grid-item">
                            <i class="  ti-check-box text-success"><span class="badge2" id="criticalData"></span></i>
                            <span class="ql-grid-title">Product Critical Level</span>
                        </a>
                    </div>
                   {{--  <div class="quick-links-grid">
                        <a href="{{ url('inventory/purchaseOrder') }}" class="ql-grid-item">
                            <i class="  ti-truck text-warning"></i>
                            <span class="ql-grid-title">Create Orders</span>
                        </a>
                        <a href="{{ url('inventory/purchase_order-list') }}" class="ql-grid-item">
                            <i class=" icon-layers text-info"></i>
                            <span class="ql-grid-title">New Orders</span>
                        </a>
                    </div> --}}

                </div>
            </li>

            <li class="nav-item dropdown dropdown-slide">
                <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="{{asset('public/image/profile/'.Auth::user()->profile_path.'')}}" alt="John Doe">
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-accout">
                    <div class="dropdown-header pb-3">
                        <div class="media d-user">
                            <img class="align-self-center mr-3" src="{{asset('public/image/profile/'.Auth::user()->profile_path.'')}}" alt="John Doe">
                            <div class="media-body">
                                @if (Auth::check())
                                    <h5 class="mt-0 mb-0" style="text-transform: capitalize ;">{{ Auth::user()->name }}</h5>
                                    <span>{{ Auth::user()->email }}</span>
                                @else
                                    <h5 class="mt-0 mb-0" style="text-transform: capitalize ;">N/A</h5>
                                    <span>N/A</span>
                                @endif
                                
                            </div>
                        </div>
                    </div>

                    <a class="dropdown-item" href="{{url('inventory/profile/'.Auth::id().'')}}"><i class=" ti-user"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('logout') }}"><i class=" ti-unlock"></i> Logout</a>
                </div>
            </li>

            <!--right side toggler-->
            <li class="nav-item d-lg-none">
                <button class="navbar-toggler mobile-rightside-toggler" type="button"><i class="icon-options-vertical"></i></button>
            </li>
            <li class="nav-item d-md-down-none">
                <a class="nav-link navbar-toggler right-sidebar-toggler" href="#"><i class="icon-options-vertical"></i></a>
            </li>
        </ul>

        <!--right side nav end-->
    </header>

    <script>
        criticalLevel();
 
        var token = '{{ csrf_token() }}';
       function criticalLevel(){
        id=1;
        $.ajax({
                   url: '{{ url('inventory/crticalLevel') }}',
                   type: 'POST',
                   data: {
                       "_token": "{{ csrf_token() }}",
                       'id':id
                   },
                   success: function (response) {
                    $('#criticalData').text(response);
                    $('.critical_count').text(response+" Product in Critical Level");
                    
                    if(response>0){
                        $('#newNotify').show();
                    }else{
                        $('#newNotify').hide();
                        $('#criticalData').hide();
                    }
                    
                   },
                   error: function (error) {
                      
                   }
               });
       }
    </script>
 <!--===========header end===========-->