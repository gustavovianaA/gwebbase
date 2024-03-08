<?php

namespace App\Http\Controllers;

use App\Models\Gexample;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class GexampleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private static function formatString($str)
    {
        $res = preg_replace('/[^a-zA-Z0-9_ -]/s', '', $str);
        $res = str_replace(' ', '-', $res);

        return $res;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gexamples = Gexample::all()->sortBy('id');
        return view('app.gexample.list', ['gexamples' => $gexamples]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.gexample.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $rules = [
            'title' => 'required',
            'picture' => 'required',
            'gallery' => 'required',
            'truefalse' => 'required',
            'price' => 'required',
            'details' => 'required',
            'numberinteger' => 'required'
        ];

        $feedback = [
            'required' => 'O campo deve ser preenchido'
        ];

        $request->validate($rules, $feedback);

        $requestData = $request->all();

        $titleFormated = self::formatString($requestData['title']);
        
        //Image Upload
        $time = time();
        $imagePath = 'uploads/gexample/' . $titleFormated . '-' . $time;
        if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
            $extension = $request->picture->extension();
            $imageName = strtotime('now') . '-' .  $request->picture->getClientOriginalName();
            $imageName = self::formatString($imageName);
            $request->picture->move(public_path($imagePath), $imageName);
            $requestData['picture'] = "$imagePath/$imageName";

            // create image manager with desired driver
            $manager = new ImageManager(new Driver());
            // read image from file system
            $image = $manager->read($requestData['picture']);
            // resize image
            if ($image->width() > 1200) {
                $image->scale(width: 1200);
            }
            $name = explode('.', $imageName);
            $imageName = $name[0] . '.jpg';
            $requestData['picture'] = "$imagePath/intervention-$imageName";
            // save modified image in new format 
            $image->toJpeg(65)->save($requestData['picture']);
        }

        //Galllery Upload
        foreach ($request->gallery as $galleryItem) {
            $extension = $galleryItem->extension();
            $imageName = $time . '-' .  $galleryItem->getClientOriginalName();
            $imageName = self::formatString($imageName);
            $galleryItem->move(public_path($imagePath), $imageName);
            $completePath = "$imagePath/$imageName";
            // create image manager with desired driver
            $manager = new ImageManager(new Driver());
            // read image from file system
            $image = $manager->read($completePath);
            // resize image
            if ($image->width() > 1200) {
                $image->scale(width: 1200);
            }
            $name = explode('.', $imageName);
            $imageName = $name[0] . '.jpg';
            $galleryPath[] = "$imagePath/intervention-$imageName";
            // save modified image in new format 
            $image->toJpeg(65)->save("$imagePath/intervention-$imageName");
        }

        $requestData['gallery'] = implode('|', $galleryPath);
        $requestData['uploadimagetime'] = $time;

        $gexample = Gexample::create($requestData);

        return redirect()->route('gexample.show', ['gexample' => $gexample]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Gexample $gexample)
    {
        $gallery = explode("|", $gexample->gallery);
        return view('app.gexample.show', ['gexample' => $gexample, 'gexample_gallery' => $gallery]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gexample $gexample)
    {
        return view('app.gexample.edit', ['gexample' => $gexample]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gexample $gexample)
    {
        $rules = [
            'title' => 'required',
            'truefalse' => 'required',
            'price' => 'required',
            'details' => 'required',
            'numberinteger' => 'required'
        ];

        $feedback = [
            'required' => 'O campo deve ser preenchido'
        ];

        $request->validate($rules, $feedback);
        $requestData = $request->all();
        unset($requestData['changeImages']);

        $time = time();

        if ($request->changeImages == 1) {

            $titleFormated = self::formatString($requestData['title']);
            $imagePath = 'uploads/gexample/' . $titleFormated . '-' . $gexample->uploadimagetime;
            
            //Image Upload
            if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
                $extension = $request->picture->extension();
                $imageName = $time . '-' .  $request->picture->getClientOriginalName();
                $imageName = self::formatString($imageName);

                $request->picture->move(public_path($imagePath), $imageName);
                $requestData['picture'] = "$imagePath/$imageName";

                // create image manager with desired driver
                $manager = new ImageManager(new Driver());
                // read image from file system
                $image = $manager->read($requestData['picture']);
                // resize image
                if ($image->width() > 1200) {
                    $image->scale(width: 1200);
                }
                $name = explode('.', $imageName);
                $imageName = $name[0] . '.jpg';
                $requestData['picture'] = "$imagePath/intervention-$imageName";
                // save modified image in new format 
                $image->toJpeg(65)->save($requestData['picture']);
            }

            //Galllery Upload
            if (!empty($request->gallery)) {

                foreach ($request->gallery as $galleryItem) {
                    $extension = $galleryItem->extension();
                    $imageName = $time . '-' .  $galleryItem->getClientOriginalName();
                    $imageName = self::formatString($imageName);

                    $galleryItem->move(public_path($imagePath), $imageName);

                    $completePath = "$imagePath/$imageName";
                    // create image manager with desired driver
                    $manager = new ImageManager(new Driver());
                    // read image from file system
                    $image = $manager->read($completePath);
                    // resize image
                    if ($image->width() > 1200) {
                        $image->scale(width: 1200);
                    }
                    $name = explode('.', $imageName);
                    $imageName = $name[0] . '.jpg';
                    $galleryPath[] = "$imagePath/intervention-$imageName";
                    // save modified image in new format 
                    $image->toJpeg(65)->save("$imagePath/intervention-$imageName");
                }
                $requestData['gallery'] = implode('|', $galleryPath);
            }
        } else {
            unset($requestData['cover']);
            unset($requestData['gallery']);
        }

        if (isset($requestData['video'])) {
            $video = $requestData['video'];
            if (strpos($video, 'embed') === false) {
                $video = explode("=", $video);
                $requestData['video'] = 'https://youtube.com/embed/' . $video[1];
            }
        }

        $gexample->update($requestData);

        return redirect()->route('gexample.show', ['gexample' => $gexample]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gexample $gexample)
    {
        $gexample->delete();
        return redirect()->route('gexample.index');
    }
}
