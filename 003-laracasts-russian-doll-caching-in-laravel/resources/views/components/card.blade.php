@cache($card)
    <article class="Card">
        <h2 class="font-bold">{{ $card->title }}</h2>

        <ul>
            @foreach($card->notes as $note)
                <x-note :note="$note"/>
            @endforeach
        </ul>
    </article>
@endcache
