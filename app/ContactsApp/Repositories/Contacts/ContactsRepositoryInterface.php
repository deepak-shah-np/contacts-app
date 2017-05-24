<?php
/**
 * Created by PhpStorm.
 * User: deepak
 * Date: 5/18/17
 * Time: 8:50 PM
 */

namespace App\ContactsApp\Repositories\Contacts;

/**
 * Interface ContactsRepositoryInterface
 * @package App\ContactsApp\Repositories\Contacts
 */
interface ContactsRepositoryInterface
{
    /**
     * Store contacts data
     * @param $data
     * @return bool
     */
    public function storeContact($data);

    /**
     * Return collection of contacts object
     * @return mixed
     */
    public function getAllContacts();

    /**
     * Return the object of specific contact
     * @param $id
     * @return object
     */
    public function getContact($id);

    /**
     * Update contact data
     *
     * @param $id
     * @param $formData
     * @return mixed
     */
    public function updateContact($id, $formData);

    /**
     * Delete contact
     * @param $id
     * @return mixed
     */
    public function softDelete($id);

    /**
     * Return detail of contact
     *
     * @param $slug
     * @return object
     */
    public function getDetail($slug);

    public function getActivityLog($id,$params);
}