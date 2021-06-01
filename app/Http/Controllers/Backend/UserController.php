<?php

namespace App\Http\Controllers\Backend;

use App\Exports\PartnerExport;
use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Rating;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        $users = User::orderBy('id', 'DESC')->where('user_type','partner')->get();
        return view('backend.partners.index', compact('users'));
    }

    public function show($id)
    {
        return $this->index();
    }

    public function create()
    {
        return view('backend.partners.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name'    => 'required|string',
            'last_name'     => 'required|string',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'logo'          => 'image|mimes:jpg,jpeg,png|max:2048',
            'phone_number'  => 'required',
            'cnic'          => 'nullable|unique:users,cnic',
            'address'       => 'required',
            'status'        => 'required',
            'email'         => 'required|email|max:255|unique:users',
        ], [
            'first_name.required'   => 'First name is required.',
            'last_name.required'    => 'Last name is required.',
            'phone_number.required' => 'Phone Number is required.',
            'address.required'      => 'Address is required.',
            'status.required'       => 'Status is required.',
            'email.required'        => 'Email is required.',
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

        if ($request->has('logo')) {
            $image = $request->file('logo');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/uploads/partners_logos');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $logo = $name;
        } else {

            $logo = 'default.png';
        }

        $role = Role::find(2);

        $password = '1234567898';
        $user = User::create([
            'first_name'        => $request->get('first_name'),
            'last_name'         => $request->get('last_name'),
            'role_id'           => $role->id,
            'phone_number'      => $request->get('phone_number'),
            'cnic'              => $request->get('cnic'),
            'user_type'         => $role->name,
            'company_name'      => $request->company_name,
            'description'       => $request->description,
            'address'           => $request->get('address'),
            'status'            => $request->get('status'),
            'email'             => $request->get('email'),
            'password'          => Hash::make($password),
            'profile_pic'       => $profile_image,
            'logo'              => $logo,
        ]);
        UserRole::create([
            'user_id' => $user->id,
            'role_id' => $role->id
        ]);

        return redirect()->route('admin.partners.index')
            ->with([
                'flash_status' => 'success',
                'flash_message' => 'Partner Created Successfully.'
            ]);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('backend.partners.edit', compact('user'));


    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'first_name'        => 'required|string',
            'last_name'         => 'required|string',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'logo'              => 'image|mimes:jpg,jpeg,png|max:2048',
            'phone_number'      => 'required',
            'address'           => 'required',
            'status'            => 'required',
            'cnic'              => 'nullable|unique:users,cnic|unique:users,cnic,' . $id,
            'email'             => 'required|string|email|max:255|unique:users,email,' . $id,

        ], [
            'first_name.required'       => 'First name is required.',
            'last_name.required'        => 'Last name is required.',
            'phone_number.required'     => 'Phone Number is required.',
            'address.required'          => 'Address is required.',
            'status.required'           => 'Status is required.',
            'email.required'            => 'Email is required.',
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

        if ($request->has('logo')) {
            $image = $request->file('logo');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/uploads/partners_logos');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $logo = $name;
        } else {
            $logo = $user->logo;
        }

        $user->update([
            'first_name'        => $request->get('first_name'),
            'last_name'         => $request->get('last_name'),
            'phone_number'      => $request->get('phone_number'),
            'company_name'      => $request->company_name,
            'description'       => $request->description,
            'cnic'              => $request->get('cnic'),
            'address'           => $request->get('address'),
            'status'            => $request->get('status'),
            'email'             => $request->get('email'),
            'profile_pic'       => $profile_image,
            'logo'              => $logo,
        ]);

        return redirect()->route('admin.partners.index')
            ->with([
                'flash_status' => 'success',
                'flash_message' => 'Partner Updated Successfully.'
            ]);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        Offer::where('partner_id',$id)->delete();
        Order::where('partner_id',$id)->delete();
        Rating::where('partner_id',$id)->delete();
        $user->delete();

        return redirect()->route('admin.partners.index')
            ->with([
                'flash_status' => 'success',
                'flash_message' => 'Partner has been Deleted.'
            ]);
    }

    public function export(Request $request)
    {
        return Excel::download(new PartnerExport($request), 'partners.xlsx');
    }

}
