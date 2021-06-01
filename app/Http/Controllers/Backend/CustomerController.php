<?php

namespace App\Http\Controllers\Backend;

use App\Exports\CustomerExport;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        $users = User::orderBy('id', 'DESC')->where('user_type', 'customer')->get();
        return view('backend.customers.index', compact('users'));
    }


    public function show($id)
    {
        return $this->index();
    }

    public function create()
    {
        return view('backend.customers.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048',
            'phone_number' => 'required',
            'cnic' => 'required|unique:users,cnic',
            'address' => 'required',
            'status' => 'required',
            'email' => 'required|email|max:255|unique:users',
        ], [
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'cnic.required' => 'CNIC is required.',
            'phone_number.required' => 'Phone Number is required.',
            'address.required' => 'Address is required.',
            'status.required' => 'Status is required.',
            'email.required' => 'Email is required.',
        ]);


        if ($request->has('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/uploads/user_profiles');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $profile_image = $name;
        } else {

            $profile_image = 'default.png';
        }

        $role = Role::find(3);
        $password = '1234567898';
        $user = User::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'role_id' => $role->id,
            'phone_number' => $request->get('phone_number'),
            'cnic' => $request->get('cnic'),
            'user_type' => $role->name,
            'address' => $request->get('address'),
            'status' => $request->get('status'),
            'email' => $request->get('email'),
            'password' => Hash::make($password),
            'profile_pic' => $profile_image,
        ]);
        UserRole::create([
            'user_id' => $user->id,
            'role_id' => $role->id
        ]);

        return redirect()->route('admin.customers.index')
            ->with([
                'flash_status' => 'success',
                'flash_message' => 'Customer Created Successfully.'
            ]);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('backend.customers.edit', compact('user'));


    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'image' => 'image|mimes:jpg,jpeg,png|max:2048',
            'phone_number' => 'required',
            'address' => 'required',
            'status' => 'required',
            'cnic' => 'required|unique:users,cnic,' . $id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,

        ], [
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'CNIC.required' => 'CNIC is required.',
            'phone_number.required' => 'Phone Number is required.',
            'address.required' => 'Address is required.',
            'status.required' => 'Status is required.',
            'email.required' => 'Email is required.',
        ]);

        $user = User::find($id);
        if ($request->has('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/uploads/user_profiles');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $profile_image = $name;
        } else {
            $profile_image = $user->profile_pic;
        }

        $user->update([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'phone_number' => $request->get('phone_number'),
            'cnic' => $request->get('cnic'),
            'address' => $request->get('address'),
            'status' => $request->get('status'),
            'email' => $request->get('email'),
            'profile_pic' => $profile_image,
        ]);

        return redirect()->route('admin.customers.index')
            ->with([
                'flash_status' => 'success',
                'flash_message' => 'Customers Updated Successfully.'
            ]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        Order::where('user_id', $id)->delete();
        Rating::where('user_id', $id)->delete();
        $user->delete();

        return redirect()->route('admin.customers.index')
            ->with([
                'flash_status' => 'success',
                'flash_message' => 'Customer has been Deleted.'
            ]);
    }

    public function export(Request $request)
    {
        return Excel::download(new CustomerExport($request), 'customers.xlsx');
    }

}
