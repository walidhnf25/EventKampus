<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginUnitTest extends TestCase
{
    use RefreshDatabase; // Menggunakan RefreshDatabase agar database di-reset setelah setiap pengujian

    /**
     * Test jika login berhasil dengan kredensial yang benar.
     *
     * @return void
     */
    public function test_successful_login_with_valid_credentials()
    {
        // Membuat pengguna
        $user = User::factory()->create([
            'password' => Hash::make('password123'),  // Password terenkripsi
        ]);

        // Mengirimkan POST request untuk login
        $response = $this->post('/login', [
            'noHP' => $user->noHP,
            'password' => 'password123',  // Menggunakan password yang benar
        ]);

        // Memastikan status code adalah 302 (redirect ke dashboard)
        $response->assertStatus(302);
        $response->assertRedirect('dashboard');

        // Memastikan session sudah diregenerasi (terdaftar login)
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Test jika login gagal dengan kredensial yang salah.
     *
     * @return void
     */
    public function test_failed_login_with_invalid_credentials()
    {
        // Membuat pengguna
        $user = User::factory()->create([
            'password' => Hash::make('password123'),  // Password terenkripsi
        ]);

        // Mengirimkan POST request dengan password yang salah
        $response = $this->post('/login', [
            'noHP' => $user->noHP,
            'password' => 'wrongpassword',  // Password yang salah
        ]);

        // Memastikan status code adalah 302 (redirect kembali ke halaman login)
        $response->assertStatus(302);
        $response->assertSessionHas('loginError', 'Login Failed!');

        // Memastikan pengguna tidak terautentikasi
        $this->assertGuest();
    }

    /**
     * Test jika login gagal dengan noHP yang tidak terdaftar.
     *
     * @return void
     */
    public function test_failed_login_with_non_existing_noHP()
    {
        // Mengirimkan POST request dengan noHP yang tidak terdaftar
        $response = $this->post('/login', [
            'noHP' => '081234567890',  // No HP yang tidak terdaftar
            'password' => 'password123',
        ]);

        // Memastikan status code adalah 302 (redirect kembali ke halaman login)
        $response->assertStatus(302);
        $response->assertSessionHas('loginError', 'Login Failed!');

        // Memastikan pengguna tidak terautentikasi
        $this->assertGuest();
    }
}
