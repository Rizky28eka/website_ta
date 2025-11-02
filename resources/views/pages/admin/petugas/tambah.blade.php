@extends('layouts.admin.index')

@section('title', 'Tambah Petugas')

@section('content')

@if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
        <strong>Terjadi kesalahan:</strong>
        <ul class="mt-2 list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('petugas.store') }}" method="POST">
    @csrf
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Data Petugas</h4>
        </div>

        <div class="p-6">
            <div class="grid lg:grid-cols-2 gap-6">

                <!-- Nama -->
                <div class="lg:col-span-2">
                    <label for="name" class="text-gray-800 text-sm font-medium mb-2 block">Nama Petugas</label>
                    <input type="text" id="name" name="name" class="form-input w-full" value="{{ old('name') }}" required>
                    @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Email -->
                <div class="lg:col-span-2">
                    <label for="email" class="text-gray-800 text-sm font-medium mb-2 block">Email</label>
                    <input type="email" id="email" name="email" class="form-input w-full" value="{{ old('email') }}" required>
                    @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Username -->
                <div>
                    <label for="username" class="text-gray-800 text-sm font-medium mb-2 block">Username</label>
                    <input type="text" id="username" name="username" class="form-input w-full" value="{{ old('username') }}" required>
                    @error('username') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Telepon -->
                <div>
                    <label for="telepon" class="text-gray-800 text-sm font-medium mb-2 block">Telepon</label>
                    <input type="text" id="telepon" name="telepon" class="form-input w-full" value="{{ old('telepon') }}" required>
                    @error('telepon') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Role -->
                <div>
                    <label for="role" class="text-gray-800 text-sm font-medium mb-2 block">Pilih Peran Petugas</label>
                    <select id="role" name="role" class="form-select w-full" required>
                        <option value="" disabled {{ old('role') ? '' : 'selected' }}>-- Pilih Role --</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="operator" {{ old('role') == 'operator' ? 'selected' : '' }}>Operator</option>
                    </select>
                    @error('role') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="text-gray-800 text-sm font-medium mb-2 block">Password</label>
                    <input type="password" id="password" name="password" class="form-input w-full" required>
                    @error('password') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- Konfirmasi Password -->
                <div>
                    <label for="password_confirmation" class="text-gray-800 text-sm font-medium mb-2 block">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-input w-full" required>
                    @error('password_confirmation') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan Data</button>
            </div>
        </div>
    </div>
</form>

@endsection
