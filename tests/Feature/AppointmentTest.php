<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Pet;
use App\Models\Appointment;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AppointmentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * test user dapat membuat appointment
     */
    public function test_user_can_create_appointment(): void
    {
        $user = User::factory()->create(['role' => 'klien']);
        $doctor = Doctor::factory()->create();
        $pet = Pet::factory()->create(['user_id' => $user->id]);
        $service = Service::factory()->create();

        $response = $this->actingAs($user)->post(route('dashboard.store-booking'), [
            'pet_id' => $pet->id,
            'service_ids' => [$service->id],
            'doctor_id' => $doctor->id,
            'appointment_date' => now()->addDays(2)->format('Y-m-d'),
            'appointment_time' => '10:00',
            'client_notes' => 'Test notes',
        ]);

        $response->assertRedirect(route('dashboard.bookings'));
        $this->assertDatabaseHas('appointments', [
            'user_id' => $user->id,
            'pet_id' => $pet->id,
            'doctor_id' => $doctor->id,
            'status' => 'pending',
        ]);
    }

    /**
     * test user dapat melihat daftar appointment miliknya
     */
    public function test_user_can_view_their_appointments(): void
    {
        $user = User::factory()->create(['role' => 'klien']);
        Appointment::factory()->count(3)->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get(route('dashboard.bookings'));

        $response->assertStatus(200);
        $response->assertViewHas('appointments');
    }

    /**
     * test user dapat membatalkan appointment dengan status pending
     */
    public function test_user_can_cancel_pending_appointment(): void
    {
        $user = User::factory()->create(['role' => 'klien']);
        $appointment = Appointment::factory()->create([
            'user_id' => $user->id,
            'status' => 'pending',
        ]);

        $response = $this->actingAs($user)->delete(route('dashboard.cancel-booking', $appointment));

        $response->assertRedirect(route('dashboard.bookings'));
        $this->assertDatabaseHas('appointments', [
            'id' => $appointment->id,
            'status' => 'cancelled',
        ]);
    }

    /**
     * test dokter dapat melihat daftar appointment mereka
     */
    public function test_doctor_can_view_their_appointments(): void
    {
        $user = User::factory()->create(['role' => 'dokter']);
        $doctor = Doctor::factory()->create(['user_id' => $user->id]);
        Appointment::factory()->count(3)->create(['doctor_id' => $doctor->id]);

        $response = $this->actingAs($user)->get(route('doctor.dashboard'));

        $response->assertStatus(200);
        $response->assertViewHas('appointments');
    }

    /**
     * test dokter dapat mengkonfirmasi appointment
     */
    public function test_doctor_can_confirm_appointment(): void
    {
        $user = User::factory()->create(['role' => 'dokter']);
        $doctor = Doctor::factory()->create(['user_id' => $user->id]);
        $appointment = Appointment::factory()->create([
            'doctor_id' => $doctor->id,
            'status' => 'pending',
        ]);

        $response = $this->actingAs($user)->put(route('doctor.appointment.confirm', $appointment));

        $response->assertRedirect();
        $this->assertDatabaseHas('appointments', [
            'id' => $appointment->id,
            'status' => 'confirmed',
        ]);
    }

    /**
     * test dokter dapat menyelesaikan appointment
     */
    public function test_doctor_can_complete_appointment(): void
    {
        $user = User::factory()->create(['role' => 'dokter']);
        $doctor = Doctor::factory()->create(['user_id' => $user->id]);
        $appointment = Appointment::factory()->create([
            'doctor_id' => $doctor->id,
            'status' => 'confirmed',
        ]);
        $appointment->services()->attach(Service::factory()->create());

        $response = $this->actingAs($user)->put(route('doctor.appointment.complete', $appointment));

        $response->assertRedirect(route('doctor.dashboard'));
        $this->assertDatabaseHas('appointments', [
            'id' => $appointment->id,
            'status' => 'completed',
        ]);
        $this->assertDatabaseHas('transactions', [
            'appointment_id' => $appointment->id,
        ]);
    }
}
