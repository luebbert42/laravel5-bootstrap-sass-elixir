        @include("pogo.partials._header")
        @foreach ($records as $record)
            @include("pogo.partials._recipient", array("record" => $record))
        @endforeach
        @include("pogo.partials._footer")
