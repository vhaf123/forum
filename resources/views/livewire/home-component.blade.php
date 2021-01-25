<div>
    <div class="bg-primary">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex flex-col md:flex-row">

            <input wire:model="search" placeholder="¿Qué estás buscando?" autocomplete="off" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block flex-1 shadow-sm sm:text-sm border-gray-300 rounded-md px-3 py-1.5 md:py-0">
    
            <select wire:model="brand_id" class="md:mx-2 mt-1 block py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Buscar por marca</option>
                @foreach ($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
            </select>
    
            <select wire:model="category_id" class="md:mr-2 mt-1 block py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Buscar por categoría</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
    
            <button class="btn btn-secondary text-sm py-2 mt-2 md:py-0 md:mt-0" wire:click="$set('favorites', true)">VER FAVORITOS</button>
        </div>
    </div>

    

    <section class="py-8 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl text-center text-primary uppercase mb-8">BENEFICIOS</h1>

        {{-- {{session('customer')->id}} --}}

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-4">
            
            @forelse ($vouchers as $voucher)
                <article class="rounded overflow-hidden shadow-lg flex flex-col bg-white relative">
                    
                    @if (!$voucher->contador)
                        <div class="absolute w-full h-full bg-gray-400">

                        </div>
                    @endif

                    <div class="bg-primary px-6 py-2 flex justify-between items-center">
                        <h2 class="text-white uppercase font-bold">{{$voucher->brand->name}}</h2>

                        @if ($voucher->check)
                            <i wire:click="favorites({{$voucher}})" class="fas fa-star text-yellow-400 cursor-pointer"></i>
                        @else
                            <i wire:click="favorites({{$voucher}})" class="fas fa-star text-white cursor-pointer"></i>
                        @endif
                    </div>

                    <img class="w-full h-56 object-cover object-center" src="https://cdn.pixabay.com/photo/2020/12/10/20/40/color-5821297_960_720.jpg" alt="Sunset in the mountains">
    
                    <div class="px-6 pt-2 pb-4 flex-1 flex flex-col">
                        <a class="text-sm text-secondary" href="">{{$voucher->brand->category->name}}</a>
                        <h1 class="font-bold text-gray-700">{{$voucher->title}}</h1>
    
                        <div class="mt-auto flex justify-center pt-2">
                            <a class="btn btn-secondary" href="{{route('vouchers.show', $voucher)}}">VER BENEFICIO</a>
                        </div>
                    </div>
    
                </article>
            @empty
                <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3 col-span-3" role="alert">
                    <p class="font-bold">Mensaje informativo</p>
                    <p class="text-sm">No existe ningún beneficio con ese nombre.</p>
                </div>
            @endforelse
    
        </div>

        {{$vouchers->links()}}
    
    </section>
    
</div>
