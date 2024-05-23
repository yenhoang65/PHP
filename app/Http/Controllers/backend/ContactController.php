<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ContactDataTable;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(ContactDataTable $dataTable){
        return $dataTable->render('admin.contact.index');
    }
}
