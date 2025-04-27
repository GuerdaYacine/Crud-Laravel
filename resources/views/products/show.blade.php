<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $product->title }} - Coffee Shop</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 min-h-screen flex flex-col justify-between">
        @include('layouts.navbar')
        <main class="container mx-auto px-4 py-8 flex-grow">
            <div class="flex items-center mb-6">
                <a href="{{ route('home') }}" class="text-indigo-600 hover:text-indigo-800 mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Retour aux produits
                </a>
            </div>
            
            <div class="bg-white rounded-lg shadow-md overflow-hidden max-w-4xl mx-auto">
                <div class="md:flex">
                    <div class="md:w-1/2">
                        @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center min-h-64">
                                <span class="text-gray-400">Pas d'image disponible</span>
                            </div>
                        @endif
                    </div>
                    
                    <div class="p-6 md:w-1/2">
                        <h1 class="text-2xl font-bold text-gray-800 mb-2">{{ $product->title }}</h1>
                        <p class="text-indigo-600 font-bold text-xl mb-4">{{ number_format($product->price, 2) }} €</p>
                        
                        <div class="mb-6">
                            <h2 class="text-lg font-semibold text-gray-700 mb-2">Description</h2>
                            <p class="text-gray-600">{{ $product->description }}</p>
                        </div>
                        
                        @auth
                        <div class="flex space-x-3">
                            <a href="{{ route('products.edit', $product) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded">
                                Modifier
                            </a>
                            
                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')" 
                                    class="cursor-pointer bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-4 rounded">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </main>
        @include('layouts.footer')
    </body>
</html>