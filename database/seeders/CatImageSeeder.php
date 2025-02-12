<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\CatImage;

class CatImageSeeder extends Seeder
{
    public function run(): void
    {
        $limit = 100; // Nombre d'imatges per petició
        $total = 1000; // Màxim d'imatges a importar (ajustar si cal)
        $importades = 0;
        $page = 0;

        while ($importades < $total) {
            $response = Http::get("https://cataas.com/api/cats?skip={$importades}&limit={$limit}");
            $data = $response->json();

            if (empty($data)) {
                break; // Si no hi ha més dades, aturem la importació
            }

            foreach ($data as $item) {
                if (!isset($item['id'])) {
                    continue;
                }

                CatImage::updateOrCreate(
                    ['_id' => $item['id']], // Evita duplicats
                    [
                        'mimetype' => $item['mimetype'] ?? 'unknown',
                        'size' => $item['size'] ?? 0,
                        'tags' => $item['tags'] ?? [],
                    ]
                );
            }

            $importades += count($data);
            $page++;
            echo "✔ Pàgina $page importada! Total imatges: $importades\n";
        }

        echo "🐱 Importació finalitzada amb $importades imatges!\n";
    }
}
