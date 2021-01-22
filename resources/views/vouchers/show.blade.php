<x-app-layout>

    <section class="bg-primary relative">
        
        <div class="absolute w-1/2 h-full">
            <img class="w-full h-full object-cover object-center" src="{{Storage::url($voucher->image)}}" alt="">
        </div>

        {{-- grid --}}
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex">

            <article class="pl-4 py-8 w-1/2 ml-auto">
                <h1 class="text-xl text-white font-bold uppercase mb-6">{{$voucher->title}}</h1>

                <p class="text-white mb-6">{{$voucher->description}}</p>

                <p class="text-sm text-white mb-1">Beneficio valido hasta: {{$voucher->expiration_date->format('d/m/Y')}}</p>
                <p class="text-xs text-secondary font-bold uppercase">Categoría: {{$voucher->brand->category->name}}</p>
            </article>
        </div>

    </section>

    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-3 grid grid-cols-4 gap-6 mt-8">

        <div class="col-span-3 rounded overflow-hidden shadow-lg flex flex-col bg-white">
            <div class="px-6 py-4">

            </div>
        </div>

        <div class="rounded overflow-hidden shadow-lg flex flex-col bg-white">
            <div class="px-6 py-4">

            </div>
        </div>

    </section>

</x-app-layout>