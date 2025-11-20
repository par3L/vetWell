<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    /**
     * test user dapat melihat halaman profile
     */
    public function test_user_can_view_profile_page(): void
    {
        $user = User::factory()->create(['role' => 'klien']);

        $response = $this->actingAs($user)->get(route('dashboard.profile'));

        $response->assertStatus(200);
        $response->assertSee($user->name);
        $response->assertSee($user->email);
    }

    /**
     * test user dapat mengupdate profile
     */
    public function test_user_can_update_profile(): void
    {
        $user = User::factory()->create(['role' => 'klien']);

        $response = $this->actingAs($user)->put(route('dashboard.profile.update'), [
            'name' => 'Updated Name',
            'email' => 'newemail@test.com',
            'phone' => '08199999999',
        ]);

        $response->assertRedirect(route('dashboard.profile'));
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Name',
            'email' => 'newemail@test.com',
            'phone' => '08199999999',
        ]);
    }

    /**
     * test user dapat mengupload foto profile
     */
    public function test_user_can_upload_profile_photo(): void
    {
        Storage::fake('public');
        $user = User::factory()->create(['role' => 'klien']);
        $photo = UploadedFile::fake()->image('profile.jpg');

        $response = $this->actingAs($user)->put(route('dashboard.profile.update'), [
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'photo' => $photo,
        ]);

        $response->assertRedirect(route('dashboard.profile'));
        $this->assertNotNull($user->fresh()->photo);
        Storage::disk('public')->assertExists('user-photos/' . $photo->hashName());
    }

    /**
     * test user dapat mengganti password
     */
    public function test_user_can_change_password(): void
    {
        $user = User::factory()->create([
            'role' => 'klien',
            'password' => Hash::make('oldpassword'),
        ]);

        $response = $this->actingAs($user)->put(route('dashboard.password.update'), [
            'current_password' => 'oldpassword',
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword',
        ]);

        $response->assertRedirect(route('dashboard.profile'));
        $this->assertTrue(Hash::check('newpassword', $user->fresh()->password));
    }

    /**
     * test user tidak dapat mengganti password dengan current password salah
     */
    public function test_user_cannot_change_password_with_wrong_current_password(): void
    {
        $user = User::factory()->create([
            'role' => 'klien',
            'password' => Hash::make('oldpassword'),
        ]);

        $response = $this->actingAs($user)->put(route('dashboard.password.update'), [
            'current_password' => 'wrongpassword',
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword',
        ]);

        $response->assertSessionHasErrors('current_password');
        $this->assertTrue(Hash::check('oldpassword', $user->fresh()->password));
    }

    /**
     * test dokter dapat melihat halaman profile
     */
    public function test_doctor_can_view_profile_page(): void
    {
        $user = User::factory()->create(['role' => 'dokter']);
        $doctor = Doctor::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get(route('doctor.profile'));

        $response->assertStatus(200);
        $response->assertSee($user->name);
        $response->assertSee($doctor->spesialisasi);
    }

    /**
     * test dokter dapat mengupdate profile
     */
    public function test_doctor_can_update_profile(): void
    {
        $user = User::factory()->create(['role' => 'dokter']);
        $doctor = Doctor::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->put(route('doctor.profile.update'), [
            'name' => 'Dr. Updated',
            'email' => 'updated@test.com',
            'phone' => '08199999999',
            'spesialisasi' => 'Surgery',
            'position' => 'Senior',
        ]);

        $response->assertRedirect(route('doctor.profile'));
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Dr. Updated',
            'email' => 'updated@test.com',
        ]);
        $this->assertDatabaseHas('doctors', [
            'id' => $doctor->id,
            'spesialisasi' => 'Surgery',
            'position' => 'Senior',
        ]);
    }

    /**
     * test dokter dapat mengupload foto profile
     */
    public function test_doctor_can_upload_profile_photo(): void
    {
        Storage::fake('public');
        $user = User::factory()->create(['role' => 'dokter']);
        $doctor = Doctor::factory()->create(['user_id' => $user->id]);
        $photo = UploadedFile::fake()->image('doctor.jpg');

        $response = $this->actingAs($user)->put(route('doctor.profile.update'), [
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'spesialisasi' => $doctor->spesialisasi,
            'position' => $doctor->position,
            'photo' => $photo,
        ]);

        $response->assertRedirect(route('doctor.profile'));
        $this->assertNotNull($doctor->fresh()->photo);
        Storage::disk('public')->assertExists('doc-photos/' . $photo->hashName());
    }

    /**
     * test dokter dapat mengganti password
     */
    public function test_doctor_can_change_password(): void
    {
        $user = User::factory()->create([
            'role' => 'dokter',
            'password' => Hash::make('oldpassword'),
        ]);
        Doctor::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->put(route('doctor.password.update'), [
            'current_password' => 'oldpassword',
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword',
        ]);

        $response->assertRedirect(route('doctor.profile'));
        $this->assertTrue(Hash::check('newpassword', $user->fresh()->password));
    }
}
