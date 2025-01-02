<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchEventUnitTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test pencarian dengan input kosong.
     *
     * @return void
     */
    public function test_search_with_empty_input()
    {
        // Mengirimkan permintaan GET ke route pencarian tanpa parameter pencarian
        $response = $this->get('/search?search=');

        // Memastikan status kode adalah 200 (OK)
        $response->assertStatus(200);

        // Memastikan variabel events kosong
        $response->assertViewHas('events', []);
    }

    /**
     * Test pencarian dengan kata kunci yang relevan.
     *
     * @return void
     */
    public function test_search_with_valid_keyword()
    {
        // Membuat event dengan nama yang relevan
        $event1 = Events::create([
            'namaEvent' => 'Test Event 1',
            'deskripsi' => 'Deskripsi untuk event pertama.',
            'tanggalMulai' => now()->addDay(),
            'tanggalAkhir' => now()->addDays(2),
            'harga' => 10000,
        ]);

        $event2 = Events::create([
            'namaEvent' => 'Test Event 2',
            'deskripsi' => 'Deskripsi untuk event kedua.',
            'tanggalMulai' => now()->addDay(),
            'tanggalAkhir' => now()->addDays(2),
            'harga' => 15000,
        ]);

        // Mengirimkan permintaan GET ke route pencarian dengan kata kunci
        $response = $this->get('/search?search=Test Event');

        // Memastikan status kode adalah 200 (OK)
        $response->assertStatus(200);

        // Memastikan hasil pencarian mencakup event yang sesuai
        $response->assertViewHas('events', function ($events) use ($event1, $event2) {
            return $events->contains($event1) && $events->contains($event2);
        });
    }

    /**
     * Test pencarian dengan kata kunci lebih dari 10 kata.
     *
     * @return void
     */
    public function test_search_with_more_than_10_keywords()
    {
        // Membuat event dengan nama yang relevan
        $event = Events::create([
            'namaEvent' => 'Test Event',
            'deskripsi' => 'Deskripsi untuk event ini.',
            'tanggalMulai' => now()->addDay(),
            'tanggalAkhir' => now()->addDays(2),
            'harga' => 10000,
        ]);

        // Mengirimkan permintaan GET ke route pencarian dengan lebih dari 10 kata
        $searchTerm = 'Test Event Event Event Event Event Event Event Event Event Event Event';
        $response = $this->get('/search?search=' . $searchTerm);

        // Memastikan status kode adalah 200 (OK)
        $response->assertStatus(200);

        // Memastikan hanya 10 kata pertama yang digunakan untuk pencarian
        $searchTerm = implode(' ', array_slice(explode(' ', $searchTerm), 0, 10));
        $response->assertSee($event->namaEvent);
        $response->assertViewHas('events', function ($events) use ($event) {
            return $events->contains($event);
        });
    }
}
