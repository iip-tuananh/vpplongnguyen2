@extends('layouts.main.master')
@section('title')
{{$setting->company}}
@endsection
@section('description')
{{$setting->webname}}
@endsection
@section('image')
{{url(''.$banner[0]->image)}}
@endsection
@section('css')
@endsection
@section('script')
@endsection
@section('content')
    <main>
        <h1 class="hidden">EGA Gear - Giao diện thiết kế tối ưu cho ngành hàng công nghệ, sản phẩm công thái học,..</h1>
        <section class="section-home-banner section" style="--section-padding: 0;--section-margin: 0 0 0;--section-padding-mb: 0;--section-margin-mb: 0;">
            <slideshow-component style="--bg-image:url(/frontend/images/home_slider_150e9.jpg?1746694962638) ">
                <div class="relative slideshow-wrapper bg-no-repeat  bg-cover bg-none md:bg-image transition-all ease-linear duration-300">
                    <div class="slideshow-background absolute h-full w-full bg-[rgba(0,0,0,0.6)] backdrop-blur hidden md:block"></div>
                    <div class="container flex lg:flex-nowrap flex-wrap gap-gutter md:py-[var(--spacing-10)] py-3 relative z-10">
                        <div class="w-full lg:w-9/12 ">
                            <ega-carousel>
                                <script data-type="swiper-params" type="application/json">
                                    {
                                    "loop": true,
                                    "speed": 1200,
                                    "spaceBetween": 8,
                                    "observer": true,
                                    "observeParents": true,

                                    "autoplay": {
                                        "delay": 2500,
                                        "pauseOnMouseEnter": true
                                    },

                                    "loop": true


                                }
                                </script>
                                <div class=" w-full swiper overflow-hidden ">
                                    <div class="swiper-wrapper  ">
                                        <div class="swiper-slide overflow-hidden rounded-sm"  style="aspect-ratio: 1064 / 533 "  >
                                            <a class="block" href="collections/all.html" title="acer-giam-soc-2024">
                                                <picture>
                                                    <source media="(max-width: 480px)" srcset="../bizweb.dktcdn.net/thumb/grande/100/502/483/themes/1011801/assets/home_slider_150e9.jpg?1746694962638">
                                                    <img
                                                        class="block mx-auto w-auto object-contain hover:scale-105 transition-transform  duration-500  transition-time ease-linear"
                                                        width="1064"
                                                        height="533"
                                                        src="/frontend/images/home_slider_150e9.jpg?1746694962638"
                                                        alt="acer-giam-soc-2024"
                                                        fetchpriority= "high"
                                                    >
                                                </picture>
                                            </a>
                                        </div>
                                        <div class="swiper-slide overflow-hidden rounded-sm"  style="aspect-ratio: 1064 / 533 "  >
                                            <a class="block" href="collections/all.html" title="lg-gia-tot-chot-ngay">
                                                <picture>
                                                    <source media="(max-width: 480px)" srcset="../bizweb.dktcdn.net/thumb/grande/100/502/483/themes/1011801/assets/home_slider_250e9.jpg?1746694962638">
                                                    <img
                                                        class="block mx-auto w-auto object-contain hover:scale-105 transition-transform  duration-500  transition-time ease-linear"
                                                        loading="lazy"
                                                        width="1064"
                                                        height="533"
                                                        src="/frontend/images/home_slider_250e9.jpg?1746694962638"
                                                        alt="lg-gia-tot-chot-ngay"
                                                        fetchpriority= "high"
                                                    >
                                                </picture>
                                            </a>
                                        </div>
                                        <div class="swiper-slide overflow-hidden rounded-sm  swiper-hidden-desktop" >
                                            <a href="collections/all.html" title="banner-1" >
                                                <img
                                                    class="block mx-auto w-auto object-contain hover:scale-105 transition-transform  duration-500  transition-time ease-linear"
                                                    loading="lazy"
                                                    width="1064"
                                                    height="533"
                                                    src="/frontend/images/home_side_banner_150e9.jpg?1746694962638"
                                                    alt="banner-1"
                                                >
                                            </a>
                                        </div>
                                        <div class="swiper-slide overflow-hidden rounded-sm  swiper-hidden-desktop" >
                                            <a href="collections/all.html" title="banner-2" >
                                                <img
                                                    class="block mx-auto w-auto object-contain hover:scale-105 transition-transform  duration-500  transition-time ease-linear"
                                                    loading="lazy"
                                                    width="1064"
                                                    height="533"
                                                    src="/frontend/images/home_side_banner_250e9.jpg?1746694962638"
                                                    alt="banner-2"
                                                >
                                            </a>
                                        </div>
                                        <div class="swiper-slide overflow-hidden rounded-sm  swiper-hidden-desktop" >
                                            <a href="collections/all.html" title="banner-3" >
                                                <img
                                                    class="block mx-auto w-auto object-contain hover:scale-105 transition-transform  duration-500  transition-time ease-linear"
                                                    loading="lazy"
                                                    width="1064"
                                                    height="533"
                                                    src="/frontend/images/home_side_banner_350e9.jpg?1746694962638"
                                                    alt="banner-3"
                                                >
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </ega-carousel>
                        </div>
                        <div class="hidden md:flex w-100 lg:w-3/12 ">
                            <div class="gap-2 flex lg:flex-col justify-center lg:justify-start items-center">
                                <a href="collections/all.html" title="banner-1" class="block overflow-hidden rounded-sm" style="aspect-ratio: 344 / 172 ">
                                    <img
                                        class="block rounded-sm mx-auto object-contain hover:scale-105 transition-transform  duration-300  transition-time ease-linear max-w-full"
                                        loading="lazy"
                                        width="344"
                                        height="172"
                                        src="/frontend/images/home_side_banner_150e9.jpg?1746694962638"
                                        alt="banner-1"
                                        fetchpriority= "high"
                                        decoding="async"
                                    >
                                </a>
                                <a href="collections/all.html" title="banner-2" class="block overflow-hidden rounded-sm" style="aspect-ratio: 344 / 172 ">
                                    <img
                                        class="block rounded-sm mx-auto object-contain hover:scale-105 transition-transform  duration-300  transition-time ease-linear max-w-full"
                                        loading="lazy"
                                        width="344"
                                        height="172"
                                        src="/frontend/images/home_side_banner_250e9.jpg?1746694962638"
                                        alt="banner-2"
                                        fetchpriority= "high"
                                        decoding="async"
                                    >
                                </a>
                                <a href="collections/all.html" title="banner-3" class="block overflow-hidden rounded-sm" style="aspect-ratio: 344 / 172 ">
                                    <img
                                        class="block rounded-sm mx-auto object-contain hover:scale-105 transition-transform  duration-300  transition-time ease-linear max-w-full"
                                        loading="lazy"
                                        width="344"
                                        height="172"
                                        src="/frontend/images/home_side_banner_350e9.jpg?1746694962638"
                                        alt="banner-3"
                                        fetchpriority= "high"
                                        decoding="async"
                                    >
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </slideshow-component>
        </section>
        <section class="section section-polices overflow-hidden" style="--section-padding: 0;--section-margin: -30px 0 40px;--section-padding-mb: 0;--section-margin-mb: 0 0 0;">
            <div class="container md:px-container px-0">
                <div class="text-w-icon text-w-icon--style-1  md:px-0 px-container w-auto  ">
                    <ega-carousel>
                        <script data-type="swiper-params" type="application/json">
                            {
                            "slidesPerView": 1.5,
                            "breakpoints": {
                                "768": {
                                    "slidesPerView": 2.5
                                },
                                "1024": {
                                    "slidesPerView": 3.5
                                },
                                "1200" : {
                                    "slidesPerView": 5,
                                    "simulateTouch":false
                                }
                            }
                        }
                        </script>
                        <div class="swiper  bg-background rounded-sm ">
                            <div class="swiper-wrapper h-auto ">
                                <div class="swiper-slide mx-auto w-auto inline-flex h-inherit flex-nowrap item relative  gap-4 items-center py-3 md:py-4 px-4 xl:px-[var(--spacing-8)] ">
                                    <div class="w-6  flex-grow-0 flex-shrink-0">
                                        <img
                                            class="object-contain"
                                            loading="lazy"
                                            width="24"
                                            height="24"
                                            src="/frontend/images/policies_icon_150e9.png?1746694962638"
                                            alt="Giao hàng miễn phí trong 24h (chỉ áp dụng khu vực nội thành)"
                                        >
                                    </div>
                                    <div class="">
                                        <span class="font-semibold block">GIAO HỎA TỐC</span>
                                        <span class="text-xs">Nội thành TP. HCM trong 4h</span>
                                    </div>
                                </div>
                                <div class="swiper-slide mx-auto w-auto inline-flex h-inherit flex-nowrap item relative  gap-4 items-center py-3 md:py-4 px-4 xl:px-[var(--spacing-8)] ">
                                    <div class="w-6  flex-grow-0 flex-shrink-0">
                                        <img
                                            class="object-contain"
                                            loading="lazy"
                                            width="24"
                                            height="24"
                                            src="/frontend/images/policies_icon_250e9.png?1746694962638"
                                            alt="Giao hàng miễn phí trong 24h (chỉ áp dụng khu vực nội thành)"
                                        >
                                    </div>
                                    <div class="">
                                        <span class="font-semibold block">TRẢ GÓP ƯU ĐÃI%</span>
                                        <span class="text-xs">Hỗ trợ vay với lãi suất thấp</span>
                                    </div>
                                </div>
                                <div class="swiper-slide mx-auto w-auto inline-flex h-inherit flex-nowrap item relative  gap-4 items-center py-3 md:py-4 px-4 xl:px-[var(--spacing-8)] ">
                                    <div class="w-6  flex-grow-0 flex-shrink-0">
                                        <img
                                            class="object-contain"
                                            loading="lazy"
                                            width="24"
                                            height="24"
                                            src="/frontend/images/policies_icon_350e9.png?1746694962638"
                                            alt="Giao hàng miễn phí trong 24h (chỉ áp dụng khu vực nội thành)"
                                        >
                                    </div>
                                    <div class="">
                                        <span class="font-semibold block">DEAL HOT BÙNG NỔ</span>
                                        <span class="text-xs">Flash sale giảm giá cực sốc </span>
                                    </div>
                                </div>
                                <div class="swiper-slide mx-auto w-auto inline-flex h-inherit flex-nowrap item relative  gap-4 items-center py-3 md:py-4 px-4 xl:px-[var(--spacing-8)] ">
                                    <div class="w-6  flex-grow-0 flex-shrink-0">
                                        <img
                                            class="object-contain"
                                            loading="lazy"
                                            width="24"
                                            height="24"
                                            src="/frontend/images/policies_icon_450e9.png?1746694962638"
                                            alt="Giao hàng miễn phí trong 24h (chỉ áp dụng khu vực nội thành)"
                                        >
                                    </div>
                                    <div class="">
                                        <span class="font-semibold block">MIỄN PHÍ ĐỔI TRẢ</span>
                                        <span class="text-xs">Trong vòng 30 ngày miễn phí</span>
                                    </div>
                                </div>
                                <div class="swiper-slide mx-auto w-auto inline-flex h-inherit flex-nowrap item relative  gap-4 items-center py-3 md:py-4 px-4 xl:px-[var(--spacing-8)] ">
                                    <div class="w-6  flex-grow-0 flex-shrink-0">
                                        <img
                                            class="object-contain"
                                            loading="lazy"
                                            width="24"
                                            height="24"
                                            src="/frontend/images/policies_icon_550e9.png?1746694962638"
                                            alt="Giao hàng miễn phí trong 24h (chỉ áp dụng khu vực nội thành)"
                                        >
                                    </div>
                                    <div class="">
                                        <span class="font-semibold block">HỖ TRỢ 24/7</span>
                                        <span class="text-xs">Hỗ trợ khách hàng 24/7</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ega-carousel>
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

        <section
            class="section section-flashsale   overflow-hidden  relative  w-full"
            id="section-flashsale-3376595"
            style="--section-padding: 0;--section-margin: 64px 0 64px;--section-padding-mb: 0;--section-margin-mb: 32px 0 32px;--color-flashsale-bg: #000197;--color-flashsale-timer-bg: #ee1926;--color-flashsale-timer: #ffffff;--color-flashsale-process: #ee1926;"
        >
            <flashsale-tabs>
                <div class="container ">
                    <div class="flex  flex-wrap lg:flex-nowrap items-center justify-center lg:justify-between xl:w-10/12  mx-auto mb-4 gap-3 md:gap-4">
                        <div class="flex items-center gap-2 md:gap-3">
                            <img
                                src="/frontend/images/flashsale_icon50e9.png?1746694962638"
                                alt="SIÊU SALE BÙNG NỔ"
                                width="48"
                                height="48"
                                class="h-auto"
                            >
                            <h2 class="text-h4 text-center lg:text-h1 text-primary font-bold flashsale-heading">
                                <a href="collections/all.html" title="GIỜ VÀNG DEAL SỐC">
                                    SIÊU SALE BÙNG NỔ           </a>
                            </h2>
                        </div>

                        <div>
                            <countdown-timer data-id="section-flashsale-1"
                                             data-countdown-type="dates"
                                             data-start-date="09/05/2025 00:00:00"
                                             data-end-date="12/05/2025 00:00:00"
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

                            <countdown-timer data-id="section-flashsale-2"
                                             data-countdown-type="dates"
                                             data-start-date="12/05/2025 00:00:00"
                                             data-end-date="15/05/2025 00:00:00"
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

                            <countdown-timer data-id="section-flashsale-3"
                                             data-countdown-type="dates"
                                             data-start-date="15/05/2025 00:00:00"
                                             data-end-date="18/05/2025 00:00:00"
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
                    <div class="flashsale-nav text-primary bg-relative xl:w-10/12  mx-auto overflow-hidden mb-4 ">
                        <ul class=" grid grid-cols-3 text-center gap-3 md:gap-4 overflow-auto">
                            <li aria-controls="section-flashsale-1" class="tab-btn flashsale-tab text-primary py-1.5 relative z-[1]">
                                <span class="block md:text-h4 font-semibold ">07/01 - 08/01</span>
                                <span class="status opacity-0 md:text-h-5 font-semibold">
                           Đã kết thúc
                           </span>
                            </li>
                            <li aria-controls="section-flashsale-2" class="tab-btn flashsale-tab text-primary py-1.5 relative z-[1]">
                                <span class="block md:text-h4 font-semibold ">09/01 - 11/01</span>
                                <span class="status opacity-0 md:text-h-5 font-semibold">
                           Đã kết thúc
                           </span>
                            </li>
                            <li aria-controls="section-flashsale-3" class="tab-btn flashsale-tab text-primary py-1.5 relative z-[1]">
                                <span class="block md:text-h4 font-semibold ">12/01 - 15/01</span>
                                <span class="status opacity-0 md:text-h-5 font-semibold">
                           Đã kết thúc
                           </span>
                            </li>
                        </ul>
                    </div>
                    <div class="relative items-start py-[var(--spacing-5-5)]  lg:py-0  lg:mx-0 mx-[calc(var(--container-padding)*-1)]">
                        <div
                            class="flashsale-background w-full h-full xl:w-10/12 absolute top-0 left-0 lg:left-1/2 lg:top-1/2   lg:-translate-x-1/2  lg:-translate-y-1/2 bg-[var(--color-flashsale-bg)] z-0 lg:rounded-[2.4rem]"
                        ></div>
                        <div class="overflow-hidden lg:px-0 px-[var(--container-padding)]">
                            <div class="tab-content " id="section-flashsale-1">
                                <ega-carousel>
                                    <script data-type="swiper-params" type="application/json">
                                        {
                                        "speed": 1000,
                                        "spaceBetween": 12,
                                        "slidesPerView": 1.5,
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
                                    <div class="swiper  container px-0 overflow-hidden md:py-[var(--spacing-10)]">
                                        <div class=" swiper-wrapper gap-gutter grid md:grid-cols-[repeat(4,38%)] md:auto-cols-[38%] lg:auto-cols-[25%] lg:grid-cols-[repeat(4,25%)]   grid grid-cols-[repeat(2,65.5%)] grid-flow-col auto-cols-[65%]  h-inherit  py-4  ">
                                            <div class="relative h-inherit flashsale__item swiper-slide flex-shrink-0 flex-grow-0" >
                                                <card-product class="h-full"   data-prefetch="/tai-nghe-edifier-w830bt"
                                                >
                                                    <div
                                                        class=" item_product_main card-product card-product--vertical relative transition-transform duration-200 ease-in-out rounded-sm h-full
                                             h-full
                                             "
                                                    >
                                                        <form
                                                            action="https://ega-gear.mysapo.net/cart/add"
                                                            method="post"
                                                            data-id="product-actions-33999877"
                                                            enctype="multipart/form-data"
                                                            class="bg-background relative z-10 m-0  rounded-sm h-full"
                                                        >
                                                            <div class="card-product__top relative rounded-tr-sm rounded-tl-sm overflow-hidden group/card  ">
                                                                <a
                                                                    class="link aspect-square flex items-center justify-center w-full"
                                                                    href="tai-nghe-edifier-w830bt.html"
                                                                    title="Tai nghe Edifier W830BT"
                                                                >
                                                                    <div class="card-product__badges absolute top-2 left-2 z-10 flex items-center gap-2">
                                                                    </div>
                                                                    <img class="product-frame w-full aspect-square object-contain absolute  top-1/2 left-1/2   -translate-x-1/2 -translate-y-1/2 z-10"
                                                                         src="/frontend/images/frame_150e9.png?1746694962638" alt=""
                                                                         loading="lazy"
                                                                         width="480"
                                                                         height="480"
                                                                    />
                                                                    <picture>
                                                                        <source media="(max-width: 600px)" srcset="//bizweb.dktcdn.net/thumb/medium/100/502/483/products/tai-nghe-edifier-w830bt-1-jpg-v-1658377631820.jpg?v=1703666866147">
                                                                        <img
                                                                            class="card-product__image max-h-full w-auto aspect-square object-contain scale-[var(--image-scale)]  absolute top-1/2 left-1/2   -translate-x-1/2 -translate-y-1/2 transition duration-300 ease-out  group-hover/card:opacity-0  "
                                                                            width="480"
                                                                            height="480"
                                                                            decoding="async"
                                                                            loading="lazy"
                                                                            style="--image-scale:1"
                                                                            src="../bizweb.dktcdn.net/thumb/large/100/502/483/products/tai-nghe-edifier-w830bt-1-jpg-v-1658377631820247f.jpg?v=1703666866147"
                                                                            alt="Tai nghe Edifier W830BT"
                                                                        >
                                                                    </picture>
                                                                    <picture>
                                                                        <source media="(max-width: 600px)" srcset="../bizweb.dktcdn.net/thumb/medium/100/502/483/products/tai-nghe-edifier-w830bt-5-jpg-v-1658377631820b728.jpg?v=1703666878963">
                                                                        <img
                                                                            class="card-product__image-2 max-h-full w-auto aspect-square object-contain  opacity-0 scale-[var(--image-scale)]  absolute top-1/2 left-1/2   -translate-x-1/2 -translate-y-1/2 z-[0] group-hover/card:opacity-1 group-hover/card:z-[1] group-hover/card:opacity-100 transition duration-300 ease-out"
                                                                            width="480"
                                                                            height="480"
                                                                            decoding="async"
                                                                            loading="lazy"
                                                                            style="--image-scale:1"
                                                                            src="../bizweb.dktcdn.net/thumb/large/100/502/483/products/tai-nghe-edifier-w830bt-5-jpg-v-1658377631820b728.jpg?v=1703666878963"
                                                                            alt="Tai nghe Edifier W830BT"
                                                                        >
                                                                    </picture>
                                                                </a>
                                                                <div class="card-product__utilites absolute top-2 right-2 z-10 hidden lg:flex flex-col items-center gap-2 transition duration-300 ease-out">
                                                                    <portal-opener>
                                                                        <button
                                                                            aria-label="Xem nhanh"
                                                                            type="button"
                                                                            data-product="/tai-nghe-edifier-w830bt"
                                                                            data-portal="#quick-view-product"
                                                                            class="quick-view border bg-background rounded-full  flex items-center justify-center relative active:scale-95 transition-transform "
                                                                        >
                                                                            <i class="icon icon-eye"></i>
                                                                            <span class="absolute opacity-0  bg-black py-1 px-3 whitespace-nowrap transition ease-out duration-300 "
                                                                            >Xem nhanh</span
                                                                            >
                                                                        </button>
                                                                    </portal-opener>
                                                                    <compare-button>
                                                                        <button
                                                                            aria-label="So sánh"
                                                                            type="button"
                                                                            data-product="33999877"
                                                                            data-product-type="tai-nghe"
                                                                            data-portal="#quick-view-compare"
                                                                            class="add-compare border bg-background rounded-full flex items-center justify-center active:scale-95 transition-transform "
                                                                        >
                                                                            <i class="icon icon-arrow-swap"></i>
                                                                            <span class="absolute opacity-0  bg-black py-1 px-3 whitespace-nowrap transition ease-out duration-300"
                                                                            >So sánh</span
                                                                            >
                                                                        </button>
                                                                    </compare-button>
                                                                </div>
                                                            </div>
                                                            <a
                                                                class="link"
                                                                href="tai-nghe-edifier-w830bt.html"
                                                                title="Tai nghe Edifier W830BT"
                                                            >
                                                                <div class="card-product__body flex flex-col gap-2 px-2 py-2  md:gap-2 md:px-5 md:py-4">
                                                                    <div class="card-product__title text-base font-semibold line-clamp-2 ">
                                                                        Tai nghe Edifier W830BT
                                                                    </div>
                                                                    <div class="price-box flex justify-between items-center">
                                                                        <div class="flex flex-col gap-1 ">
                                                                            <span class="price">4.350.000₫</span>
                                                                            <span class="compare-price line-through font-semibold">5.220.000₫</span>
                                                                        </div>
                                                                        <div class="badge sale-badge font-semibold text-xs md:text-sm  p-1  md:px-2 md:py-1.5">
                                                                            -17%
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-product__option-wrapper flex flex-wrap  gap-2 py-1 w-full items-center">
                                                                        <div data-variantId="106245522" data-image="//bizweb.dktcdn.net/thumb/grande/100/502/483/products/tai-nghe-edifier-w830bt-1-jpg-v-1658377631820.jpg?v=1703666866147" class="card-product__option selected relative group/option " style="--color-swatch: var(--swatch-trang)">
                                                            <span class="card-product__option-name whitespace-nowrap px-1.5 py-1 absolute  left-1/2 -translate-x-1/2 rounded-sm bg-black text-xs text-white opacity-0  group-hover/option:opacity-100  -top-[2.6rem] transition duration-300 ease-out ">
                                                            Trắng
                                                            </span>
                                                                            <div
                                                                                class="card-product__option-dot card-product__option-dot-lg w-5 h-5 md:w-6 md:h-6    bg-[var(--color-swatch)] border border-neutral-50  rounded-full  overflow-hidden cursor-pointer"
                                                                            >
                                                                                <img class="aspect-square object-cover w-full h-full" width="48" height="48" src="../bizweb.dktcdn.net/thumb/small/100/502/483/products/tai-nghe-edifier-w830bt-1-jpg-v-1658377631820247f.jpg?v=1703666866147" alt="Trắng" loading="lazy" />
                                                                            </div>
                                                                        </div>
                                                                        <div data-variantId="106245603" data-image="//bizweb.dktcdn.net/thumb/grande/100/502/483/products/tai-nghe-edifier-w830bt-5-jpg-v-1658377631820.jpg?v=1703666878963" class="card-product__option selected relative group/option " style="--color-swatch: var(--swatch-den)">
                                                            <span class="card-product__option-name whitespace-nowrap px-1.5 py-1 absolute  left-1/2 -translate-x-1/2 rounded-sm bg-black text-xs text-white opacity-0  group-hover/option:opacity-100  -top-[2.6rem] transition duration-300 ease-out ">
                                                            Đen
                                                            </span>
                                                                            <div
                                                                                class="card-product__option-dot card-product__option-dot-lg w-5 h-5 md:w-6 md:h-6    bg-[var(--color-swatch)] border border-neutral-50  rounded-full  overflow-hidden cursor-pointer"
                                                                            >
                                                                                <img class="aspect-square object-cover w-full h-full" width="48" height="48" src="../bizweb.dktcdn.net/thumb/small/100/502/483/products/tai-nghe-edifier-w830bt-5-jpg-v-1658377631820b728.jpg?v=1703666878963" alt="Đen" loading="lazy" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <stock-countdown class="stock-countdown"   data-id="section-flashsale-1" data-product-id="33999877" data-type="tag" data-max-qty="720"
                                                                                     data-real-qty="0" data-available="true"  >
                                                                    </stock-countdown>
                                                                </div>
                                                            </a>
                                                            <div class="card-product__bottom w-full px-2 md:px-5 left-0 lg:block hidden">
                                                                <input type="hidden" name="variantId" value="106245522" />
                                                                <button
                                                                    class="btn bg- w-full addtocart-btn font-semibold add_to_cart  flex justify-center items-center gap-3"
                                                                    aria-label="Tùy chọn"
                                                                    data-product="/tai-nghe-edifier-w830bt"
                                                                    data-portal="#quick-view-product"
                                                                    data-action="quickview"
                                                                >
                                                   <span class="loading-icon gap-1 hidden items-center justify-center">
                                                   <span class="w-1.5 h-1.5 bg-[currentColor] rounded-full animate-pulse"></span>
                                                   <span class="w-1.5 h-1.5 bg-[currentColor] rounded-full animate-pulse"></span>
                                                   <span class="w-1.5 h-1.5 bg-[currentColor] rounded-full animate-pulse"></span>
                                                   </span>
                                                                    <span>
                                                   Tùy chọn
                                                   </span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </card-product>
                                            </div>
                                        </div>
                                        <div class="swiper-button-prev md:flex hidden"></div>
                                        <div class="swiper-button-next  md:flex hidden"></div>
                                    </div>
                                </ega-carousel>
                            </div>
                            <div class="tab-content hidden" id="section-flashsale-2">
                                <ega-carousel>
                                    <script data-type="swiper-params" type="application/json">
                                        {
                                        "speed": 1000,
                                        "spaceBetween": 12,
                                        "slidesPerView": 1.5,
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
                                    <div class="swiper  container px-0 overflow-hidden md:py-[var(--spacing-10)]">
                                        <div class=" swiper-wrapper gap-gutter grid md:grid-cols-[repeat(4,38%)] md:auto-cols-[38%] lg:auto-cols-[25%] lg:grid-cols-[repeat(4,25%)]   grid grid-cols-[repeat(2,65.5%)] grid-flow-col auto-cols-[65%]  h-inherit  py-4  ">
                                            <div class="relative h-inherit flashsale__item swiper-slide flex-shrink-0 flex-grow-0" >
                                                <card-product class="h-full"   data-prefetch="/tai-nghe-edifier-w830bt"
                                                >
                                                    <div
                                                        class=" item_product_main card-product card-product--vertical relative transition-transform duration-200 ease-in-out rounded-sm h-full
                                             h-full
                                             "
                                                    >
                                                        <form
                                                            action="https://ega-gear.mysapo.net/cart/add"
                                                            method="post"
                                                            data-id="product-actions-33999877"
                                                            enctype="multipart/form-data"
                                                            class="bg-background relative z-10 m-0  rounded-sm h-full"
                                                        >
                                                            <div class="card-product__top relative rounded-tr-sm rounded-tl-sm overflow-hidden group/card  ">
                                                                <a
                                                                    class="link aspect-square flex items-center justify-center w-full"
                                                                    href="tai-nghe-edifier-w830bt.html"
                                                                    title="Tai nghe Edifier W830BT"
                                                                >
                                                                    <div class="card-product__badges absolute top-2 left-2 z-10 flex items-center gap-2">
                                                                    </div>
                                                                    <img class="product-frame w-full aspect-square object-contain absolute  top-1/2 left-1/2   -translate-x-1/2 -translate-y-1/2 z-10"
                                                                         src="/frontend/images/frame_150e9.png?1746694962638" alt=""
                                                                         loading="lazy"
                                                                         width="480"
                                                                         height="480"
                                                                    />
                                                                    <picture>
                                                                        <source media="(max-width: 600px)" srcset="//bizweb.dktcdn.net/thumb/medium/100/502/483/products/tai-nghe-edifier-w830bt-1-jpg-v-1658377631820.jpg?v=1703666866147">
                                                                        <img
                                                                            class="card-product__image max-h-full w-auto aspect-square object-contain scale-[var(--image-scale)]  absolute top-1/2 left-1/2   -translate-x-1/2 -translate-y-1/2 transition duration-300 ease-out  group-hover/card:opacity-0  "
                                                                            width="480"
                                                                            height="480"
                                                                            decoding="async"
                                                                            loading="lazy"
                                                                            style="--image-scale:1"
                                                                            src="../bizweb.dktcdn.net/thumb/large/100/502/483/products/tai-nghe-edifier-w830bt-1-jpg-v-1658377631820247f.jpg?v=1703666866147"
                                                                            alt="Tai nghe Edifier W830BT"
                                                                        >
                                                                    </picture>
                                                                    <picture>
                                                                        <source media="(max-width: 600px)" srcset="../bizweb.dktcdn.net/thumb/medium/100/502/483/products/tai-nghe-edifier-w830bt-5-jpg-v-1658377631820b728.jpg?v=1703666878963">
                                                                        <img
                                                                            class="card-product__image-2 max-h-full w-auto aspect-square object-contain  opacity-0 scale-[var(--image-scale)]  absolute top-1/2 left-1/2   -translate-x-1/2 -translate-y-1/2 z-[0] group-hover/card:opacity-1 group-hover/card:z-[1] group-hover/card:opacity-100 transition duration-300 ease-out"
                                                                            width="480"
                                                                            height="480"
                                                                            decoding="async"
                                                                            loading="lazy"
                                                                            style="--image-scale:1"
                                                                            src="../bizweb.dktcdn.net/thumb/large/100/502/483/products/tai-nghe-edifier-w830bt-5-jpg-v-1658377631820b728.jpg?v=1703666878963"
                                                                            alt="Tai nghe Edifier W830BT"
                                                                        >
                                                                    </picture>
                                                                </a>
                                                                <div class="card-product__utilites absolute top-2 right-2 z-10 hidden lg:flex flex-col items-center gap-2 transition duration-300 ease-out">
                                                                    <portal-opener>
                                                                        <button
                                                                            aria-label="Xem nhanh"
                                                                            type="button"
                                                                            data-product="/tai-nghe-edifier-w830bt"
                                                                            data-portal="#quick-view-product"
                                                                            class="quick-view border bg-background rounded-full  flex items-center justify-center relative active:scale-95 transition-transform "
                                                                        >
                                                                            <i class="icon icon-eye"></i>
                                                                            <span class="absolute opacity-0  bg-black py-1 px-3 whitespace-nowrap transition ease-out duration-300 "
                                                                            >Xem nhanh</span
                                                                            >
                                                                        </button>
                                                                    </portal-opener>
                                                                    <compare-button>
                                                                        <button
                                                                            aria-label="So sánh"
                                                                            type="button"
                                                                            data-product="33999877"
                                                                            data-product-type="tai-nghe"
                                                                            data-portal="#quick-view-compare"
                                                                            class="add-compare border bg-background rounded-full flex items-center justify-center active:scale-95 transition-transform "
                                                                        >
                                                                            <i class="icon icon-arrow-swap"></i>
                                                                            <span class="absolute opacity-0  bg-black py-1 px-3 whitespace-nowrap transition ease-out duration-300"
                                                                            >So sánh</span
                                                                            >
                                                                        </button>
                                                                    </compare-button>
                                                                </div>
                                                            </div>
                                                            <a
                                                                class="link"
                                                                href="tai-nghe-edifier-w830bt.html"
                                                                title="Tai nghe Edifier W830BT"
                                                            >
                                                                <div class="card-product__body flex flex-col gap-2 px-2 py-2  md:gap-2 md:px-5 md:py-4">
                                                                    <div class="card-product__title text-base font-semibold line-clamp-2 ">
                                                                        Tai nghe Edifier W830BT
                                                                    </div>
                                                                    <div class="price-box flex justify-between items-center">
                                                                        <div class="flex flex-col gap-1 ">
                                                                            <span class="price">4.350.000₫</span>
                                                                            <span class="compare-price line-through font-semibold">5.220.000₫</span>
                                                                        </div>
                                                                        <div class="badge sale-badge font-semibold text-xs md:text-sm  p-1  md:px-2 md:py-1.5">
                                                                            -17%
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-product__option-wrapper flex flex-wrap  gap-2 py-1 w-full items-center">
                                                                        <div data-variantId="106245522" data-image="//bizweb.dktcdn.net/thumb/grande/100/502/483/products/tai-nghe-edifier-w830bt-1-jpg-v-1658377631820.jpg?v=1703666866147" class="card-product__option selected relative group/option " style="--color-swatch: var(--swatch-trang)">
                                                            <span class="card-product__option-name whitespace-nowrap px-1.5 py-1 absolute  left-1/2 -translate-x-1/2 rounded-sm bg-black text-xs text-white opacity-0  group-hover/option:opacity-100  -top-[2.6rem] transition duration-300 ease-out ">
                                                            Trắng
                                                            </span>
                                                                            <div
                                                                                class="card-product__option-dot card-product__option-dot-lg w-5 h-5 md:w-6 md:h-6    bg-[var(--color-swatch)] border border-neutral-50  rounded-full  overflow-hidden cursor-pointer"
                                                                            >
                                                                                <img class="aspect-square object-cover w-full h-full" width="48" height="48" src="../bizweb.dktcdn.net/thumb/small/100/502/483/products/tai-nghe-edifier-w830bt-1-jpg-v-1658377631820247f.jpg?v=1703666866147" alt="Trắng" loading="lazy" />
                                                                            </div>
                                                                        </div>
                                                                        <div data-variantId="106245603" data-image="//bizweb.dktcdn.net/thumb/grande/100/502/483/products/tai-nghe-edifier-w830bt-5-jpg-v-1658377631820.jpg?v=1703666878963" class="card-product__option selected relative group/option " style="--color-swatch: var(--swatch-den)">
                                                            <span class="card-product__option-name whitespace-nowrap px-1.5 py-1 absolute  left-1/2 -translate-x-1/2 rounded-sm bg-black text-xs text-white opacity-0  group-hover/option:opacity-100  -top-[2.6rem] transition duration-300 ease-out ">
                                                            Đen
                                                            </span>
                                                                            <div
                                                                                class="card-product__option-dot card-product__option-dot-lg w-5 h-5 md:w-6 md:h-6    bg-[var(--color-swatch)] border border-neutral-50  rounded-full  overflow-hidden cursor-pointer"
                                                                            >
                                                                                <img class="aspect-square object-cover w-full h-full" width="48" height="48" src="../bizweb.dktcdn.net/thumb/small/100/502/483/products/tai-nghe-edifier-w830bt-5-jpg-v-1658377631820b728.jpg?v=1703666878963" alt="Đen" loading="lazy" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <stock-countdown class="stock-countdown"   data-id="section-flashsale-2" data-product-id="33999877" data-type="tag" data-max-qty="720"
                                                                                     data-real-qty="0" data-available="true"  >
                                                                    </stock-countdown>
                                                                </div>
                                                            </a>
                                                            <div class="card-product__bottom w-full px-2 md:px-5 left-0 lg:block hidden">
                                                                <input type="hidden" name="variantId" value="106245522" />
                                                                <button
                                                                    class="btn bg- w-full addtocart-btn font-semibold add_to_cart  flex justify-center items-center gap-3"
                                                                    aria-label="Tùy chọn"
                                                                    data-product="/tai-nghe-edifier-w830bt"
                                                                    data-portal="#quick-view-product"
                                                                    data-action="quickview"
                                                                >
                                                   <span class="loading-icon gap-1 hidden items-center justify-center">
                                                   <span class="w-1.5 h-1.5 bg-[currentColor] rounded-full animate-pulse"></span>
                                                   <span class="w-1.5 h-1.5 bg-[currentColor] rounded-full animate-pulse"></span>
                                                   <span class="w-1.5 h-1.5 bg-[currentColor] rounded-full animate-pulse"></span>
                                                   </span>
                                                                    <span>
                                                   Tùy chọn
                                                   </span>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </card-product>
                                            </div>
                                        </div>
                                        <div class="swiper-button-prev md:flex hidden"></div>
                                        <div class="swiper-button-next  md:flex hidden"></div>
                                    </div>
                                </ega-carousel>
                            </div>
                            <div class="tab-content hidden" id="section-flashsale-3">
                                <ega-carousel>
                                    <script data-type="swiper-params" type="application/json">
                                        {
                                        "speed": 1000,
                                        "spaceBetween": 12,
                                        "slidesPerView": 1.5,
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
                                    <div class="swiper  container px-0 overflow-hidden md:py-[var(--spacing-10)]">
                                        <div class=" swiper-wrapper gap-gutter grid md:grid-cols-[repeat(4,38%)] md:auto-cols-[38%] lg:auto-cols-[25%] lg:grid-cols-[repeat(4,25%)]   grid grid-cols-[repeat(2,65.5%)] grid-flow-col auto-cols-[65%]  h-inherit  py-4  ">

                                            @foreach ($homePro as $item)
                                                <div class="relative h-inherit flashsale__item swiper-slide flex-shrink-0 flex-grow-0" >
                                                    @include('layouts.product.item',['pro'=>$item])
                                                </div>
                                            @endforeach

                                        </div>
                                        <div class="swiper-button-prev md:flex hidden"></div>
                                        <div class="swiper-button-next  md:flex hidden"></div>
                                    </div>
                                </ega-carousel>
                            </div>
                            <div class="flashsale-end-message hidden  ">
                                <div class=" text-center py-6   text-white p-gutter w-full h-full relative mx-auto z-0 rounded">
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
                    <div class="flashsale-news hidden xl:block min-h-[7rem] w-11/12 mx-auto mt-[var(--spacing-8)]"></div>
                </div>
            </flashsale-tabs>
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

        @foreach ($categoryhome as $item)
            @if(count($item->product) > 0 )
                <section class="section section-product-tabs product_tabs_1" style="--section-padding: 0;--section-margin: 64px 0 64px;--section-padding-mb: 0;--section-margin-mb: 20px 0 20px;">
                    <tabs-section data-type=".card-product--vertical">
                        <div class="container">
                            <div class="heading-bar overflow-hidden py-3 md:px-5 px-3 gap-2 bg-background  rounded-sm flex flex-wrap items-center flex-col lg:flex-row  lg:gap-6">
                                <h2 class=" text-h5 md:text-h4 font-semibold text-secondary md:w-auto w-full text-center">
                                    <a class="tab-url" href="{{route('allListProCate',['danhmuc'=>$item->slug])}}" title="{{languageName($item->name)}}"> {{languageName($item->name)}} </a>
                                </h2>

                                <a class=" tab-url items-center gap-1 ml-auto leading-none font-semibold link hidden xl:inline-flex tab-viewmore"
                                   href="{{route('allListProCate',['danhmuc'=>$item->slug])}}" title="Xem thêm" >Xem thêm <i class="icon icon-carret-right"></i>
                                </a>
                            </div>
                            <div class="tab-content " id="product_tabs_1_tab_1"
                                 data-url="/{{$item->slug}}"
                                 data-limit="4"
                            >
                                <div class="product-list grid tab-content-inner   grid-cols-2  lg:grid-cols-4	 gap-2 mt-2">
                                    @foreach ($item->product as $item)
                                           @include('layouts.product.item',['pro'=>$item])
                                    @endforeach
                                </div>
                                <a href="{{route('allListProCate',['danhmuc'=>$item->slug])}}" title="xem thêm"
                                   class="btn tab-viewmore bg-background items-center gap-1 flex xl:hidden w-full rounded-sm justify-center mt-2 md:mt-6  font-semibold py-2.5 border-0 ">Xem
                                    tất cả <i class="icon icon-carret-right"></i> </a>
                            </div>
                        </div>
                    </tabs-section>
                </section>

            @endif
        @endforeach




        <section class="section section-blogs" style="--section-padding: 0;--section-margin: 64px 0 64px;--section-padding-mb: 0;--section-margin-mb: 32px 0 32px;">
            <tabs-section>
                <div class="container">
                    <div class="heading-bar overflow-hidden py-3 md:px-5 px-3 bg-background gap-2 rounded-sm flex flex-wrap items-center  md:gap-6">
                        <h2 class=" text-h5 md:text-h4 font-semibold text-secondary md:w-auto w-full text-center">
                            <a class="tab-url" href="tin-tuc.html" title="Bản tin công nghệ"> Tin tức nổi bật </a>
                        </h2>
                        <ul class="heading-tabs max-w-full overflow-auto list-none inline-flex lg:border-l border-neutral-50 pb-2 md:pb-0 md:pl-6 md:gap-3 gap-2 font-semibold justify-self-start overflow-auto mx-auto md:mx-0 whitespace-nowrap"
                        >

                        </ul>
                        <a
                            class="tab-viewmore  tab-url items-center gap-1 ml-auto leading-none font-semibold link hidden xl:inline-flex "
                            href="{{route('allListBlog')}}"
                            title="Xem thêm"
                        >Xem thêm <i class="icon icon-carret-right"></i>
                        </a>
                    </div>
                    <div  class="tab-content " id="section_blogs_tab_1" data-url="/tin-tuc" >
                        <div class="article-list grid
                        grid-cols-2 md:grid-cols-2 lg:grid-cols-4
                        gap-2 mt-2 ">

                            @foreach ($hotnews->take('4') as $item)
                                <div class="card-article grid grid-rows-[auto_1fr] bg-background rounded-sm overflow-hidden group">
                                    <div class="card-article__image aspect-video flex items-center justify-center overflow-hidden">
                                        <a href="{{route('detailBlog',['slug'=>$item->slug])}}" title="{{languageName($item->title)}}">
                                            <img
                                                loading="lazy"
                                                class="aspect-video object-contain group-hover:scale-105 transition-transform duration-300"
                                                src="{{$item->image}}"  alt="{{languageName($item->title)}}"
                                                width="331" height="186"
                                            >
                                        </a>
                                    </div>
                                    <div class="card-article__body h-full p-3 lg:p-4 flex flex-col gap-2-5 md:gap-4">
                                        <div>
                                            <p class="card-article__category font-semibold text-xs text-secondary mb-1"></p>
                                            <p class="card-article__title font-semibold">
                                                <a href="{{route('detailBlog',['slug'=>$item->slug])}}"
                                                   title="{{languageName($item->title)}}">
                                                    {{languageName($item->title)}} </a>
                                            </p>
                                        </div>
                                        <div class="card-article__desc break-all hidden md:line-clamp-3 text-neutral-200">
                                            {{languageName($item->description)}}
                                        </div>
                                        <div class="flex gap-2 justify-between items-center pt-2  mt-auto md:pt-3 border-t border-neutral-50 flex-wrap">
                                            <div class="cart-article__date  text-xs md:text-sm text-neutral-200 flex gap-1  items-center whitespace-nowrap">
                                                <i class="icon icon-calendar"></i>
                                                {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}
                                            </div>
                                            <a href="{{route('detailBlog',['slug'=>$item->slug])}}" title="Xem chi tiết" class="btn font-semibold  text-primary border border-primary hover:bg-primary hover:text-background whitespace-nowrap md:w-auto w-full p-2 md:p-3 text-xs md:text-sm "
                                            >Xem chi tiết
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div  class="tab-content hidden" id="section_blogs_tab_2" data-url="/" >
                    </div>
                    <a href="{{route('allListBlog')}}" title="xem thêm" class="tab-url tab-viewmore btn bg-background items-center gap-1 flex xl:hidden w-full rounded-sm justify-center mt-2 font-semibold py-2.5 border-0 ">Xem tất cả <i class="icon icon-carret-right"></i> </a>
                </div>
            </tabs-section>
        </section>
    </main>
@endsection
