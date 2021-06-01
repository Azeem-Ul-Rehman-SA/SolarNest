<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutus = Aboutus::first();
        return view('backend.aboutus.create', compact('aboutus'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'summary' => 'required',
            'description' => 'required',
        ], [
            'summary.required' => 'Summary is required.',
            'description.required' => 'Description is required.'
        ]);
        $aboutus = Aboutus::first();


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

            $image_name= "/uploads/about_images" . time().$k.'.png';
            $path = public_path() . $image_name;

            file_put_contents($path, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }

        $description = $dom->saveHTML();




        if (!is_null($aboutus)) {
            $aboutus->update([
                'summary' => $request->summary,
                'description' => $request->description
            ]);
        } else {
            $aboutus = new Aboutus();
            $aboutus->summary = $request->summary;
            $aboutus->description = $request->description;
            $aboutus->save();
        }

        return back()->with([
            'flash_status' => 'success',
            'flash_message' => 'About us description updated successfully.'
        ]);
    }
}
