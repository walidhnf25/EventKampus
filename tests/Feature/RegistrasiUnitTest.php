<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrasiUnitTest extends TestCase
{
    use RefreshDatabase; // Menggunakan RefreshDatabase agar database di-reset setelah setiap pengujian

    /**
     * Test pengguna dapat melakukan registrasi dengan data yang valid.
     *
     * @return void
     */
    public function test_user_registration_with_valid_data()
    {
        $data = [
            'nama' => 'John Doe',
            'email' => 'john.doe@example.com',
            'tanggalLahir' => '2000-01-01',
            'noHP' => '081234567890',
            'password' => 'password123',
        ];

        // Mengirimkan POST request untuk registrasi
        $response = $this->post('/register', $data);

        // Memastikan status code adalah 302 (redirect ke halaman login)
        $response->assertStatus(302);
        $response->assertRedirect('Login');

        // Memastikan data user baru ada di database
        $this->assertDatabaseHas('users', [
            'email' => 'john.doe@example.com',
        ]);
    }

    /**
     * Test jika email sudah terdaftar.
     *
     * @return void
     */
    public function test_user_registration_with_existing_email()
    {
        // Membuat pengguna pertama dengan email tertentu
        User::create([
            'nama' => 'Jane Doe',
            'email' => 'jane.doe@example.com',
            'tanggalLahir' => '1990-05-15',
            'noHP' => '082345678901',
            'password' => Hash::make('password123'),
        ]);

        // Mengirimkan data pendaftaran dengan email yang sudah ada
        $data = [
            'nama' => 'John Doe',
            'email' => 'jane.doe@example.com',
            'tanggalLahir' => '2000-01-01',
            'noHP' => '081234567890',
            'password' => 'password123',
        ];

        $response = $this->post('/register', $data);

        // Memastikan status code adalah 302 (redirect kembali ke halaman registrasi dengan error)
        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
    }

    /**
     * Test registrasi dengan data yang tidak lengkap.
     *
     * @return void
     */
    public function test_user_registration_with_invalid_data()
    {
        // Mengirimkan data kosong
        $data = [
            'nama' => '',
            'email' => 'invalidemail',
            'tanggalLahir' => '',
            'noHP' => '',
            'password' => '123',
        ];

        $response = $this->post('/register', $data);

        // Memastikan status code adalah 302 (redirect kembali ke halaman registrasi dengan error)
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['nama', 'email', 'tanggalLahir', 'noHP', 'password']);
    }
}