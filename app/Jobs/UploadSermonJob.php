<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Sermon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UploadSermonJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $sermon;
    protected $mp3;
    protected $name;

    public function __construct(Sermon $sermon, $mp3, $name)
    {
        $this->sermon = $sermon;
        $this->mp3 = $mp3;
        $this->name = $name;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $name =
        $disk = Storage::disk('wasabi');
            
        $this->sermon->update([
                'mp3' => $this->mp3->storeAs('sermons', $this->name, 'wasabi')
            ]);
        $disk->setVisibility($sermon->mp3, 'public');
    }
}
