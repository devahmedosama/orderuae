<div class="menu">
        <div class="main-menu">
            <div class="scroll">
                <ul class="list-unstyled">
                    <li >
                        <a href="#dashboard">
                            <i class="iconsminds-shop-4"></i>
                            <span>Dashboards</span>
                        </a>
                    </li>
                    <li>
                        <a href="#layouts">
                            <i class="iconsminds-digital-drawing"></i> Vendors
                        </a>
                    </li>
                    <li>
                        <a href="#ui">
                            <i class="iconsminds-pantone"></i> Places
                        </a>
                    </li>
                    <li>
                        <a href="#menu">
                            <i class="iconsminds-three-arrow-fork"></i> Settings
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('admin/orders') }}">
                            <i class="iconsminds-shopping-cart"></i> Orders
                        </a>
                    </li>
                     <li>
                        <a href="{{ URL::to('admin/refunds') }}">
                            <i class="iconsminds-synchronize-2"></i> Refunds
                        </a>
                    </li>
                    <li>
                        <a href="#payments">
                            <i class="iconsminds-coins"></i> Payments
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="sub-menu">
            <div class="scroll">
                <ul class="list-unstyled" data-link="dashboard">
                    <li>
                        <a href="{{  URL::to('admin/users') }}"   >
                            <i class="iconsminds-user"></i>
                            <span class="d-inline-block"> Our Clients </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{  URL::to('admin/review/reports') }}"   >
                            <i class="iconsminds-green-energy"></i>
                            <span class="d-inline-block"> Review  Report </span>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseMenuLevel" aria-expanded="true"
                            aria-controls="collapseMenuLevel" class="rotate-arrow-icon collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Departments</span>
                        </a>
                        <div id="collapseMenuLevel" class="collapse" data-parent="#menuTypes">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="{{ URL::to('admin/departments/add') }}">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">  Add New Department </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('admin/departments') }}">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">  All Department </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseMenuLevel2" aria-expanded="true"
                            aria-controls="collapseMenuLevel" class="rotate-arrow-icon collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Categories</span>
                        </a>
                        <div id="collapseMenuLevel2" class="collapse" data-parent="#menuTypes">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="{{ URL::to('admin/categories/add') }}">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">  Add New Category </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('admin/categories') }}">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">  All Category </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseMenuLevelb" aria-expanded="true"
                            aria-controls="collapseMenuLevel" class="rotate-arrow-icon collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Brands</span>
                        </a>
                        <div id="collapseMenuLevelb" class="collapse" data-parent="#menuTypes">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="{{ URL::to('admin/brands/add') }}">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">  Add New Brand </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('admin/brands') }}">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">  All Brand </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseMenuLevel1" aria-expanded="true"
                            aria-controls="collapseMenuLevel" class="rotate-arrow-icon collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Colors</span>
                        </a>
                        <div id="collapseMenuLevel1" class="collapse" data-parent="#menuTypes">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="{{ URL::to('admin/colors/add') }}">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">  Add New  </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('admin/colors') }}">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">  All Colors </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseMenuLevel6" aria-expanded="true"
                            aria-controls="collapseMenuLevel" class="rotate-arrow-icon collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Ads</span>
                        </a>
                        <div id="collapseMenuLevel6" class="collapse" data-parent="#menuTypes">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="{{ URL::to('admin/ads/add') }}">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">  Add New Ads </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('admin/ads') }}">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">  All Ads </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseMenuLevel7" aria-expanded="true"
                            aria-controls="collapseMenuLevel" class="rotate-arrow-icon collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Report Type</span>
                        </a>
                        <div id="collapseMenuLevel7" class="collapse" data-parent="#menuTypes">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="{{ URL::to('admin/reports/types/add') }}">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">  Add New Report Type </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('admin/reports/types') }}">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">  All Report Type </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <ul class="list-unstyled" data-link="layouts" id="layouts">
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseMenuLevel" aria-expanded="true"
                            aria-controls="collapseMenuLevel" class="rotate-arrow-icon collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Vendors</span>
                        </a>
                        <div id="collapseMenuLevel" class="collapse" data-parent="#menuTypes">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="{{ URL::to('admin/vendors/add') }}">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">  Add New  </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('admin/vendors') }}">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">  All Vendors </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    
                </ul>
                <ul class="list-unstyled" data-link="ui">
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseMenuLevel3" aria-expanded="true"
                            aria-controls="collapseMenuLevel" class="rotate-arrow-icon collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Countries</span>
                        </a>
                        <div id="collapseMenuLevel3" class="collapse" data-parent="#menuTypes">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="{{ URL::to('admin/countries/add') }}">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">  Add New Country </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('admin/countries') }}">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">  All Country </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseMenuLevel5" aria-expanded="true"
                            aria-controls="collapseMenuLevel" class="rotate-arrow-icon collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Cities</span>
                        </a>
                        <div id="collapseMenuLevel5" class="collapse" data-parent="#menuTypes">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="{{ URL::to('admin/cities/add') }}">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">  Add New City </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('admin/cities') }}">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">  All Cities </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseMenuLevel4" aria-expanded="true"
                            aria-controls="collapseMenuLevel" class="rotate-arrow-icon collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Regions</span>
                        </a>
                        <div id="collapseMenuLevel4" class="collapse" data-parent="#menuTypes">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="{{ URL::to('admin/regions/add') }}">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">  Add New Region </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('admin/regions') }}">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">  All Regions </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>

                <ul class="list-unstyled" data-link="menu" id="menuTypes">
                    <li>
                        <a href="{{  URL::to('admin/settings') }}"   >
                            <i class="simple-icon-settings"></i>
                            <span class="d-inline-block">Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseMenuLevel" aria-expanded="true"
                            aria-controls="collapseMenuLevel" class="rotate-arrow-icon collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Payment Ways</span>
                        </a>
                        <div id="collapseMenuLevel" class="collapse" data-parent="#menuTypes">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="{{ URL::to('admin/paymentways/add') }}">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">  Add New  </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('admin/paymentways') }}">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">  All Payment Ways </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseMenuLevel2" aria-expanded="true"
                            aria-controls="collapseMenuLevel" class="rotate-arrow-icon collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Delivery Types</span>
                        </a>
                        <div id="collapseMenuLevel2" class="collapse" data-parent="#menuTypes">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="{{ URL::to('admin/deliverytypes/add') }}">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">  Add New  </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('admin/deliverytypes') }}">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">  All Delivery Types </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" data-toggle="collapse" data-target="#collapseMenuLevelq" aria-expanded="true"
                            aria-controls="collapseMenuLevel" class="rotate-arrow-icon collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">Common Questions</span>
                        </a>
                        <div id="collapseMenuLevelq" class="collapse" data-parent="#menuTypes">
                            <ul class="list-unstyled inner-level-menu">
                                <li>
                                    <a href="{{ URL::to('admin/questions/add') }}">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">  Add New  </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('admin/questions') }}">
                                        <i class="simple-icon-layers"></i> <span class="d-inline-block">  All Common Questions </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>

                <ul class="list-unstyled" data-link="payments" id="payments">
                    <li>
                        <a href="{{  URL::to('admin/payments/vendors') }}"   >
                            <i class="iconsminds-bank"></i>
                            <span class="d-inline-block">Vendors Payments </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{  URL::to('admin/payments/processes') }}"   >
                            <i class="iconsminds-dollar"></i>
                            <span class="d-inline-block"> Card Payments </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{  URL::to('admin/payments/wallet') }}"   >
                            <i class="iconsminds-dollar"></i>
                            <span class="d-inline-block"> Wallet Payments </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{  URL::to('admin/payments/cash') }}"   >
                            <i class="iconsminds-wallet"></i>
                            <span class="d-inline-block"> Cash Payments </span>
                        </a>
                    </li>
                   
                </ul>

            </div>
        </div>
    </div>