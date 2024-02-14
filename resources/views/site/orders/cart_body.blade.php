<div class="col-12 col-md-8">
    @foreach($allData as $data)
    <div class="cart-box">
        <a href="" class="img">
            <img src="{{ URL::to($data->item_thumb) }}" alt="{{ $data->name }}">
        </a>
        <div class="info">
            <a href="" class="title">
                {{ $data->name }}
            </a>
            
            <p class="price">
                {{ $data->price_after_discount }} {{ trans('home.AED') }}
            </p>
            <div>
                <span class="wish active">
                    <i class="fas fa-heart"></i>
                    move to wishlist {{ $data->quantity }}
                </span>
            </div>
            <div class="quantity">
                <i class="fas fa-minus min"></i>
                <input type="number" min="1" max="10" value="{{ $data->quantity }}">
                <i class="fas fa-plus plus"></i>
            </div>
        </div>
        <a class="close_item" ><i class="far fa-trash-alt"></i></a>
    </div>
    @endforeach
</div>
<div class="col-12 col-md-4">
    <div class="checkout-summary">
        <p class="title">
            {{ trans('home.Order Summary') }}
        </p>
        <div class="info-row">
            <p class="tit">
               {{ trans('home.Subtotal') }} 
            </p>
            <p class="val">
                {{ $total_price }} {{ trans('home.AED') }}
            </p>
        </div>
        
        <div class="info-row total">
            <p class="tit">
                Total
            </p>
            <p class="val">
                {{ $total_price }} {{ trans('home.AED') }}
            </p>
        </div>
        <div class="ship-to">
            <p class="tit">
                Ship To
            </p>
            <button class="edit prev-step">Edit</button>
        </div>
        <div class="address">
            <p class="tit">
                Eman Fawaz
            </p>
            <div class="desc">
                outside zoom store ,Eppco satation , Al Wasel Road , 192 jumeriah Dubai
            </div>
        </div>
        <a href="" class="submit mt-4 w-100 text-center">
            Checkout
        </a>
    </div>
</div>