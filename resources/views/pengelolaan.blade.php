@extends('layouts.app-layout')
@section('title', 'Kelola Keuangan')
@session('success')
    @section('sweetAlert',Session::get('success'))
@endsession
@section('username',$username)
@section('konten')
    <section class="p-5 lg:p-10 w-full min-h-[90vh]">
        <div class="flex flex-col w-full h-full rounded-xl overflow-hidden shadow-lg bg-white">
            <div class="bg-gradient-to-r from-cyan-500 to-amber-500 p-6 text-white">
                <h1 class="text-2xl font-bold">Kelola Keuangan</h1>
            </div>
            <article class="flex flex-col lg:flex-row w-full h-full divide-y lg:divide-y-0 lg:divide-x divide-gray-200">
                <div class="lg:w-1/3 flex flex-col h-full">
                    <article class="p-4 bg-gradient-to-br from-cyan-100 to-cyan-50 border-b border-gray-200">
                        <h3 class="text-gray-600 text-lg">Saldo Anda</h3>
                        <h1 class="text-3xl font-bold text-cyan-700">Rp{{ Number::format($data['Saldo']) }}</h1>
                    </article>
                    <article class="flex-1 flex flex-col space-y-5 p-4 overflow-hidden">
                        <h2 class="text-xl font-semibold text-gray-800">Riwayat Aktvitas</h2>
                        <div class="flex-1 overflow-y-auto pr-2 max-h-[46vh]">
                            @foreach ($data['Activitys'] as $activity)
                                <div
                                    class="p-3 mb-2 rounded-lg bg-white border border-gray-100 shadow-sm hover:shadow-md transition-shadow">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <p
                                                class="font-medium {{ $activity['type'] === 'pemasukan' ? 'text-green-600' : 'text-red-600' }}">
                                                Rp{{ Number::format($activity['Jumlah']) }}
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                {{ $activity['waktu'] }}
                                            </p>
                                        </div>
                                        <span
                                            class="px-2 py-1 text-xs rounded-full min-w-22 text-center
                                              {{ $activity['type'] === 'pemasukan' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $activity['type'] === 'pemasukan' ? 'Pemasukan' : 'Pengeluaran' }}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                    </article>
                </div>
                <div class="lg:w-2/3 p-4 lg:p-6 bg-gray-50 flex flex-col justify-center w-full gap-10 items-center">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 text-center">Tambah Aktivitas</h2>
                    <form action="{{ route('kelola.store') }}" method="POST"
                        class="space-y-4 flex flex-col items-center w-full max-w-lg">
                        @csrf
                        <div class="w-full">
                            <label for="nominal" class="block text-sm font-medium text-gray-700 mb-1">Nominal</label>
                            <input type="number" id="nominal" name="nominal"
                                class="shadow-sm w-full p-5 py-3 ring focus:ring-2 ring-amber-500 transition-all duration-300 rounded-md outline-none">

                            @error('nominal')
                                <label for="nominal"
                                    class="text-red-500 italic text-sm font-medium mb-1">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Jenis
                                Aktivitas</label>
                            <select name="type" id="type"
                                class="hadow-sm w-full p-5 py-3 ring ring-amber-500 focus:ring-2 transition-all duration-300 outline-none rounded-md ">
                                <option value="">Pilih Jenis Aktivitas</option>
                                <option value="pemasukan">Pemasukan</option>
                                <option value="pengeluaran">Pengeluaran</option>
                            </select>
                            @error('type')
                                <label for="type"
                                    class="text-red-500 italic text-sm font-medium mb-1">{{ $message }}</label>
                            @enderror
                        </div>
                        <button type="submit"
                            class="w-full bg-gradient-to-r cursor-pointer from-amber-500 mt-5 max-w-lg mx-auto to-amber-600 hover:from-amber-600 hover:to-amber-700 text-white py-2 px-4 rounded-md font-medium shadow-md hover:shadow-lg transition-all">
                            Simpan Transaksi
                        </button>
                    </form>
                </div>
            </article>
        </div>
    </section>
@endsection
