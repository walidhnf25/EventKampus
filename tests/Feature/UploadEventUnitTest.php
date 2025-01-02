<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UploadEventUnitTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test jika pengguna berhasil meng-upload event dengan data yang valid.
     *
     * @return void
     */
    public function test_user_can_store_event_with_valid_data()
    {
        // Membuat pengguna dan login
        $user = User::factory()->create();
        $this->actingAs($user);

        // Membuat file gambar simulasi upload
        Storage::fake('public');
        $image = UploadedFile::fake()->image('event_image.jpg');

        // Mengirimkan data untuk event
        $data = [
            'namaEvent' => 'Event Test',
            'fotoEvent' => $image,
            'tanggalMulai' => now()->addDays(1)->toDateString(),
            'tanggalAkhir' => now()->addDays(2)->toDateString(),
            'harga' => 10000,
            'deskripsi' => 'This is a test event description.',
        ];

        // Mengirimkan POST request untuk menyimpan event
        $response = $this->post('/events', $data);

        // Memastikan status code adalah 302 (redirect ke halaman Events)
        $response->assertStatus(302);
        $response->assertRedirect('Events');

        // Memastikan file gambar telah disimpan di storage
        Storage::disk('public')->assertExists('uploads/' . $image->hashName());

        // Memastikan event berhasil disimpan di database
        $this->assertDatabaseHas('events', [
            'namaEvent' => 'Event Test',
            'harga' => 10000,
            'deskripsi' => 'This is a test event description.',
        ]);
    }

    /**
     * Test jika input tidak valid, event tidak akan disimpan.
     *
     * @return void
     */
    public function test_event_creation_fails_with_invalid_data()
    {
        // Membuat pengguna dan login
        $user = User::factory()->create();
        $this->actingAs($user);

        // Mengirimkan data tidak valid (misalnya tanggalMulai yang tidak valid)
        $data = [
            'namaEvent' => 'Event Test',
            'fotoEvent' => null,
            'tanggalMulai' => now()->subDays(1)->toDateString(),  // Tanggal mulai sebelum hari ini
            'tanggalAkhir' => now()->subDays(2)->toDateString(),   // Tanggal akhir sebelum tanggal mulai
            'harga' => -500,  // Harga negatif
            'deskripsi' => 'This is a test event description.',
        ];

        // Mengirimkan POST request untuk menyimpan event
        $response = $this->post('/events', $data);

        // Memastikan status code adalah 302 (redirect kembali ke halaman event)
        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'fotoEvent',
            'tanggalMulai',
            'tanggalAkhir',
            'harga',
        ]);
    }
}
