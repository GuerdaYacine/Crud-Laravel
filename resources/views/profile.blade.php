<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pages contenant les informations d'un utilisateurs">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Profile</title>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col justify-between">
    @include('layouts.navbar')
    <main>
        <div class="max-w-2xl mx-auto py-10 px-4">
            <h2 class="text-3xl font-bold text-indigo-600 mb-6 text-center">Mon Profil</h2>
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif
    
            <!-- Informations du profil -->
            <form action="{{ route('profile.update') }}" method="POST" class="bg-white shadow-md rounded-2xl p-6 space-y-6 mb-8">
                @csrf
                @method('PUT')
                
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Informations personnelles</h3>
    
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
    
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('email')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
    
                <div class="text-right">
                    <button type="submit"
                        class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition">
                        Mettre à jour
                    </button>
                </div>
            </form>
            
            <!-- Changement de mot de passe -->
            <form action="{{ route('password.update') }}" method="POST" class="bg-white shadow-md rounded-2xl p-6 space-y-6">
                @csrf
                @method('PUT')
                
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Modifier mon mot de passe</h3>
                
                <div>
                    <label for="current_password" class="block text-sm font-medium text-gray-700">Mot de passe actuel</label>
                    <input type="password" id="current_password" name="current_password" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('current_password')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Nouveau mot de passe</label>
                    <input type="password" id="password" name="password" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('password')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le nouveau mot de passe</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                
                <div class="text-right">
                    <button type="submit"
                        class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded-lg shadow-md transition">
                        Changer le mot de passe
                    </button>
                </div>
            </form>
        </div>
    </main>
    @include('layouts.footer')
</body>
</html>