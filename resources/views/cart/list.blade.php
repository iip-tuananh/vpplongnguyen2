@extends('layouts.main.master')
@section('title')
Giỏ hàng của bạn
@endsection
@section('description')
Bún đậu mắm tôm Lynh
@endsection
@section('image')
{{url(''.$banner[0]->image)}}
@endsection
@section('css')
<link href="{{asset('frontend/css/ajaxcart.scss.css?1663035745304')}}" rel="stylesheet" type="text/css" />
<link rel="preload" as='style' type="text/css" href="{{asset('frontend/css/ajaxcart.scss.css?1663035745304')}}">
@endsection
@section('content')
   <main>
      <div class="breadcrumbs">
         <div class="container">
            <div class="breadcrumb-list  ">
               <ol class="breadcrumb py-3 flex flex-wrap items-center text-xs md:text-sm" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                  <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                     <a class="link" href="/" target="_self" itemprop="item"><span itemprop="name">Trang chủ</span></a>
                     <meta itemprop="position" content="1">
                     <span class="mx-1 md:mx-2 inline-block">&nbsp;/&nbsp;</span>
                  </li>
                  <li class="active" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                     <span itemprop="item" class="text-neutral-100" content="https://ega-gear.myharavan.com/cart"><strong class="font-normal" itemprop="name">Giỏ hàng</strong></span>
                     <meta itemprop="position" content="2">
                  </li>
               </ol>
            </div>
         </div>
      </div>
      <section class="section section-main-cart" style="--section-margin:40px 0; --section-margin-mb:20px 0">
         <div class="container">
            <cart-form class="">
               @if(count($cart))
                  <form class="cart-form" action="/cart" method="post">
                     <div class="cart py-6 lg:bg-background flex-wrap lg:px-6 rounded-sm gap-5  md:gap--[var(--cart-gap)] justify-between items-start relative cart-list" >

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


                         <div class="mt-6 w-full flex flex-col items-end space-y-4">
                             <div class="text-right">
                                 <p class="text-base">Tổng tiền: <span class="text-2xl font-bold text-pink-600"> {{ number_format($total) }}₫</span></p>
                             </div>

                             <div class="sm:w-auto">
                                 <a href="{{ route('checkout') }}">
                                     <button
                                         type="button"
                                         class="btn btn--large w-full sm:w-auto font-semibold bg-primary text-white inline-flex justify-center items-center gap-2"
                                     >
                                         THANH TOÁN
                                         <i class="icon icon-arrow-login"></i>
                                     </button>
                                 </a>
                             </div>
                         </div>

                     </div>
                  </form>

                  <div class="cart-empty w-full">

                  </div>
               @else

                    <div class="cart-empty w-full">
                        <div class="bg-background px-gutter lg:px-6 py-6 rounded-sm">
                            <div class="flex flex-col items-center justify-center mx-auto max-w-md space-y-4 text-center">
                                <img
                                    class="w-80 h-80 object-contain"
                                    src="//theme.hstatic.net/200000817091/1001225822/14/cart_empty_background.png?v=68"
                                    alt="Giỏ hàng trống">
                                <h2 class="text-h4 font-semibold">
                                    Giỏ hàng chưa có gì!
                                </h2>
                                <p class="text-base leading-relaxed">
                                    Hãy tìm sản phẩm ứng ý và thêm vào giỏ hàng bạn nhé
                                </p>
                                <a
                                    class="btn font-semibold bg-primary text-white px-6 py-2"
                                    href="/collections/all"
                                    title="Tiếp tục mua sắm">
                                    Tiếp tục mua sắm
                                </a>
                            </div>
                        </div>
                    </div>
               @endif




            </cart-form>
         </div>
      </section>

   </main>
@endsection
