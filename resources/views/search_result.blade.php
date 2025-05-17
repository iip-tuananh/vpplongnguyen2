@extends('layouts.main.master')
@section('title')
Kết quả tìm kiếm
@endsection
@section('description')
Đã tìm thấy {{$countproduct}} kết quả phù hợp cho từ khóa "{{$keyword}}"
@endsection
@section('image')
{{url(''.$setting->logo)}}
@endsection
@section('css')
<link href="{{asset('frontend/css/collection_style.scss.css?1663035745304')}}" rel="stylesheet" type="text/css" />
<link rel="preload" as='style' type="text/css" href="{{asset('frontend/css/collection_style.scss.css?1663035745304')}}">
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
							<span itemprop="item" class="text-neutral-100" content="https://ega-gear.myharavan.com/search?&amp;q=filter=((collectionid:product=1003942171 )&amp;amp;&amp;amp;((title:product contains chuột)))"><strong class="font-normal" itemprop="name">Tìm kiếm</strong></span>
							<meta itemprop="position" content="2">
						</li>
					</ol>
				</div>
			</div>
		</div>
		<section class="section section-main-search" style="--section-margin: 0px 0px 40px; --section-margin-mb: 0px 0px 20px">
			<div class="container">
				<div class="bg-background rounded-lg px-3 py-4 md:p-6 mb-2 text-center">
					<h2 class="text-h4 font-semibold mb-2">Kết quả tìm kiếm:</h2>
					@if ($resultPro->count())
						<p style="display:block;margin-bottom:20px;">
							Đã tìm thấy {{$countproduct}} kết quả phù hợp
						</p>
					@else
						<p style="display:block;margin-bottom:20px;">
							Không tìm thấy kết quả phù hợp cho từ khóa "{{$keyword}}"
						</p>
					@endif
				</div>


				<div class="product-list grid gap-gutter grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 ">
					@foreach ($resultPro as $item)

							@include('layouts.product.item',['pro'=>$item])

					@endforeach

				</div>
			</div>
		</section>
	</main>
@endsection
