<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class StudentApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');
    }

    /** @test */
    public function it_can_list_students()
    {
        Student::factory()->count(3)->create();

        $response = $this->getJson('/api/students');

        $response->assertStatus(200)
            ->assertJsonCount(3); // Assuming you have 3 students created
    }

    /** @test */
    public function it_can_create_a_student()
    {
        $data = [
            'firstname' => 'John',
            'lastname' => 'Doe',
            'birthdate' => '1995-05-15',
            'sex' => 'MALE',
            'address' => '123 Main St',
            'year' => 3,
            'course' => 'Computer Science',
            'section' => 'A',
        ];

        $response = $this->postJson('/api/students', $data);

        $response->assertStatus(201)
            ->assertJson($data);
    }

    /** @test */
    public function it_can_update_a_student()
    {
        $student = Student::factory()->create();

        $updateData = [
            'firstname' => 'Updated Firstname',
            'lastname' => 'Updated Lastname',
            'birthdate' => '1990-05-15',
            'sex' => 'MALE', 
            'address' => 'Updated Address',
            'year' => 4, 
            'course' => 'Updated Course',
            'section' => 'B',
        ];

        $response = $this->patchJson("/api/students/{$student->id}", $updateData);

        $response->assertStatus(200)
            ->assertJson($updateData);
    }
}
