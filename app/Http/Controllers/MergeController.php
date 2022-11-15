<?php

namespace App\Http\Controllers;

use App\Models\TShirt;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class MergeController extends Controller
{
    public  function __invoke(TShirt $tShirt):string
    {

        $imageLink = match ($tShirt->color) {

            'white' => 'storage/images/color/TS-white.png',
            'black' => 'storage/images/color/TS-black.png',
        };

        $tShirtLayer = Image::make($imageLink);
        $tShirtLayer->resize(500,500)
            ->insert('https://picsum.photos/100?random='.$tShirt->id, 'center')
            ->response('png');

        return $tShirtLayer;
    }

}
