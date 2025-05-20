<style>

</style>
<footer class="bg-background">
    <div class="container">
        <div
            class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-x-gutter gap-y-6 pt-6 pb-3  md:pt-[var(--spacing-10)] md:pb-[var(--spacing-12)]"
        >
            <div class="footer-col" style=" padding-right: 20px; margin-right: 20px;">
                <a class="footer-logo mb-3 block" href="{{ route('home') }}" title="{{$setting->company}}">
                    <img
                        class="object-contain"
                        loading="lazy"
                        src="{{$setting->logo}}"
                        alt="{{$setting->company}}"
                        width="172"
                        height="44"
                    >
                </a>
                <div class="mb-3">
                    {{$setting->webname}}
                </div>
                <div class="mb-3">
                    Mã số thuế: 0109512743
                </div>
                <div class="contact-group mb-5">
                    <div class="flex gap-1 items-start mb-3">
                        <i class="icon icon-location text-neutral-200"></i>
                        <div class="">
                            <p class="text-forground">Địa chỉ</p>
                            <p class="font-semibold">
                                <span> {{$setting->address1}} </span>
                            </p>
                        </div>
                    </div>
                    <div class="xl:flex grid gap-2" style="column-gap: var(--spacing-8);">
                        <div class="flex gap-1 items-start">
                            <i class="icon icon-call text-neutral-200"></i>
                            <div class="">
                                <p class="text-forground">Hotline</p>
                                <a
                                    class="font-semibold text-primary link"
                                    href="tel:{{$setting->phone1}}"
                                    title="{{$setting->phone1}}"
                                >
                                    {{$setting->phone1}}                  </a>
                            </div>
                        </div>
                        <div class="flex gap-1 items-start">
                            <i class="icon icon-sms text-neutral-200"></i>
                            <div class="">
                                <p class="text-forground">Email</p>
                                <a class="font-semibold link"
                                   title="support@sapo.vn"
                                   href="mailto:support@sapo.vn">
                                    {{$setting->email}}               </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="social-icons">
                    <p class="font-semibold mb-3">Mạng xã hội</p>
                    <div class="flex gap-3">
                        <div class="facebook  border border-neutral-50 rounded-sm flex items-center justify-center w-[3.6rem] h-[3.6rem] hover:bg-neutral-50">
                            <a href=" {{$setting->facebook}}  " target="_blank" aria-label="Facebook" title="Facebook">
                                <img
                                    src="/frontend/images/facebook50e9.png?1746694962638"
                                    width="20"
                                    height="20"
                                    alt="facebook footer"
                                    loading="lazy"
                                >
                            </a>
                        </div>
                        <div class="instgram border border-neutral-50 rounded-sm flex items-center justify-center w-[3.6rem] h-[3.6rem] hover:bg-neutral-50">
                            <a href="https://zalo.me/" target="_blank" title="Zalo" aria-label="Zalo">
                                <img
                                    src="/frontend/images/zalo50e9.png?{{$setting->phone1}}"
                                    width="20"
                                    height="20"
                                    alt="zalo footer"
                                    loading="lazy"
                                >
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-col ">
                <details open class="footer-details">
                    <summary class="text-base font-semibold mb-2 flex items-center justify-between">
                        Chính sách
                        <i class="icon icon-carret-right inline-block md:hidden"></i>
                    </summary>
                    <ul class="list-menu space-y-4  list-disc pl-3.5">
                        @foreach ($pageContent as $item)
                            @if ($item->type == 'ho-tro-khanh-hang')
                                <li class="li_menu"><a href="{{route('pagecontent',['slug'=>$item->slug])}}" title="{{$item->title}}">{{$item->title}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </details>
                <div class="mt-6">
                    <p class="text-base font-semibold mb-2">
                        Tổng đài hỗ trợ
                    </p>
                    <ul class=" list-menu space-y-4  list-disc pl-3.5">
                        <li>
                            <a class="link" href="tel:{{$setting->phone1}}" title="Gọi chúng tôi 24/7: {{$setting->phone1}}" >
                                Gọi chúng tôi 24/7: {{$setting->phone1}}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer-col">
            </div>
            <div class="footer-col">
                <details open class="footer-details">
                    <summary class="text-base font-semibold mb-2 flex items-center justify-between">
                        Vị trí
                        <i class="icon icon-carret-right inline-block md:hidden"></i>
                    </summary>
                    {!!$setting->iframe_map!!}
                </details>

            </div>
        </div>
        <div class="footer-copyright border-t border-neutral-50 py-3 text-center text-neutral-300 grid gird-cols-1 md:grid-cols-[1fr_auto] items-center" >
               <span class="wsp">
               © Bản quyền thuộc về
               <a
                   href="#"
                   rel="nofollow"
                   target="_blank"
                   title="#"
                   class="link font-semibold"
               >VPP Long Nguyen</a
               >
               | Cung cấp bởi
               <a
                   href="https://sbtsoftware.vn/"
                   rel="nofollow"
                   title="Sapo"
                   class="link font-semibold"
                   target="_blank"
               >SBT</a
               >
               </span>
        </div>
    </div>
</footer>
