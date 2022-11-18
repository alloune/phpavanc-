<?php

namespace App\Jobs;

use App\Models\TShirt;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use TheSeer\Tokenizer\Exception;
use Throwable;

class CreateMergeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $tshirt;
    protected $imagePath;
    protected $request;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(TShirt $tshirt, string $imgPath, string $image = null)
    {
        $this->tshirt = $tshirt;
        $this->imagePath = $imgPath;
        $this->image = $image;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {


        try{
            $tShirtLayer = Image::make(asset($this->imagePath));
        }
       catch(Throwable $error){
          dump($error);
    }
        $tShirtLayer->resize(500, 500);



        if ($this->image) {
            $findImage = Image::make(asset('storage/images/temp/' . $this->tshirt->id . '.jpg'))->resize(100, 100);
            $tShirtLayer->insert($findImage, 'center');

            Storage::delete('public/storage/images/temp/' . $this->tshirt->id . '.jpg');
        } else {
            $tShirtLayer->insert('https://picsum.photos/100?random=' . $this->tshirt->id, 'center');
        }

        $tShirtLayer->save();

        $this->tshirt->mergeImageUrl = $this->imagePath;
        $this->tshirt->save();
    }
}
