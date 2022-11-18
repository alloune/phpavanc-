<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiImageRequest;
use App\Mail\TshirtCreated;
use App\Models\TShirt;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;

class ApiMergeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allOrders = TShirt::all();

        return $allOrders;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApiImageRequest $request)
    {
        $newTshirt = new TShirt();
        $newTshirt->color = $request->validated('color');
        $newTshirt->sexe = $request->validated('sexe');
        $newTshirt->size = $request->validated('size');
        $newTshirt->save();

        $imageLink = match ($request->color) {

            'white' => 'storage/images/color/TS-white.png',
            'black' => 'storage/images/color/TS-black.png',
            default => '',
        };
        if(!$imageLink){
            return 'La couleur n\'est pas bonne, merci d\'entrer white ou black';
        }

        $newFileLink = str_replace('color', 'MergeChoice', $imageLink);
        $newFileLink = str_replace('.png', strval($newTshirt->id) . '.png', $newFileLink);

        copy($imageLink, $newFileLink);

        $newDesign = Image::make($newFileLink)->resize(500,500);

        $request->validated('imgUrl') ?
            $imgFromUrl = Image::make($request->validated('imgUrl'))->resize(100, 100)
            :
            $imgFromUrl = Image::make('https://i.kym-cdn.com/photos/images/facebook/002/405/953/bfd')->resize(100,100);

        $newDesign->insert($imgFromUrl, 'center')
        ->save();

        $newTshirt->mergeImageUrl = $newFileLink;
        $newTshirt->save();

        \App\Events\TshirtCreated::dispatch($newTshirt);

//        Mail::to('allan.lelay@le-campus-numerique.fr')->send(new TshirtCreated($newTshirt));

        return response()->json([
            'success' => true,
            'message' => 'CRéation reussie',

        ],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       return $tShirt = TShirt::where('id',$id)->first();
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
