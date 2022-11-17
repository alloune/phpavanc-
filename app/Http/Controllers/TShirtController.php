<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTshirtRequest;
use App\Models\TShirt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use function PHPUnit\Framework\returnArgument;

class TShirtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('allOrder', [
                'allOrder' => TShirt::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allTShirt = Storage::allFiles('public/images/color');

        return view('parameters', [
            'allTShirt' => $allTShirt,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTshirtRequest $request)
    {
        $tShirt = new TShirt();


        $tShirt->fill($request->validated());
        $tShirt->save();

        return view('selectImage', [
            'myData' => $tShirt
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\TShirt $tShirt
     * @return \Illuminate\Http\Response
     */
    public function show(TShirt $tShirt)
    {
        return view('showImage', ['order' => $tShirt]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TShirt $tShirt
     * @return \Illuminate\Http\Response
     */
    public function edit(TShirt $tShirt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TShirt $tShirt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TShirt $tShirt)
    {

        $imageLink = match ($tShirt->color) {

            'white' => 'storage/images/color/TS-white.png',
            'black' => 'storage/images/color/TS-black.png',
        };

        $newFileLink = str_replace('color', 'MergeChoice', $imageLink);
        $newFileLink = str_replace('.png', strval($tShirt->id) . '.png', $newFileLink);

        copy($imageLink, $newFileLink);

        $tShirtLayer = Image::make($newFileLink);
        $tShirtLayer->resize(500, 500);

        if ($request->input('image')) {
            $findImage = Image::make('storage/images/temp/' . $tShirt->id . '.jpg')->resize(100, 100);
            $tShirtLayer->insert($findImage, 'center');

            Storage::delete('public/images/temp/' . $tShirt->id . '.jpg');
        } else {
            $tShirtLayer->insert('https://picsum.photos/100?random=' . $tShirt->id, 'center');
        }

        $tShirtLayer->save();

        $tShirt->mergeImageUrl = $newFileLink;
        $tShirt->save();


        return redirect(route('t-shirt.show', $tShirt));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\TShirt $tShirt
     * @return \Illuminate\Http\Response
     */
    public function destroy(TShirt $tShirt)
    {
        $tShirt->delete();
        return back();
    }

    public function displayMergedImage(Request $request, TShirt $tShirt)
    {
        $isDesign = false;
        if ($request->file('userDesign')) {
            $request->file('userDesign')->storeAs('public/images/temp', $tShirt->id . '.jpg');
            $isDesign = true;
        }

        //Je renvois quel t-shirt est choisit + quel motif
        return view('mergeRenderer', [
            'motif' => $request->input('image'),
            'userDesign' => $isDesign,
            't_shirt' => $tShirt,
        ]);
    }
}
