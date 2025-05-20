@php
    $img = json_decode($pro->images);
@endphp

<card-product class="h-full"   data-prefetch="{{ $pro->slug }}"
>
    <div
        class=" item_product_main card-product card-product--vertical relative transition-transform duration-200 ease-in-out rounded-sm h-full
                                             h-full
                                             "
    >
        <form
            action="#"
            method="post"
            data-id="product-actions-33868625"
            enctype="multipart/form-data"
            class="bg-background relative z-10 m-0  rounded-sm h-full"
        >
            <div class="card-product__top relative rounded-tr-sm rounded-tl-sm overflow-hidden group/card  ">
                <a
                    class="link aspect-square flex items-center justify-center w-full"
                    href="{{route('detailProduct',['cate'=>$pro->cate_slug,'type'=>$pro->type_slug ? $pro->type_slug : 'loai','id'=>$pro->slug])}}"
                    title="{{languageName($pro->name)}}"
                >
                    <div class="card-product__badges absolute top-2 left-2 z-10 flex items-center gap-2">
                    </div>
                    <picture>
                        <source media="(max-width: 600px)"
                                srcset="{{str_replace('http://vpplongnguyen.com.vn', '', $img[0]))}}">
                        <img
                            class="card-product__image max-h-full w-auto aspect-square object-contain scale-[var(--image-scale)]  absolute top-1/2 left-1/2   -translate-x-1/2 -translate-y-1/2 transition duration-300 ease-out  group-hover/card:opacity-0  "
                            width="480"
                            height="480"
                            decoding="async"
                            loading="lazy"
                            style="--image-scale:1"
                            src="{{$img[0]}}"
                            alt="{{languageName($pro->name)}}"
                        >
                    </picture>
                    <picture>
                        <source media="(max-width: 600px)"
                                srcset="{{$img[0]}}">
                        <img
                            class="card-product__image-2 max-h-full w-auto aspect-square object-contain  opacity-0 scale-[var(--image-scale)]  absolute top-1/2 left-1/2   -translate-x-1/2 -translate-y-1/2 z-[0] group-hover/card:opacity-1 group-hover/card:z-[1] group-hover/card:opacity-100 transition duration-300 ease-out"
                            width="480"
                            height="480"
                            decoding="async"
                            loading="lazy"
                            style="--image-scale:1"
                            src="{{str_replace('https://vpplongnguyen.com.vn', '', $img[0]))}}"
                        >
                    </picture>
                </a>
            </div>
            <a
                class="link"
                href="{{route('detailProduct',['cate'=>$pro->cate_slug,'type'=>$pro->type_slug ? $pro->type_slug : 'loai','id'=>$pro->slug])}}"
                title="{{languageName($pro->name)}}"
            >
                <div class="card-product__body flex flex-col gap-2 px-2 py-2  md:gap-2 md:px-5 md:py-4">
                    <div class="card-product__title text-base font-semibold line-clamp-2 ">
                        {{languageName($pro->name)}}
                    </div>
                    <div class="price-box flex justify-between items-center">
                        <div class="{{languageName($pro->name)}}">
                            @if ($pro->discount > 0)
                                <span class="price">{{number_format($pro->price-($pro->price*($pro->discount/100)))}}₫</span>
                                <span class="compare-price line-through font-semibold">Giá cũ: <span>{{number_format($pro->price)}}₫</span></span>
                            @else
                                <span class="price">{{number_format($pro->price)}}₫</span>
                            @endif

                        </div>
                        @if ($pro->discount > 0)
                            <div class="badge sale-badge font-semibold text-xs md:text-sm  p-1  md:px-2 md:py-1.5">
                                -{{$pro->discount}}%
                            </div>
                        @endif

                    </div>
                    {{--                        <stock-countdown class="stock-countdown" data-stock-management="true"  data-id="section-flashsale-3" --}}
                    {{--                                         data-product-id="33868625" data-type="tag" data-max-qty="720"--}}
                    {{--                                         data-real-qty="399" data-available="true"  >--}}
                    {{--                        </stock-countdown>--}}
                </div>
            </a>
            <div class="card-product__bottom w-full px-2 md:px-5 left-0 lg:block hidden">
                <portal-opener>
                    <button
                            data-portal="#cart-drawer"
                            onclick="addToCart({{$pro->id}},1)"
                            class="btn bg- w-full addtocart-btn font-semibold add_to_cart  flex justify-center items-center gap-3"
                            aria-label="Thêm vào giỏ"
                            data-product="/{{$pro->slug}}"
                    >
                                                   <span class="loading-icon gap-1 hidden items-center justify-center">
                                                   <span class="w-1.5 h-1.5 bg-[currentColor] rounded-full animate-pulse"></span>
                                                   <span class="w-1.5 h-1.5 bg-[currentColor] rounded-full animate-pulse"></span>
                                                   <span class="w-1.5 h-1.5 bg-[currentColor] rounded-full animate-pulse"></span>
                                                   </span>
                        <span>
                                                   Thêm vào giỏ
                                                   </span>
                    </button>
                </portal-opener>

            </div>
        </form>
    </div>
</card-product>
