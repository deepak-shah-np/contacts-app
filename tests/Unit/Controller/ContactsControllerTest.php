<?php

namespace Tests\Unit\Controller;

use App\User;
use Illuminate\Support\Facades\App;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContactsControllerTest extends TestCase
{

    public $contactService;

    public function __construct()
    {
        parent::__construct();
        $this->contactService = \Mockery::mock('App\ContactsApp\Services\ContactsService');

    }


    /**
     * Setup a fake user
     */
    public function setUp()
    {
        parent::setUp();
        $user = factory(User::class)->create();
        $this->actingAs($user);

    }


    /**
     * Test for index of contactsController
     */
    public function testIndex()
    {

        $this->contactService->shouldReceive('getAllContacts')->once()->andReturn([]);
        $this->contactService->getAllContacts();
        $response=$this->get(route('contact_index'));
        $response->assertViewHas('contacts');

    }





    public function tearDown()
    {
        parent::tearDown();
        \Mockery::close();
    }







}
