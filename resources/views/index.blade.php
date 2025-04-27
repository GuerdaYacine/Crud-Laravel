<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Crud</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 min-h-screen flex flex-col justify-between">
        @include('layouts.navbar')
        <main class="container mx-auto px-4 py-8 flex-grow">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Nos produits</h1>
                
                @auth
                <a href="{{ route('products.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded">
                    Ajouter un produit
                </a>
                @endauth
            </div>
            
            @if(isset($products) && count($products) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($products as $product)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            @if(isset($product->image))
                                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-400">Pas d'image</span>
                                </div>
                            @endif
                            
                            <div class="p-4">
                                <h2 class="text-xl font-semibold text-gray-800 text-center">{{ $product->title }}</h2>
                                <p class="text-gray-600 mt-2">{{ $product->description }}</p>
                                <p class="text-indigo-600 font-bold mt-2">{{ number_format($product->price, 2) }} €</p>
                                <a href="{{ route('products.show', $product->id) }}">Voir le produit</a>
                                
                                @auth
                                <div class="mt-4 flex space-x-2">
                                    <a href="{{ route('products.edit', $product->id) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white py-1 px-3 rounded text-sm">
                                        Modifier
                                    </a>
                                    
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')" 
                                            class="cursor-pointer bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-sm">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                                @endauth
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">Aucun produit disponible pour le moment.</p>
            @endif
        </main>
        @include('layouts.footer')
    </body>
</html>
