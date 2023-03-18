<option value=""></option>
@foreach ($groups as $group)
    <option value="{{ $group->id }}">{{ $group->caption }}</option>
@endforeach
