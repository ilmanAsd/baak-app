<x-filament-panels::page>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Backup Section -->
        <x-filament::section>
            <x-slot name="heading">
                Backup Sistem
            </x-slot>

            <x-slot name="description">
                Backup seluruh data database, tampilan (views), CSS, JS, dan file yang diunggah.
            </x-slot>

            <div class="space-y-4">
                <p class="text-gray-600 dark:text-gray-400">
                    Klik tombol di bawah untuk mengunduh arsip lengkap sistem. File ini dapat digunakan untuk
                    mengembalikan sistem ke kondisi saat ini.
                </p>

                <x-filament::button wire:click="downloadBackup" icon="heroicon-o-arrow-down-tray" color="success">
                    Download Backup (.zip)
                </x-filament::button>
            </div>
        </x-filament::section>

        <!-- Restore Section -->
        <x-filament::section>
            <x-slot name="heading">
                Restore Sistem
            </x-slot>

            <x-slot name="description">
                Kembalikan kondisi sistem dari file backup yang sebelumnya diunduh.
            </x-slot>

            <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
                role="alert">
                <span class="font-medium">PERINGATAN PENTING!</span>
                <ul class="mt-1.5 list-disc list-inside">
                    <li>Proses ini akan <strong>menimpa</strong> database dan file tampilan saat ini.</li>
                    <li>Sistem akan otomatis membuat backup cadangan sebelum melakukan restore sebagai pengaman.</li>
                    <li>Pastikan file zip yang diupload adalah hasil backup yang valid dari sistem ini.</li>
                </ul>
            </div>

            <form wire:submit="restore" class="space-y-6">
                {{ $this->form }}

                <div class="flex justify-end">
                    <x-filament::button type="submit" icon="heroicon-o-arrow-path" color="danger"
                        onclick="return confirm('Apakah Anda yakin ingin merestore sistem? Tindakan ini akan menimpa data saat ini.') || event.stopImmediatePropagation()">
                        Mulai Restore Sistem
                    </x-filament::button>
                </div>
            </form>
        </x-filament::section>
    </div>
</x-filament-panels::page>