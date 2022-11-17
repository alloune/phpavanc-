<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TShirt;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageApiController extends Controller
{
    public function __invoke(TShirt $t_shirt, string $userDesign = null):string
    {

        $imageLink = match ($t_shirt->color) {
            'white' => 'storage/images/color/TS-white.png',
            'black' => 'storage/images/color/TS-black.png',
            default =>'',
        };
        $tShirtLayer = Image::make($imageLink);
        $tShirtLayer->resize(500, 500);

        if ($userDesign) {
            $findImage = Image::make('storage/images/temp/'.$t_shirt->id.'.jpg')->resize(100,100);

            $tShirtLayer->insert($findImage, 'center');
        } else {
            $tShirtLayer->insert('https://picsum.photos/100?random=' . $t_shirt->id, 'center');
        }

        $tShirtLayer->response('png');

        return $tShirtLayer;
    }
}
