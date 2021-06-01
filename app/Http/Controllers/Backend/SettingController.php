<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        $setting = Setting::first();
        return view('backend.settings.index', compact('setting'));
    }


    public function update(Request $request, $id)
    {
        $setting =Setting::find($id);
        if ($request->has('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/uploads/company_logos');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $logo = $name;
        } else {

            $logo = $setting->logo;
        }
        if ($request->has('footer_logo')) {
            $image = $request->file('footer_logo');
            $name = $image->getClientOriginalName();
            $destinationPath = public_path('/uploads/footer_logos');
            $imagePath = $destinationPath . "/" . $name;
            $image->move($destinationPath, $name);
            $footer_logo = $name;
        } else {
            $footer_logo = $setting->footer_logo;
        }

        $setting->update([
            'company_name' => $request->company_name,
            'tag_line' => $request->tag_line,
            'facebook_url' => $request->facebook_url,
            'instagram_url' => $request->instagram_url,
            'linkedin_url' => $request->linkedin_url,
            'youtube_url' => $request->youtube_url,
            'whatsapp_url' => $request->whatsapp_url,
            'logo' => $logo,
            'footer_logo' => $footer_logo,
            'contact_number' => $request->contact_number,
            'email' => $request->email,
            'address' => $request->address,
            'unitPrice' => $request->unitPrice,
        ]);
        return redirect()->route('admin.settings.index')
            ->with([
                'flash_status' => 'success',
                'flash_message' => 'Setting updated successfully.'
            ]);

    }
}
