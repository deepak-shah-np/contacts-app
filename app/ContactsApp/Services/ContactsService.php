<?php
/**
 * Created by PhpStorm.
 * User: deepak
 * Date: 5/18/17
 * Time: 8:46 PM
 */

namespace App\ContactsApp\Services;


use App\ContactsApp\Repositories\Contacts\ContactsRepositoryInterface;
use JeroenDesloovere\VCard\VCard;

/**
 * Logic and data formatting of contacts data
 * Class ContactsService
 * @package App\ContactsApp\Services
 */
class ContactsService
{
    /**
     * @var ContactsRepositoryInterface
     */
    private $contacts;
    /**
     * @var VCard
     */
    public $vcard;
    
    /**
     * ContactsService constructor.
     *
     * @param ContactsRepositoryInterface $contacts
     * @param VCard $vcard
     */
    public function __construct (ContactsRepositoryInterface $contacts, VCard $vcard)
    {
        $this->contacts = $contacts;
        $this->vcard = $vcard;
    }
    
    
    /**
     * Format data of contacts
     *
     * @param $formData
     *
     * @return bool
     */
    public function storeContact ($formData)
    {
        $data = $this->formatData($formData);
        
        return $this->contacts->storeContact($data);
    }
    
    /**
     * Return array of contacts
     * @return array
     */
    public function getAllContacts ($userId)
    {
        $contacts = $this->contacts->getAllContacts($userId);
        
        $data = [];
        foreach ($contacts as $contact) {
            $data[] = [
                'id'         => $contact->id,
                'name'       => $contact->name,
                'email'      => $contact->email,
                'phone'      => $contact->phone,
                'address'    => $contact->address,
                'company'    => $contact->company,
                'birth_date' => $contact->birth_date,
                'age'        => $this->getAge($contact->birth_date),
                'slug'       => $contact->slug
            ];
        }
        
        return $data;
    }
    
    /**
     * Calculate age
     *
     * @param $birthDate
     *
     * @return int
     */
    public function getAge ($birthDate)
    {
        
        return date_diff(date_create($birthDate), date_create('now'))->y;
        
    }
    
    /**
     * Get a specific contact
     *
     * @param $id
     *
     * @return object
     */
    public function getContact ($id)
    {
        return $this->contacts->getContact($id);
    }
    
    /**
     * Update contact's data
     *
     * @param $id
     * @param $formData
     *
     * @return mixed
     */
    public function updateContact ($id, $formData)
    {
        $data = $this->formatData($formData);
        
        return $this->contacts->updateContact($id, $data);
    }
    
    /**
     * Return of fillable array of contact data
     *
     * @param $formData
     *
     * @return array
     */
    private function formatData ($formData)
    {
        return [
            'user_id'    => $formData['user_id'],
            'name'       => $formData['name'],
            'email'      => $formData['email'],
            'phone'      => $formData['phone'],
            'address'    => $formData['address'],
            'company'    => $formData['company'],
            'birth_date' => $formData['birth_date']
        ];
    }
    
    /**
     * Delete contact
     *
     * @param $id
     *
     * @return mixed
     */
    public function softDelete ($id)
    {
        return $this->contacts->softDelete($id);
    }
    
    
    /**
     * Return detail of contact
     *
     * @param $slug
     *
     * @return object
     */
    public function getDetail ($slug)
    {
        return $this->contacts->getDetail($slug);
    }
    
    /**
     * Get all the activity log of user
     *
     * @param $id
     * @param $params
     *
     * @return mixed
     */
    public function getActivityLog ($id)
    {
        return $this->contacts->getActivityLog($id);
    }
    
    
}