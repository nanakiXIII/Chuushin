<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
     * Create a new job instance.
     *
     * @param  $imagePath
     * @param string $suffix
     * @param int $width
     * @param int|null $height
     */
    public function __construct( string $imagePath, string $suffix, int $width, ?int $height = null)
    {
        //
        $this->imagePath = $imagePath;
        $this->suffix = $suffix;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        //$this->imagePath = "H:\Chuushin\storage\app\public\serie\1.png";
        Storage::move($this->imagePath, 'new/file.jpg');
        $files = Storage::url($this->imagePath);
        $filename = pathinfo($this->imagePath, PATHINFO_BASENAME);
        $files->move('avatar', $filename);
        $extension = pathinfo($this->imagePath, PATHINFO_EXTENSION);
        $basename = pathinfo($this->imagePath, PATHINFO_BASENAME);
        echo Storage::size($this->imagePath);
        //$manager = new ImageManager();
        $img = Image::make($this->imagePath);
        $img = Image::make($this->imagePath);
//
        //if ($this->height){
        //   $img = $img->fit($this->width, $this->height);
        //}else{
        //    $img->resize($this->width,null);
        //};
        ////$img->insert('/storage/serie/'.$this->suffix.'_'.$this->imagePath);
        //$img->save('serie/' . $this->suffix.'_'.$basename);

    }
}
