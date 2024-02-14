<div class="profile-side">
    <p class="name">
        {{ trans('home.Hello') }} {{ $user->first_name }} !
    </p>
    <a href="{{ URL::to($lang.'/logout') }}" class="sign-out">
        {{ trans('home.Sign out') }}
    </a>
    <a href="{{ URL::to($lang.'/myprofile') }}" class="link">
        <img src="{{ URL::to('assets/site') }}/img/icon-orders.png" alt="">
        {{ trans('home.My Profile') }}
    </a>
    <a href="{{ URL::to($lang.'/my/orders') }}" class="link">
        <img src="{{ URL::to('assets/site') }}/img/icon-orders.png" alt="">
        {{ trans('home.Orders') }}
    </a>
    <a href="{{ URL::to($lang.'/addresses') }}" class="link">
        <img src="{{ URL::to('assets/site') }}/img/icon-address.png" alt="">
       {{ trans('home.Addresses') }} 
    </a>
    <!-- <a href="" class="link">
        <img src="{{ URL::to('assets/site') }}/img/icon-credit.png" alt="">
        {{ trans('home.Payments') }}
    </a> -->
    <a href="{{ URL::to($lang.'/refunds') }}" class="link">
        <img src="{{ URL::to('assets/site') }}/img/icon-return.png" alt="">
        {{ trans('home.Returns') }}
    </a>
    
    <a href="" class="link">
        <img src="{{ URL::to('assets/site') }}/img/icon-payment.png" alt="">
        {{ trans('home.Cashback Balance') }}
    </a>
</div>