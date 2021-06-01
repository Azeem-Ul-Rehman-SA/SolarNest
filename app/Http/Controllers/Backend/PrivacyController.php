<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function index()
    {
        $privacyPolicy = PrivacyPolicy::first();
        return view('backend.privacypolicy.create', compact('privacyPolicy'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
        ], [
            'description.required' => 'Description is required.'
        ]);
        $privacyPolicy = PrivacyPolicy::first();


        $description=$request->input('description');
        $dom = new \DomDocument();
        libxml_use_internal_errors(false);
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | # Make sure no extra BODY
            LIBXML_HTML_NODEFDTD |  # or DOCTYPE is created
            LIBXML_NOERROR |        # Suppress any errors
            LIBXML_NOWARNING        # or warnings about prefixes.
        );
        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){
            $data = $img->getAttribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);

            $image_name= "/uploads/policy_images" . time().$k.'.png';
            $path = public_path() . $image_name;

            file_put_contents($path, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }

        $description = $dom->saveHTML();




        if (!is_null($privacyPolicy)) {
            $privacyPolicy->update([
                'description' => $request->description
            ]);
        } else {
            $privacyPolicy = new PrivacyPolicy();
            $privacyPolicy->description = $request->description;
            $privacyPolicy->save();
        }


        return back()->with([
            'flash_status' => 'success',
            'flash_message' => 'Privacy Policy description updated successfully.'
        ]);
    }
}
