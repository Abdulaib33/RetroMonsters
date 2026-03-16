@extends('templates.default')

@section('content')
  <div class="container mx-auto pb-12">

    <div class="flex items-center justify-between mb-6">
      <h2 class="text-2xl font-bold creepster">Les 9 derniers monstres</h2>
      <a href="{{ route('monsters.create') }}"
         class="text-white bg-red-500 hover:bg-red-700 rounded-full px-4 py-2 transition-colors duration-300">
        Ajouter un monstre
      </a>
    </div>

    @if($monsters->isEmpty())
      <p class="text-gray-300">Aucun monstre pour le moment.</p>
    @else
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($monsters as $monster)
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

  </div>
@endsection
