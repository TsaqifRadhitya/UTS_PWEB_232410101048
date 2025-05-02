<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Nette\Utils\Validators;

class pageController extends Controller
{

    private $saldo = 10000;
    private $activitys = [
        [
            'Jumlah' => 30000,
            'waktu' => '2025-02-24 02:36:22',
            'type' => 'pengeluaran'

        ],
        [
            'Jumlah' => 10000,
            'waktu' => '2025-02-24 02:36:22',
            'type' => 'pemasukan'

        ],
        [
            'Jumlah' => 50000,
            'waktu' => '2025-02-09 12:00:49',
            'type' => 'pengeluaran'

        ],
        [
            'Jumlah' => 5000,
            'waktu' => '2025-02-09 12:00:49',
            'type' => 'pemasukan'

        ],
        [
            'Jumlah' => 20000,
            'waktu' => '2025-02-04 07:32:34',
            'type' => 'pemasukan'

        ],
        [
            'Jumlah' => 200000,
            'waktu' => '2025-02-04 07:32:34',
            'type' => 'pemasukan'
        ],
        [
            'Jumlah' => 10000,
            'waktu' => '2025-02-02 06:26:28',
            'type' => 'pengeluaran'
        ],
        [
            'Jumlah' => 23000,
            'waktu' => '2025-02-02 06:26:28',
            'type' => 'pemasukan'

        ],
    ];

    public function loginPage()
    {
        if (Session::has('user')) {
            return redirect(route('dashboard'));
        }
        return view('login');
    }

    public function loginStore(Request $request)
    {
        $request->validate(
            [
                'username' => ['required'],
                'password' => ['required']
            ],
            [
                'username.required' => 'harap mengisi username',
                'password.required' => 'harap mengisi password'
            ]
        );
        Session::put('user', ['username' => $request->username, 'lastLogin' => now()]);
        return redirect(route('dashboard', ['username' => $request->username]))->with('success','Berhasil Login !');
    }

    public function LogOut()
    {
        Session::remove('user');
        return redirect(route('login.index'));
    }

    public function profilePage()
    {
        if (!Session::has('user')) {
            return redirect(route('login.index'));
        }
        return view('profile', ['username' => Session::get('user')['username'], 'lastLogin' => Session::get('user')['lastLogin'], 'page' => 'profile']);
    }

    public function dashboardPage()
    {
        $uangMasuk = 0;
        $uasngKeluar = 0;
        foreach ($this->activitys as $activity) {
            if ($activity['type'] === 'pengeluaran') {
                $uasngKeluar += $activity['Jumlah'];
            } else {
                $uangMasuk += $activity['Jumlah'];
            }
        }

        $data = [
            'lastActivity' => $this->activitys[0],
            'uangMasuk' => $uangMasuk,
            'uangKeluar' => $uasngKeluar,
            'selisih' => $uangMasuk - $uasngKeluar
        ];
        if (!Session::has('user')) {
            return redirect(route('login.index'));
        }

        return view('dashboard', ['data' => $data, 'username' => Session::get('user')['username'], 'page' => 'dashboard']);
    }

    public function kelolaPage()
    {
        if (!Session::has('user')) {
            return redirect(route('login.index'));
        }
        $data = [
            'Activitys' => $this->activitys,
            'Saldo' => $this->saldo
        ];
        return view('pengelolaan', ['data' => $data, 'page' => 'kelola']);
    }

    public function kelolaStore(Request $request)
    {
        $request->validate([
            'nominal' => ['required', 'min:1'],
            'type' => ['required']
        ], [
            'nominal.required' => 'Harap mengisi nominal',
            'type.required' => 'Harap mengisi jenis aktivitas'
        ]);

        if($request->type === 'pengeluaran' && $request->nominal > $this->saldo){
            throw ValidationException::withMessages(['nominal' => 'Nominal penarikan melebihi saldo']);
        }
        return back()->with('success', 'Berhasil menambahkan data');
    }
}
