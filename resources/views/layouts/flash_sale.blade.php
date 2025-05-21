@extends('layouts.main.master')
@section('title')

@endsection
@section('description')

@endsection
@section('image')

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
                        <a class="link" href="{{ route('home') }}" title="Trang chủ"><span>Trang chủ</span></a>
                        <span class="mx-1 md:mx-2 inline-block">&nbsp;/&nbsp;</span>
                    </li>
                    <li>
                        <span class="text-neutral-100">Flash sale</span>
                    </li>
                </ul>
            </div>
        </div>
        <section class="section section-collection-banner">
            <div class="collection_banner mb-4 md:mb-6  container text-center">
                <a
                    class="banner"
                    href="#"
                    title="Khuyến mãi"
                >

                    @php
                        $img = json_decode($flashSale->images);
                    @endphp

                    <picture>
                        <source
                            media="(min-width: 1200px)"
                            srcset="{{str_replace('http://vpplongnguyen.com.vn', '', $img[0])}}">
                        <source
                            media="(min-width: 768px)"
                            srcset="{{str_replace('http://vpplongnguyen.com.vn', '', $img[0])}}"
                            data-srcset="{{str_replace('http://vpplongnguyen.com.vn', '', $img[0])}}"
                        >
                        <source
                            media="(max-width: 767px)"
                            srcset="{{str_replace('http://vpplongnguyen.com.vn', '', $img[0])}}"
                            data-srcset="{{str_replace('http://vpplongnguyen.com.vn', '', $img[0])}}"
                        >
                        <img
                            class="object-contain mx-auto"
                            src="{{str_replace('http://vpplongnguyen.com.vn', '', $img[0])}}"
                            width="1432"
                            height="120"
                            alt="Khuyến mãi"
                        >
                    </picture>
                </a>
            </div>
        </section>

        <section
            class="section section-flashsale  landing-page-section  relative  w-full"
            id="section-flashsale-0" style="--section-padding: 0;--section-margin: 0 0 0;--section-padding-mb: 0;--section-margin-mb: 0 0 0;--color-flashsale-bg: #000197;--color-flashsale-timer-bg: #ee1926;--color-flashsale-timer: #ffffff;--color-flashsale-process: #ee1926;">
            <flashsale-section data-not-started="show" data-id="section-flashsale-0"
                               data-ended="show" >
                <div class="max-w-full w-full  ">
                    <div class="container">
                        <div
                            class="flex  flex-wrap lg:flex-nowrap items-center justify-center md:justify-between w-full xl:w-10/12  mx-auto mb-4 gap-3 md:gap-4">
                            <div class="flex items-center gap-2 md:gap-3">
                                <img src="/frontend/images/flashsale_icon50e9.png?1746694962638" alt="GIỜ VÀNG DEAL SỐC" width="48"
                                     height="48" class="h-auto">
                                <h2 class="text-h4 text-center lg:text-h1 text-primary font-bold flashsale-heading">
                                    <a href="{{ route('flashSale') }}" title=" {!!languageName($flashSale->name)!!}">

                                        {!!languageName($flashSale->name)!!}
                                    </a>
                                </h2>
                            </div>


                                        <countdown-timer
                                            data-id="section-flashsale-0"
                                            data-countdown-type="hours"
                                            data-start-date="{{ \Carbon\Carbon::parse($flashSale->start_at)->format('d/m/Y') }}"
                                            data-start-time="{{ \Carbon\Carbon::parse($flashSale->start_time)->format('H:i:s') }}"
                                            data-end-time="{{ \Carbon\Carbon::parse($flashSale->end_time)->format('H:i:s') }}"
                                            data-week="0,1,2,3,4,5,6"
                                        >

                                <div class="flashsale__countdown-timer  flex-wrap  flashsale__countdown-wrapper flex items-center gap-2 md:gap-5 lg:w-auto w-full justify-center">
                        <span class="flashsale__countdown-label text-center hidden" data-label="not-started">
                        Chương trình sẽ bắt đầu sau
                        </span>
                                    <span class="flashsale__countdown-label text-center hidden" data-label="ongoing">
                        Nhanh lên nào! <br> <b>Sự kiện sẽ kết thúc sau</b>
                        </span>
                                    <span class="flashsale__countdown-label  text-center hidden" data-label="ended">
                        Chương trình đã kết thúc
                        </span>
                                    <div class="flashsale__countdown hidden">
                                    </div>
                                </div>
                            </countdown-timer>
                        </div>
                    </div>
                    <div class="container md:py-6">
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-gutter {{ $flashSale->status_label != 'ended' ? '' : 'hidden' }}" >
                            @if (count($flashSale->items) > 0)
                                @foreach ($flashSale->items as $item)
                                    @php
                                    $pro = $item->product;
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
                                                                    srcset="{{str_replace('http://vpplongnguyen.com.vn', '', $img[0])}}">
                                                            <img
                                                                class="card-product__image max-h-full w-auto aspect-square object-contain scale-[var(--image-scale)]  absolute top-1/2 left-1/2   -translate-x-1/2 -translate-y-1/2 transition duration-300 ease-out  group-hover/card:opacity-0  "
                                                                width="480"
                                                                height="480"
                                                                decoding="async"
                                                                loading="lazy"
                                                                style="--image-scale:1"
                                                                src="{{str_replace('http://vpplongnguyen.com.vn', '', $img[0])}}"
                                                                alt="{{languageName($pro->name)}}"
                                                            >
                                                        </picture>
                                                        <picture>
                                                            <source media="(max-width: 600px)"
                                                                    srcset="{{str_replace('http://vpplongnguyen.com.vn', '', $img[0])}}">
                                                            <img
                                                                class="card-product__image-2 max-h-full w-auto aspect-square object-contain  opacity-0 scale-[var(--image-scale)]  absolute top-1/2 left-1/2   -translate-x-1/2 -translate-y-1/2 z-[0] group-hover/card:opacity-1 group-hover/card:z-[1] group-hover/card:opacity-100 transition duration-300 ease-out"
                                                                width="480"
                                                                height="480"
                                                                decoding="async"
                                                                loading="lazy"
                                                                style="--image-scale:1"
                                                                src="{{str_replace('http://vpplongnguyen.com.vn', '', $img[0])}}"
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
                                                            {{ $flashSale->status_label == 'upcoming' ? 'disabled' : '' }}
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

                                @endforeach
                            @endif
                        </div>

                        <div class="flashsale-end-message {{ $flashSale->status_label == 'ended' ? '' : 'hidden' }}  ">
                            <div class=" text-center py-6  p-gutter w-full h-full relative mx-auto z-0 rounded">
                                <p class="text-h4 font-semibold">
                                    Flash Sale đã kết thúc
                                </p>
                                <p>
                                    Hãy quay lại vào các chương trình Flash sale sau bạn nhé!
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </flashsale-section>
        </section>

    </main>
@endsection

