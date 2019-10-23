<rss xmlns:itunes="http://www.itunes.com/dtds/podcast-1.0.dtd" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:rawvoice="http://www.rawvoice.com/rawvoiceRssModule/" version="2.0">
    <channel>
        <title>{{ $church->podcast->podcast_title }}</title>
        <link>{{ $church->url }}</link>
        <image>
            <url>{{ $church->podcast->photo_url ? $church->podcast->photo_url : env('APP_URL') . '/images/sermons.jpg' }}</url>
            <title>{{ $church->podcast->podcast_title }}</title>
            <link>{{ $church->url }}</link>
        </image>
        <description>
           {{$church->podcast->podcast_description}}
        </description>
        <language>en-us</language>
        <copyright>{{ $church->name }} copyright {{ date('Y') }}</copyright>
        <atom:link href="{{ env('APP_URL') }}/podcastfeed/{{ $church->id }}" rel="self" type="application/rss+xml"/>
        <lastBuildDate> {{ $sermons->first()->podcastDate() }}</lastBuildDate>
        <itunes:author>{{ $church->name }}</itunes:author>
        <itunes:summary>
            {{$church->podcast->podcast_description}}
        </itunes:summary>
        <itunes:subtitle>{{$church->podcast->podcast_description}}</itunes:subtitle>
        <itunes:owner>
            <itunes:name>{{ $church->name }}</itunes:name>
            <itunes:email>{{ $church->email }}</itunes:email>
        </itunes:owner>
        <itunes:explicit>No</itunes:explicit>
        <itunes:keywords>
            Bible, Sermon, Church
        </itunes:keywords>
        <itunes:image href="{{ $church->podcast->photo_url ? $church->podcast->photo_url : env('APP_URL') . '/images/sermons.jpg' }}"/>
        <rawvoice:rating>TV-G</rawvoice:rating>
        <rawvoice:location>{{ $church->city }}, {{$church->state}}</rawvoice:location>
        <rawvoice:frequency>Weekly</rawvoice:frequency>
        <itunes:category text="Religion &amp; Spirituality">
            <itunes:category text="Christianity" />
        </itunes:category>
        <pubDate>{{ $sermons->first()->podcastDate() }}</pubDate>
        @foreach($sermons as $sermon)
        <item>
            <title>{{ $sermon->title }}</title>
            <link>
               {{ Str::contains($sermon->mp3, 'http') ? $sermon->mp3 : Storage::disk('wasabi')->url($sermon->mp3)  }}
            </link>
            <pubDate>{{ $sermon->podcastDate() }}</pubDate>
            <description>
                {{ $sermon->description }}
            </description>
            <enclosure url="{{ Str::contains($sermon->mp3, 'http') ? $sermon->mp3 : Storage::disk('wasabi')->url($sermon->mp3)  }}" length="{{ !Str::contains($sermon->mp3, 'http') ? Storage::disk('wasabi')->size($sermon->mp3) : ''  }}" type="audio/mpeg"/>
            <guid>
               {{ Str::contains($sermon->mp3, 'http') ? $sermon->mp3 : Storage::disk('wasabi')->url($sermon->mp3)  }}
            </guid>
            <itunes:summary>
                {{ $sermon->description }}
            </itunes:summary>
            <itunes:image href="{{ $church->podcast->photo_url ? $church->podcast->photo_url : env('APP_URL') . '/images/sermons.jpg' }}"/>
            <itunes:keywords>
                bible, sermons, book
            </itunes:keywords>
            <itunes:explicit>no</itunes:explicit>
        </item>
        @endforeach
    </channel>
</rss>