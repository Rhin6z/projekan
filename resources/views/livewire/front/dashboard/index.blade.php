<div class="min-h-screen bg-zinc-100 text-zinc-900 font-sans rounded-3xl">
    <!-- Welcome Header -->
    <div class="relative bg-gradient-to-tr from-orange-600 to-orange-500 p-8 shadow-xl">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="relative max-w-7xl mx-auto z-10">
            <h1 class="text-4xl font-bold tracking-tight text-white">Selamat Datang, {{ Auth::user()->name }}!</h1>
            <p class="text-orange-100 mt-2">Apa kabar Hari Ini?</p>
        </div>
    </div>

    <!-- Dashboard Content -->
    <div class="max-w-7xl mx-auto px-6 py-10 space-y-12">
        <!-- Overview -->
        <div>
            <h2 class="text-2xl font-semibold text-orange-600 mb-4">Dashboard Overview</h2>
            <div class="grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                @php
                    $cards = [
                        ['label' => 'Total Students', 'count' => $stats['total_siswa'], 'icon' => 'users', 'color' => 'emerald', 'route' => 'siswa', 'note' => '↗️ Active learners'],
                        ['label' => 'Total Teachers', 'count' => $stats['total_guru'], 'icon' => 'presentation-chart-bar', 'color' => 'blue', 'route' => 'guru', 'note' => '📚 Mentoring students'],
                        ['label' => 'Partner Industries', 'count' => $stats['total_industri'], 'icon' => 'building-office', 'color' => 'purple', 'route' => 'industri', 'note' => '🤝 Collaboration ready'],
                        ['label' => 'Active PKL', 'count' => $stats['total_pkl_aktif'], 'icon' => 'bolt', 'color' => 'orange', 'route' => 'pkl', 'query' => 'active', 'note' => '🔥 Currently running'],
                        ['label' => 'Completed PKL', 'count' => $stats['pkl_selesai'], 'icon' => 'check-circle', 'color' => 'green', 'route' => 'pkl', 'query' => 'completed', 'note' => '🎉 Finished strong'],
                        ['label' => 'Upcoming PKL', 'count' => $stats['pkl_akan_datang'], 'icon' => 'clock', 'color' => 'yellow', 'route' => 'pkl', 'query' => 'upcoming', 'note' => '📅 Coming soon'],
                    ];
                @endphp

                @foreach($cards as $card)
                    <a href="{{ isset($card['query']) ? route($card['route'], ['status' => $card['query']]) : route($card['route']) }}"
                       class="bg-white border border-orange-500/20 rounded-xl p-6 hover:scale-[1.02] transition-all group shadow-sm">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-sm text-zinc-500">{{ $card['label'] }}</p>
                                <p class="text-3xl font-bold text-zinc-800 mt-1">{{ number_format($card['count']) }}</p>
                            </div>
                            <div class="w-12 h-12 rounded-xl flex items-center justify-center bg-orange-100 text-orange-500">
                                <flux:icon.{{ $card['icon'] }} variant="solid" class="w-6 h-6" />
                            </div>
                        </div>
                        <div class="mt-3 text-sm text-orange-500 group-hover:text-orange-700 transition">
                            {{ $card['note'] }}
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="bg-white border border-orange-500/20 rounded-2xl p-6 shadow-sm">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-lg font-semibold text-orange-600">Aktifitas PKL Terakhir</h3>
                <a href="{{ route('pkl') }}" class="text-sm text-orange-500 hover:text-orange-700 transition">Lihat Semua →</a>
            </div>

            @if($recent_pkls->count() > 0)
                <div class="space-y-4">
                    @foreach($recent_pkls as $pkl)
                        <div class="bg-orange-50 rounded-xl p-4 hover:bg-orange-100 transition">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 rounded-full bg-orange-200 flex items-center justify-center text-orange-600 font-bold">
                                        {{ substr($pkl->siswa->nama, 0, 2) }}
                                    </div>
                                    <div>
                                        <p class="font-medium text-zinc-800">{{ $pkl->siswa->nama }}</p>
                                        <p class="text-sm text-zinc-500">@ {{ $pkl->industri->nama }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm text-orange-600">
                                        {{ \Carbon\Carbon::parse($pkl->mulai)->format('M d, Y') }} - {{ \Carbon\Carbon::parse($pkl->selesai)->format('M d, Y') }}
                                    </p>
                                    <p class="text-xs text-zinc-500">Mentored by {{ $pkl->guru->nama }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <div class="mb-4">
                        <flux:icon.document-text variant="solid" class="w-12 h-12 text-orange-400 mx-auto" />
                    </div>
                    <p class="text-orange-600 text-lg">Tidak ada aktifitas saat ini</p>
                    <p class="text-zinc-500 text-sm">Buat Program PKL Mu</p>
                </div>
            @endif
        </div>
    </div>
</div>
