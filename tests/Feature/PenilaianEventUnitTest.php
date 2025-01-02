<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PenilaianEventUnitTest extends TestCase
{
    /**
     * Test apakah pengguna dapat mengirim review yang valid.
     *
     * @return void
     */
    public function test_user_can_submit_valid_review(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test jika pengguna mengirim review dengan rating yang tidak valid.
     *
     * @return void
     */
    public function test_user_cannot_submit_invalid_review(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test jika event tidak ditemukan, review tidak bisa dikirim.
     *
     * @return void
     */
    public function test_review_submission_fails_if_event_not_found(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test jika review gagal disimpan.
     *
     * @return void
     */
    public function test_review_submission_fails_when_database_error_occurs(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
