<x-layouts::auth :title="__('Connexion')">

    <div class="flex flex-col gap-6">

        {{-- Header --}}
        <div class="text-center space-y-2">
            <h1 class="text-3xl font-bold text-red-500">
                Bienvenue sur LinkedOut
            </h1>

            <p class="text-sm text-gray-500">
                Connecte-toi pour partager tes plus beaux échecs professionnels.
            </p>
        </div>

        {{-- Status --}}
        <x-auth-session-status
            class="text-center text-green-600"
            :status="session('status')"
        />

        {{-- Form --}}
        <form
            method="POST"
            action="{{ route('login.store') }}"
            class="flex flex-col gap-5"
        >
            @csrf

            {{-- Email --}}
            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-700">
                    Adresse email
                </label>

                <flux:input
                    name="email"
                    :value="old('email')"
                    type="email"
                    required
                    autofocus
                    autocomplete="email"
                    placeholder="email@example.com"
                />

                @error('email')
                    <p class="text-sm text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="space-y-2">

                <div class="flex items-center justify-between">
                    <label class="text-sm font-medium text-gray-700">
                        Mot de passe
                    </label>

                    @if (Route::has('password.request'))
                        <flux:link
                            class="text-sm text-red-500 hover:text-red-600"
                            :href="route('password.request')"
                            wire:navigate
                        >
                            Mot de passe oublié ?
                        </flux:link>
                    @endif
                </div>

                <flux:input
                    name="password"
                    type="password"
                    required
                    autocomplete="current-password"
                    placeholder="••••••••"
                    viewable
                />

                @error('password')
                    <p class="text-sm text-red-500">
                        {{ $message }}
                    </p>
                @enderror

            </div>

            {{-- Remember --}}
            <div class="flex items-center justify-between">
                <flux:checkbox
                    name="remember"
                    :label="__('Se souvenir de moi')"
                    :checked="old('remember')"
                />
            </div>

            {{-- Submit --}}
            <flux:button
                variant="primary"
                type="submit"
                class="w-full bg-red-600 hover:bg-red-700 transition"
            >
                Se connecter
            </flux:button>

        </form>

        {{-- Register --}}
        @if (Route::has('register'))
            <div class="text-center text-sm text-gray-500">

                <span>
                    Pas encore de compte ?
                </span>

                <flux:link
                    :href="route('register')"
                    wire:navigate
                    class="text-red-500 hover:text-red-600 font-medium"
                >
                    Créer un compte
                </flux:link>

            </div>
        @endif

    </div>

</x-layouts::auth>