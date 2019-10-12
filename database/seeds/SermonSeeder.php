<?php

use Illuminate\Database\Seeder;
use App\Church;
use App\Speaker;
use App\Series;
use App\Book;
use App\Chapter;

class SermonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $church = Church::findOrFail(1);

        // Import the speakers
        $speakerurl = base_path('resources/church-data/bible-baptist-church-mattoon/speakers.json'); // path to your JSON file
        $speakerdata = file_get_contents($speakerurl); // put the contents of the file into a variable
        $data_speakers = json_decode($speakerdata);
        foreach ($data_speakers as $speaker) {
            $church->speakers()->firstOrCreate(
                ['name' => $speaker->name],
                [
                'name' => $speaker->name,
                'position' => $speaker->role,
                'bio' => $speaker->body,
                'thumbnail' => $speaker->photo
                ]
            );
        }
        // Import the series
        $seriesurl = base_path('resources/church-data/bible-baptist-church-mattoon/series.json'); // path to your JSON file
        $seriesdata = file_get_contents($seriesurl); // put the contents of the file into a variable
        $data_series = json_decode($seriesdata);
        foreach ($data_series as $series) {
            $church->series()->firstOrCreate(
                ['title' => $series->title],
                [
                'title' => $series->title,
                'featured' => $series->featured,
                'description' => $series->description,
                'body' => $series->body,
                'photo' => $series->photo
                ]
            );
        }
        // Import the sermons
        $sermonsurl = base_path('resources/church-data/bible-baptist-church-mattoon/sermons.json'); // path to your JSON file
        $sermonsdata = file_get_contents($sermonsurl); // put the contents of the file into a variable
        $data_sermons = json_decode($sermonsdata);
        foreach ($data_sermons as $sermon) {
            $speaker = Speaker::where('name', $sermon->speaker->name)->first();
            $series = Series::where('title', $sermon->series->title)->first();
            
            $dbsermon = $church->sermons()->firstOrCreate(
                ['title' => $sermon->title],
                [
                'title' => $sermon->title,
                'speaker_id' => $speaker->id ? $speaker->id : null,
                'series_id' => $series->id ? $series->id : null,
                'manuscript' => $sermon->body,
                'description' => $sermon->text,
                'mp3' => $sermon->mp3,
                'slides' => $sermon->slides,
                'handout' => $sermon->handout,
                'featured' => $sermon->featured,
                'date' =>  Str::limit($sermon->date, 10, ''),
                'video_url' => $sermon->video
                ]
            );
            
            if ($sermon->text) {
                // Sanitize the book name by replacing the + character with a space
                $text = Str::replaceFirst('+', ' ', $sermon->text);
                // Break the text up into chunks
                $parts = explode(" ", $text);
                // Get the numerical part of those chunks (i.e. John 3:16)
                $reference = $this->reference($text, $parts);
                // Get the bookname part
                $bookname = $this->bookname($text, $parts);
                $book = null;
                $chapternum = $this->chapter($reference);
                $starverse = $this->startverse($reference);
                $endverse = $this->endverse($reference);
                $book = Book::where('name', $bookname)->first();
                if ($book) {
                    $dbsermon->book()->sync($book->id);
                    $chapter = null;
                    if ($chapternum  && $book) {
                        $chapter = $book->chapter()->where('number', $chapternum)->first();
                    }
                    if ($chapter) {
                         $dbsermon->chapter()->sync([$chapter->id => [
                        'verseStart' => $starverse ? $starverse : null,
                        'verseEnd' => $endverse ? $endverse : null,
                         ]]);
                    }
                }
            }
        }
    }

// Get the name of the Bible book
    public function bookname($originalText, $parts)
    {
        if (Str::startsWith($originalText, '1') || Str::startsWith($originalText, '2') || Str::startsWith($originalText, '3')) {
            return "{$parts[0]} {$parts[1]}";
        } elseif (Str::contains($originalText, 'Song of Solomon')) {
            return "{$parts[0]} {$parts[1]} {$parts[2]}";
        } else {
            return "{$parts[0]}";
        }
    }

// Isolate the numerical part of the reference so we don't have to deal with these conditions again.
    public function reference($originalText, $parts)
    {
        if (Str::startsWith($originalText, '1') || Str::startsWith($originalText, '2') || Str::startsWith($originalText, '3')) {
            return $parts[2];
        } elseif (Str::contains($originalText, 'Song of Solomon')) {
            return $parts[3];
        } else {
            return $parts[1];
        }
    }

// Get the chapter.
    public function chapter($reference)
    {
        if (Str::contains($reference, ':')) {
            $parts = explode(":", $reference);
                return $parts[0];
        } else {
            return $reference;
        }
    }
// Get the startVerse.
    public function startverse($reference)
    {
        if (Str::contains($reference, ':')) {
            $parts = explode(":", $reference);
            if (Str::contains($parts[1], '-')) {
                $moreparts = explode("-", $parts[1]);
                return $moreparts[0];
            } else {
                return $parts[1];
            }
        } else {
            return null;
        }
    }
// Get the endVerse.
    public function endverse($reference)
    {
        if (Str::contains($reference, ':')) {
            $parts = explode(":", $reference);
            if (count($parts) > 2) {
                return $parts[2];
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
}
