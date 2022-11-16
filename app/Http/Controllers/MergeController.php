<?php

namespace App\Http\Controllers;

use App\Models\TShirt;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class MergeController extends Controller
{
    public function __invoke(TShirt $tShirt, string $userDesign = null): string
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

}
