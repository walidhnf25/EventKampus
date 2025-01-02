<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EditProfileUnitTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test apakah pengguna dapat memperbarui profil mereka dengan data yang valid.
     *
     * @return void
     */
    public function test_user_can_update_profile_with_valid_data()
    {
        // Membuat pengguna dan login
        $user = User::factory()->create([
            'password' => Hash::make('password123'),  // Membuat password terenkripsi
        ]);

        // Mengirimkan data untuk pembaruan profil
        $response = $this->actingAs($user)->put('/profile/update', [
            'nama' => 'Updated Name',
            'email' => 'updated@example.com',
            'tanggalLahir' => '1990-01-01',
            'noHP' => '081234567890',
        ]);

        // Memastikan status code adalah 302 (redirect setelah berhasil)
        $response->assertStatus(302);
        $response->assertRedirect();

        // Memastikan data pengguna diperbarui di database
        $user->refresh();  // Refresh data pengguna setelah update
        $this->assertEquals('Updated Name', $user->nama);
        $this->assertEquals('updated@example.com', $user->email);
        $this->assertEquals('1990-01-01', $user->tanggalLahir);
        $this->assertEquals('081234567890', $user->noHP);

        // Memastikan pesan sukses dikirimkan
        $response->assertSessionHas('success', 'Update profile berhasil.');
    }

    /**
     * Test jika pengguna tidak dapat memperbarui profil dengan data yang tidak valid.
     *
     * @return void
     */
    public function test_user_cannot_update_profile_with_invalid_data()
    {
        // Membuat pengguna dan login
        $user = User::factory()->create([
            'password' => Hash::make('password123'),
        ]);

        // Mengirimkan data tidak valid (email tidak valid dan nomor HP terlalu panjang)
        $response = $this->actingAs($user)->put('/profile/update', [
            'nama' => '',  // Nama kosong
            'email' => 'invalid-email',  // Email tidak valid
            'tanggalLahir' => '2025-01-01',  // Tanggal lahir di masa depan
            'noHP' => '08123456789012345',  // No HP terlalu panjang
        ]);

        // Memastikan status code adalah 302 (redirect kembali ke halaman profil)
        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'nama',
            'email',
            'tanggalLahir',
            'noHP',
        ]);
    }
}
