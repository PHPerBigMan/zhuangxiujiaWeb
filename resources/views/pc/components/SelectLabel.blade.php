@if (isset($category))
    @php
        $first = isset($first) ? $first : null;
        $second = isset($second) ? $second : null;
    @endphp

    <div class="m-select-label">
        @foreach($category as $item)
            <div class="label-row">
                <div class="label-head">{{$item->cat_name}}：</div>

                <div class="label-body">
                    @foreach($item->child as $child)
                        <a href="{{$link}}?first={{$item->id}}&second={{$child->id}}">
                            <div class="label-item @if($first == $item->id && $second == $child->id) active @endif">{{$child->cat_name}}</div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endif
