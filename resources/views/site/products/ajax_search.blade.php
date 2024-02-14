@foreach($allData as  $item)
    <div class="col-12 col-md-4 col-lg-6 col-xl-3 mb-3">
        <a href="{{ URL::to($lang.'/single/product/'.$item->order_gno.'/'.$item->slug) }}" class="product-box category-item">
            <img src="{{ URL::to($item->item_thumb) }}" loading="lazy" alt="" class="img">
            <div class="product-info">
                <span class="title">
					{{ $item->name }}
				</span>
				
				<span class="price">
					{{ trans('home.AED') }} 
					<span>{{ $item->price }}</span>
				</span>
				@if($item->discount)
				<span class="offer">
					<span class="before">
						{{ trans('home.AED') }}  {{ $item->price_after_discount }}
					</span>
					{{ $item->discount }}% Off
				</span>
				@endif
				<span class="delivery-date">
					Arrives 
					<span>Tomorrow, Jan 2</span>
				</span>
				<span class="peoduct-foot">
					<span class="rate">
						<span class="number">
							<i class="fas fa-star"></i>
						    {{  $item->rate }}
						</span>
					</span>
				</span>
            </div>
        </a>
    </div>
    @endforeach