<x-layouts::auth :title="__('Inscription')">

    <div class="flex flex-col gap-6">

        {{-- Header --}}
        <div class="text-center space-y-2">
            <h1 class="text-3xl font-bold text-red-500">
                Rejoins LinkedOut
            </h1>

            <p class="text-sm text-gray-500">
                Crée ton compte et partage tes plus beaux désastres professionnels.
            </p>
        </div>

        {{-- Session Status --}}
        <x-auth-session-status
            class="text-center text-green-600"
            :status="session('status')"
        />

        {{-- Register Form --}}
        <form
            method="POST"
            action="{{ route('register.store') }}"
            class="flex flex-col gap-5"
        >
            @csrf

            {{-- Name --}}
            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-700">
                    Nom complet
                </label>

                <flux:input
                    name="name"
                    :value="old('name')"
                    type="text"
                    required
                    autofocus
                    autocomplete="name"
                    placeholder="Baptiste Roy"
                />

                @error('name')
                    <p class="text-sm text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

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
                <label class="text-sm font-medium text-gray-700">
                    Mot de passe
                </label>

                <flux:input
                    name="password"
                    type="password"
                    required
                    autocomplete="new-password"
                    placeholder="••••••••"
                    viewable
                />

                @error('password')
                    <p class="text-sm text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="space-y-2">
                <label class="text-sm font-medium text-gray-700">
                    Confirmation du mot de passe
                </label>

                <flux:input
                    name="password_confirmation"
                    type="password"
                    required
                    autocomplete="new-password"
                    placeholder="••••••••"
                    viewable
                />

                @error('password_confirmation')
                    <p class="text-sm text-red-500">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Submit --}}
            <flux:button
                type="submit"
                variant="primary"
                class="w-full bg-red-600 hover:bg-red-700 transition"
            >
                Créer mon compte
            </flux:button>

        </form>

        {{-- Login Link --}}
        <div class="text-center text-sm text-gray-500">

            <span>
                Déjà un compte ?
            </span>

            <flux:link
                :href="route('login')"
                wire:navigate
                class="text-red-500 hover:text-red-600 font-medium"
            >
                Se connecter
            </flux:link>

        </div>

    </div>

</x-layouts::auth>