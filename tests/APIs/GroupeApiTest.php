<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Groupe;

class GroupeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_groupe()
    {
        $groupe = Groupe::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/groupes', $groupe
        );

        $this->assertApiResponse($groupe);
    }

    /**
     * @test
     */
    public function test_read_groupe()
    {
        $groupe = Groupe::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/groupes/'.$groupe->id
        );

        $this->assertApiResponse($groupe->toArray());
    }

    /**
     * @test
     */
    public function test_update_groupe()
    {
        $groupe = Groupe::factory()->create();
        $editedGroupe = Groupe::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/groupes/'.$groupe->id,
            $editedGroupe
        );

        $this->assertApiResponse($editedGroupe);
    }

    /**
     * @test
     */
    public function test_delete_groupe()
    {
        $groupe = Groupe::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/groupes/'.$groupe->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/groupes/'.$groupe->id
        );

        $this->response->assertStatus(404);
    }
}
