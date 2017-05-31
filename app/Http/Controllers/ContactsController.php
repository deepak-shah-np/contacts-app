<?php

namespace App\Http\Controllers;

use App\ContactsApp\Services\ContactsService;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use JeroenDesloovere\VCard\VCard;

/**
 * Class ContactsController
 * Contacts related action
 * @package App\Http\Controllers
 */

class ContactsController extends Controller
{
    /**
     * @var ContactsService
     */
    public $contacts;
    /**
     * @var Auth
     */
    protected $user;

    /**
     * ContactsController constructor.
     * @param ContactsService $contacts
     * @param Auth $user
     */
    public function __construct(ContactsService $contacts)
    {
        $this->middleware('auth');
        $this->contacts = $contacts;
    }


    /**
     * Return all the contacts data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $contacts = $this->contacts->getAllContacts($userId);
        return view('contacts.index',compact('contacts'));
    }

    /**
     * Show the view page of contact
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store contacts form data
     * @param ContactRequest $request
     * @return $this
     */
    public function store(ContactRequest $request)
    {
        $formData = $request->all();
        if($this->contacts->storeContact($formData))
        {
            return redirect()->route('contact_index')->withSuccess("Contact Created!");
        }
        return redirect()->back()->withErrors("Something went wrong!");

    }

    /**
     * Edit View page
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $contact = $this->contacts->getContact($id);

        return view('contacts.edit',compact('contact'));
    }

    /**
     * Update contact
     *
     * @param $id
     * @param ContactRequest $request
     * @return $this
     */
    public function update($id, ContactRequest $request)
    {
        $formData = $request->all();
        if($this->contacts->updateContact($id,$formData))
        {
            return redirect()->route('contact_index')->withSuccess("Contact updated!");
        }

        return redirect()->back()->withErrors('Something went wrong!');

    }

    /**
     * Softly delete contacts
     *
     * @param $id
     * @return $this
     */
    public function softDelete($id)
    {
        if($this->contacts->softDelete($id))
        {
            return redirect()->route('contact_index')->withSuccess("Contact deleted!");
        }
        return redirect()->back()->withErrors('Something went wrong!');
    }

    /**
     * Return detail of contact by slug
     *
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($slug)
    {
        $contact = $this->contacts->getDetail($slug);

        return view('contacts.detail',compact('contact'));
    }

    public function activityLog(Request $request)
    {
        $params = [
            'from'=>$request->get('from',date('Y-m-d')),
            'to'=>$request->get('to',date('Y-m-d'))
        ];

        $user = Auth::user();
        $activities = $this->contacts->getActivityLog($user->id,$params);

        return view('contacts.activity',compact('activities'));
    }

    /**
     * Export contact in vcard format
     *
     * @param $id
     */
    public function export($id)
    {
       return $this->contacts->exportContact($id);
    }
}
