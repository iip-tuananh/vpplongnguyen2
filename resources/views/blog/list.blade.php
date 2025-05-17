@extends('layouts.main.master')
@section('title')
{{$title_page}}
@endsection
@section('description')
Tin tức nổi bật và mới nhất
@endsection
@section('image')
{{url(''.$banner[0]->image)}}
@endsection
@section('css')
<link href="{{asset('frontend/css/blog_article_style.scss.css?1663035745304')}}" rel="stylesheet" type="text/css" />
<link rel="preload" as='style' type="text/css" href="{{asset('frontend/css/blog_article_style.scss.css?1663035745304')}}">
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
                     <span itemprop="item" class="text-neutral-100" content="https://ega-gear.myharavan.com/blogs/tin-tuc"><strong class="font-normal" itemprop="name">Tin Tức</strong></span>
                     <meta itemprop="position" content="2">
                  </li>
               </ol>
            </div>
         </div>
      </div>
      <section class="section section-main-blog" style="--section-margin: 0px 0px 40px; --section-margin-mb: 0px 0px 20px">
         <div class="container">
            <div class="grid grid-cols-1  lg:grid-cols-[calc(100%_-_32.8rem)_32rem]    gap-gutter">
               <div>
                  <div class="heading-bar mb-2 py-3 md:px-5 md:bg-background  rounded-sm flex flex-wrap items-center gap-6">
                     <h1 class="text-h4 font-semibold text-secondary">
                        Tin Tức
                     </h1>
                  </div>
                  <div class="article-list">
                     <div class="grid grid-cols-2    xl:grid-cols-3  lg:grid-cols-2   gap-2 mt-2 ">
                        @foreach ($blog as $item)
                        <div class="card-article grid grid-rows-[auto_1fr] bg-background rounded-sm overflow-hidden group">
                           <div class="card-article__image overflow-hidden flex items-center justify-center">
                              <a href="{{route('detailBlog',['slug'=>$item->slug])}}" title="{{languageName($item->title)}}">
                                 <img loading="lazy" class="aspect-video object-contain group-hover:scale-105 transition-transform duration-300" src="{{$item->image}}" alt="{{languageName($item->title)}}" width="331" height="186">
                              </a>
                           </div>
                           <div class="card-article__body h-full p-3 lg:p-4 flex flex-col gap-2-5 md:gap-4">
                              <div>
                                 <p class="card-article__category font-semibold text-xs text-secondary mb-1"></p>
                                 <p class="card-article__title font-semibold">
                                    <a href="{{route('detailBlog',['slug'=>$item->slug])}}" title="{{languageName($item->title)}}"> {{languageName($item->title)}} </a>
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
                                 <a href="{{route('detailBlog',['slug'=>$item->slug])}}" title="Xem chi tiết" class="btn font-semibold  text-primary border border-primary hover:bg-primary hover:text-background whitespace-nowrap md:w-auto w-full p-2 md:p-3 text-xs md:text-sm ">Xem chi tiết
                                 </a>
                              </div>
                           </div>
                        </div>
                        @endforeach

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

                        <div class="mt-6 pt-6" style="grid-column: 1 / -1">
                           {{ $blog->links('layouts.pagination.paginate') }}

                        </div>
                     </div>
                  </div>
               </div>
               <div class="blog-sidebar w-full ml-auto   xl:max-w-[32rem]">
                  <div class="bg-background mb-5  h-auto px-5  z-10 relative flex flex-col rounded-sm">
                     <aside class="blog-aside aside-item blog-aside-article  aside-item md:py-5 py-4 border-t border-neutral-50">
                        <div class="aside-title">
                           <h2 class="title-head margin-top-0 text-base font-semibold mb-3">
                           <span><a class="link" href="#" title="TIN TỨC NỔI BẬT">
                           TIN TỨC NỔI BẬT              </a></span>
                           </h2>
                        </div>
                        <div class="aside-content-article aside-content margin-top-0">
                           <div class="blog-image-list space-y-3 ">


                              @foreach ($hotnews as $item)
                                 <div class="card-article-media  flex gap-2">
                                    <div class="card-article__image w-[107px] flex-shrink-0 flex-grow-0 ">
                                       <a href="{{route('detailBlog',['slug'=>$item->slug])}}" title="{{languageName($item->title)}}">
                                          <img loading="lazy" class="aspect-video object-contain group-hover:scale-105 transition-transform duration-300" src="{{$item->image}}"
                                               alt="{{languageName($item->title)}}" width="107" height="80">
                                       </a>
                                    </div>
                                    <div class="card-article__body">
                                       <p class="card-article__tiitle font-semibold">
                                          <a href="{{route('detailBlog',['slug'=>$item->slug])}}" title="{{languageName($item->title)}}">
                                             {{languageName($item->title)}}
                                          </a>
                                       </p>
                                    </div>
                                 </div>

                              @endforeach

                           </div>
                        </div>
                     </aside>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </main>

@endsection
