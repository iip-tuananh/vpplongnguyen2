<header class="header flex items-center justify-center  top-0 py-4-5 h-max ">
    <div class="container">
        @php $total = 0; $qty = 0 ; @endphp
        @foreach((array) session('cart') as $id => $details)
            @php
                $total += ($details['price'] - ($details['price']*($details['discount']/100))) * $details['quantity'] ;
                $qty += $details['quantity'] ;
            @endphp
        @endforeach
        <div class="header-wrapper items-center flex justify-between gap-3 lg:grid lg:gap-2 lg:grid-cols-[3fr_6fr_3fr] flex-wrap ">
            <div class="flex gap-2 items-center transition-all duration-150">
                <div class="xl:hidden menu-opener">
                    <portal-opener>
                        <button
                            type="button"
                            data-portal="#menu-drawer"
                            class="hamburger-button inline-flex  items-center  justify-center flex-col gap-1  w-[3.6rem] h-[3.6rem] border border-neutral-50 h rounded-full hover:bg-neutral-50 active:scale-95 transition-all duration-150"
                            id="toggle-menu-mobile"
                            aria-label="menu-button"
                        >
                            <span class="h-[2px] w-5 bg-neutral-200"></span>
                            <span class="h-[2px] w-5 bg-neutral-200"></span>
                            <span class="h-[2px] w-5 bg-neutral-200"></span>
                        </button>
                    </portal-opener>
                </div>
                <a href="{{ route('home') }}" class="logo-wrapper" title="EGA Gear">
                    <img src="{{$setting->logo}}" alt="logo EGA Gear" width="100"
                         height="auto" >
                </a>
            </div>

            <style>
                .header-search {
                    display: flex;
                    align-items: center; /* căn giữa theo chiều dọc */
                    gap: 2rem;           /* khoảng cách giữa 2 block */
                }
                .header-search .search-bar {
                    flex: 2;             /* mặc định là flex:1, giờ tăng thành 2 */
                    max-width: 800px;    /* hoặc bạn set pixel cụ thể */
                }
                /* Search-bar chiếm hết không gian còn lại */
                .header-search .search-bar {
                    flex: 1;
                }

                /* Contact-time hiển thị inline-flex và căn giữa nội dung */
                .contact-time {
                    display: inline-flex;
                    flex-direction: column;
                    justify-content: center;
                    padding-left: 45px;
                    background-position: center left;
                    background-size: 32px;
                    background-repeat: no-repeat;
                    height: 40px;
                    /* nếu muốn dịch chuyển lùi vào gần search-bar hơn: */
                    /* margin-left: 0.5rem; */
                }

                /* Giữ nguyên style con */
                .contact-time p {
                    text-transform: uppercase;
                    margin: 0;
                    padding: 0;
                    font-weight: bold;
                    line-height: 1;
                }

                @media (max-width: 767px) {
                    .contact-time {
                        display: none !important;
                    }
                }
            </style>
            <div class="mx-auto header-search hidden md:block order-1 lg:order-none">
                <div class="search-bar relative hidden md:block">
                    <quick-search class="quick-search">
                        <form
                            method="get"
                            class="m-0 flex bg-background pl-5 py-3 rounded-full items-center relative border border-neutral-50"
                            role="search"
                        >
                            <select
                                class="form-select border-0 focus:ring-transparent collection-options"
                                aria-label="Danh mục sản phẩm"
                                required
                            >
                                <option value="">Danh mục sản phẩm</option>
                                @foreach ($categoryhome as $item)
                                    <option value="{{$item->id}}">{{languageName($item->name)}}</option>

                                @endforeach
                            </select>
                            <div class="search-input-group w-full relative">
                                <input
                                    type="text"
                                    name="query"
                                    value=""
                                    autocomplete="off"
                                    class="border-0 bg-transparent focus:ring-transparent p-0 w-full text-base text-foreground"
                                    required
                                    data-placeholder="Tìm theo tên sản phẩm...; Tìm theo thương hiệu...;"
                                    placeholder="Tìm theo tên sản phẩm..."
                                >
                                <input type="hidden" name="type" value="product">
                                <button
                                    type="submit"
                                    aria-label="search"
                                    class="search-button btn rounded-0 right-0 flex items-center justify-center text-foreground rounded-tr-full rounded-br-full absolute   bg-[var(--color-search)] text-white"
                                >
                                    <i class="icon icon-search"></i>
                                </button>
                            </div>
                        </form>
                    </quick-search>
                </div>


                <div class="contact-time lazyload" data-src="http://vpplongnguyen.com.vn/frontend/images/ct-time.png" data-was-processed="true" style="background-image: url(&quot;http://vpplongnguyen.com.vn/frontend/images/ct-time.png&quot;);">
                    <p>
                        Thời gian mở cửa
                    </p>
                    <span>8h - 21h Từ T2 - CN</span>
                </div>

            </div>


            <div class="header-icon-wrapper flex items-center ml-auto gap-0 lg:gap-5 xl:gap-[var(--spacing-7)] ">
                <portal-opener class=" search-opener block md:hidden">
                    <a data-portal="#search-drawer" href="search.html" title="tìm kiếm" class="header-icon-group flex gap-2 items-center search-group  hover:bg-neutral-50 active:scale-95 transition-all duration-150 px-2 py-1 rounded-sm ">
                        <div class="header-icon w-[3.6rem] h-[3.6rem] p-2 rounded-sm flex items-center justify-center border border-neutral-50">
                            <i class="icon icon-search"></i>
                        </div>
                    </a>
                </portal-opener>

                <portal-opener>
                    <a data-portal="#cart-drawer" onclick="getDataCart()" title="Giỏ hàng" class="mini-cart header-icon-group flex gap-2 items-center cart-group  hover:bg-neutral-50 active:scale-95 transition-all duration-150  md:px-2 pl-2 py-1 rounded-sm">
                        <div class="header-icon w-[3.6rem] h-[3.6rem]  p-2 rounded-sm flex items-center justify-center relative border border-neutral-50">
                            <i class="icon icon-cart"></i>
                            <span class="cart-count  flex items-center count_item count_item_pr justify-center rounded-full absolute font-semibold cart_count">{{ $qty }}</span>
                        </div>
                        <div class=" block hidden md:block">
                            <span class="text-xs ">Giỏ hàng</span>
                            <span class="font-semibold hidden block  price count_item cart_count">0</span>
                        </div>
                    </a>
                </portal-opener>
            </div>
        </div>
    </div>
</header>
