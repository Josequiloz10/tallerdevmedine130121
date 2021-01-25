<?php

declare(strict_types=1);

namespace Tests\Feature\Gibmyx;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Ramsey\Uuid\Uuid;
use Tests\TestCase;

final class PeliculasControllerTest extends TestCase
{

    use DatabaseTransactions;
    /**
     * @test
     */
    public function it_should_create_movie()
    {
        $pelicula = [
            'id' => Uuid::uuid4(),
            "titulo" => "titanic",
            "genero" => "drama",
            "duracion" => "3:14",
            "director" => "James cameron",
            "estreno" =>"18/02/1997",
        ];
        $response = $this->postJson('/save_movie', $pelicula);

        $response->assertStatus(201);
        $this->assertDatabaseHas('peliculas', $pelicula);
    }

}
