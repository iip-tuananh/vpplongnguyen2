@if(count($cart ))
    <div class="cart-left p-4 overflow-y-auto flex flex-col">
        <div class="cart-table">
                <?php
                $total = 0;
                $qtys = 0;
                ?>
            @foreach($cart as $item)
                    <?php
                    $total += ($item['price'] - ($item['price']*($item['discount']/100))) * $item['quantity'];
                    $qtys += $item['quantity'];

                    $jsonString = $item['name']; // giống response[key].name trong JS

                    ?>
                <div class="cart-items divide-y divide-neutral-50">
                    <div class="cart-item grid lg:grid-cols-[var(--cart-template)] gap-[var(--table-gap)] relative" data-line-index="1">
                        <div class="lg:px-3 lg:py-4 flex gap-3 cart-product-col">
                            <a class="cart-item__image flex items-center rounded-sm border-neutral-50 border overflow-hidden"  title="{{json_decode($jsonString, true)[0]['content']}}">
                                <img src="{{$item['image']}}" class="aspect-square object-contain" alt="{{json_decode($jsonString, true)[0]['content']}}">
                            </a>
                            <div>
                                <p class="cart-item__name font-semibold  "><a href="/ban-phim-co-khong-day-lofree-flow" title="Bàn Phím Cơ Không Dây Lofree Flow" class="link">{{json_decode($jsonString, true)[0]['content']}}</a></p>
                            </div>
                        </div>
                        <div class="lg:px-3 lg:py-4 hidden lg:block cart-unit-price-col">
                            <div class="price">{{ number_format(($item['price'] - ($item['price']*($item['discount']/100)))) }}₫</div>
                        </div>
                        <div class="lg:px-3 lg:py-4 flex  lg:justify-center cart-quantity-col">
                            <quantity-input>
                                <div class="custom-number-input cart-item-quantity flex flex-row h-10 border border-neutral-50 relative bg-background rounded-sm overflow-hidden h-[3.8rem] w-[13rem]">
                                    <button type="button" name="minus" class="h-full w-20 cursor-pointer outline-non p-2 disabled"
                                            onclick="addToCart({{$item['idpro']}},0, 'decrement')"
                                    >
                                        <i class="m-auto icon icon-minus"></i>
                                    </button>
                                    <input type="number" class="focus:outline-none form-quantity w-full focus:ring-transparent text-base  font-semibold text-md  md:text-basecursor-default flex items-center outline-none bg-transparent border-none text-center"
                                           data-line-index="1"  min="1"
                                           id="inputqty{{$item['idpro']}}"
                                           value="{{$item['quantity']}}"
                                           onkeyup="addToCart({{$item['idpro']}},0)"
                                    >
                                    <button type="button" name="plus" class=" h-full w-20 rounded-r cursor-pointer p-2"
                                            onclick="addToCart({{$item['idpro']}},0, 'increment')"
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
                            <div class="price">{{ number_format(($item['price'] - ($item['price']*($item['discount']/100)))) }}₫</div>
                        </div>
                        <div class="lg:px-3 lg:py-4 text-right cart-remove-col">
                            <remove-cart-button>
                                <i class="icon icon-cross text-neutral-200 cursor-pointer" onclick="removeCart({{$item['idpro']}})"></i>
                            </remove-cart-button>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <div class="cart-right p-4 mt-auto">
        <div class="cart-summary">
            <div class=" cart-summary-info p-4 lg:p-6 border-2 border-primary rounded-lg  divide-dashed divide-y divide-neutral-50">
                <div class="cart-opener-group   divide-dashed divide-y divide-neutral-50">
                </div>
                <div class="cart-bottom">
                    <div class="cart-total py-2 md:py-4 flex items-start justify-between w-full">
                        <p class="font-semibold">TỔNG CỘNG</p>
                        <div class="text-right">
                            <div class="price">{{number_format($total)}}₫</div>
                            <span class="loading-icon gap-1 hidden items-center justify-center">
                                                                    <span class="w-1.5 h-1.5 bg-[currentColor] rounded-full animate-pulse"></span>
                                                                    <span class="w-1.5 h-1.5 bg-[currentColor] rounded-full animate-pulse"></span>
                                                                    <span class="w-1.5 h-1.5 bg-[currentColor] rounded-full animate-pulse"></span>
                                                          </span>
                        </div>
                    </div>
                    <div class="cart-submit">
                        <a href="{{ route('checkout') }}">
                            <button type="button" class="btn w-full btn--large font-semibold  bg-primary text-white inline-flex  justify-center items-center gap-2">
                                THANH TOÁN
                                <i class="icon icon-arrow-login"></i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="cart-empty">
        <div class=" bg-background px-gutter lg:px-6 py-6 rounded-sm  relative text-center">

            <div class="flex-col mx-auto gap-4  flex  items-center justify-center">
                <img class="aspect-square object-contain" src="//theme.hstatic.net/200000817091/1001225822/14/cart_empty_background.png?v=68" alt="cart_empty_background" width="320" height="320">
                <h2 class="text-h4  font-semibold">
                    Giỏ hàng chưa có gì!
                </h2>
                <p>
                    Hãy tìm sản phẩm ứng ý và thêm vào giỏ hàng bạn nhé
                </p>
                <a class="btn font-semibold bg-primary text-white" href="{{ route('home') }}" title="Tiếp tục mua sắm">
                    Tiếp tục mua sắm
                </a>
            </div>
        </div>
    </div>


@endif


