<?php namespace Tests\Repositories;

use App\Models\Groupe;
use App\Repositories\GroupeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class GroupeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var GroupeRepository
     */
    protected $groupeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->groupeRepo = \App::make(GroupeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_groupe()
    {
        $groupe = Groupe::factory()->make()->toArray();

        $createdGroupe = $this->groupeRepo->create($groupe);

        $createdGroupe = $createdGroupe->toArray();
        $this->assertArrayHasKey('id', $createdGroupe);
        $this->assertNotNull($createdGroupe['id'], 'Created Groupe must have id specified');
        $this->assertNotNull(Groupe::find($createdGroupe['id']), 'Groupe with given id must be in DB');
        $this->assertModelData($groupe, $createdGroupe);
    }

    /**
     * @test read
     */
    public function test_read_groupe()
    {
        $groupe = Groupe::factory()->create();

        $dbGroupe = $this->groupeRepo->find($groupe->id);

        $dbGroupe = $dbGroupe->toArray();
        $this->assertModelData($groupe->toArray(), $dbGroupe);
    }

    /**
     * @test update
     */
    public function test_update_groupe()
    {
        $groupe = Groupe::factory()->create();
        $fakeGroupe = Groupe::factory()->make()->toArray();

        $updatedGroupe = $this->groupeRepo->update($fakeGroupe, $groupe->id);

        $this->assertModelData($fakeGroupe, $updatedGroupe->toArray());
        $dbGroupe = $this->groupeRepo->find($groupe->id);
        $this->assertModelData($fakeGroupe, $dbGroupe->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_groupe()
    {
        $groupe = Groupe::factory()->create();

        $resp = $this->groupeRepo->delete($groupe->id);

        $this->assertTrue($resp);
        $this->assertNull(Groupe::find($groupe->id), 'Groupe should not exist in DB');
    }
}
