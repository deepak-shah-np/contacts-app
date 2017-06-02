<?php

namespace Tests\Unit\Controller;

use App\ContactsApp\Models\Contacts;
use App\User;
use Tests\TestCase;

/**
 * This class is responsible to test contact controller
 * Class ContactsControllerTest
 * @package Tests\Unit\Controller
 */
class ContactsControllerTest extends TestCase
{

    public $contactService;
    public $user;
    public $contact;
    public $fakeContact;

    public function __construct()
    {
        parent::__construct();
        $this->contactService = \Mockery::mock('App\ContactsApp\Services\ContactsService');
        $this->contact = \Mockery::mock('App\ContactsApp\Models\Contacts');

    }


    /**
     * Setup a fake user
     */
    public function setUp()
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
        $this->actingAs($this->user);
        $this->fakeContact = factory(Contacts::class)->create();

    }


    public function tearDown()
    {

        parent::tearDown();
        \Mockery::close();
    }

    /**
     * Test for index of contactsController
     */
    public function testIndex()
    {

        $this->contactService->shouldReceive('getAllContacts')->once()->with($this->user->id)->andReturn([]);
        $this->contactService->getAllContacts($this->user->id);
        $response=$this->get(route('contact_index'));

        $response->assertViewHas('contacts');

    }

    /**
     * Test for create function of contactsController
     */
    public function testCreate()
    {
        $response = $this->call('GET','/contact/create');

        $response->assertStatus(200);
    }

    /**
     *  Test the success to store contacts data
     */
    public function testStoreSuccess()
    {
        $input = factory(Contacts::class)->make();
        $this->contactService->shouldReceive('store')->once()->with($input);
        $this->app->instance('Contact',$this->contact);
        $response=$this->post(route('contact_store'),$input->toArray());

        $response->assertRedirect(route('contact_index'));


    }

    /**
     * Test the failure of contact data store
     */

    public function testStoreFails()
    {
        $input = factory(Contacts::class)->make();
        unset($input->name);

        $this->contactService->shouldReceive('store')->once()->with($input);
        $this->app->instance('Contact',$this->contact);
        $response=$this->call('POST',route('contact_store'),$input->toArray(),[],[],['HTTP_REFERER' => '/contact/create']);

        $response->assertSessionHasErrors(['name']);
        $response->assertRedirect('contact/create');

    }

    /**
     *  Test edit view page
     */
    public function testEdit()
    {
        $this->contactService->shouldReceive('getContact')->with($this->fakeContact->id)->once()->andReturn($this->contact);
        $this->contactService->getContact($this->fakeContact->id);
        $response = $this->get('contact/'.$this->fakeContact->id.'/edit');

        $response->assertViewHas('contact');
    }

    /**
     *  Test success of contact's update
     */
    public function testUpdateSuccess()
    {
        $input = factory(Contacts::class)->make();
        $contactId = $this->fakeContact->id;
        $this->contactService->shouldReceive('updateContact')->with($contactId,$input->toArray())->once()->andReturn($this->contact);
        $this->app->instance('Contact',$this->contact);
        $response = $this->call('POST',route('contact_update',["id"=>$contactId]),$input->toArray(),[],[],['HTTP_REFERER' => '/contact/'.$contactId.'/edit']);
        $response->assertRedirect(route('contact_index'));
    }

    /**
     *  Test failure of contact's update
     */
    public function testUpdateFail()
    {
        $input = factory(Contacts::class)->make();
        unset($input->name);

        $contactId = $this->fakeContact->id;
        $this->contactService->shouldReceive('updateContact')->with($contactId,$input->toArray())->once()->andReturn($this->contact);
        $this->app->instance('Contact',$this->contact);
        $response = $this->call('POST',route('contact_update',["id"=>$contactId]),$input->toArray(),[],[],['HTTP_REFERER' => '/contact/'.$contactId.'/edit']);

        $response->assertRedirect(route('contact_edit',['id'=>$contactId]));

    }


    /**
     *  Test for softdelete of Contact
     */
    public function testSoftDeleteSuccess()
    {
        $contactId=$this->fakeContact->id;
        $this->contactService->shouldReceive('softDelete')->with($contactId)->once();
        $response = $this->call('GET',route('contact_soft_delete',['id'=>$contactId]),[],[],[],['HTTP_REFERER' => '/contacts']);

        $response->assertRedirect(route('contact_index'));

    }


    /**
     * Test for detail of contactcontroller
     */
    public function testDetail()
    {
        $this->contactService->shouldReceive('getDetail')->with($this->fakeContact->slug)->once()->andReturn($this->contact);
        $response = $this->get(route('contact_detail',['slug'=>$this->fakeContact->slug]));

        $response->assertViewHas('contact');
    }


    /**
     *  Test for activity log
     */
    public function testActivityLog()
    {
        $this->contact->shouldReceive('getDetail')->with($this->user->id)->once();
        $response=$this->call('GET',route('activity_log'));
        $response->assertViewHas('activities');

    }












}
