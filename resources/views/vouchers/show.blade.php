<x-customer-layout>

    <section class="bg-primary relative">
        
        <div class="absolute w-1/2 h-64">
            {{-- <img class="w-full h-full object-cover object-center" src="{{Storage::url($voucher->image)}}" alt=""> --}}
            <img class="w-full h-full object-cover object-center" src="https://cdn.pixabay.com/photo/2020/12/10/20/40/color-5821297_960_720.jpg" alt="">
        </div>

        {{-- grid --}}
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex h-64 items-center">

            <article class="pl-4 py-8 w-1/2 ml-auto">
                <h1 class="text-xl text-white font-bold uppercase mb-6">{{$voucher->title}}</h1>

                <p class="text-white mb-6">{{$voucher->description}}</p>

                <p class="text-sm text-white mb-1">Beneficio valido hasta: {{$voucher->expiration_date->format('d/m/Y')}}</p>
                <p class="text-xs text-secondary font-bold uppercase">Categoría: {{$voucher->brand->category->name}}</p>
            </article>
        </div>

    </section>

    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-3 grid grid-cols-4 gap-6 mt-8">

        <article class="col-span-3 rounded overflow-hidden shadow-lg flex flex-col bg-white">
            <div class="px-8 py-6">
                <h1 class="text-xl text-primary uppercase font-bold mb-4">¿Cómo puedes disfrutarlo?</h1>
                {!!$voucher->description2!!}
            </div>
        </article>

        <div class="rounded overflow-hidden shadow-lg flex flex-col bg-white">
            <div class="px-6 py-4">
                {{-- <img src="{{$voucher->brand->url_logo}}" alt=""> --}}
                <img src="{{asset('img/logo/logo_Trasnvip.png')}}" alt="">

                @if ($voucher->url)
                    <a class="btn btn-secondary block" href="{{$voucher->url}}" target="_blank">{{$voucher->text_button}}</a>
                @else
                    <form action="{{route('vouchers.exchange', $voucher)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-secondary w-full">{{$voucher->text_button}}</button>
                    </form>
                @endif

            </div>
        </div>

    </section>
    

    <x-slot name="js">
        @if (session('info'))        
            <script>
                $(document).ready(function() {
                    toastr.info("{{session('info')}}");
                });
            </script>
        @endif
    </x-slot>

</x-customer-layout>