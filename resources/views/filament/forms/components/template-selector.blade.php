<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div x-data="{ state: $wire.entangle('{{ $getStatePath() }}') }" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @foreach(\App\Services\TemplateRegistry::getTemplates() as $value => $template)
            @php
                $label = $template['label'];
            @endphp
            <div @click="state = '{{ $value }}'"
                class="cursor-pointer relative rounded-xl border-2 overflow-hidden transition-all duration-200 group hover:shadow-lg"
                :class="state === '{{ $value }}' ? 'border-brand-blue ring-2 ring-brand-blue/20' : 'border-gray-200 hover:border-brand-blue/50'">
                <!-- Selection Indicator -->
                <div x-show="state === '{{ $value }}'"
                    class="absolute top-2 right-2 z-10 bg-brand-blue text-white rounded-full p-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>

                <!-- Thumbnail -->
                <div class="aspect-video bg-gray-100 relative">
                    <img src="{{ asset('public/images/templates/' . basename($template['thumbnail'])) }}"
                        onerror="this.src='https://placehold.co/600x400?text={{ urlencode($label) }}'" alt="{{ $label }}"
                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                        <span class="text-white font-medium text-sm">Pilih Template Ini</span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-4 bg-white">
                    <div class="flex items-center justify-between mb-2">
                        <h4 class="font-bold text-gray-900 group-hover:text-brand-blue transition-colors">{{ $label }}</h4>
                        <span class="text-xs px-2 py-1 rounded-full bg-gray-100 text-gray-500 font-mono">{{ $value }}</span>
                    </div>
                    <p class="text-sm text-gray-500 line-clamp-2 leading-relaxed h-10">
                        {{ $template['description'] ?? 'No description available.' }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</x-dynamic-component>