@forelse ($artists as $item)
    @if(in_array($item->id,$artistsIds))
        <option value="{{ $item->id }}" disabled>{{ $item->name }}</option>
    @else
        <option value="{{ $item->id }}">{{ $item->name }}</option>
    @endif
@empty

@endforelse
