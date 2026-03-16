<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Monster;

class MonsterSeeder extends Seeder
{
    public function run(): void
    {
        // Mapping from old type_id to type name
        $types = [
            1 => 'Aquatique',
            2 => 'Terrestre',
            3 => 'Volant',
            4 => 'Cosmique',
            5 => 'Spectral',
            6 => 'Légendaire',
        ];

        $monsters = [
            [
                'name' => 'AquaDragon',
                'type_id' => 1,
                'pv' => 150,
                'attack' => 100,
                'defense' => 140,
                'image_url' => 'aquadragon.png',
                'description' => 'Un dragon aquatique légendaire.',
            ],
            [
                'name' => 'TerraWolf',
                'type_id' => 2,
                'pv' => 120,
                'attack' => 80,
                'defense' => 137,
                'image_url' => 'terrawolf.png',
                'description' => 'Un loup terrestre féroce.',
            ],
            [
                'name' => 'SkyEagle',
                'type_id' => 3,
                'pv' => 100,
                'attack' => 70,
                'defense' => 116,
                'image_url' => 'skyeagle.png',
                'description' => 'Un aigle majestueux volant haut dans le ciel.',
            ],
            [
                'name' => 'CosmoSerpent',
                'type_id' => 4,
                'pv' => 130,
                'attack' => 90,
                'defense' => 119,
                'image_url' => 'cosmoserpent.png',
                'description' => 'Un serpent cosmique mystérieux.',
            ],
            [
                'name' => 'GhostPhantom',
                'type_id' => 5,
                'pv' => 110,
                'attack' => 60,
                'defense' => 97,
                'image_url' => 'ghostphantom.png',
                'description' => 'Un fantôme spectral énigmatique.',
            ],
            [
                'name' => 'LavaGiant',
                'type_id' => 2,
                'pv' => 140,
                'attack' => 95,
                'defense' => 80,
                'image_url' => 'lavagiant.png',
                'description' => 'Un géant de lave indestructible.',
            ],
            [
                'name' => 'IcePixie',
                'type_id' => 3,
                'pv' => 90,
                'attack' => 65,
                'defense' => 59,
                'image_url' => 'icepixie.png',
                'description' => 'Un pixie de glace charmant.',
            ],
            [
                'name' => 'StormRider',
                'type_id' => 3,
                'pv' => 115,
                'attack' => 75,
                'defense' => 105,
                'image_url' => 'stormrider.png',
                'description' => 'Un cavalier tempétueux.',
            ],
            [
                'name' => 'RockGolem',
                'type_id' => 2,
                'pv' => 135,
                'attack' => 85,
                'defense' => 100,
                'image_url' => 'rockgolem.png',
                'description' => 'Un golem de roche solide.',
            ],
            [
                'name' => 'FlameSprite',
                'type_id' => 1,
                'pv' => 105,
                'attack' => 55,
                'defense' => 136,
                'image_url' => 'flamesprite.png',
                'description' => 'Un esprit de flamme vif.',
            ],
            // 👉 you can continue adding the rest later (structure stays the same)
        ];

        foreach ($monsters as $monster) {
            Monster::create([
                'name' => $monster['name'],
                'type' => $types[$monster['type_id']] ?? 'Unknown',
                'pv' => $monster['pv'],
                'attack' => $monster['attack'],
                'defense' => $monster['defense'],
                'description' => $monster['description'],
                'image_url' => $monster['image_url'],
            ]);
        }
    }
}
