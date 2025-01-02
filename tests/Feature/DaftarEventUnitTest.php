<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DaftarEventUnitTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test apakah pengguna dapat mendaftar ke event jika belum terdaftar.
     *
     * @return void
     */
    public function test_user_can_register_for_event_if_not_registered()
    {
        // Membuat pengguna dan login
        $user = User::factory()->create();
        $this->actingAs($user);

        // Membuat event untuk didaftarkan
        $event = Events::factory()->create();

        // Mengirimkan POST request untuk mendaftar ke event
        $response = $this->post("/events/{$event->idEvent}/daftar");

        // Memastikan status code adalah 302 (redirect ke halaman Events)
        $response->assertStatus(302);
        $response->assertRedirect('Events');

        // Memastikan bahwa pengguna berhasil terdaftar di event
        $this->assertDatabaseHas('event_user', [
            'user_id' => $user->id,
            'event_id' => $event->idEvent,
        ]);

        // Memastikan pesan sukses dikirimkan
        $response->assertSessionHas('success', 'Berhasil mendaftar event!');
    }

    /**
     * Test apakah pengguna tidak bisa mendaftar ke event yang sudah didaftarkan.
     *
     * @return void
     */
    public function test_user_cannot_register_for_event_if_already_registered()
    {
        // Membuat pengguna dan login
        $user = User::factory()->create();
        $this->actingAs($user);

        // Membuat event untuk didaftarkan
        $event = Events::factory()->create();

        // Menambahkan pengguna ke dalam event
        $user->events()->attach($event);

        // Mengirimkan POST request untuk mencoba mendaftar ke event yang sama
        $response = $this->post("/events/{$event->idEvent}/daftar");

        // Memastikan status code adalah 302 (redirect kembali ke halaman Events)
        $response->assertStatus(302);
        $response->assertRedirect('Events');

        // Memastikan bahwa pengguna tidak terdaftar lebih dari sekali
        $this->assertDatabaseCount('event_user', 1);

        // Memastikan pesan peringatan dikirimkan
        $response->assertSessionHas('warning', 'Anda sudah terdaftar di event ini.');
    }
}
