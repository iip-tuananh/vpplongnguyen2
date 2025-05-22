<style>
    /* chung cho cả success + error */
    .alert {
        position: fixed;
        top: 1rem;
        right: 1rem;
        z-index: 10000;
        max-width: 500px;
        display: flex;
        align-items: center;
        padding: .75rem 1rem;
        border-radius: .375rem;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        font-size: 1.875rem;
        /* animation: tên thời_gian ease-in-out forwards; */
        animation: slide-fade 4s ease-in-out forwards;
    }

    /* keyframes để slide-in, giữ, rồi slide-out/fade */
    @keyframes slide-fade {
        0%   { opacity: 0; transform: translateX(100%); }
        10%  { opacity: 1; transform: translateX(0);    }
        80%  { opacity: 1; transform: translateX(0);    }
        100% { opacity: 0; transform: translateX(100%); }
    }

    /* màu nền & viền */
    .alert-success {
        background-color: #ECFDF5;
        border: 1px solid #6EE7B7;
        color: #065F46;
    }

    .alert-danger {
        background-color: #FEF2F2;
        border: 1px solid #FCA5A5;
        color: #991B1B;
    }

    /* nếu có SVG icon */
    .alert svg {
        flex-shrink: 0;
        width: 2rem;
        height: 2rem;
    }

</style>


@if (session('success'))
    <div class="alert alert-success">
        {{-- icon success --}}
        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-5 h-5 flex-shrink-0 text-green-600"
             fill="none" viewBox="0 0 24 24"
             stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
        </svg>
        <span class="ml-2">{{ session('success') }}</span>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{-- icon error --}}
        <svg xmlns="http://www.w3.org/2000/svg"
             class="w-5 h-5 flex-shrink-0 text-red-600"
             fill="none" viewBox="0 0 24 24"
             stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
        </svg>
        <span class="ml-2">{{ session('error') }}</span>
    </div>
@endif
