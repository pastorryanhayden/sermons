<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Church;
use App\Series;
use App\Speaker;
use App\Sermon;

class SermonTest extends TestCase
{
    use RefreshDatabase;
    use withFaker;


    /** @test */
    public function a_user_can_see_the_sermons_page()
    {
        $user = factory(User::class)->create();
        $church = factory(Church::class)->create([
            'admin_id' => $user->id, ]);
        $user->church_id = $church->id;
        $user->save();
        $response = $this->actingAs($user)->get('/sermons/create');
        $response->assertSee('Add A Sermon');
    }

    /** @test */
    public function a_user_can_create_a_sermon()
    {

        $faker = $this->makeFaker();
        $this->withoutExceptionHandling();
        // Create a user and a church
        $user = factory(User::class)->create();
        $church = factory(Church::class)->create([
            'admin_id' => $user->id, ]);
        $user->church_id = $church->id;
        $user->save();
        // Create a series with that church
        // $series = $church->series()->create(factory(Series::class));
        $series = factory(Series::class)->create([
            'church_id' => $church->id,
        ]);

        // Create a speaker with that church
        // $speaker = $church->speakers()->create(factory(Series::class));
        $speaker = factory(Speaker::class)->create([
            'church_id' => $church->id,
        ]);

        $title = $faker->sentence;

        $response = $this->actingAs($user)->post('/sermons', [
            'title' => $title,
            'church_id' => $church->id,
            'date' => $faker->date,
            'service' => $faker->sentence,
            'featured' => true,
            'series_id' => $series->id,
            'speaker_id' => $speaker->id,
            'description' => $faker->optional($weight = 0.5)->paragraph,
        ]);
       
        // make sure the page redirects
        $response->assertRedirect("/sermons/1/text");
        
        // make sure the database has the sermon
        $this->assertDatabaseHas('sermons', [
        'title' => $title,
         ]);
    }

     /** @test */
    public function a_user_can_create_a_sermon_with_new_speaker()
    {

        $faker = $this->makeFaker();
        $this->withoutExceptionHandling();
        // Create a user and a church
        $user = factory(User::class)->create();
        $church = factory(Church::class)->create([
            'admin_id' => $user->id, ]);
        $user->church_id = $church->id;
        $user->save();
        // Create a series with that church
        // $series = $church->series()->create(factory(Series::class));
        $series = factory(Series::class)->create([
            'church_id' => $church->id,
        ]);

        // Create a speaker with that church
        // $speaker = $church->speakers()->create(factory(Series::class));
        $speaker = factory(Speaker::class)->create([
            'church_id' => $church->id,
        ]);

        $title = $faker->sentence;
        $name = $faker->name($gender = 'male');
        $response = $this->actingAs($user)->post('/sermons', [
            'title' => $title,
            'church_id' => $church->id,
            'date' => $faker->date,
            'service' => $faker->sentence,
            'featured' => true,
            'series_id' => $series->id,
            'newSpeakerName' => $name,
            'speaker_id' => $speaker->id,
            'description' => $faker->optional($weight = 0.5)->paragraph,
        ]);
       
       
        // make sure the database has the sermon
        $this->assertDatabaseHas('speakers', [
        'name' => $name,
         ]);
    }

    /** @test */
    public function a_user_can_create_a_sermon_with_new_series()
    {

        $faker = $this->makeFaker();
        $this->withoutExceptionHandling();
        // Create a user and a church
        $user = factory(User::class)->create();
        $church = factory(Church::class)->create([
            'admin_id' => $user->id, ]);
        $user->church_id = $church->id;
        $user->save();
        // Create a series with that church
        // $series = $church->series()->create(factory(Series::class));
        $series = factory(Series::class)->create([
            'church_id' => $church->id,
        ]);

        // Create a speaker with that church
        // $speaker = $church->speakers()->create(factory(Series::class));
        $speaker = factory(Speaker::class)->create([
            'church_id' => $church->id,
        ]);

        $title = $faker->sentence;
        $name = $faker->sentence;
        $response = $this->actingAs($user)->post('/sermons', [
            'title' => $title,
            'church_id' => $church->id,
            'date' => $faker->date,
            'service' => $faker->sentence,
            'featured' => true,
            'series_id' => $series->id,
            'newSeriesName' => $name,
            'speaker_id' => $speaker->id,
            'description' => $faker->optional($weight = 0.5)->paragraph,
        ]);
       
       
        // make sure the database has the sermon
        $this->assertDatabaseHas('series', [
        'title' => $name,
         ]);
    }

 /** @test */
    public function a_user_can_view_the_edit_page()
    {

        $faker = $this->makeFaker();
        $this->withoutExceptionHandling();
        // Create a user and a church
        $user = factory(User::class)->create();
        $church = factory(Church::class)->create([
            'admin_id' => $user->id, ]);
        $user->church_id = $church->id;
        $user->save();
        // Create a series with that church
        // $series = $church->series()->create(factory(Series::class));
        $series = factory(Series::class)->create([
            'church_id' => $church->id,
        ]);

        // Create a speaker with that church
        // $speaker = $church->speakers()->create(factory(Series::class));
        $speaker = factory(Speaker::class)->create([
            'church_id' => $church->id,
        ]);

        $title = $faker->sentence;
        $name = $faker->name($gender = 'male');
        $response = $this->actingAs($user)->post('/sermons', [
            'title' => $title,
            'church_id' => $church->id,
            'date' => $faker->date,
            'service' => $faker->sentence,
            'featured' => true,
            'series_id' => $series->id,
            'speaker_id' => $speaker->id,
            'description' => $faker->optional($weight = 0.5)->paragraph,
        ]);

        // After a sermon is created, see if you can go to it's edit page.
       
        $sermon = Sermon::where('title', $title)->first();
        $response = $this->get("/sermons/{$sermon->id}/edit");
        $response->assertStatus(200);
    }

}
