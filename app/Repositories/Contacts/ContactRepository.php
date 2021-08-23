<?php
namespace App\Repositories\Contacts;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use Validator;

class ContactRepository extends BaseRepository implements ContactInterface
{
    public function getModel()
    {
        return \App\Models\Contact::class;
    }

    
}