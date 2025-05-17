@extends('layouts.main.master')
@section('title')
{{languageName($blog_detail->title)}}
@endsection
@section('description')
{{languageName($blog_detail->description)}}
@endsection
@section('image')
{{url(''.$blog_detail->image)}}
@endsection
@section('css')
<link href="{{asset('frontend/css/blog_article_style.scss.css?1663035745304')}}" rel="stylesheet" type="text/css" />
<link rel="preload" as='style' type="text/css" href="{{asset('frontend/css/blog_article_style.scss.css?1663035745304')}}">
<link href="{{asset('frontend/css/sidebar_style.scss.css?1663035745304')}}" rel="stylesheet" type="text/css" />
@endsection
@section('js')
@endsection
@section('content')
   <main>
      <div class="breadcrumbs">
         <div class="container">
            <div class="breadcrumb-list blog-breadcrumb ">
               <ol class="breadcrumb py-3 flex flex-wrap items-center text-xs md:text-sm" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                  <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                     <a class="link" href="/" target="_self" itemprop="item"><span itemprop="name">Trang chủ</span></a>
                     <meta itemprop="position" content="1">
                     <span class="mx-1 md:mx-2 inline-block">&nbsp;/&nbsp;</span>
                  </li>
                  <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                     <a class="link" href="{{ route('allListBlog') }}" itemprop="item">
                        <span itemprop="name">Tin Tức</span>
                     </a>
                     <meta itemprop="position" content="2">
                     <span class="mx-1 md:mx-2 inline-block">&nbsp;/&nbsp;</span>
                  </li>
                  <li class="active" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                     <span itemprop="item" class="text-neutral-100" content="{{languageName($blog_detail->title)}}"><strong class="font-normal" itemprop="name">{{languageName($blog_detail->title)}}</strong></span>
                     <meta itemprop="position" content="3">
                  </li>
               </ol>
            </div>
         </div>
      </div>
      <section class="section main-article " style="--section-margin: 0px 0px 40px; --section-margin-mb: 0px 0px 20px">
         <div class="container md:px-gutter px-0 article-wraper ">
            <div class="grid grid-cols-1  lg:grid-cols-[calc(100%_-_32.8rem)_32rem]    gap-gutter">
               <div class="w-full">
                  <div class="bg-background md:rounded-sm p-3 md:p-6 mb-6">
                     <h1 class="text-h4 font-semibold mb-2">{{languageName($blog_detail->title)}}</h1>
                     <div class="cart-article__date mb-5   text-neutral-200 flex gap-1  items-center whitespace-nowrap">
                        <i class="icon icon-calendar"></i>
                        {{ \Carbon\Carbon::parse($blog_detail->created_at)->format('d/m/Y') }}
                     </div>
                     <div class="toc-wrapper mt-5 mb-5 px-3 py-3 border border-neutral-50 rounded-sm ">
                        <div class="toc-title mb-2 open font-semibold uppercase">Nội dung bài viết
                           <i class="icon icon-carret-rigth"></i>
                        </div>
                        <div class="js-toc"></div>
                     </div>
                     <div class="article-content js-toc-content ">
                        <div class="rte" id="ega-uti-editable-content" data-platform="sapo" data-id="1002218678" data-blog-id="1000893148">
                           <div class="prose text-base w-full max-w-full content ">
                              {!!languageName($blog_detail->content)!!}
                           </div>
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


                  <div class="bg-background mb-5  h-auto px-5  z-10 relative flex flex-col rounded-sm">
                     <aside class="blog-aside aside-item blog-aside-article  aside-item md:py-5 py-4 border-t border-neutral-50">
                        <div class="aside-title">
                           <h2 class="title-head margin-top-0 text-base font-semibold mb-3">
                           <span><a class="link" href="#" title="BÀI VIẾT LIÊN QUAN">
                           BÀI VIẾT LIÊN QUAN        </a></span>
                           </h2>
                        </div>
                        <div class="aside-content-article aside-content margin-top-0">
                           <div class="blog-image-list space-y-3 ">
                              @foreach ($bloglq as $item)
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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tocbot/4.11.1/tocbot.css">
      <script defer="" src="https://cdnjs.cloudflare.com/ajax/libs/tocbot/4.11.1/tocbot.min.js"></script>
      <script>
         $(document).ready(()=>{
            const tocHeadings = "h2,h3" ;
            function toSlug(string){
               return string.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/-$/, '').replace(/^-/, '');
            }
            $('.js-toc-content :header').each(function(){
               let heading = $(this)
               heading.attr('id', toSlug(heading.text()))
            })
            tocbot.init({
               // Where to render the table of contents.
               tocSelector: '.js-toc',
               // Where to grab the headings to build the table of contents.
               contentSelector: '.js-toc-content',
               // Which headings to grab inside of the contentSelector element.
               headingSelector: tocHeadings,
               // For headings inside relative or absolute positioned containers within content.
               hasInnerContainers: true,
               isCollapsedClass: 'is-collapsedd',
               collapsibleClass: 'is-collapsibled',
               collapseDepth : 8,
               headingsOffset: 100,
               scrollSmoothOffset: -100,
               scrollSmooth : true })

            $('.toc-title').click(function(){
               $(this).toggleClass('open')
               $('.js-toc').toggle()
            })
            $('.fixed-toc-content').append($('.js-toc').html())
            $('.toc-list-item').length ? 	$('.toc-title').addClass('active') : $('.fixed-toc').remove()

            $('.toc-toggle-btn').click(function(){
               $(this).parents('.fixed-toc').toggleClass('open')
            })
            let observer = new IntersectionObserver((entries, observer) => {
               entries.forEach(entry => {

                  if(entry.isIntersecting){
                     $('.fixed-toc').removeClass('open').hide()
                  }else{
                     $('.fixed-toc').show()

                  }
               });
            }, {
               threshold: 0,
            });
            document.querySelectorAll('.toc-wrapper').forEach(div => { observer.observe(div) });


         })
      </script>
   </main>
@endsection
