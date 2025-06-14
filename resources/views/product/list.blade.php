@extends('layouts.main.master')
@section('title')
{{$title}}
@endsection
@section('description')
Danh sách {{$title}}
@endsection
@section('image')
{{url(''.$setting->logo)}}
@endsection
@section('js')
@endsection
@section('css')
<link href="{{asset('frontend/css/sidebar_style.scss.css?1663035745304')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('frontend/css/collection_style.scss.css?1663035745304')}}" rel="stylesheet" type="text/css" />
<link rel="preload" as='style' type="text/css" href="{{asset('frontend/css/sidebar_style.scss.css?1663035745304')}}">
<link rel="preload" as='style' type="text/css" href="{{asset('frontend/css/collection_style.scss.css?1663035745304')}}">
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
               <span class="text-neutral-100">
              {{$title}}          </span>
                    </li>
                </ul>
            </div>
        </div>
        <section class="section section-collection-banner">
        </section>
        <section class="section section-coupons" style="--section-padding: 0;--section-margin: 30px 0 30px;--section-padding-mb: 0;--section-margin-mb: 0 0 0;">
            <div class="container">
                <ega-carousel>
                    <script data-type="swiper-params" type="application/json">
                        {
                          "speed": 1000,
                          "spaceBetween": 8,
                          "slidesPerView": 1,
                        "centerInsufficientSlides": true,
                        "preventClicks" : false,

                          "pagination": {
                            "el": ".section-coupons .swiper-pagination",
                            "clickable": true
                          },
                          "breakpoints": {
                            "768": {
                              "slidesPerView": 2.5
                            },
                            "1024": {
                              "slidesPerView": 3.5
                            },
                            "1200": {
                              "slidesPerView": 4
                            }
                          }
                        }
                    </script>

                </ega-carousel>
            </div>
        </section>
        <section class="section" id="product-list-3257346" style="--section-margin: 32px 0 32px 0;--section-margin-mb: 32px 0 32px 0">
            <div class="container">
                <div class="grid grid-cols-1  xl:grid-cols-[9fr_3fr]  gap-gutter">
                    <div>
                        <div class="heading-bar mb-2 py-3 md:px-5 md:bg-background  rounded-sm flex flex-wrap items-center gap-6">
                            <h1 class="text-h4 font-semibold text-secondary">
                                {{$title}}
                            </h1>
                        </div>
                        <div class="filter-items overflow-hidden">
                        </div>
                        <div class="product-list" >
                            <div  class="grid grid-cols-2 lg:grid-cols-4    xl:grid-cols-4   gap-2 mt-2 ">
                                @if (count($list) > 0)
                                    @foreach ($list as $item)
                                            @include('layouts.product.item',['pro'=>$item])
                                    @endforeach
                                @endif

                                    <style>
                                        /* Container phân trang */
                                        .product-pagination {
                                            margin: 20px 0;
                                            text-align: center;
                                        }

                                        /* Danh sách trang */
                                        .product-pagination .pagination-list {
                                            display: inline-flex;
                                            flex-wrap: wrap;
                                            list-style: none;
                                            padding: 0;
                                            margin: 0;
                                        }

                                        /* Mỗi nút trang */
                                        .product-pagination .page-item {
                                            margin: 0 4px;
                                        }

                                        /* Link trang */
                                        .product-pagination .page-item a {
                                            display: block;
                                            padding: 8px 12px;
                                            font-size: 14px;
                                            color: #e10600;          /* đỏ chủ đạo */
                                            background-color: #fff;
                                            border: 1px solid #e10600;
                                            border-radius: 4px;
                                            text-decoration: none;
                                            transition: background-color .2s, color .2s;
                                        }

                                        /* Trạng thái hover */
                                        .product-pagination .page-item a:hover:not(.disabled) {
                                            background-color: #e10600;
                                            color: #fff;
                                        }

                                        /* Trang hiện tại */
                                        .product-pagination .page-item.active a {
                                            background-color: #e10600;
                                            color: #fff;
                                            cursor: default;
                                        }

                                        /* Trang không khả dụng (disabled) */
                                        .product-pagination .page-item.disabled a {
                                            color: #ccc;
                                            border-color: #ccc;
                                            cursor: not-allowed;
                                        }

                                        /* Responsive: thu gọn padding trên mobile */
                                        @media (max-width: 576px) {
                                            .product-pagination .page-item a {
                                                padding: 6px 8px;
                                                font-size: 12px;
                                            }
                                        }

                                    </style>

                                <div class="mt-6 lg:pt-6" style="grid-column: 1 / -1">
                                    {{ $list->links('layouts.pagination.paginate') }}


                                </div>





                            </div>
                        </div>
                    </div>


                    <div class="blog-sidebar w-full ml-auto   xl:max-w-[32rem]">
                        <div class="bg-background mb-5  h-auto px-5  z-10 relative flex flex-col rounded-sm">
                            <aside class="aside-item blog-sidebar aside-item md:py-5 py-4">
                                <div class="aside-title">
                                    <h2 class="title-head margin-top-0 text-base font-semibold mb-3">
                                        <span>Danh mục</span>
                                    </h2>
                                </div>
                                <div class="aside-content">
                                    <nav class="nav-category navbar-toggleable-md">
                                        <ul class="space-y-3 ">
                                            @foreach ($categoryhome as $item)
                                                @if (count($item->typeCate) > 0)
                                                    <li class="nav-item ">
                                                        <details>
                                                            <summary class="flex items-center justify-between">
                                                                <a href="{{route('allListProCate',['danhmuc'=>$item->slug])}}" class=" nav-link link ">
                                                                    {{languageName($item->name)}}
                                                                </a>
                                                                <i class="icon icon-carret-right summary-icon cursor-pointer transition duration-150"></i>
                                                            </summary>
                                                            <ul class="dropdown-menu mt-3 pl-2">
                                                                @foreach ($item->typeCate as $type)
                                                                    <li class="nav-item">
                                                                        <a class="nav-link link" href="{{route('allListType',['danhmuc'=>$item->slug,'loaidanhmuc'=>$type->slug])}}">{{languageName($type->name)}}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </details>
                                                    </li>
                                                @else
                                                    <li class="nav-item">
                                                        <a class="nav-link link" href="{{route('allListProCate',['danhmuc'=>$item->slug])}}">  {{languageName($item->name)}} </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </nav>
                                </div>
                            </aside>

                        </div>
                    </div>

                </div>
            </div>
        </section>


        <section class="section section-collection-list" style="--section-padding: 0;--section-margin: 64px 0 64px;--section-padding-mb: 0;--section-margin-mb: 32px 0 32px;	--color-collection-item: transparent;	--grid-col-desktop:repeat(auto-fit, minmax(calc(100% / 8 - 1px ), 1fr));	--grid-col-mobile:repeat(8,clamp(8rem, 18vw, calc(100vw /  4 ))); ">
            <div class="container overflow-hidden md:px-container px-0">
                <div class="overflow-auto md:px-0 px-container">
                    <div
                        class="collection-list    grid mx-auto grid-cols-[var(--grid-col-mobile)]  lg:grid-cols-[var(--grid-col-desktop)] gap-[1px] rounded overflow-auto "
                    >
                        @foreach ($categoryhome as $item)
                            <a
                                href="{{route('allListProCate',['danhmuc'=>$item->slug])}}"
                                title="{{languageName($item->name)}}"
                                class="collection-item bg-background text-center flex flex-col items-center gap-1 lg:gap-3 p-2 xl:p-6 group hover:brightness-[0.98] "
                            >
                                <div class="collection-item-thumb w-[5.2rem] h-[5.2rem] lg:w-[8.8rem] lg:h-[8.8rem]  flex items-center justify-center">
                                    <img
                                        class="object-contain transition-transform relative z-10 group-hover:scale-110 duration-200"
                                        width="88"
                                        height="88"
                                        src="{{$item->avatar}}"
                                        alt="Laptop"
                                        loading="lazy"
                                    >
                                </div>
                                <span class="text-xs lg:text-base line-clamp-2"> {{languageName($item->name)}} </span>
                            </a>
                        @endforeach


                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection

