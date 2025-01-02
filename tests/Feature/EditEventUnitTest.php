<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EditEventUnitTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test apakah pengguna dapat mengupdate event dengan data yang valid.
     *
     * @return void
     */
    public function test_user_can_update_event_with_valid_data()
    {
        // Membuat pengguna dan login
        $user = User::factory()->create();
        $this->actingAs($user);

        // Membuat event untuk diupdate
        $event = Events::factory()->create();

        // Membuat file gambar simulasi upload
        Storage::fake('public');
        $image = UploadedFile::fake()->image('event_image.jpg');

        // Data yang akan digunakan untuk update
        $data = [
            'namaEvent' => 'Updated Event',
            'fotoEvent' => $image,
            'tanggalMulai' => now()->addDays(1)->toDateString(),
            'tanggalAkhir' => now()->addDays(2)->toDateString(),
            'harga' => 20000,
            'deskripsi' => 'This is an updated event description.',
        ];

        // Mengirimkan PUT request untuk mengupdate event
        $response = $this->put("/events/{$event->idEvent}", $data);

        // Memastikan status code adalah 302 (redirect ke halaman Events)
        $response->assertStatus(302);
        $response->assertRedirect('Events');

        // Memastikan file gambar telah disimpan di storage
        Storage::disk('public')->assertExists('uploads/' . $image->hashName());

        // Memastikan event berhasil diupdate di database
        $this->assertDatabaseHas('events', [
            'namaEvent' => 'Updated Event',
            'harga' => 20000,
            'deskripsi' => 'This is an updated event description.',
        ]);
    }

    /**
     * Test jika input data tidak valid, event tidak akan diupdate.
     *
     * @return void
     */
    public function test_event_update_fails_with_invalid_data()
    {
        // Membuat pengguna dan login
        $user = User::factory()->create();
        $this->actingAs($user);

        // Membuat event untuk diupdate
        $event = Events::factory()->create();

        // Mengirimkan data tidak valid (tanggalMulai sebelum hari ini)
        $data = [
            'namaEvent' => 'Updated Event',
            'fotoEvent' => null,
            'tanggalMulai' => now()->subDays(1)->toDateString(),  // Tanggal mulai sebelum hari ini
            'tanggalAkhir' => now()->subDays(2)->toDateString(),   // Tanggal akhir sebelum tanggal mulai
            'harga' => -500,  // Harga negatif
            'deskripsi' => 'This is an updated event description.',
        ];

        // Mengirimkan PUT request untuk mengupdate event
        $response = $this->put("/events/{$event->idEvent}", $data);

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
