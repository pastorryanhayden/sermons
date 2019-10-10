<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\User;
use App\Church;
use App\Sermon;
use App\Series;
use App\Speaker;

class SermonMediaTest extends TestCase
{
    use RefreshDatabase;
    use withFaker;

    protected $user;
    protected $church;
    protected $series;
    protected $speaker;

    /** @test */
    public function user_can_access_the_media_form()
    {

        $faker = $this->makeFaker();
        $this->withoutExceptionHandling();


         $this->createUserSpeakerSeries();


         // Create a sermon
        $sermon = $this->church->sermons()->create([
            'title' => $faker->sentence,
            'church_id' => $this->church->id,
            'date' => $faker->date,
            'service' => $faker->sentence,
            'featured' => true,
            'series_id' => $this->series->id,
            'speaker_id' => $this->speaker->id,
            'description' => $faker->optional($weight = 0.5)->paragraph,
        ]);

        // Send a get request to the sermon and make sure it comes back 200
        $response = $this->actingAs($this->user)->get("/sermons/{$sermon->id}/media");
        $response->assertSee('MP3 file');

    }

    /** @test */
    public function user_can_upload_media_with_just_mp3()
    {

        $faker = $this->makeFaker();
        $this->withoutExceptionHandling();
        Storage::fake('sermons');
        $this->createUserSpeakerSeries();
        


        // Create a sermon
        $sermon = $this->church->sermons()->create([
            'title' => $faker->sentence,
            'church_id' => $this->church->id,
            'date' => $faker->date,
            'service' => $faker->sentence,
            'featured' => true,
            'series_id' => $this->series->id,
            'speaker_id' => $this->speaker->id,
            'description' => $faker->optional($weight = 0.5)->paragraph,
        ]);

        


    }



    protected function createUserSpeakerSeries()
    {
        // Create a user and a church
        $this->user = factory(User::class)->create();
        $this->church = factory(Church::class)->create([
            'admin_id' => $this->user->id, ]);
        $this->user->church_id = $this->church->id;
        $this->user->save();

        // Create a series
        $this->series = factory(Series::class)->create([
            'church_id' => $this->church->id,
        ]);

        $this->speaker = factory(Speaker::class)->create([
            'church_id' => $this->church->id,
        ]);
    }

    public static function slugify($text)
{
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}

}
