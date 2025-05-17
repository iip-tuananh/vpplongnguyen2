<h1 class="text-h4 mb-5 font-semibold">Giỏ hàng</h1>
<div class="cart-table">
    <div class="cart-header hidden  lg:grid md:grid-cols-[var(--cart-template)] gap-[var(--table-gap)] border-t border-b border-neutral-50 font-semibold text-center">
        <div class="py-3">Sản phẩm</div>
        <div class="py-3">Đơn giá</div>
        <div class="py-3">Số lượng</div>
        <div class="py-3">Tạm tính</div>
    </div>
    <div class="cart-items divide-y divide-neutral-50">

        @php $total = 0; $qty = 0 ; @endphp
        @foreach((array) session('cart') as $id => $details)
            @php
                $total += ($details['price'] - ($details['price']*($details['discount']/100))) * $details['quantity'] ;
                $qty += $details['quantity'] ;
            @endphp
        @endforeach

        @foreach ($cart as $id => $details)
            <div class="cart-item grid lg:grid-cols-[var(--cart-template)] gap-[var(--table-gap)] relative" data-line-index="{{ $id }}">
                <div class="lg:px-3 lg:py-4 flex gap-3 cart-product-col">
                    <a class="cart-item__image flex items-center rounded-sm border-neutral-50 border overflow-hidden" href="javascript:;" title="{{ languageName($details['name']) }}">
                        <img src="{{ url(''.$details['image']) }}" class="aspect-square object-contain" alt="{{ languageName($details['name']) }}">
                    </a>
                    <div>
                        <p class="cart-item__name font-semibold  "><a href="javascript:;" title="{{ languageName($details['name']) }}" class="link">{{ languageName($details['name']) }}</a></p>
                    </div>
                </div>
                <div class="lg:px-3 lg:py-4 hidden lg:block cart-unit-price-col">
                    <div class="price">{{ number_format($details['price'] - ($details['price']*($details['discount']/100))) }}₫</div>
                    @if($details['discount'] > 0)
                        <div class="compare-price line-through">{{ number_format($details['price']) }}₫</div>
                    @endif
                </div>
                <div class="lg:px-3 lg:py-4 flex  lg:justify-center cart-quantity-col">
                    <quantity-input>
                        <div class="custom-number-input cart-item-quantity flex flex-row h-10 border border-neutral-50 relative bg-background rounded-sm overflow-hidden h-[3.8rem] w-[13rem]">
                            <button type="button" name="minus" class="h-full w-20 cursor-pointer outline-non p-2 disabled"
                                    onclick="qtyminus({{$details['idpro']}})"
                            >
                                <i class="m-auto icon icon-minus"></i>
                            </button>
                            <input type="number" class="focus:outline-none form-quantity w-full focus:ring-transparent text-base
                                              font-semibold text-md  md:text-basecursor-default flex items-center outline-none bg-transparent border-none text-center"
                                   value="{{$details['quantity']}}" id="quantity-{{$details['idpro']}}"   pattern="[0-9]*"
                                  >
                            <button type="button" name="plus" class=" h-full w-20 rounded-r cursor-pointer p-2"
                                    onclick="qtyplus({{$details['idpro']}})"
                            >
                                <i class="m-auto icon icon-plus"></i>
                            </button>
                        </div>
                    </quantity-input>
                </div>
                <div class="lg:px-3 lg:py-4   lg:text-right cart-total-col">
                                 <span class="loading-icon gap-1 hidden items-center justify-center">
                                 <span class="w-1.5 h-1.5 bg-[currentColor] rounded-full animate-pulse"></span>
                                 <span class="w-1.5 h-1.5 bg-[currentColor] rounded-full animate-pulse"></span>
                                 <span class="w-1.5 h-1.5 bg-[currentColor] rounded-full animate-pulse"></span>
                                 </span>
                    <div class="price">{{ number_format(($details['price'] - ($details['price']*($details['discount']/100)))*$details['quantity']) }}₫</div>
                </div>
                <div class="lg:px-3 lg:py-4 text-right cart-remove-col">
                    <remove-cart-button data-line-index="1"   onclick="removeCartFromList({{$details['idpro']}})">

                        <i class="icon icon-cross text-neutral-200 cursor-pointer"></i>
                    </remove-cart-button>
                </div>
            </div>
        @endforeach


    </div>

</div>

<div class="mt-6 w-full flex justify-end items-center gap-4">
    <!-- Tổng tiền -->
    <div class="text-right">
        <p class="text-base">Tổng tiền:</p>
        <p class="text-2xl font-bold text-pink-600">{{ number_format($total) }}₫</p>
    </div>
    <!-- Nút thanh toán -->

    <div class="cart-submit">

        <a href="{{ route('checkout') }}">
            <button type="button" class="btn w-full btn--large font-semibold  bg-primary text-white inline-flex  justify-center items-center gap-2">
                THANH TOÁN
                <i class="icon icon-arrow-login"></i>
            </button>
        </a>



    </div>
</div>
