@extends('templates.default')

@section('content')
  <div class="container mx-auto pb-12">

    {{-- Random monster (if DB not empty) --}}
    @if($randomMonster)
      <section class="mb-20">
        <h2 class="text-2xl font-bold mb-4 creepster">Monstre aléatoire</h2>

        <div class="bg-gray-700 rounded-lg shadow-lg monster-card" data-monster-type="{{ strtolower($randomMonster->type) }}">
          <div class="md:flex">
            <div class="w-full md:w-1/2 relative">
              <img
                class="w-full h-full object-cover rounded-t-lg md:rounded-l-lg md:rounded-t-none"
                src="{{ $randomMonster->image_url ? asset('images/'.$randomMonster->image_url) : asset('images/placeholder.png') }}"
                alt="{{ $randomMonster->name }}"
              />
            </div>

            <div class="p-6 md:w-1/2">
              <h2 class="text-3xl font-bold mb-2 creepster">{{ $randomMonster->name }}</h2>

              <p class="text-gray-300 text-sm mb-4">
                {{ $randomMonster->description }}
              </p>

              <div class="mb-4">
                <div><strong class="text-white">Type:</strong> <span class="text-gray-300">{{ $randomMonster->type }}</span></div>
                <div><strong class="text-white">PV:</strong> <span class="text-gray-300">{{ $randomMonster->pv }}</span></div>
                <div><strong class="text-white">Attaque:</strong> <span class="text-gray-300">{{ $randomMonster->attack }}</span></div>
                <div><strong class="text-white">Défense:</strong> <span class="text-gray-300">{{ $randomMonster->defense }}</span></div>
              </div>

              <a
                href="{{ route('monsters.show', $randomMonster) }}"
                class="inline-block text-white bg-red-500 hover:bg-red-700 rounded-full px-4 py-2 transition-colors duration-300"
              >
                Plus de détails
              </a>
            </div>
          </div>
        </div>
      </section>
    @endif

    {{-- Latest monsters --}}
    <section class="mb-20">
      <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-bold creepster">Derniers monstres ajoutés</h2>
        <a href="{{ route('monsters.create') }}" class="text-white bg-red-500 hover:bg-red-700 rounded-full px-4 py-2 transition-colors duration-300">
          Ajouter un monstre
        </a>
      </div>

      @if($latestMonsters->isEmpty())
        <p class="text-gray-300">Aucun monstre pour le moment.</p>
      @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
          @foreach($latestMonsters as $monster)
            <article class="relative bg-gray-700 rounded-lg shadow-lg hover:shadow-2xl transition-shadow duration-300 monster-card" data-monster-type="{{ strtolower($monster->type) }}">
              <img class="w-full h-48 object-cover rounded-t-lg"
                   src="{{ $monster->image_url ? asset('images/'.$monster->image_url) : asset('images/placeholder.png') }}"
                   alt="{{ $monster->name }}" />

              <div class="p-4">
                <h3 class="text-xl font-bold">{{ $monster->name }}</h3>

                <p class="text-gray-300 text-sm mb-2">
                  {{ \Illuminate\Support\Str::limit($monster->description, 80) }}
                </p>

                <div class="flex justify-between items-center mb-2">
                  <span class="text-sm text-gray-300">Type: {{ $monster->type }}</span>
                </div>

                <div class="flex justify-between items-center mb-4">
                  <span class="text-sm text-gray-300">PV: {{ $monster->pv }}</span>
                  <span class="text-sm text-gray-300">Attaque: {{ $monster->attack }}</span>
                </div>

                <div class="text-center">
                  <a href="{{ route('monsters.show', $monster) }}"
                     class="inline-block text-white bg-red-500 hover:bg-red-700 rounded-full px-4 py-2 transition-colors duration-300">
                    Plus de détails
                  </a>
                </div>
              </div>
            </article>
          @endforeach
        </div>
      @endif
    </section>
  </div>
@endsection
