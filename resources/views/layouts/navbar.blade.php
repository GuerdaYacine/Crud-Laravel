<nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <a href="/" class="text-xl font-bold text-indigo-600">MonSite</a>
            <div class="flex items-center space-x-8">
                @auth
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') || request()->routeIs('products*') ? 'text-indigo-600 font-semibold' : 'text-gray-700 hover:text-indigo-600' }} transition font-medium">Produits</a>
                <a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'text-indigo-600 font-semibold' : 'text-gray-700 hover:text-indigo-600' }} transition font-medium">Profil</a>
                <a href="{{ route('logout') }}" class="{{ request()->routeIs('logout') ? 'text-indigo-600 font-semibold' : 'text-gray-700 hover:text-indigo-600' }} transition font-medium">Deconnexion</a>
                @else
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') || request()->routeIs('products*') ? 'text-indigo-600 font-semibold' : 'text-gray-700 hover:text-indigo-600' }} transition font-medium">Produits</a>
                <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'text-indigo-600 font-semibold' : 'text-gray-700 hover:text-indigo-600' }} transition font-medium">Connexion</a>
                <a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'text-indigo-600 font-semibold' : 'text-gray-700 hover:text-indigo-600' }} transition font-medium">Inscription</a>
                @endauth
            </div>
        </div>
    </div>
</nav>