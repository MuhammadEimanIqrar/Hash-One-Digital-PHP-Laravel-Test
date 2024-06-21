<a href="{{ $url }}"
    class="btn btn-{{ $size }} @if (filled($style)) btn-{{ $style }}-{{ $color }} @else btn-{{ $color }} @endif {{ $classes }}"
    @if (filled($target)) target="{{ $target }}" @endif
    @if (filled($dataAttributes)) @foreach ($dataAttributes as $key => $value)
            data-{{ $key }}="{{ $value }}"
        @endforeach @endif>
    @if (filled($icon))
        <i class="{{ $icon }}"></i>
    @endif

    {{ $text }}
</a>
