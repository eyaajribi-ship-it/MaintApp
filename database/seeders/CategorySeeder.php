<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
  public function run(): void
{
 
    $categories = [
        [
            'title' => 'Réparation',
            'metaTitle' => 'Réparer le matériel',
            'slug' => 'reparation',
            'content' => 'Toutes les astuces pour réparer les machines quand elles tombent en panne.'
        ],
        [
            'title' => 'Entretien',
            'metaTitle' => 'Prendre soin des machines',
            'slug' => 'entretien',
            'content' => 'Comment nettoyer et vérifier le matériel pour éviter les problèmes.'
        ],
        [
            'title' => 'Sécurité',
            'metaTitle' => 'Travailler sans danger',
            'slug' => 'securite',
            'content' => 'Les règles simples pour ne pas se blesser pendant le travail.'
        ],
        [
            'title' => 'Pièces de rechange',
            'metaTitle' => 'Changer les pièces',
            'slug' => 'pieces',
            'content' => 'Savoir quelles pièces commander pour remplacer celles qui sont usées.'
        ]
    ];

    foreach ($categories as $category) {
        \App\Models\Category::create($category);
    }
}
}