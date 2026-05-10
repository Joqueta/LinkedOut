<?php

use App\Models\Company;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comapnies_fails', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('birth_date');
            $table->text('description');
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Company::class)->constrained()->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text("message");
            $table->foreignIdFor(Post::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comapnies_fail');
        Schema::dropIfExists('comment');
    }
};
