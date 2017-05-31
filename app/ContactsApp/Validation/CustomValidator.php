<?php
/**
 * Created by PhpStorm.
 * User: deepak
 * Date: 5/31/17
 * Time: 3:53 PM
 */

namespace App\ContactsApp\Validation;


use App\ContactsApp\Models\Contacts;
use Illuminate\Support\Facades\Auth;

class CustomValidator
{
    /**
     * @var Contacts
     */
    private $contacts;

    /**
     * CustomValidator constructor.
     * @param Contacts $contacts
     */
    public function __construct(Contacts $contacts)
    {
        $this->contacts = $contacts;
    }

    public function uniqueAttribute($attribute, $value, $parameters, $validator)
    {

        $user = Auth::user();
        $contacts = $this->contacts->where('user_id',$user->id)->where($attribute,$value);

        if (is_numeric($parameters[0]))
        {
            $contacts->where('id','<>',$parameters[0]);
        }

        if (!$contacts->first())
        {
            return true;
        }
        return false;

    }
}