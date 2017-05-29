<?php
/**
 * Created by PhpStorm.
 * User: deepak
 * Date: 5/18/17
 * Time: 8:50 PM
 */

namespace App\ContactsApp\Repositories\Contacts;


use App\ContactsApp\Models\Contacts;
use Illuminate\Database\QueryException;
use Spatie\Activitylog\Models\Activity;

/**
 * Contacts related query
 * Class ContactsRepository
 * @package App\ContactsApp\Repositories\Contacts
 */
class ContactsRepository implements ContactsRepositoryInterface
{
    /**
     * @var Contacts
     */
    protected $contacts;
    /**
     * @var Activity
     */
    protected $activity;

    /**
     * ContactsRepository constructor.
     * @param Contacts $contacts
     * @param Activity $activity
     */
    public function __construct(Contacts $contacts,Activity $activity)
    {

        $this->contacts = $contacts;
        $this->activity = $activity;
    }

    /**
     * Store contacts data
     * @param $data
     * @return bool
     */
    public function storeContact($data)
    {
        try{
            return $this->contacts->create($data);
        }
        catch (QueryException $e)
        {
            dd($e->getMessage());
            return false;
        }
    }


    /**
     * Return collection of contacts object
     * @return mixed
     */
    public function getAllContacts()
    {
        return $this->contacts->get();
    }

    /**
     * Return the object of specific contact
     * @param $id
     * @return object
     */
    public function getContact($id)
    {
        return $this->contacts->where('id',$id)->first();
    }

    /**
     * Update contact data
     *
     * @param $id
     * @param $formData
     * @return mixed
     */
    public function updateContact($id, $formData)
    {
        $contact = $this->contacts->find($id);
        if ($contact)
        {
            $contact->name = $formData['name'];
            $contact->email = $formData['email'];
            $contact->phone = $formData['phone'];
            $contact->address = $formData['address'];
            $contact->company = $formData['company'];
            $contact->birth_date = $formData['birth_date'];
            return $contact->save();
        }
        return false;


    }

    /**
     * Delete contact softly
     * @param $id
     */
    public function softDelete($id)
    {
        $this->contacts->where('id',$id)->delete();
    }

    /**
     * Return detail of contact
     *
     * @param $slug
     * @return object
     */
    public function getDetail($slug)
    {
        return $this->contacts->where('slug',$slug)->first();
    }

    public function getActivityLog($id,$params)
    {

        return  $this->activity->where('subject_id',$id)->get();
    }
}