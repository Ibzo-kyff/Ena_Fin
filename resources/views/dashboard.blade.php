<x-app-layout> 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Accueil
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-8 text-center text-gray-800">Livres disponibles</h1>

                <!-- Formulaire de recherche -->
                <form method="GET" action="{{ route('dashboard') }}" class="mb-6">
                    <div class="flex items-center space-x-2">
                        <input type="text" name="search" value="{{ request('search') }}" 
                               placeholder="Rechercher un livre..." 
                               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300">
                               <button type="submit" class="text-white px-4 py-2 rounded-lg transition-colors" style="background-color: #004AAD;">
                                    Rechercher
                                </button>
                    </div>
                </form>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @forelse ($livres as $livre)
                        <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 p-6 border border-gray-100">
                            <h5 class="text-xl font-bold  mb-3"style="color: #004AAD;">{{ $livre->titre }}</h5>
                            <p class="text-gray-600 text-sm mb-4">{{ $livre->description }}</p>

                            <a href="{{ asset('storage/' . $livre->chemin) }}" class="mt-4 inline-flex items-center justify-center text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-300" download style="background-color: #004AAD;">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                                Télécharger
                            </a>
                        </div>
                    @empty
                        <p class="text-gray-500 text-center col-span-3">Aucun livre trouvé.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
