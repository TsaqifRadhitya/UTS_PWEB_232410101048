@extends('layouts.app-layout')
@section('title', 'Dashboard')
@session('success')
    @section('sweetAlert', Session::get('success'))
@endsession
@section('konten')
    <section class="p-5 lg:p-10 w-full lg:h-[90vh] bg-gradient-to-br from-cyan-50 to-amber-50">
        <div class="flex flex-col w-full h-full overflow-hidden shadow-xl rounded-xl bg-white">
            <div class="bg-gradient-to-r from-cyan-500 to-amber-500 p-6 text-white">
                <h1 class="text-2xl font-bold">Selamat Datang, {{ $username }}!</h1>
            </div>
            <article class="flex flex-col flex-1 w-full h-full p-4 lg:p-6 gap-4">
                <div class="flex flex-3/5 flex-col lg:flex-row gap-4">
                    <article
                        class="flex-1 bg-white border border-cyan-200 rounded-lg shadow-sm p-6 flex flex-col items-center justify-center transition-all hover:shadow-md">
                        <h3 class="text-gray-600 text-lg mb-2">Total Uang Masuk</h3>
                        <h1 class="text-3xl font-bold text-cyan-600">Rp {{ Number::format($data['uangMasuk']) }}</h1>
                        <p class="text-green-500 text-sm mt-2 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                            Bulan Ini
                        </p>
                    </article>
                    <article
                        class="flex-1 bg-white border border-amber-200 rounded-lg shadow-sm p-6 flex flex-col items-center justify-center transition-all hover:shadow-md">
                        <h3 class="text-gray-600 text-lg mb-2">Total Uang Keluar</h3>
                        <h1 class="text-3xl font-bold text-amber-600">Rp {{ Number::format($data['uangKeluar']) }}</h1>
                        <p class="text-red-500 text-sm mt-2 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                            </svg>
                            Bulan Ini
                        </p>
                    </article>
                    <article
                        class="flex-1 bg-white border border-green-200 rounded-lg shadow-sm p-6 flex flex-col items-center justify-center transition-all hover:shadow-md">
                        <h3 class="text-gray-600 text-lg mb-2">Saldo Saat Ini</h3>
                        <h1 class="text-3xl font-bold text-green-600">Rp
                            {{ Number::format($data['uangMasuk'] - $data['uangKeluar']) }}</h1>
                        <p class="text-blue-500 text-sm mt-2">
                            Update Terakhir
                        </p>
                    </article>
                </div>
                <div class="bg-white flex flex-col flex-2/5 border border-gray-200 rounded-lg shadow-sm p-6">
                    <h3 class="text-xl font-semibold text-gray-800 mb-4">Aktivitas Terakhir</h3>
                    <div class="flex-1 flex flex-col lg:flex-row gap-4">
                        <div class="bg-gray-50 flex-1 p-4 rounded-lg flex flex-col justify-center items-center">
                            <p class="text-gray-500 text-sm">Jumlah</p>
                            <p class="text-lg font-medium">Rp {{ Number::format($data['lastActivity']['Jumlah']) }}</p>
                        </div>
                        <div class="bg-gray-50 flex-1 p-4 rounded-lg flex flex-col justify-center items-center">
                            <p class="text-gray-500 text-sm">Waktu</p>
                            <p class="text-lg font-medium">
                                {{ $data['lastActivity']['waktu'] }}
                            </p>
                        </div>
                        <div class="bg-gray-50 flex-1 p-4 rounded-lg flex flex-col justify-center items-center">
                            <p class="text-gray-500 text-sm">Jenis Aktivitas</p>
                            <p class="text-lg font-medium">
                                @if ($data['lastActivity']['type'] === 'pemasukan')
                                    <span class="text-green-600">Pemasukan</span>
                                @else
                                    <span class="text-red-600">Pengeluaran</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
@endsection
