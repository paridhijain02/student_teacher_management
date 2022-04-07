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




    <form action="" class="col-3">
    <div class="form-group">
            <label for="">Search</label>
            <input type="search" name="ssearch" id="" class="form-control" placeholder="" value="{{$ssearch}}">
    </div>
        <button class="btn btn-primary">Search</button>
        <a href="{{url('/aprofilee')}}">
            <button class='btn btn-primary' type="button">Reset</button>
            </a>
    </form>