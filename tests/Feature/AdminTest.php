<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    /**
     * test admin dapat melihat dashboard
     */
    public function test_admin_can_view_dashboard(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->get(route('admin.dashboard'));

        $response->assertStatus(200);
        $response->assertViewHas(['totalUsers', 'totalPets', 'totalAppointments', 'totalRevenue']);
    }

    /**
     * test admin dapat membuat dokter baru
     */
    public function test_admin_can_create_doctor(): void
    {
        Storage::fake('public');
        $admin = User::factory()->create(['role' => 'admin']);
        $photo = UploadedFile::fake()->image('doctor.jpg');

        $response = $this->actingAs($admin)->post(route('admin.doctors.store'), [
            'name' => 'Dr. Test',
            'email' => 'doctor@test.com',
            'phone' => '08123456789',
            'spesialisasi' => 'General',
            'position' => 'Senior',
            'show_in_team' => true,
            'photo' => $photo,
        ]);

        $response->assertRedirect(route('admin.doctors'));
        $this->assertDatabaseHas('users', [
            'name' => 'Dr. Test',
            'email' => 'doctor@test.com',
            'role' => 'dokter',
        ]);
        $this->assertDatabaseHas('doctors', [
            'spesialisasi' => 'General',
            'position' => 'Senior',
            'show_in_team' => true,
        ]);
        Storage::disk('public')->assertExists('doc-photos/' . $photo->hashName());
    }

    /**
     * test admin dapat mengupdate informasi dokter
     */
    public function test_admin_can_update_doctor(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create(['role' => 'dokter']);
        $doctor = Doctor::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($admin)->put(route('admin.doctors.update', $doctor), [
            'name' => 'Dr. Updated',
            'email' => $user->email,
            'phone' => '08199999999',
            'spesialisasi' => 'Surgery',
            'position' => 'Lead',
        ]);

        $response->assertRedirect(route('admin.doctors'));
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Dr. Updated',
        ]);
        $this->assertDatabaseHas('doctors', [
            'id' => $doctor->id,
            'spesialisasi' => 'Surgery',
            'position' => 'Lead',
        ]);
    }

    /**
     * test admin dapat toggle status show_in_team dokter
     */
    public function test_admin_can_toggle_doctor_team_status(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $doctor = Doctor::factory()->create(['show_in_team' => true]);

        $response = $this->actingAs($admin)->patch(route('admin.doctors.updateTeamStatus', $doctor));

        $response->assertRedirect();
        $this->assertDatabaseHas('doctors', [
            'id' => $doctor->id,
            'show_in_team' => false,
        ]);
    }

    /**
     * test admin dapat menghapus dokter
     */
    public function test_admin_can_delete_doctor(): void
    {
        Storage::fake('public');
        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create(['role' => 'dokter']);
        $doctor = Doctor::factory()->create([
            'user_id' => $user->id,
            'photo' => 'doc-photos/test.jpg',
        ]);
        Storage::disk('public')->put('doc-photos/test.jpg', 'test content');

        $response = $this->actingAs($admin)->delete(route('admin.doctors.destroy', $doctor));

        $response->assertRedirect(route('admin.doctors'));
        $this->assertDatabaseMissing('doctors', ['id' => $doctor->id]);
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
        Storage::disk('public')->assertMissing('doc-photos/test.jpg');
    }

    /**
     * test admin dapat membuat service baru
     */
    public function test_admin_can_create_service(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($admin)->post(route('admin.services.store'), [
            'name' => 'Vaccination',
            'description' => 'Complete vaccination service',
            'price' => 150000,
        ]);

        $response->assertRedirect(route('admin.services'));
        $this->assertDatabaseHas('services', [
            'name' => 'Vaccination',
            'price' => 150000,
        ]);
    }

    /**
     * test admin dapat mengupdate service
     */
    public function test_admin_can_update_service(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $service = Service::factory()->create();

        $response = $this->actingAs($admin)->put(route('admin.services.update', $service), [
            'name' => 'Updated Service',
            'description' => 'Updated description',
            'price' => 200000,
        ]);

        $response->assertRedirect(route('admin.services'));
        $this->assertDatabaseHas('services', [
            'id' => $service->id,
            'name' => 'Updated Service',
            'price' => 200000,
        ]);
    }

    /**
     * test admin dapat menghapus service
     */
    public function test_admin_can_delete_service(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $service = Service::factory()->create();

        $response = $this->actingAs($admin)->delete(route('admin.services.destroy', $service));

        $response->assertRedirect(route('admin.services'));
        $this->assertDatabaseMissing('services', ['id' => $service->id]);
    }

    /**
     * test non-admin tidak dapat mengakses dashboard admin
     */
    public function test_non_admin_cannot_access_admin_dashboard(): void
    {
        $user = User::factory()->create(['role' => 'klien']);

        $response = $this->actingAs($user)->get(route('admin.dashboard'));

        $response->assertStatus(403);
    }
}
