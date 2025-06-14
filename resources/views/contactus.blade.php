@extends('layouts.main.master')
@section('title')
Liên hệ với chúng tôi
@endsection
@section('description')
Liên hệ với chúng tôi
@endsection
@section('image')
{{url(''.$setting->logo)}}
@endsection
@section('css')
<link href="{{asset('frontend/css/contact_style.scss.css?1663035745304')}}" rel="stylesheet" type="text/css" />
<link rel="preload" as='style' type="text/css" href="{{asset('frontend/css/contact_style.scss.css?1663035745304')}}">
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
						<span class="text-neutral-100">Giới thiệu</span>
					</li>
				</ul>
			</div>
		</div>
		<section class="section section-main-contact" style="--section-margin: 0px 0px 40px; --section-margin-mb: 0px 0px 20px">
			<div class="container">
				<div class="bg-background rounded-lg p-3 md:p-6 mb-6">
					<div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-4">
						<div>
							<h1 class="text-h4 font-semibold mb-2">{{$setting->company}}</h1>
							<div class="flex gap-1 items-start mb-3">
								<i class="icon icon-location text-neutral-200"></i>
								<div class="">
									<p class="text-forground">Địa chỉ</p>
									<p class="font-semibold">
										<span>	   {{$setting->address1}}</span>
									</p>
								</div>
							</div>
							<div class="grid justify-between gap-2">
								<div class="flex gap-1 items-start">
									<i class="icon icon-call text-neutral-200"></i>
									<div class="">
										<p class="text-forground">Hotline</p>
										<a class="font-semibold text-primary link" href="tel:{{$setting->phone1}}" title="{{$setting->phone1}}">
											{{$setting->phone1}}                </a>
									</div>
								</div>
								<div class="flex gap-1 items-start">
									<i class="icon icon-sms text-neutral-200"></i>
									<div class="">
										<p class="text-forground">Email</p>
										<a class="font-semibold link" href="mailto:{{$setting->email}}">
											{{$setting->email}}"               </a>
									</div>
								</div>
							</div>
							<div class="py-4">
								<h2 class="text-h5 font-semibold mb-2">Liên hệ với chúng tôi</h2>
								<form method="post" action="{{route('postcontact')}}" id="contact" accept-charset="UTF-8">
									@csrf
									<input name="FormType" type="hidden" value="contact"><input name="utf8" type="hidden" value="true"><input type="hidden" id="Token-3f4a8100de25474fa091574868065be4" name="Token" value="HFZXhmdgFAND9gSkhTS1JCShAFLRplQQomYjgTMTcAGjIjOxA6G0kbNDl9WyJGJD4hdANwAQsVQlBHUScSFToXVG4jZTEsfHs6IlUZLnJ3UXR7dVskRHA3IgpZQEkCFn9CT0gxRSxgVCE4a01rbUgPcml-GjNscElqfyBZO11nZCM6WEBLAQsVAQd0Og1lSlIpA2JyRG5RRk5QRBFWXFxXUmByXht6JD4hdANwFBwSYA"><script src="../www.google.com/recaptcha/apif78f.js?render=6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK"></script><script>grecaptcha.ready(function() {grecaptcha.execute("6Ldtu4IUAAAAAMQzG1gCw3wFlx_GytlZyLrXcsuK", {action: "contact"}).then(function(token) {document.getElementById("Token-3f4a8100de25474fa091574868065be4").value = token});});</script>
									<div class="form-signup clearfix">
										<div class="group_contact space-y-3">
											<fieldset class="form-group ">
												<input placeholder="Họ tên*" type="text" class="form-input" required="" value="" name="name">
											</fieldset>
											<fieldset class="form-group ">
												<input placeholder="Email*" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
													   required="" id="email1" class="form-input" value="" name="email">
											</fieldset>
											<fieldset class="form-group ">
												<textarea placeholder="Nhập nội dung*" name="mess" id="comment" class="form-textarea" rows="5" required=""></textarea>
											</fieldset>
											<div class="">
												<button type="submit" class="btn bg-primary text-white font-semibold btn-lienhe">Gửi liên hệ của bạn</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div>
							<div class="">
								<div id="contact_map" class="map aspect-video">
									{!!$setting->iframe_map!!}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
@endsection
