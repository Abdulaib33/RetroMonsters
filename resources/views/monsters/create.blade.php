@extends('templates.default')

@section('content')
  <div class="container mx-auto pb-12">
    <div class="flex flex-wrap justify-center">
      <div class="w-full">
        <div class="bg-gray-700 p-6 rounded-lg shadow-lg">
          <h2 class="text-2xl font-bold mb-4 text-center creepster">
            Ajouter un monstre
          </h2>

          @if ($errors->any())
            <div class="mb-4 bg-red-900/40 border border-red-500/40 rounded p-4">
              <ul class="list-disc list-inside text-red-200">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form class="space-y-6" method="POST" action="{{ route('monsters.store') }}">
            @csrf

            <div>
              <label for="name" class="block mb-1">Nom *</label>
              <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                class="w-full border rounded px-3 py-2 text-gray-700"
                placeholder="Nom du Monstre"
                required
              />
            </div>

            <div>
              <label for="type" class="block mb-1">Type *</label>
              <select
                id="type"
                name="type"
                class="w-full border rounded px-3 py-2 text-gray-700"
                required
              >
                <option value="">Choisir un type</option>
                @foreach (['Aquatique','Terrestre','Volant','Cosmique','Spectral','Légendaire'] as $t)
                  <option value="{{ $t }}" @selected(old('type') === $t)>{{ $t }}</option>
                @endforeach
              </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
              <div>
                <label for="pv" class="block mb-1">PV *</label>
                <input type="number" id="pv" name="pv" min="0" value="{{ old('pv', 0) }}"
                       class="w-full border rounded px-3 py-2 text-gray-700" required />
              </div>

              <div>
                <label for="attack" class="block mb-1">Attaque *</label>
                <input type="number" id="attack" name="attack" min="0" value="{{ old('attack', 0) }}"
                       class="w-full border rounded px-3 py-2 text-gray-700" required />
              </div>

              <div>
                <label for="defense" class="block mb-1">Défense *</label>
                <input type="number" id="defense" name="defense" min="0" value="{{ old('defense', 0) }}"
                       class="w-full border rounded px-3 py-2 text-gray-700" required />
              </div>
            </div>

            <div>
              <label for="image_url" class="block mb-1">Image (filename) (optionnel)</label>
              <input
                type="text"
                id="image_url"
                name="image_url"
                value="{{ old('image_url') }}"
                class="w-full border rounded px-3 py-2 text-gray-700"
                placeholder="ex: aquadragon.png"
              />
            </div>

            <div>
              <label for="description" class="block mb-1">Description (optionnel)</label>
              <textarea
                id="description"
                name="description"
                class="w-full border rounded px-3 py-2 text-gray-700"
                rows="4"
                placeholder="Description du monstre..."
              >{{ old('description') }}</textarea>
            </div>

            <div class="flex justify-between items-center">
              <button type="submit"
                      class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Ajouter
              </button>

              <a href="{{ route('monsters.index') }}" class="text-red-400 hover:text-red-500">
                Annuler
              </a>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
@endsection
