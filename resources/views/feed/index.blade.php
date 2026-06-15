<x-layouts.app>
   
    @auth
    @if (session('success'))
    <div class="mb-3 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-700 shadow-sm">
        {{ session('success') }}
    </div>
    @endif

    @php
    $selectedType = old('type', $postTypes->first()?->id ?? null);
    $selectedTypeData = $postTypes->firstWhere('id', $selectedType) ?? $postTypes->first();
    @endphp

    <form
        method="POST"
        action="{{ route('post.store') }}"
        class="bg-white rounded-2xl shadow-md p-5 mb-2 space-y-5"
        id="post-form">
        @csrf

        <input type="hidden" name="type" id="type" value="{{ $selectedTypeData->id ?? $selectedType }}">

        <div class="flex items-start gap-3">
            <img
                src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=dc2626&color=fff&size=128' }}"
                alt="{{ Auth::user()->name }}"
                class="w-12 h-12 rounded-full object-cover">

            <div class="flex-1 space-y-4">
                @error('type')
                <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror

                <div>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        value="{{ old('title') }}"
                        placeholder="Titre de ton échec..."
                        class="w-full rounded-xl border border-gray-300 px-4 py-3 text-sm focus:border-red-400 focus:ring-2 focus:ring-red-200 outline-none transition">

                    @error('title')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <textarea
                        name="content"
                        id="content"
                        rows="5"
                        placeholder="{{ $selectedTypeData->placeholder }}"
                        class="w-full resize-none rounded-xl border border-gray-300 px-4 py-3 text-sm focus:border-red-400 focus:ring-2 focus:ring-red-200 outline-none transition">{{ old('content', $selectedTypeData->template) }}</textarea>

                    @error('content')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid gap-3 sm:grid-cols-3">
                    @foreach ($postTypes as $type)
                    <button
                        type="button"
                        class="rounded-xl border px-4 py-3 text-left transition hover:-translate-y-0.5 hover:shadow-sm"
                        data-template-button="{{ $type->id }}"
                        data-type-id="{{ $type->id }}"
                        data-template="{{ $type->template }}"
                        data-placeholder="{{ $type->placeholder }}">
                        <span class="inline-flex rounded-full border px-2.5 py-1 text-xs font-medium {{ $type->badge }}">
                            {{ $type->name }}
                        </span>
                        <span class="mt-3 block text-sm text-gray-700">
                            {{ $type->placeholder }}
                        </span>
                    </button>
                    @endforeach
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2 text-gray-500">
                        <button type="button" class="p-2 rounded-full hover:bg-gray-100 transition">📷</button>
                        <button type="button" class="p-2 rounded-full hover:bg-gray-100 transition">🔥</button>
                    </div>

                    <button
                        type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white font-medium px-5 py-2.5 rounded-xl transition shadow-sm">
                        Partager mon échec
                    </button>
                </div>
            </div>
        </div>
    </form>

    @endauth


    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center space-x-2">
            <button class="px-3 py-1.5 text-sm font-medium bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                Plus récents
            </button>

            <button class="px-3 py-1.5 text-sm font-medium text-gray-600 hover:bg-white hover:border hover:border-gray-300 rounded-md">
                Plus honteux
            </button>
        </div>
    </div>

        <livewire:comment-feed />

    
    {{-- Pagination --}}
    <div class="mt-6">
        {{ $posts->links() }}
    </div>


</x-layouts.app>