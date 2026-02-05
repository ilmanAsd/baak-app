<x-filament-widgets::widget>
    <x-filament::section>
        <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
            @foreach($buttons as $button)
                @php
                    $color = match ($button->color) {
                        'primary' => 'text-primary-600 bg-primary-50 dark:bg-primary-900/10 dark:text-primary-400',
                        'gray' => 'text-gray-600 bg-gray-50 dark:bg-gray-900/10 dark:text-gray-400',
                        'info' => 'text-info-600 bg-info-50 dark:bg-info-900/10 dark:text-info-400',
                        'success' => 'text-success-600 bg-success-50 dark:bg-success-900/10 dark:text-success-400',
                        'warning' => 'text-warning-600 bg-warning-50 dark:bg-warning-900/10 dark:text-warning-400',
                        'danger' => 'text-danger-600 bg-danger-50 dark:bg-danger-900/10 dark:text-danger-400',
                        'sky' => 'text-sky-600 bg-sky-50 dark:bg-sky-900/10 dark:text-sky-400',
                        default => 'text-primary-600 bg-primary-50 dark:bg-primary-900/10 dark:text-primary-400',
                    };
                @endphp

                <a href="{{ $button->url }}" target="{{ $button->open_in_new_tab ? '_blank' : '_self' }}"
                    class="flex flex-col items-center justify-center p-6 transition duration-300 transform bg-white border border-gray-200 rounded-xl hover:shadow-lg hover:-translate-y-1 dark:bg-gray-900 dark:border-gray-700 group">

                    <div class="p-4 mb-3 rounded-full {{ $color }}">
                        <x-filament::icon icon="{{ $button->icon }}" class="w-8 h-8" />
                    </div>

                    <span
                        class="text-sm font-semibold text-gray-800 text-center dark:text-gray-200 group-hover:text-primary-600 dark:group-hover:text-primary-400">
                        {{ $button->label }}
                    </span>
                </a>
            @endforeach
        </div>
    </x-filament::section>
</x-filament-widgets::widget>