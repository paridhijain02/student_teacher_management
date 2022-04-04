@foreach($you as $i)
            @if($i->course=='B.A.')
                @php
                    $aaa=$i->course;
                @endphp
            @elseif($i->course=='B.Com.')
                @php
                    $aaa=$i->course;
                @endphp
            @elseif($i->course=='MBBS')
                @php
                    $aaa=$i->course;
                @endphp
            @elseif($i->course=='B Tech')
                @php
                    $aaa=$i->course;
                @endphp
            @else
                <h1>bye</h1>
            @endif
          @endforeach

        @php
            $aaa=$i->course;
        @endphp



          <h1>{{$i->course}}</h1>