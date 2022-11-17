<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TShirt;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function show(TShirt $tShirt, string $userDesign = null):string
    {
        $imageLink = match ($tShirt->color) {
            'white' => 'storage/images/color/TS-white.png',
            'black' => 'storage/images/color/TS-black.png',
        };
        $tShirtLayer = Image::make($imageLink);
        $tShirtLayer->resize(500, 500);

        if ($userDesign) {

            $findImage = Image::make('storage/images/temp/'.$userDesign.'.jpg')->resize(100,100);
            $tShirtLayer->insert($findImage, 'center');
        } else {
            $tShirtLayer->insert('https://picsum.photos/100?random=' . $tShirt->id, 'center');
        }

        $tShirtLayer->response('png');

        return $tShirtLayer;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
