<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * test user dapat melakukan registrasi klien
     */
    public function test_user_can_register_as_client(): void
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'phone' => '081234567890',
        ]);

        $response->assertRedirect(route('dashboard.index'));
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
            'role' => 'klien',
        ]);
    }

    /**
     * test user dapat melakukan login dengan kredensial yang benar
     */
    public function test_user_can_login_with_correct_credentials(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
            'role' => 'klien',
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('dashboard.index'));
        $this->assertAuthenticatedAs($user);
    }

    /**
     * test user tidak dapat login dengan kredensial yang salah
     */
    public function test_user_cannot_login_with_wrong_credentials(): void
    {
        User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    /**
     * test user dapat logout
     */
    public function test_user_can_logout(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post('/logout');

        $response->assertRedirect(route('landing'));
        $this->assertGuest();
    }

    /**
     * test dokter dapat melakukan registrasi
     */
    public function test_doctor_can_register(): void
    {
        $response = $this->post('/dokter/register', [
            'name' => 'Dr. Test',
            'email' => 'doctor@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'phone' => '081234567890',
            'no_reg_dokter' => 'DRH12345',
            'spesialisasi' => 'Bedah',
            'position' => 'Dokter Hewan Senior',
            'experience_years' => 5,
            'bio' => 'Dokter hewan berpengalaman',
        ]);

        $response->assertRedirect(route('doctor.dashboard'));
        $this->assertDatabaseHas('users', [
            'email' => 'doctor@example.com',
            'role' => 'dokter',
        ]);
        $this->assertDatabaseHas('doctors', [
            'no_reg_dokter' => 'DRH12345',
        ]);
    }
}
