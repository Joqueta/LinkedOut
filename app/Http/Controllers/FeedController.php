<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Type;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Schema;

class FeedController extends Controller
{
    private const POST_TYPES = [
        'fierte' => [
            'label' => 'Fierté',
            'badge' => 'bg-pity-light text-pity-dark border-pity',
            'placeholder' => 'Raconte un petit succès, même absurde.',
            'template' => 'Je suis fier de partager que j\'ai enfin transformé ce bug en fonctionnalité. Après trois cafés, deux post-it et une conversation très sérieuse avec mon écran, j\'ai gagné une bataille que personne n\'avait demandée.',
        ],
        'aveu' => [
            'label' => 'Aveu',
            'badge' => 'bg-shame-light text-shame-dark border-shame',
            'placeholder' => 'Avoue ce que tu n\'as pas osé dire en réunion.',
            'template' => 'Je l\'avoue : j\'ai dit "je reviens vers vous" alors que je savais déjà que j\'allais faire semblant d\'avoir été bloqué toute la journée par un faux problème de priorité.',
        ],
        'excuse' => [
            'label' => 'Excuse',
            'badge' => 'bg-failure-light text-failure-dark border-failure',
            'placeholder' => 'Présente tes excuses avec style.',
            'template' => 'Je présente mes excuses pour ce retard. J\'ai sous-estimé la durée exacte d\'une tâche simple, puis j\'ai passé 40 minutes à chercher un fichier que j\'avais moi-même renommé.',
        ],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with(['user', 'type'])
            ->latest()
            ->paginate(10);

        $postTypes = Type::all();

        return view('feed.index', [
            'posts'    => $posts,
            'postTypes' => $postTypes,
        ]);
    }

    public function store(Request $request)
    {
        // If the types table exists, require an existing type id. Otherwise accept one of the in-memory keys.
        if (Schema::hasTable('types')) {
            $validated = $request->validate([
                'title' => ['required', 'max:20'],
                'content' => ['required', 'max:255'],
                'type' => ['required', 'exists:types,id'],
            ]);

            $createData = [
                'title' => $validated['title'],
                'content' => $validated['content'],
                'user_id' => Auth::id(),
            ];

            if (Schema::hasColumn('posts', 'type_id')) {
                $createData['type_id'] = $validated['type'];
            } elseif (Schema::hasColumn('posts', 'type')) {
                $typeModel = Type::find($validated['type']);
                $createData['type'] = $typeModel?->name ?? $validated['type'];
            }

            Post::create($createData);
            $typeLabel = Type::find($validated['type'])?->name ?? 'votre post';

            return back()->with('success', 'Votre ' . $typeLabel . ' est bien publiée.');
        }

        // DB types table missing: validate against the in-memory POST_TYPES keys
        $allowed = array_keys(self::POST_TYPES);
        $validated = $request->validate([
            'title' => ['required', 'max:20'],
            'content' => ['required', 'max:255'],
            'type' => ['required', Rule::in($allowed)],
        ]);

        $createData = [
            'title' => $validated['title'],
            'content' => $validated['content'],
            'user_id' => Auth::id(),
        ];

        if (Schema::hasColumn('posts', 'type')) {
            $createData['type'] = $validated['type'];
        } elseif (Schema::hasColumn('posts', 'type_id')) {
            // Cannot resolve numeric id without types table; leave null to avoid DB errors
            $createData['type_id'] = null;
        }

        Post::create($createData);
        $typeLabel = self::POST_TYPES[$validated['type']]['label'] ?? 'post';

        return back()->with('success', 'Votre ' . $typeLabel . ' est bien publié.');
    }

    public static function postTypes(): array
    {
        return self::POST_TYPES;
    }
}
