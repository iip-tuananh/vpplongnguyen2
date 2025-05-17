@extends('layouts.main.master')
@section('title')
{{languageName($product->name)}}
@endsection
@section('description')
{{languageName($product->description)}}
@endsection
@section('image')
@php
$img = json_decode($product->images);
@endphp
{{url(''.$img[0])}}
@endsection
@section('css')
<link href="{{asset('frontend/css/product_style.scss.css?1663035745304')}}" rel="stylesheet" type="text/css" />
<link rel="preload" as='style' type="text/css" href="{{asset('frontend/css/product_style.scss.css?1663035745304')}}">
@endsection
@section('js')
@endsection
@section('content')
    <main>
        <div class="breadcrumbs">
            <div class="container">
                <ul class="  breadcrumb py-3 flex flex-wrap items-center text-xs md:text-sm">
                    <li class="home">
                        <a class="link" href="index.html" title="Trang chủ"><span>Trang chủ</span></a>
                        <span class="mx-1 md:mx-2 inline-block">&nbsp;/&nbsp;</span>
                    </li>
                    <li>
                        <a class="changeurl link" href="{{route('allListProCate',['danhmuc'=>$product->cate->slug])}}"
                        ><span>{{languageName($product->cate->name)}}</span></a
                        >
                        <span class="mx-1 md:mx-2 inline-block">&nbsp;/&nbsp;</span>
                    </li>
                    <li>
                        <span class="text-neutral-100">{{languageName($product->name)}}</span>
                    </li>
                </ul>
            </div>
        </div>
        <div itemscope itemtype="http://schema.org/Product">
            <meta itemprop="url" content="/ban-phim-co-keychron-q2-pro">
            <meta itemprop="image" content="../bizweb.dktcdn.net/100/502/483/products/keychron-q2-pro-qmkvia-wireles-1684155473-c8348d39-progressive0e95.jpg?v=1702547768690">
            <meta itemprop="shop-currency" content="">
        </div>
        <div class="main-product pb-5" >
            <div class="container bg-background lg:bg-transparent">
                <product-form id="main-product-33869948">
                    <div  class="product-detail  gap-y-3 lg:gap-y-0 gap-x-6 grid grid-cols-1 auto-rows-min lg:grid-cols-2 xl:grid-cols-[7fr_5fr] relative">
                        <div
                            class="product-gallery-wrapper bg-background min-h-0 min-w-0 relative lg:rounded-lg "
                            style="height:fit-content"
                        >
                            <div class="max-w-[52rem] mx-auto">
                                <div class="product-gallery md:px-3 md:pt-6">
                                    <media-gallery >
                                        <div id="GalleryMain-product-1" class="swiper gallery-main">
                                            <div class="card-product__badges absolute top-2 left-2 z-10 flex items-center gap-2">
                                            </div>
                                            <div class="swiper-wrapper">
                                                @foreach ($img as $key => $item)
                                                    <div class="swiper-slide aspect-square  flex items-center justify-center relative swiper-spotlight cursor-zoom-in"
                                                         data-src="{{$item}}"
                                                         data-href="{{$item}}">
                                                        <img
                                                            class="object-contain aspect-square scale-[var(--image-scale)] gallery-main-img"
                                                            src="{{$item}}"
                                                            alt="{{languageName($product->name)}}"
                                                        >
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="swiper-button-prev"></div>
                                            <div class="swiper-button-next"></div>
                                        </div>
                                        <div id="GalleryThumbnails-product-1" class="swiper overflow-hidde text-center tec gallery-thumbnails mt-3 ">
                                            <div class="swiper-wrapper gap-3 grid-flow-col h-auto inline-flex  ">
                                                @foreach ($img as $key => $item)
                                                <div class="swiper-slide  swiper-slide-thumb-{{$key == 0 ? 'active' : ''}}    cursor-pointer w-[6.1rem] md:w-[9rem]">
                                                    <div class=" flex items-center justify-center aspect-square ">
                                                        <img
                                                            class="object-contain w-auto"
                                                            src="{{$item}}"
                                                            width="64"
                                                            height="64"
                                                            loading="lazy"
                                                            alt="{{languageName($product->name)}}"
                                                        >
                                                    </div>
                                                </div>

                                                @endforeach
                                            </div>
                                        </div>
                                    </media-gallery>
                                </div>
                                <div class='share-group flex justify-center items-center mt-5 gap-3'>
                                    <p class='share-group__heading mr-3 '>Chia sẻ</p>
                                    <div class='share-group__list flex gap-3'>
                                        <a title="facebook-share" class='share-group__item p-2 border border-neutral-50 rounded-full w-[3.6rem] h-[3.6rem] flex items-center justify-center facebook' target="_blank" href='http://www.facebook.com/sharer.php?u={{route('detailProduct',['cate'=> $product->cate->slug,'type'=> @$product->typeCate->slug ? $product->typeCate->slug : 'loai','id'=>$product->slug])}}'>
                                            <img class="object-contain" src="/frontend/images/facebook-icon50e9.png?1746694962638" alt="facebook" loading="lazy" width="20" height="20" />
                                        </a>
                                        <a title="messenger-share" class='share-group__item messenger p-2  border border-neutral-50 rounded-full w-[3.6rem] h-[3.6rem] flex items-center justify-center lg:hidden' target="_blank" href='fb-messenger_/share/index17bc.html?link={{route('detailProduct',['cate'=> $product->cate->slug,'type'=> @$product->typeCate->slug ? $product->typeCate->slug : 'loai','id'=>$product->slug])}}'>
                                            <img class="object-contain" src="/frontend/images/messenger-icon50e9.png?1746694962638" alt="messenger" loading="lazy" width="20" height="20" />
                                        </a>
                                        <a title="pinterest-share" class='share-group__item pinterest p-2 border border-neutral-50 rounded-full w-[3.6rem] h-[3.6rem] flex items-center justify-center ' target="_blank" href='http://pinterest.com/pin/create/button/?url={{route('detailProduct',['cate'=> $product->cate->slug,'type'=> @$product->typeCate->slug ? $product->typeCate->slug : 'loai','id'=>$product->slug])}}'>
                                            <img class="object-contain" src="/frontend/images/pinterest-icon50e9.png?1746694962638" alt="pinterest" loading="lazy" width="20" height="20" />
                                        </a>
                                        <a title="twitter-share" class='share-group__item twitter p-2 border border-neutral-50 rounded-full w-[3.6rem] h-[3.6rem] flex items-center justify-center ' target="_blank" href='http://twitter.com/share?text={{route('detailProduct',['cate'=> $product->cate->slug,'type'=> @$product->typeCate->slug ? $product->typeCate->slug : 'loai','id'=>$product->slug])}}'>
                                            <img class="object-contain" src="/frontend/images/twitter-icon50e9.png?1746694962638" alt="twitter" loading="lazy" width="20" height="20" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-form-wrapper lg:row-start-1 lg:row-end-5   lg:col-start-2">
                            <div class="bg-background  lg:rounded-l  md:py-6 lg:p-6 relative
                     lg:sticky lg:top-[calc(var(--header-height)+1.2rem)]
                     ">
                                <div class=" space-y-2  ">
                                    <div class="product-title space-y-2  ">
                                        <h1 class="font-semibold text-h4">{{languageName($product->name)}}</h1>
                                        <div class="flex flex-wrap gap-2 items-center  mt-2 ">
                                        </div>

                                        <div class="product-price-group grid rounded-sm overflow-hidden" style="
                              --color-flashsale: #ffffff;
                              --color-flashsale-bg: #ee1926;
                              --color-flashsale-timer-bg: #fcfcfc;
                              --color-flashsale-timer: #000000;
                              --color-flashsale-process: #ffe500;
                              ">

                                            <div class="price-box flex items-center flex-wrap gap-2 ">
                                                <div class="flex flex-wrap gap-1 items-baseline">
                                                    @if ($product->price > 0)
                                                        @if ($product->discount > 0)
                                                            <span class="price text-h4">{{number_format($product->price-($product->price*($product->discount/100)))}}₫</span>
                                                            <span class="compare-price text-h6 line-through"> {{number_format($product->price)}}đ</span>
                                                        @else
                                                            <span class="price text-h4"> {{number_format($product->price)}}đ</span>
                                                        @endif
                                                    @else
                                                        <span class="price text-h4">Liên hệ</span>
                                                    @endif
                                                </div>

                                                @if ($product->price > 0 && $product->discount > 0)
                                                <div class="badge sale-badge px-2 py-1 text-h6 font-semibold">
                                                    -{{$product->discount}}%
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        {!!languageName($product->description)!!}
                                    </div>
                                </div>
                                <div class="product-cta mb-0 mt-2 pt-2 border-neutral-50 border-dashed  border-t ">
                                    <form
                                        class=" mb-3"
                                        enctype="multipart/form-data"
                                        id="add-to-cart-form"
                                    >
                                        <input type="hidden" name="variantId" value="105319380">
                                        <div class="flex gap-2 items-center ">
                                            <quantity-input>
                                                <div class="custom-number-input product-quantity">
                                                    <div class="flex flex-row h-10 border border-neutral-50 relative bg-background rounded-sm overflow-hidden h-[3.8rem] w-[13rem]">
                                                        <button type="button" name="minus" class="h-full w-20  cursor-pointer outline-non p-2"
                                                                onclick="var result = document.getElementById('inputqty'); var qty = result.value; if( !isNaN(qty) & qty > 1 ) result.value--;return false;"
                                                        >
                                                            <i class="m-auto icon icon-minus"></i>
                                                        </button>
                                                        <input
                                                            type="text"
                                                            id="inputqty"
                                                            class="focus:outline-none form-quantity w-full focus:ring-transparent text-base  font-semibold text-md  md:text-basecursor-default flex items-center outline-none bg-transparent border-none text-center"
                                                            name="quantity"
                                                            size="4" value="1" maxlength="3"
                                                            onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;" onchange="if(this.value == 0)this.value=1;"
                                                        >
                                                        <button type="button" name="plus" class=" h-full w-20 rounded-r cursor-pointer p-2"
                                                                onclick="var result = document.getElementById('inputqty'); var qty = result.value; if( !isNaN(qty)) result.value++;return false;"
                                                        >
                                                            <i class="m-auto icon icon-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </quantity-input>
                                            <div class="inventory-status">
                                 <span class="font-semibold text-success flex items-center gap-1">
                                 <i class="icon icon-tick"></i>
                                 Sẵn trong kho
                                 </span>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <portal-opener>
                                                <button
                                                        data-portal="#cart-drawer"
                                                        type="button"
                                                        name="addtocart"
                                                        onclick="addToCart({{$product->id}},1)"
                                                        class=" font-semibold  btn bg-[var(--color-addtocart-bg)] text-[var(--color-addtocart)] btn-add-to-cart w-full"
                                                >
                                                    <span> Thêm vào giỏ</span>
                                                    <span class="loading-icon gap-1 hidden items-center justify-center">
                              <span class="w-1.5 h-1.5 bg-[currentColor] rounded-full animate-pulse"></span>
                              <span class="w-1.5 h-1.5 bg-[currentColor] rounded-full animate-pulse"></span>
                              <span class="w-1.5 h-1.5 bg-[currentColor] rounded-full animate-pulse"></span>
                              </span>
                                                </button>
                                            </portal-opener>


                                        </div>
                                        <div class="flex gap-2">
                                            <button
                                                name="buynow"
                                                onclick="shopnow({{$product->id}},1)"
                                                class=" font-semibold mt-2 btn bg-[var(--color-addtocart-color)] text-[var(--color-addtocart-bg)] border border-[var(--color-addtocart-bg)]  hover:bg-[var(--color-addtocart-bg)] hover:text-[var(--color-addtocart)] btn-buynow w-full"
                                            >
                                                <span>    Mua ngay </span>
                                                <span class="loading-icon gap-1 hidden items-center justify-center">
                              <span class="w-1.5 h-1.5 bg-[currentColor] rounded-full animate-pulse"></span>
                              <span class="w-1.5 h-1.5 bg-[currentColor] rounded-full animate-pulse"></span>
                              <span class="w-1.5 h-1.5 bg-[currentColor] rounded-full animate-pulse"></span>
                              </span>
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <div class="sapo-buyxgety-module-detail-v2"></div>
                                <div class="card-product__badges hidden space-y-2 col-span-full lg:col-start-2 md:py-3 mt-3 py-2 border-t  border-neutral-50 ">
                                </div>
                                <ul class=" pt-3 flex gap-2 flex-col product-polices">
                                    <li class="item relative flex gap-2 items-center">
                                        <div class="max-w-5">
                                            <img
                                                class="object-contain"
                                                loading="lazy"
                                                width="20"
                                                height="20"
                                                src="/frontend/images/policy_product_image_150e9.png?1746694962638"
                                                alt="Giao hàng miễn phí trong 24h (chỉ áp dụng khu vực nội thành)"
                                            >
                                        </div>
                                        <div class="">
                                            Giao hàng miễn phí trong 24h (chỉ áp dụng khu vực nội thành)
                                        </div>
                                    </li>
                                    <li class="item relative flex gap-2 items-center">
                                        <div class="max-w-5">
                                            <img
                                                class="object-contain"
                                                loading="lazy"
                                                width="20"
                                                height="20"
                                                src="/frontend/images/policy_product_image_250e9.png?1746694962638"
                                                alt="Trả góp lãi suất 0% qua thẻ tín dụng Visa, Master, JCB"
                                            >
                                        </div>
                                        <div class="">
                                            Trả góp lãi suất 0% qua thẻ tín dụng Visa, Master, JCB
                                        </div>
                                    </li>
                                    <li class="item relative flex gap-2 items-center">
                                        <div class="max-w-5">
                                            <img
                                                class="object-contain"
                                                loading="lazy"
                                                width="20"
                                                height="20"
                                                src="/frontend/images/policy_product_image_350e9.png?1746694962638"
                                                alt="Đổi trả miễn phí trong 30 ngày"
                                            >
                                        </div>
                                        <div class="">
                                            Đổi trả miễn phí trong 30 ngày
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product-description md:col-start-1  bg-background min-h-0 min-w-0 relative lg:rounded-lg lg:p-6 pt-3 lg:pt-3">
                            <tabs-component>
                                <div class="tab-nav tab-nav--style2 hiddden  hidden lg:flex justify-center items-center border-b border-neutral-50">
                                    <button class="tab-btn btn rounded-0 active font-semibold " aria-controls="product-content">
                                        Chi tiết
                                    </button>
                                </div>
                                <div class="tab-content  py-5" id="product-content">
                                    <h3 class="text-base text-center block lg:hidden border-b border-neutral-50 pb-3 font-semibold mb-5">
                                        Đặc điểm nổi bật
                                    </h3>
                                    <expandable-content max-height="200px">
                                        <div class="expandable-content  mb-3">
                                            <div
                                                class="prose text-base w-full max-w-full content"
                                                id="ega-uti-editable-content"
                                                data-platform="sapo"
                                                data-id="33869948"
                                            >
                                                <section data-element_type="section" data-id="b32eaae">
                                                    {!!languageName($product->content)!!}
                                                </section>
                                                <section data-element_type="section" data-id="6ef5139">
                                            </div>
                                        </div>
                                    </expandable-content>
                                </div>
                            </tabs-component>
                        </div>
                    </div>
                </product-form>
            </div>
        </div>
        <section class="section section-related-products section-products" style="--section-margin: 64px 0 64px 0;--section-margin-mb: 32px 0 32px 0">
            <div class="container">
                <div class="heading-bar py-3 px-5 bg-background text-center rounded-sm mb-2">
                    <h2 class="text-h4 font-semibold text-secondary">
                        <a href="ban-phim.html" title="Sản phẩm liên quan">
                            Sản phẩm liên quan
                        </a>
                    </h2>
                </div>
                <related-products class="releated-products w-full"
                                  data-limit="6"
                >
                    <ega-carousel>
                        <script data-type="swiper-params" type="application/json">
                            {
                              "spaceBetween": 8,
                              "slidesPerView": 2,
                               "breakpoints": {
                                "768": {
                                  "slidesPerView": 2
                                },
                                "1024": {
                                  "slidesPerView": 3
                                },
                                "1200": {
                                  "slidesPerView": 4
                                }
                              }
                            }

                        </script>
                        <div class="swiper md:pb-[var(--spacing-12)]">
                            <div class="swiper-wrapper   product-list h-inherit">
                                @foreach ($productlq as $item)
                                    <div class="item swiper-slide">
                                        @include('layouts.product.item',['pro'=>$item])
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </ega-carousel>
                </related-products>
            </div>
        </section>

        <script>
            function  setProductRecent(){
                try{
                    let productId = '33869948'
                    let storage =  JSON.parse(localStorage.getItem(window.themeConfigs.recentStorage)) || []
                    if(storage  && !storage.includes(productId) ){
                        storage =	[productId].concat(storage)
                        storage.length > 7 && storage.pop()
                        localStorage.setItem(window.themeConfigs.recentStorage, JSON.stringify(storage))
                    }}catch(e){
                    console.log(e)
                }
            }
            setProductRecent()

        </script>
    </main>
@endsection

