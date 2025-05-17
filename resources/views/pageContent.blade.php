@extends('layouts.main.master')
@section('title')
{{$pagecontentdetail->title}}
@endsection
@section('description')
{{$pagecontentdetail->title}}
@endsection
@section('image')
{{url(''.$banner[0]->image)}}
@endsection
@section('css')
@endsection
@section('js')
@endsection
@section('content')
   <main>
      <div class="breadcrumbs">

         <div class="container">
            <ul class="  breadcrumb py-3 flex flex-wrap items-center text-xs md:text-sm">
               <li class="home">
                  <a class="link" href="index.html" title="Trang chủ"><span>Trang chủ</span></a>
                  <span class="mx-1 md:mx-2 inline-block">&nbsp;/&nbsp;</span>
               </li>

               <li>
                  <span class="text-neutral-100">Giới thiệu</span>
               </li>

            </ul>
         </div>
      </div>
      <section class="section section-main-contact" style="--section-margin: 0px 0px 40px; --section-margin-mb: 0px 0px 20px">
         <div class="container" >
            <div class="bg-background rounded-lg p-3 md:p-6 mb-6" style="
">
               <div class="">
                  <div>
                     <h1 class="text-h4 font-semibold mb-2">{{$pagecontentdetail->title}}</h1>


                     <div class="grid justify-between gap-2">
                        {!!($pagecontentdetail->content)!!}
                     </div>

                  </div>

               </div>
            </div>
         </div>
      </section>

   </main>
@endsection
