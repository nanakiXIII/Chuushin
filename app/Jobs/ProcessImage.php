<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;

class ProcessImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var string
     */
    private $imagePath;
    /**
     * @var string
     */
    private $suffix;
    /**
     * @var int
     */
    private $width;
    /**
     * @var int|null
     */
    private $height;
    /**
     * @var string
     */
    private $type;


    /**
     * Create a new job instance.
     *
     * @param string $imagePath
     * @param string $suffix
     * @param int $width
     * @param int|null $height
     * @param string $type
     */
    public function __construct( string $imagePath, string $suffix, int $width, ?int $height = null, string $type)
    {
        //
        $this->imagePath = $imagePath;
        $this->suffix = $suffix;
        $this->width = $width;
        $this->height = $height;
        $this->type = $type;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $file = Storage::get($this->imagePath);
        $extension = pathinfo($this->imagePath, PATHINFO_EXTENSION);
        $basename = pathinfo($this->imagePath, PATHINFO_BASENAME);
        $manager = new ImageManager(['driver' => 'gd']);
        $img = $manager->make($file);
        if ($this->height){
            $img->fit($this->width, $this->height);
        }else{
          $img->resize($this->width,null);
        };


        $img->save(storage_path('app/public/serie/'.$this->type.'/'.$this->suffix.'_'.$basename));

    }
}
