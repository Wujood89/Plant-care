@if ($errors->{ $bag ?? 'default' }->any())
    <ul class="tw-field tw-mt-6 tw-list-reset">
        @foreach ($errors->{ $bag ?? 'default' }->all() as $error)
            <li class="tw-text-sm tw-text-red">{{ $error }}</li>
        @endforeach
    </ul>
@endif