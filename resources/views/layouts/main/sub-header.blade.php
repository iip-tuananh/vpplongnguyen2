<div class="navigation-wrapper hidden xl:flex items-center sub-header">
    <div class="container relative">
        <div class="grid grid-cols-[3fr_9fr] gap-2">
            <div class="navigation-header relative w-full py-3.5 ">
                <portal-opener>
                    <div class="flex items-center gap-4 cursor-pointer hover:text-[var(--color-sub-header-link)] " data-portal="#menu-drawer">
                        <div class="hamburger-button inline-flex items-center flex-col gap-1 ">
                            <span class="h-[2px] w-5 bg-[currentColor] hover:bg-[var(--color-sub-header-link)] "></span>
                            <span class="h-[2px] w-5 bg-[currentColor] hover:bg-[var(--color-sub-header-link)] "></span>
                            <span class="h-[2px] w-5 bg-[currentColor] hover:bg-[var(--color-sub-header-link)] "></span>
                        </div>
                        <span class="font-semibold">Danh mục sản phẩm</span>
                    </div>
                </portal-opener>
                <menu-drawer class="portal portal--drawer " id="menu-drawer" data-type="drawer" data-animation="slide-in-left">
                    <dialog class="portal-dialog">
                        <div class="portal-overlay"></div>
                        <div class="portal-inner animation bg-background h-full grid grid-rows-[auto_1fr_auto]">
                            <div class="navigation-header pt-4 flex justify-between items-center border-b pb-3 border-neutral-50 px-4">
                                <a href="#"
                                   class="header-icon-group flex gap-2 items-center account-group  hover:bg-neutral-50 active:scale-95 transition-all duration-150 px-2 py-1 rounded-sm ">
                                </a>
                                <button
                                    type="button"
                                    id="PortalClose-menu-crawer"
                                    class="w-[3.2rem] h-[3.2rem] rounded-full border border-neutral-50 text-neutral-200 flex items-center justify-center active:scale-95 transition-transform hover:bg-neutral-50"
                                >
                                    <i class="icon icon-cross"> </i>
                                </button>
                            </div>
                            <nav class="navigation-vertical overflow-y-auto no-scrollbar ">
                                <ul class="main-menu">
                                    <li class="menu-item px-6 group hover:bg-neutral-50 -mt-[1px]  ">
                                        <a
                                            href="collections/all.html"
                                            class="menu-item__link  flex items-center gap-3.5 py-3 font-semibold"
                                            title="Tất cả sản phẩm"
                                        >
                                            <img
                                                loading="lazy"
                                                width="24"
                                                height="24"
                                                class="w-5"
                                                src="/frontend/images/menu_icon_150e9.png?1746694962638"
                                                alt="Tất cả sản phẩm"
                                            >
                                            <span>Tất cả sản phẩm</span>
                                            <span class="ml-auto text-neutral-200" data-toggle-submenu>
                                    <i class="icon icon-carret-right "></i>
                                    </span>
                                        </a>

                                        <div class="submenu  absolute lg:group-hover:block p-4">
                                            <div data-toggle-submenu class="relative toggle-submenu -mt-4 -mx-4 p-3 mb-4 bg-neutral-50 p-3 font-semibold flex justify-center items-center lg:hidden">
                                          <span class="absolute left-3">
                                          <i class="icon icon-carret-left mr-auto text-neutral-200"></i>
                                          </span>
                                                <span>Tất cả sản phẩm </span>
                                            </div>
                                            <ul class="submenu__list space-y-4">
                                                @foreach ($categoryhome as $item)
                                                    <li class="submenu__col">
                                             <span class="submenu__item submenu__item--main mb-3">
                                             <a class="link font-semibold" href="{{route('allListProCate',['danhmuc'=>$item->slug])}}" title="{{languageName($item->name)}}">
                                             {{languageName($item->name)}}
                                             </a>
                                             </span>

                                                    </li>
                                                @endforeach



                                            </ul>

                                        </div>
                                    </li>

                                    @foreach ($categoryhome as $item)
                                        <li class="menu-item px-6 group hover:bg-neutral-50 -mt-[1px]  ">
                                            <a
                                                href="{{route('allListProCate',['danhmuc'=>$item->slug])}}"
                                                class="menu-item__link  flex items-center gap-3.5 py-3 font-semibold"
                                                title="Laptop"
                                            >
                                                <img
                                                    loading="lazy"
                                                    width="24"
                                                    height="24"
                                                    class="w-5"
                                                    src="/frontend/images/menu_icon_350e9.png?1746694962638"
                                                    alt="Laptop"
                                                >
                                                <span>{{languageName($item->name)}}</span>
                                                @if (count($item->typeCate) > 0)
                                                    <span class="ml-auto text-neutral-200" data-toggle-submenu>
                                                    <i class="icon icon-carret-right "></i>
                                                </span>
                                                @endif

                                            </a>
                                            @if (count($item->typeCate) > 0)
                                                <div class="submenu  absolute lg:group-hover:block p-4">
                                                    <div data-toggle-submenu class="relative toggle-submenu -mt-4 -mx-4 p-3 mb-4 bg-neutral-50 p-3 font-semibold flex justify-center items-center lg:hidden">
                                                      <span class="absolute left-3">
                                                      <i class="icon icon-carret-left mr-auto text-neutral-200"></i>
                                                      </span>
                                                        <span>{{languageName($item->name)}} </span>
                                                    </div>
                                                    <ul class="submenu__list space-y-4">
                                                        <li class="submenu__col">
                                                            <ul class="list-disc pl-4 flex-col flex">
                                                                @foreach($item->typeCate as $type)
                                                                    <li class="submenu__item ">
                                                                        <a class="link" href="{{route('allListType',['danhmuc'=>$item->slug,'loaidanhmuc'=>$type->slug])}}" title="Acer Aspire">
                                                                            {{languageName($type->name)}}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            @endif

                                        </li>
                                    @endforeach

                                </ul>
                            </nav>
                            <div class="navigation-footer 4 border-t border-neutral-50 flex">
                                <div class="w-1/2">
                                    <a
                                        href="he-thong-cua-hang.html"
                                        title="Hệ thống cửa hàng"
                                        class="header-icon-group flex gap-2 items-center  hover:bg-neutral-50 transition-all duration-150 px-2 py-4 store-group"
                                    >
                                        <div class="header-icon w-[3.6rem] h-[3.6rem] p-2 rounded-sm flex items-center justify-center border border-neutral-50">
                                            <i class="icon icon-store"></i>
                                        </div>
                                        <div>
                                            <span class="text-xs">Hệ thống cửa hàng</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="w-1/2">
                                    <a
                                        class="header-icon-group flex gap-2 items-center  hover:bg-neutral-50  transition-all duration-150 px-2 py-4  phone-group "
                                        href="tel:19006750"
                                        title="19006750"
                                    >
                                        <div class="header-icon w-[3.6rem] h-[3.6rem] p-2 rounded-sm flex items-center justify-center border border-neutral-50">
                                            <i class="icon icon-calling-phone"></i>
                                        </div>
                                        <div>
                                            <span class="text-xs">Hotline: <b>099999998</b>	</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </dialog>
                </menu-drawer>
            </div>
            <div class="flex justify-between items-center">
                <div class="navigation--horizontal hidden  lg:flex items-center ">
                    <div class=" navigation-horizontal-wrapper overflow-hidden ">
                        <nav>
                            <ul class="navigation-horizontal">
                                <li class="menu-item group ">
                                    <a href="#" data-prefetch class="menu-item__link hover:text-[var(--color-sub-header-link)]  flex items-center gap-3.5 py-3 font-semibold " title="Khuyến mãi">
                                 <span>
                                 Khuyến mãi                </span>
                                        <i class="icon icon-carret-down" data-toggle-submenu>
                                        </i>
                                    </a>
                                    <div class="submenu  default ">
                                        <ul class="submenu__list">
                                            <li class="submenu__item submenu__item--main">
                                                <a class="link " data-prefetch href="{{ route('flashSale') }}" title="Flash Sale 1 Khung Giờ">
                                                    Flash Sale                        </a>
                                            </li>

                                        </ul>
                                    </div>
                                </li>

                                <li class="menu-item group ">
                                    <a href="#" data-prefetch class="menu-item__link hover:text-[var(--color-sub-header-link)]  flex items-center gap-3.5 py-3 font-semibold " title="Sản phẩm">
                                 <span>
                                 Sản phẩm
                                 </span>
                                        <i class="icon icon-carret-down" data-toggle-submenu>
                                        </i>
                                    </a>

                                    <div class="submenu  default ">
                                        <ul class="submenu__list">
                                            @foreach ($categoryhome as $item)
                                                <li class="submenu__item submenu__item--main">
                                                    <a class="link " data-prefetch href="{{route('allListProCate',['danhmuc'=>$item->slug])}}" title="{{languageName($item->name)}}">
                                                        {{languageName($item->name)}}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </li>

                                <li class="menu-item group ">
                                    <a href="{{ route('allListBlog') }}" data-prefetch class="menu-item__link hover:text-[var(--color-sub-header-link)]  flex items-center gap-3.5 py-3 font-semibold " title="Tin Tức">
                                 <span>
                                 Tin Tức                </span>
                                    </a>
                                </li>

                                <li class="menu-item group ">
                                    <a href="{{ route('lienHe') }}" data-prefetch class="menu-item__link hover:text-[var(--color-sub-header-link)]  flex items-center gap-3.5 py-3 font-semibold " title="Liên hệ">
                                         <span>
                                         Liên hệ
                                         </span>
                                    </a>
                                </li>

                                <li class="menu-item group ">
                                    <a href="{{route('pagecontent',['slug'=>'gioi-thieu'])}}" data-prefetch class="menu-item__link hover:text-[var(--color-sub-header-link)]  flex items-center gap-3.5 py-3 font-semibold " title="Giới thiệu">
                                 <span>
                                 Giới thiệu                </span>
                                    </a>
                                </li>


                            </ul>
                        </nav>
                    </div>
                    <div class=" navigation-arrows ">
                        <button class="btn prev">
                            <i class="  disabled icon icon-carret-left"> </i>
                        </button>
                        <button class="btn next ">
                            <i class=" icon icon-carret-right"> </i>
                        </button>
                    </div>
                </div>
                <div class="flex gap-[var(--spacing-8)] whitespace-nowrap ">
                    <a
                        class="inline-flex gap-1 items-center phone-group hover:text-[var(--color-sub-header-link)]"
                        href="tel: {{$setting->phone1}}"
                        title=" {{$setting->phone1}}"
                    >
                        <div class="rounded-sm flex items-center justify-center">
                            <i class="icon icon-calling-phone"></i>
                        </div>
                        <div>
                           <span>
                           Hotline: <b> {{$setting->phone1}}</b>
                           </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
