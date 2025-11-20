<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Pet;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PetTest extends TestCase
{
    use RefreshDatabase;

    /**
     * test user dapat melihat daftar pet miliknya
     */
    public function test_user_can_view_their_pets(): void
    {
        $user = User::factory()->create(['role' => 'klien']);
        Pet::factory()->count(3)->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->get(route('pets.index'));

        $response->assertStatus(200);
        $response->assertViewHas('data');
    }

    /**
     * test user dapat membuat pet baru
     */
    public function test_user_can_create_pet(): void
    {
        Storage::fake('public');
        $user = User::factory()->create(['role' => 'klien']);

        $response = $this->actingAs($user)->post(route('pets.store'), [
            'name' => 'Buddy',
            'species' => 'Dog',
            'breed' => 'Golden Retriever',
            'dob' => '2020-01-01',
            'gender' => 'male',
            'photo' => UploadedFile::fake()->image('pet.jpg'),
        ]);

        $response->assertRedirect(route('pets.index'));
        $this->assertDatabaseHas('pets', [
            'name' => 'Buddy',
            'species' => 'Dog',
            'user_id' => $user->id,
        ]);
    }

    /**
     * test user dapat mengupdate pet miliknya
     */
    public function test_user_can_update_their_pet(): void
    {
        $user = User::factory()->create(['role' => 'klien']);
        $pet = Pet::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->put(route('pets.update', $pet), [
            'name' => 'Updated Name',
            'species' => $pet->species,
            'breed' => $pet->breed,
            'dob' => $pet->dob,
            'gender' => $pet->gender,
        ]);

        $response->assertRedirect(route('pets.index'));
        $this->assertDatabaseHas('pets', [
            'id' => $pet->id,
            'name' => 'Updated Name',
        ]);
    }

    /**
     * test user tidak dapat mengupdate pet milik user lain
     */
    public function test_user_cannot_update_other_users_pet(): void
    {
        $user1 = User::factory()->create(['role' => 'klien']);
        $user2 = User::factory()->create(['role' => 'klien']);
        $pet = Pet::factory()->create(['user_id' => $user2->id]);

        $response = $this->actingAs($user1)->put(route('pets.update', $pet), [
            'name' => 'Hacked Name',
            'species' => $pet->species,
            'breed' => $pet->breed,
            'dob' => $pet->dob,
            'gender' => $pet->gender,
        ]);

        $response->assertForbidden();
    }

    /**
     * test user dapat menghapus pet miliknya
     */
    public function test_user_can_delete_their_pet(): void
    {
        $user = User::factory()->create(['role' => 'klien']);
        $pet = Pet::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)->delete(route('pets.destroy', $pet));

        $response->assertRedirect(route('pets.index'));
        $this->assertDatabaseMissing('pets', ['id' => $pet->id]);
    }
}
