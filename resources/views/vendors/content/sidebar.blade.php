<div class="menu">
        <div class="main-menu">
            <div class="scroll">
                <ul class="list-unstyled">
                    <li >
                        <a href="{{ URl::to('vendors/dashboard') }}">
                            <i class="iconsminds-shop-4"></i>
                            <span>Dashboards</span>
                        </a>
                    </li>
                    <li>
                        <a href="#layouts">
                            <i class="iconsminds-digital-drawing"></i> Stores
                        </a>
                    </li>
                    <li>
                        <a href="#ui">
                            <i class="iconsminds-pantone"></i> Statistics
                        </a>
                    </li>
                    <li>
                        <a href="#menu">
                            <i class="iconsminds-three-arrow-fork"></i> Settings
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="iconsminds-bucket"></i> Payments 
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('vendors/dashboard/helpcenter') }}" >
                            <i class="iconsminds-library"></i> Help Center
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="sub-menu">
            <div class="scroll">
                <ul class="list-unstyled" data-link="layouts" id="layouts">
                    @foreach(App\Models\Store::my() as $data)
                    <li>
                        <a href="{{ URL::to('vendors/dashboard/products/'.$data->id) }}" class="rotate-arrow-icon collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inlin e-block">{{ $data->name }} </span>
                        </a>
                    </li>
                    @endforeach
                </ul>
                <ul class="list-unstyled" data-link="ui">
                    <li>
                        <a href="{{ URL::to('vendors/dashboard/statistics') }}" class="rotate-arrow-icon collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">General</span>
                        </a>
                        
                    </li>
                    @foreach(App\Models\Store::my() as $data)
                    <li>
                        <a href="{{ URL::to('vendors/dashboard/statistics/store/'.$data->id) }}" class="rotate-arrow-icon collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block">{{ $data->name }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
                <ul class="list-unstyled" data-link="menu" id="menuTypes">
                    <li>
                        <a href="{{ URL::to('vendors/dashboard/warehouses') }}" class="rotate-arrow-icon collapsed">
                            <i class="simple-icon-arrow-down"></i> <span class="d-inline-block"> Ware houses</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>