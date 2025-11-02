@extends('layouts.admin.index')

@section('title', 'Edit Petugas')

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

<form action="{{ route('petugas.update', $petugas->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Data Petugas</h4>
        </div>

        <div class="p-6">
            <div class="grid lg:grid-cols-2 gap-6">

                <!-- Nama -->
                <div class="lg:col-span-2">
                    <label for="name" class="text-sm font-medium block">Nama Petugas</label>
                    <input type="text" id="name" name="name" class="form-input w-full" value="{{ old('name', $petugas->name) }}" required>
                </div>

                <!-- Email -->
                <div class="lg:col-span-2">
                    <label for="email" class="text-sm font-medium block">Email</label>
                    <input type="email" id="email" name="email" class="form-input w-full" value="{{ old('email', $petugas->email) }}" required>
                </div>

                <!-- Username -->
                <div>
                    <label for="username" class="text-sm font-medium block">Username</label>
                    <input type="text" id="username" name="username" class="form-input w-full" value="{{ old('username', $petugas->username) }}" required>
                </div>

                <!-- Telepon -->
                <div>
                    <label for="telepon" class="text-sm font-medium block">Telepon</label>
                    <input type="text" id="telepon" name="telepon" class="form-input w-full" value="{{ old('telepon', $petugas->telepon) }}" required>
                </div>

                <!-- Role -->
                <div>
                    <label for="role" class="text-sm font-medium block">Peran</label>
                    <select id="role" name="role" class="form-select w-full" required>
                        <option value="admin" {{ old('role', $petugas->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="operator" {{ old('role', $petugas->role) == 'operator' ? 'selected' : '' }}>Operator</option>
                    </select>
                </div>

                <!-- Password (opsional) -->
                <div>
                    <label for="password" class="text-sm font-medium block">Password Baru (Opsional)</label>
                    <input type="password" id="password" name="password" class="form-input w-full">
                    <p class="text-xs text-gray-500">Kosongkan jika tidak ingin mengubah password</p>
                </div>

                <!-- Konfirmasi Password -->
                <div>
                    <label for="password_confirmation" class="text-sm font-medium block">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-input w-full">
                </div>
            </div>

            <div class="p-6 flex justify-between">
            <a href="{{ route('petugas.index') }}"
                class="px-6 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                <- Kembali
            </a>
            <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                Update Data
            </button>
        </div>
        </div>
    </div>
</form>

@endsection
