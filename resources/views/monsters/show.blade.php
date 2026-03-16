@extends('templates.default')

@section('content')
  <div class="container mx-auto flex flex-wrap pb-12">
    <section class="w-full">

      <section class="mb-10">
        <div class="bg-gray-700 rounded-lg shadow-lg monster-card" data-monster-type="{{ strtolower($monster->type) }}">
          <div class="md:flex">

            <div class="w-full md:w-1/2 relative">
              <img
                class="w-full h-full object-cover rounded-t-lg md:rounded-l-lg md:rounded-t-none"
                src="{{ $monster->image_url ? asset('images/'.$monster->image_url) : asset('images/placeholder.png') }}"
                alt="{{ $monster->name }}"
              />
            </div>

            <div class="p-6 md:w-1/2">
              <h2 class="text-3xl font-bold mb-2 creepster">{{ $monster->name }}</h2>

              <p class="text-gray-300 text-sm mb-4">
                {{ $monster->description }}
              </p>

              <div class="mb-6">
                <div><strong class="text-white">Type:</strong> <span class="text-gray-300">{{ $monster->type }}</span></div>
                <div><strong class="text-white">PV:</strong> <span class="text-gray-300">{{ $monster->pv }}</span></div>
                <div><strong class="text-white">Attaque:</strong> <span class="text-gray-300">{{ $monster->attack }}</span></div>
                <div><strong class="text-white">Défense:</strong> <span class="text-gray-300">{{ $monster->defense }}</span></div>
              </div>

              <div class="flex flex-wrap gap-3">
                <a href="{{ route('monsters.edit', $monster) }}"
                   class="inline-block text-white bg-red-500 hover:bg-red-700 rounded-full px-4 py-2 transition-colors duration-300">
                  Modifier
                </a>

                <form action="{{ route('monsters.destroy', $monster) }}" method="POST" onsubmit="return confirm('Supprimer ce monstre ?');">
                  @csrf
                  @method('DELETE')
                  <button
                    type="submit"
                    class="inline-block text-white opacity-80 hover:opacity-100 rounded-full px-4 py-2 transition-colors duration-300 border border-white/20"
                  >
                    Supprimer
                  </button>
                </form>

                <a href="{{ route('monsters.index') }}"
                   class="inline-block text-gray-300 hover:text-white rounded-full px-4 py-2 transition-colors duration-300">
                  Retour
                </a>
              </div>

            </div>
          </div>
        </div>
      </section>

    </section>
  </div>
@endsection
