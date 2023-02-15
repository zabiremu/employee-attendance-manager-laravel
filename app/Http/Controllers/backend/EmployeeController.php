<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Models\UserContact;
use App\Models\UserDetail;

class EmployeeController extends Controller
{
    // display employee controller
    public function createEmployee()
    {
        return view('backend.employee-lists.create-employee');
    }

    public function employeeLists()
    {
        $employee = User::role('Employee')
            ->latest()
            ->get();
        return view('backend.employee-lists.employeeLists', compact('employee'));
    }
    public function editEmployee($id)
    {
        $user = User::findOrFail($id);
        return view('backend.employee-lists.employeeDeatails', compact('user'));
    }

    public function updateEmployee(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'full_name' => 'required|max:255',
            'email' => 'required|max:255',
        ]);
        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->save();
        $notification = [
            'message' => 'Employee Profile Updated Successfully',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

    public function statusEmployee($id)
    {
        $user = User::findOrFail($id);

        if ($user->status == 1) {
            $user->status = 0;
        } else {
            $user->status = 1;
        }
        $user->save();
        $notification = [
            'message' => 'Employee Status Successfully Updated',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

    public function deleteEmployee($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        $notification = [
            'message' => 'Employee Data Successfully Deleted',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }

    public function createDetails()
    {
        $employee = User::role('Employee')
            ->latest()
            ->get();
        return view('backend.employeeDetails.create-details', compact('employee'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|max:255',
            'photo' => 'required|max:255',
            'emplpoyee' => 'required|max:255',
        ]);
        $userDetails = new UserDetail();
        $userDetails->user_id = $request->emplpoyee;
        $userDetails->address = $request->address;
        $image = $this->image($request);
        $userDetails->photo = $image['name'];
        $userDetails->photo_url = $image['url'];
        $userDetails->save();
        $notification = [
            'message' => 'Employee Details Successfully Updated',
            'alert-type' => 'success',
        ];
        return redirect()
            ->route('employee.details')
            ->with($notification);
    }

    public function employeeDeatils()
    {
        $employee = User::with('userDetail')
            ->role('Employee')
            ->latest()
            ->get();
        return view('backend.employeeDetails.employee-details', compact('employee'));
    }

    public function employeUpdate($id)
    {
        $employeeList = User::with('userDetail')
            ->role('Employee')
            ->latest()
            ->get();
        $employee = User::with('userDetail')
            ->role('Employee')
            ->where('id', $id)
            ->first();
        return view('backend.employeeDetails.detailsEdit', compact('employee', 'employeeList'));
    }

    public function employeeDeatilsEdit(Request $request, $id)
    {
        $request->validate([
            'address' => 'required|max:255',
            'emplpoyee' => 'required|max:255',
        ]);

        if ($request->photo != null) {
            $userDetails = UserDetail::findOrFail($id);
            $userDetails->user_id = $request->emplpoyee;
            $userDetails->address = $request->address;
            if ($userDetails->photo_url != null) {
                $path = 'uploads/user-profile-image/' . $userDetails->photo;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            $image = $this->image($request);
            $userDetails->photo = $image['name'];
            $userDetails->photo_url = $image['url'];
            $userDetails->save();
            $notification = [
                'message' => 'Employee Details Successfully Updated',
                'alert-type' => 'success',
            ];
            return redirect()
                ->route('employee.details')
                ->with($notification);
        } else {
            $userDetails = UserDetail::findOrFail($id);
            $userDetails->user_id = $request->emplpoyee;
            $userDetails->address = $request->address;
            $userDetails->save();
            $notification = [
                'message' => 'Employee Details Successfully Updated',
                'alert-type' => 'success',
            ];
            return redirect()
                ->route('employee.details')
                ->with($notification);
        }
    }
    public function employeDelete(Request $request, $id)
    {
        $user = UserDetail::findOrFail($id);
        if ($user->photo_url != null) {
            $path = 'uploads/user-profile-image/' . $user->photo;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $user->delete();
        $notification = [
            'message' => 'Employee Data Successfully Deleted',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }
    public function image($request)
    {
        $ext = $request->photo->extension();
        $img_name = 'profile-' . uniqid() . '.' . $ext;
        $img_save = $request->photo->move(public_path('uploads/user-profile-image'), $img_name);
        $save_url = env('APP_URL') . 'uploads/user-profile-image/' . $img_name;
        return ['name' => $img_name, 'url' => $save_url];
    }

    // contact data

    public function createContact()
    {
        $employee = User::with('userDetail')
            ->role('Employee')
            ->latest()
            ->get();
        return view('backend.employee-contact.create', compact('employee'));
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'emplpoyee' => 'required|max:255',
            'emergency_phone_number' => 'required|max:255',
            'phone_number' => 'required|max:255',
            'email' => 'required|max:255',
        ]);
        $contact = new UserContact();
        $contact->user_id = $request->emplpoyee;
        $contact->emergency_phone_number = $request->emergency_phone_number;
        $contact->number = $request->phone_number;
        $contact->email = $request->email;
        $contact->save();
        $notification = [
            'message' => 'Employee Data Successfully Deleted',
            'alert-type' => 'success',
        ];
        return redirect()
            ->route('employee-contact-lists')
            ->with($notification);
    }

    public function ContactLists()
    {
        $contactData = User::with('userContact')
            ->role('Employee')
            ->latest()
            ->get();
        return view('backend.employee-contact.contactLists', compact('contactData'));
    }

    public function ContactEdit($id)
    {
        $employee = User::with('userDetail')
        ->role('Employee')
        ->latest()
        ->get();
        $user =  $contactData = User::with('userContact')
        ->role('Employee')
        ->where('id',$id)
        ->first();
        return view ('backend.employee-contact.editContact',compact('user','employee'));
    }

    public function updateContact(Request $request,$id)
    {
        $request->validate([
            'emplpoyee' => 'required|max:255',
            'emergency_phone_number' => 'required|max:255',
            'phone_number' => 'required|max:255',
            'email' => 'required|max:255',
        ]);
        $contact = UserContact::findOrFail($id);
        $contact->user_id = $request->emplpoyee;
        $contact->emergency_phone_number = $request->emergency_phone_number;
        $contact->number = $request->phone_number;
        $contact->email = $request->email;
        $contact->save();
        $notification = [
            'message' => 'Employee Data Successfully Deleted',
            'alert-type' => 'success',
        ];
        return redirect()
            ->route('employee-contact-lists')
            ->with($notification);
    }


    public function deleteContact(Request $request, $id)
    {
        $user = UserContact::findOrFail($id);
        $user->delete();
        $notification = [
            'message' => 'Employee Contact Successfully Deleted',
            'alert-type' => 'success',
        ];
        return back()->with($notification);
    }


    public function searchEmployyee(Request $request)
    {   
        $output = "";
        $value = $request->searchValue;
        // if($value)
        // {
            $employee = User::select('id','full_name','first_name','email','status')->where('full_name','Like','%' . $value . '%')->orWhere('email','like','%'.$value . '%')->get();
            
            foreach($employee as $employee){
                $output.= 
                '
                <tr>
                    <td>SR</td>
                    <td>'.$employee->first_name.'</td>
                    <td>'.$employee->full_name.'</td>
                    <td>'.$employee->email.'</td>
                    <td>'.$employee->status.'</td>
                    <td>'.

                    '<a href="/edit-employee-data/'. $employee->id.'"
                    class="mb-1 btn btn-sm btn-info">'.'Edit</a>'.
                    '<a href="/employee-status/'. $employee->id.'"
                    class="mb-1 btn btn-sm btn-warning">'.'Status</a>'.
                    '<a href="/employee-delete/'. $employee->id.'"
                    class="mb-1 btn btn-sm btn-warning">'.'Delete</a>'.
                    '</td>
                </tr>';
            }
            return response($output); 
    }
}
