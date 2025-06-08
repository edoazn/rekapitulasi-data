<x-filament::widget>
    <x-filament::card class="space-y-4">

        <div class="text-xl font-bold">
            👋 Selamat Datang, {{ auth()->user()->name }}!
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 text-white">
            <div class="p-4 bg-gradient-to-r from-blue-400 to-blue-600 text-white rounded-xl shadow">
                <div class="text-sm">Bidang Pelayanan</div>
                <div class="text-2xl font-bold">{{ $totalBidang }}</div>
            </div>

            <div class="p-4 bg-gradient-to-r from-purple-400 to-purple-600 text-white rounded-xl shadow">
                <div class="text-sm">Jenis Bidang Pelayanan</div>
                <div class="text-2xl font-bold">{{ $totalJenis }}</div>
            </div>

            <div class="p-4 bg-gradient-to-r from-green-400 to-green-600 text-white rounded-xl shadow">
                <div class="text-sm">Data Pelayanan</div>
                <div class="text-2xl font-bold">{{ $totalPelayanan }}</div>
            </div>

            <div class="p-4 bg-gradient-to-r from-yellow-400 to-yellow-600 text-white rounded-xl shadow">
                <div class="text-sm">Total User</div>
                <div class="text-2xl font-bold">{{ $totalUser }}</div>
            </div>
        </div>

    </x-filament::card>
</x-filament::widget>