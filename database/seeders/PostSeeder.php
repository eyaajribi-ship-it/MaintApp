<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // On récupère le premier utilisateur pour être l'auteur
        $user = User::first();

        // Si tu n'as pas encore d'utilisateur, on en crée un vite fait
        if (!$user) {
            $user = User::create([
                'firstName' => 'Eya',
                'lastName' => 'Admin',
                'email' => 'eya@blog.tn',
                'passwordHash' => bcrypt('password'),
                'registeredAt' => now(),
            ]);
        }

        $posts = [
            [
                'authorId' => $user->id,
                'title' => 'Entretien des moteurs',
                'metaTitle' => 'Guide moteur',
                'slug' => 'entretien-moteur',
                'summary' => 'Comment garder un moteur en bon état.',
                'published' => 1,
                'content' => 'Il faut vérifier l\'huile et les filtres régulièrement pour éviter la casse.',
                'createdAt' => now(),
            ],
            [
                'authorId' => $user->id,
                'title' => 'Sécurité électrique',
                'metaTitle' => 'Danger électricité',
                'slug' => 'securite-electrique',
                'summary' => 'Les bases pour ne pas s\'électrocuter.',
                'published' => 1,
                'content' => 'Toujours porter des gants isolants et couper le disjoncteur avant d\'intervenir.',
                'createdAt' => now(),
            ]
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
} 
