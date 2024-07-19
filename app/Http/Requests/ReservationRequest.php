<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Ubah menjadi true jika Anda ingin mengizinkan akses
    }

    public function rules()
    {
        return [
            'nama' => ['required', 'string', 'regex:/^[a-zA-Z\s]*$/'], // Nama hanya boleh huruf dan spasi
            'email' => ['required', 'email'],
            'no_telepon' => ['required', 'string', 'max:13'], // No telepon maksimal 13 karakter
            'layanan' => ['required', 'string'],
            'tanggal' => ['required', 'date'],
            'deskripsi' => ['required', 'string'],
        ];
    }
}
