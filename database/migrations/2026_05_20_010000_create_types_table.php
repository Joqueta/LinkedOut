<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('badge')->nullable();
            $table->string('placeholder')->nullable();
            $table->text('template')->nullable();
            $table->timestamps();
        });

        // Seed default types
        DB::table('types')->insert([
            ['name' => 'Fierté', 'badge' => 'bg-pity-light text-pity-dark border-pity', 'placeholder' => 'Raconte un petit succès, même absurde.', 'template' => "Je suis fier de partager que j'ai enfin transformé ce bug en fonctionnalité. Après trois cafés, deux post-it et une conversation très sérieuse avec mon écran, j'ai gagné une bataille que personne n'avait demandée.", 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Aveu', 'badge' => 'bg-shame-light text-shame-dark border-shame', 'placeholder' => 'Avoue ce que tu n\'as pas osé dire en réunion.', 'template' => 'Je l\'avoue : j\'ai dit "je reviens vers vous" alors que je savais déjà que j\'allais faire semblant d\'avoir été bloqué toute la journée par un faux problème de priorité.', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Excuse', 'badge' => 'bg-failure-light text-failure-dark border-failure', 'placeholder' => 'Présente tes excuses avec style.', 'template' => 'Je présente mes excuses pour ce retard. J\'ai sous-estimé la durée exacte d\'une tâche simple, puis j\'ai passé 40 minutes à chercher un fichier que j\'avais moi-même renommé.', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('types');
    }
};
