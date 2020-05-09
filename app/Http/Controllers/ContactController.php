<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Session;
use App\Trash;
class ContactController extends Controller
{
    public function contactList()
    {    
        $contacts = Contact::all();
         return view('contact_list',compact('contacts'));
    }
    public function storeList(Request $request)
    {
       $contact = new Contact;
       $contact->name = $request->input('name');
       $contact->email = $request->input('email');
       $contact->phn = $request->input('phn');

       $contact->save();
       $request->session()->flash('message','Contact Added Successfully!');
       return redirect()->back();
    }
    public function softDelete(Request $request)
    {
         $data = $request->all();
         $contact = Contact::where('id',$data['contact_id'])->first();
         
         Trash::create([
            'contact_id' => $contact->id,
            'name'       => $contact->name,
            'email' => $contact->email,
            'phn' => $contact->phn ,
            'reason' => $request->reason ,
        ]); 
        Contact::destroy($contact->id);
        Session::flash('warning','Contact Deleted Successfully!');
        return redirect()->back();
    }

    public function softDeletedContact()
    {   
        $contacts = Trash::all();
        return view('contact_list_deleted',compact('contacts'));
    }

    public function restore($id)
    {
      
        $contact = Contact::onlyTrashed()->find($id);
        if(!is_null($contact)){
            $contact->restore();
            $trashed = Trash::where('contact_id',$id)->first();
            $trashed->delete();
            Session::flash('success','Contact Restored Successfully!');
            return redirect()->back();
        }
    }
}
