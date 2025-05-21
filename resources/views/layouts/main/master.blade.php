<!DOCTYPE html>
<html lang="vi">
    <head>
        @include('layouts.main.head')
    </head>
   <body class="ega-theme index ">
{{--   <a href="#" title="Siêu khuyến mãi giảm giá sốc" class="d-md-block d-none">--}}
{{--       <img alt="Siêu khuyến mãi giảm giá sốc" class="lazyload loaded" src="https://bizweb.dktcdn.net/100/450/748/themes/872052/assets/banner_top.jpg?1663035745304" data-src="https://bizweb.dktcdn.net/100/450/748/themes/872052/assets/banner_top.jpg?1663035745304" data-was-processed="true">--}}
{{--   </a>--}}

      @include('layouts.header.index')
      @include('layouts.main.sub-header')


      @yield('content')


      <link href="/frontend/css/bpr-products-module50e9.css?1746694962638" rel="stylesheet" type="text/css" media="all" />
      <div class="sapo-product-reviews-module"></div>

      @include('layouts.footer.index')

      <link rel="preload" as="style" media="all" href="/frontend/css/sapo-popup50e9.css?1746694962638" >
      <link rel="stylesheet" href="/frontend/css/sapo-popup50e9.css?1746694962638" media="all"  >

      <script>
          $('.popup-sapo .icon').click(function() {
              $(".popup-sapo").toggleClass("active");
          });
          $('.close-popup-sapo').click(function() {
              $(".popup-sapo").toggleClass("active");
          });
          setTimeout(()=>{
              $(".popup-sapo").removeClass("active");

          }, 15000)
      </script>
      <link rel="stylesheet" href="/frontend/css/sales-pop50e9.css?1746694962638" media="print" onload="this.media='all'">
      <noscript>
          <link href="/frontend/css/sales-pop50e9.css?1746694962638" rel="stylesheet" type="text/css" media="all" />
      </noscript>
      <div id="ega-sale-pop" class="sales-pop hidden">
          <div class="sale-pop-wrap">
          </div>
          <div class="sale-pop-close">
              <i class="icon icon-cross"></i>
          </div>
      </div>

      <link rel="stylesheet" href="/frontend/css/addthis-sharing50e9.css?1746694962638" media="print" onload="this.media='all'">
      <noscript>
          <link href="/frontend/css/addthis-sharing50e9.css?1746694962638" rel="stylesheet" type="text/css" media="all" />
      </noscript>


      <div class="addThis_listSharing hidden">
          <a href="#" id="back-to-top" class="backtop back-to-top flex items-center justify-center"  title="Lên đầu trang">
              <i class="icon icon-carret-up"></i>
          </a>
          <call-center-group class="addThis_group" style="--color-primary: #e33333">
              <ul class="addThis_listing list-unstyled  dnone ">
                  <li class="addThis_item">
                      <a class="addThis_item--icon" href="tel:{{$setting->phone1}}" rel="nofollow" >
                          <img class="img-fluid" src="http://bizweb.dktcdn.net/100/502/483/themes/1011801/assets/addthis-phone.svg?1746694962638" alt="Gọi ngay cho chúng tôi" loading="lazy" width="44" height="44" />
                          <span class="tooltip-text">Gọi ngay cho chúng tôi</span>
                      </a>
                  </li>
                  <li class="addThis_item">
                      <a class="addThis_item--icon" href="https://zalo.me/{{$setting->phone1}}" target="_blank"  rel="nofollow">
                          <img class="img-fluid" src="http://bizweb.dktcdn.net/100/502/483/themes/1011801/assets/addthis-zalo.svg?1746694962638" alt="Chat với chúng tôi qua Zalo" loading="lazy" width="44" height="44" />
                          <span class="tooltip-text">Chat với chúng tôi qua Zalo</span>
                      </a>
                  </li>
                  <li class="addThis_item">
                      <a class="addThis_item--icon" href="{{$setting->facebook}}" target="_blank"  rel="nofollow">
                          <img class="img-fluid" src="http://bizweb.dktcdn.net/100/502/483/themes/1011801/assets/addthis-messenger.svg?1746694962638" alt="Chat với chúng tôi qua Messenger" loading="lazy" width="44" height="44" />
                          <span class="tooltip-text">Chat với chúng tôi qua Messenger</span>
                      </a>
                  </li>
              </ul>
              <div class="addThis_item relative z-[1]" data-toggle>
                  <div class="addThis_item--icon addThis_item--toggle rounded-full" >
                      <img src="/frontend/images/call-center50e9.png?1746694962638" alt="call-center" width="30" height="30">
                      <i class="icon icon-cross"></i>
                  </div>
              </div>
          </call-center-group>
      </div>


      <script>
          class CallCenterGroup extends HTMLElement {
              constructor() {
                  super();
                  this.toggleButton = this.querySelector('[data-toggle]');
                  this.listing = this.querySelector('.addThis_listing');
                  this.addClickListener();
              }

              addClickListener() {
                  this.toggleButton.addEventListener('click', () => this.toggleListing());
              }

              toggleListing() {
                  const isShowing = this.listing.classList.toggle('show');
                  const animations = {
                      show: [
                          { transform: 'translateY(60%)', opacity: 0 },
                          { transform: 'translateY(0)', opacity: 1 }
                      ],
                      hide: [
                          { transform: 'translateY(0)', opacity: 1 },
                          { transform: 'translateY(60%)', opacity: 0 }
                      ]
                  };

                  if (isShowing) {
                      this.listing.classList.remove('dnone');
                      this.classList.add('active')
                      this.animate(animations.show);
                  } else {
                      this.classList.remove('active');
                      this.animate(animations.hide, () => this.listing.classList.add('dnone'));
                  }
              }

              animate(keyframes, onFinish) {
                  this.listing.animate(keyframes, {
                      duration: 300,
                      easing: 'ease',
                      fill: 'forwards'
                  }).onfinish = onFinish;
              }
          }

          customElements.define('call-center-group', CallCenterGroup);
      </script>


      <div data-template="index"
            class="cro-btns sticky md:hidden block z-10 min-h-[5.6rem] bottom-0 left-0  slide-in-bottom  ">
          <div
              class=" bg-background rounded-t-sm w-full min-h-[5.6rem] px-2 justify-between items-center inline-flex slide-in-bottom"
              style="box-shadow:var(--shadow-l)">
              <div
                  class="cro-btns-container w-full h-full justify-center items-center gap-0.5 grid grid-cols-[repeat(auto-fit,minmax(0,1fr))]">
                  <a class="cro-btn-item cro-btn-item--1 w-auto flex-shrink-0 flex-grow-0 h-full py-0.5 px-0.5  text-foreground h-full flex flex-col justify-center items-center gap-0.5"
                     title="Khuyến mãi"
                     href="{{ route('flashSale') }}"
                     style="order:3">
                      <div class="w-4 h-4 relative ">
                          <img class="w-full h-full object-contain" alt="Khuyến mãi"
                               src="/frontend/images/cro-btn-1-icon50e9.png?1746694962638" loading="lazy" />
                      </div>
                      <div class="text-ellipsis overflow-hidden  max-w-full text-xs text-center line-clamp-1">Khuyến mãi</div>
                  </a>
                  <a class="cro-btn-item cro-btn-item--2 w-auto flex-shrink-0 flex-grow-0 h-full py-0.5 px-0.5  text-foreground h-full flex flex-col justify-center items-center gap-0.5"
                     title="Sản phẩm"
                     href="{{ route('allProduct') }}"
                     style="order:4">
                      <div class="w-4 h-4 relative ">
                          <img class="w-full h-full object-contain" alt="Sản phẩm"
                               src="/frontend/images/cro-btn-2-icon50e9.png?1746694962638" loading="lazy" />
                      </div>
                      <div class="text-ellipsis overflow-hidden  max-w-full text-xs text-center line-clamp-1">Sản phẩm</div>
                  </a>

                  <a class="cro-btn-item cro-btn-item--mess w-auto flex-shrink-0 flex-grow-0 h-full py-0.5 px-0.5  text-foreground h-full flex flex-col justify-center items-center gap-0.5"
                     title="Nhắn tin"
                     href="https://m.me/{{ $setting->phone1 }}"
                     style="order:2">
                      <div class="w-4 h-4 relative ">
                          <img class="w-full h-full object-contain" alt="Nhắn tin"
                               src="/frontend/images/cro-btn-mess-icon50e9.png?1746694962638" loading="lazy" />
                      </div>
                      <div class="text-ellipsis overflow-hidden  max-w-full text-xs text-center line-clamp-1">Nhắn tin</div>
                  </a>
                  <a class="cro-btn-item cro-btn-item--hotline w-auto flex-shrink-0 flex-grow-0 h-full py-0.5 px-0.5  text-foreground h-full flex flex-col justify-center items-center gap-0.5"
                     title="Gọi điện"
                     href="tel:{{ $setting->phone1 }}"         style="order:1">
                      <div class="w-4 h-4 relative ">
                          <img class="w-full h-full object-contain" alt="Gọi điện"
                               src="/frontend/images/cro-btn-hotline-icon50e9.png?1746694962638" loading="lazy" />
                      </div>
                      <div class="text-ellipsis overflow-hidden  max-w-full text-xs text-center line-clamp-1">Gọi điện</div>
                  </a>
              </div>
          </div>
      </div>
      <portal-component class="portal portal--drawer" id="search-drawer" data-type="drawer" data-animation="slide-in-right"
                        style="--dialog-max-width:52rem">
          <dialog class="portal-dialog">
              <div class=" w-full h-full flex">
                  <div class="portal-overlay"></div>
                  <div class="portal-inner w-full ml-auto bg-background overflow-auto h-screen px-4 animation">
                      <div class="portal-header px-3 pb-3 pt-5 ">
                          <div class="font-semibold text-h6 md:text-h4 flex items-center gap-2">
                              <i class="icon icon-arrow-left text-h6 md:text-h4" id="PortalClose-search-drawer"></i> Tìm kiếm
                          </div>
                      </div>
                      <div class="search-bar relative"></div>
                  </div>
              </div>
          </dialog>
      </portal-component>
      <quick-view class="portal portal--modal"
                  id="quick-view-product"
                  data-type="modal"
                  data-animation="scale-in-hor-left">
          <dialog class="portal-dialog">
              <div class=" flex items-center justify-center w-full h-full">
                  <div class="portal-overlay"></div>
                  <div class="portal-inner    h-full  " >
                      <button  type="button"
                               id="PortalClose-quick-view-product"
                               data-animation="fade-in"
                               class="portal-close-button animation rounded-full w-[3.2rem] h-[3.2rem]  border border-white text-white flex items-center justify-center active:scale-95 transition-transform hover:animate-spin"
                      >
                          <i class="icon icon-cross"> </i>
                      </button>
                      <div class="product-wrapper animation  bg-background  w-full h-full  md:rounded-lg">
                      </div>
                      <span class="loading-icon gap-1 hidden items-center justify-center">
                  <span class="w-1.5 h-1.5 bg-[currentColor] rounded-full animate-pulse"></span>
                  <span class="w-1.5 h-1.5 bg-[currentColor] rounded-full animate-pulse"></span>
                  <span class="w-1.5 h-1.5 bg-[currentColor] rounded-full animate-pulse"></span>
                  </span>
                  </div>
              </div>
          </dialog>
      </quick-view>
      <cart-drawer
          class="portal portal--drawer"
          id="cart-drawer"
          data-type="drawer"
          data-animation="slide-in-right"
          style="--dialog-max-width:52rem"
      >
          <dialog class="portal-dialog">
              <div class=" w-full h-full flex">
                  <div class="portal-overlay"></div>
                  <div class="portal-inner w-full ml-auto bg-background animation  h-full ">
                      <cart-form class="h-full">
                          <form class="cart-form h-full cart-table" method="post">
                              <div class="cart grid grid-rows-[auto_1fr_auto] cart-table">
                                  <div class="portal-header pt-4 px-4 flex justify-between items-center border-b pb-3 border-neutral-50 px-4">
                                      <p class="text-h6 md:text-h4">Giỏ hàng</p>
                                      <button type="button" id="PortalClose-cart-crawer" class="w-[3.2rem] h-[3.2rem] rounded-full border border-neutral-50 text-neutral-200 flex items-center justify-center active:scale-95 transition-transform hover:bg-neutral-50">
                                          <i class="icon icon-cross"> </i>
                                      </button>
                                  </div>

                                  <div class="cart-sidebar flex flex-col h-full">

                                  </div>

                              </div>

                          </form>
                      </cart-form>
                  </div>
              </div>
          </dialog>
      </cart-drawer>
      <portal-component class="portal portal--drawer" id="cart-note-drawer" data-type="drawer" data-animation="slide-in-right"
                        style="--dialog-max-width:52rem">
          <dialog class="portal-dialog">
              <div class=" w-full h-full flex">
                  <div class="portal-overlay"></div>
                  <div class="portal-inner w-full ml-auto bg-background   h-screen px-4 animation">
                      <div class="portal-header px-3 pb-3 pt-5 ">
                          <div class="font-semibold text-h4 flex items-center gap-2">
                              <i class="icon icon-arrow-left  cursor-pointer text-h6 md:text-h4" id="PortalClose-cart-note-drawer"></i>Ghi chú đơn hàng
                          </div>
                      </div>
                      <div class="r-bill px-3">
                          <cart-note>
                              <form>
                                  <div class="form-group">
                                      <label class="label block mb-2">Ghi chú</label>
                                      <textarea class="form-textarea" name="note" rows="6"></textarea>
                                  </div>
                                  <button type="submit"
                                          class="btn w-full mt-5  btn--large font-semibold  bg-primary text-white inline-flex  justify-center items-center gap-2">
                                      Lưu thông tin
                                  </button>
                              </form>
                          </cart-note>
                      </div>
                  </div>
              </div>
          </dialog>
      </portal-component>
      <cart-vat-drawer class="portal portal--drawer"
                       id="cart-vat-drawer"
                       data-type="drawer"
                       data-animation="slide-in-right"
                       style="--dialog-max-width:52rem" >
          <dialog class="portal-dialog">
              <div class=" w-full h-full flex">
                  <div class="portal-overlay"></div>
                  <div class="portal-inner w-full ml-auto bg-background   h-screen px-4 animation">
                      <div class="portal-header px-3 pb-3 pt-5 ">
                          <div class="font-semibold text-h6 md:text-h4 flex items-center gap-2">
                              <i class="icon icon-arrow-left text-h6 md:text-h4  cursor-pointer" id="PortalClose-cart-vat-drawer"></i>
                              Xuất hóa đơn công ty
                          </div>
                      </div>
                      <div class="r-bill px-3">
                          <form>
                              <div class="bill-field  space-y-3 " >
                                  <div class="flex items-center">
                                      <div class="flex items-center ">
                                          <input class="invoice" type="hidden" name="attributes[Xuất hóa đơn]"
                                                 value='không'>
                                          <input  class="invoice-checkbox form-checkbox"
                                                  type="checkbox"  >
                                      </div>
                                      <div class="ml-2 text-sm">
                                          <label>Xuất hóa đơn</label>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="label block mb-2">Tên công ty</label>
                                      <input type="text" class="form-input"
                                             name="attributes[Tên công ty]"
                                             value=""
                                             data-rules="['required']"
                                             data-messages="{'required':'Trường này không được bỏ trống' }"
                                             placeholder="Tên công ty" >
                                      <span class="error  text-error"></span>
                                  </div>
                                  <div class="form-group">
                                      <label class="label block mb-2">Mã số thuế</label>
                                      <input type="number"
                                             class="form-input"
                                             name="attributes[Mã số thuế]"
                                             value=""
                                             data-rules="['minLength:10','required']"
                                             data-messages="{ 'minLength:10': 'Số kí tự tối thiểu [size]', 'require':'Trường này không được bỏ trống' }"
                                             placeholder="Mã số thuế">
                                      <span class="error text-error"></span>
                                  </div>
                                  <div class="form-group">
                                      <label class="label block mb-2">Địa chỉ công ty</label>
                                      <textarea  class="form-textarea"
                                                 data-rules="['required']"
                                                 data-messages="{'required':'Trường này không được bỏ trống' }"
                                                 name="attributes[Địa chỉ công ty]"
                                                 placeholder="Địa chỉ công ty"></textarea>
                                      <span class="error  text-error"></span>
                                  </div>
                                  <div class="form-group">
                                      <label class="label block mb-2">Email nhận hóa đơn</label>
                                      <input type="email" class="form-input"
                                             name="attributes[Email nhận hóa đơn]"
                                             value=""
                                             placeholder="Email nhận hóa đơn"
                                             data-rules="['required','email']"
                                             data-messages="{'required':'Trường này không được bỏ trống', 'email': 'Email không đúng định dạng' }"
                                      >
                                      <span class="error  text-error"></span>
                                  </div>
                              </div>
                              <button
                                  type="submit"
                                  class="btn w-full mt-5  btn--large font-semibold  bg-primary text-white inline-flex  justify-center items-center gap-2"
                              >
                                  Lưu thông tin
                              </button>
                          </form>
                      </div>
                  </div>
              </div>
          </dialog>
      </cart-vat-drawer>
      <portal-component class="portal portal--drawer" id="cart-delivery-drawer" data-type="drawer" data-animation="slide-in-right"
                        style="--dialog-max-width:52rem">
          <dialog class="portal-dialog">
              <div class=" w-full h-full flex">
                  <div class="portal-overlay"></div>
                  <div class="portal-inner w-full ml-auto bg-background   h-screen px-4 animation">
                      <div class="portal-header px-3 pb-3 pt-5 ">
                          <div class="font-semibold text-h6 md:text-h4 flex items-center gap-2">
                              <i class="icon icon-arrow-left text-h4 cursor-pointer" id="PortalClose-cart-delivery-drawer"></i>Hẹn giờ nhận hàng
                          </div>
                      </div>
                      <div class="r-bill px-3">
                          <cart-delivery>
                              <form>
                                  <div class="cart-delivery-time py-4">
                                      <div class="grid gap-2">
                                          <div class="flex items-center">
                                              <div class="flex items-center ">
                                                  <input id="use-delivery" type="hidden" name="attributes[Hẹn giờ nhận hàng]" value="cart.attributes[Hẹn giờ nhận hàng]">
                                                  <input id="delivery-enabled"
                                                         type="checkbox" class="form-checkbox" >
                                              </div>
                                              <div class="ml-2 text-sm">
                                                  <label for="delivery-enabled" class="">Hẹn giờ nhận hàng</label>
                                              </div>
                                          </div>
                                          <div>
                                              <label for="delivery-date-input" class="label block mb-1 text-base">Ngày nhận hàng</label>
                                              <div class="relative">
                                                  <i class="icon icon-calendar text-neutral-200 top-1/2 left-2 -translate-y-1/2 absolute"></i>
                                                  <datepicker-input class="datepicker-input">
                                                      <input type="text" value=""
                                                             name="attributes[Ngày nhận hàng]" id="delivery-date-input"
                                                             class="form-input pl-2 pl-[var(--spacing-6-5)] py-2.5 min-h-[4rem]">
                                                  </datepicker-input>
                                              </div>
                                          </div>
                                          <div>
                                              <label for="delivery-time" class="label block mb-1 text-base ">Thời gian nhận hàng</label>
                                              <select
                                                  id="delivery-time"
                                                  name="attributes[Thời gian nhận hàng]"
                                                  class="form-select min-h-[4rem]  px-2 py-2.5 border-neutral-50"
                                              >
                                                  <option selected value="">Chọn thời gian</option>
                                                  <option value="08h00 - 12h00"
                                                  >
                                                      08h00 - 12h00
                                                  </option>
                                                  <option value="14h00 - 18h00"
                                                  >
                                                      14h00 - 18h00
                                                  </option>
                                                  <option value="19h00 - 21h00"
                                                  >
                                                      19h00 - 21h00
                                                  </option>
                                              </select>
                                          </div>
                                      </div>
                                  </div>
                                  <button type="submit"
                                          class="btn w-full mt-5  btn--large font-semibold  bg-primary text-white inline-flex  justify-center items-center gap-2">
                                      Lưu thông tin
                                  </button>
                              </form>
                          </cart-delivery>
                      </div>
                  </div>
              </div>
          </dialog>
      </portal-component>
      <coupon-drawer lass="portal portal--drawer" id="coupon-drawer" data-type="drawer" data-animation="slide-in-right"
                     style="--dialog-max-width:52rem">
          <dialog class="portal-dialog">
              <div class=" w-full h-full flex ">
                  <div class="portal-overlay"></div>
                  <div class="portal-inner  grid grid-rows-[auto_1fr_auto] w-full ml-auto bg-background  h-screen px-4 pb-4 animation">
                      <div class="portal-header px-3 pb-3 pt-5 ">
                          <div class="font-semibold text-h6 md:text-h4 flex items-center gap-2">
                              <i class="icon icon-arrow-left text-h6 md:text-h4  cursor-pointer" id="PortalClose-coupon-drawer"></i> Chọn mã giảm giá
                          </div>
                      </div>
                      <div class="coupon-list py-4"></div>
                      <div>
                      </div>
                  </div>
              </div>
          </dialog>
      </coupon-drawer>
      <coupon-modal class="portal portal--modal portal--modal-sm" id="coupon-modal" data-type="modal" data-animation="fade-in">
          <dialog class="portal-dialog">
              <div class=" flex items-center justify-center w-full h-full p-3">
                  <div class="portal-overlay"></div>
                  <div class="portal-inner animation ">
                      <button  type="button"
                               id="PortalClose-coupon-modal"
                               class="portal-close-button w-[3.2rem] h-[3.2rem] rounded-full border border-white text-white flex items-center justify-center active:scale-95 transition-transform hover:animate-spin"
                      >
                          <i class="icon icon-cross "> </i>
                      </button>
                      <div class=" p-3 md:p-5 rounded-lg  bg-background   h-full grid grid grid-rows-[auto_1fr_auto]">
                          <div class="coupon-header  border-b pb-2.5 border-dashed border-neutral-50"></div>
                          <div class="coupon-desc "></div>
                          <div class="coupon-act grid grid-cols-2 gap-3 border-t  pt-2.5 border-dashed border-neutral-50">
                              <button id="PortalClose-coupon-item-modal" class="btn  border border-neutral-50 hover:bg-neutral-100 py-1.5 ">Đóng</button>
                              <copy-button data-copied-text="Đã sao chép"  >
                                  <input type="hidden" value="" />
                                  <button type="button" class="btn copy-button w-full  text-primary border border-primary hover:bg-primary hover:text-white  py-1.5 ">
                                      Sao chép
                                  </button>
                              </copy-button>
                          </div>
                      </div>
                  </div>
              </div>
          </dialog>
      </coupon-modal>
      <compare-qv
          class="portal portal--modal"
          id="quick-view-compare"
          data-type="modal"
          data-animation="slide-in-bottom"
      >
          <dialog class="portal-dialog">
              <div class=" flex items-center justify-center w-full">
                  <div class="portal-overlay "></div>
                  <div class="portal-inner bg-background rounded-sm animation">
                      <button
                          type="button"
                          id="PortalClose-quick-view"
                          class="absolute active:scale-95 transition-transform right-0 p-3 bg-background rounded-sm flex items-center justify-center gap-2"
                      >
                          Thu gọn
                          <i class="icon icon-carret-down"> </i>
                      </button>
                      <div class="compare-product-list">
                      </div>
                  </div>
              </div>
          </dialog>
      </compare-qv>
      <portal-opener class="compare-opener hidden">
          <div
              class=" cursor-pointer font-semibold btn rounded-full bg-background border border-primary text-primary"
              data-portal="#quick-view-compare"
          >
              <p class="flex items-center gap-1">
                  <span class="line-clamp-1" >  So sánh </span>
                  <span class="compare-count" > </span>
                  <i class="ico icon-arrow-swap"></i>
              </p>
          </div>
      </portal-opener>

      <error-popup class="portal portal--modal portal--modal-sm" id="error-modal" data-type="modal" data-animation="fade-in">
          <dialog class="portal-dialog">
              <div class="  flex items-start justify-end  p-3 w-full h-full">
                  <div class="portal-overlay"></div>
                  <div class="portal-inner animation ">
                      <div class="error-list flex gap-4 flex-col items-end">
                      </div>
                  </div>
              </div>
          </dialog>
      </error-popup>

      <script src="/frontend/js/main50e9.js?1746694962638" ></script>
      <script src="/frontend/js/product50e9.js?1746694962638" defer   fetchPriority="low"></script>
      <script src="/frontend/js/cart50e9.js?1746694962638" defer   fetchPriority="low"></script>
      <script src="/frontend/js/flashsale50e9.js?1746694962638" defer   fetchPriority="low"></script>
      <script src="/frontend/js/coupon50e9.js?1746694962638" defer   fetchPriority="low"></script>
      <script src="/frontend/js/defer-scripts50e9.js?1746694962638" defer  fetchPriority="low" ></script>
      <script src="/frontend/js/cart.js" async></script>

      @yield('js')

   </body>
</html>
