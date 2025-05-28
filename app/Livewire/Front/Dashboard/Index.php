<?php

namespace App\Livewire\Front\Dashboard;

use Livewire\Component;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Industri;
use App\Models\Pkl;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{



    public function mount()
    {

    }

    public function render()
    {
        $stats = [
            'total_siswa' => Siswa::count(),
            'total_guru' => Guru::count(),
            'total_industri' => Industri::count(),
            'total_pkl_aktif' => Pkl::whereDate('mulai', '<=', now())
                                   ->whereDate('selesai', '>=', now())
                                   ->count(),
            'pkl_selesai' => Pkl::whereDate('selesai', '<', now())->count(),
            'pkl_akan_datang' => Pkl::whereDate('mulai', '>', now())->count(),
        ];

        $recent_pkls = Pkl::with(['siswa', 'guru', 'industri'])
                          ->latest()
                          ->take(5)
                          ->get();

        return view('livewire.front.dashboard.index', compact('stats', 'recent_pkls'));
    }
}
