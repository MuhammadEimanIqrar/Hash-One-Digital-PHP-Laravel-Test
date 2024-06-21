<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            @if (isset($icon))
            <div class="page-title-icon">
                <i class="{{$icon}}"></i>
            </div>
            @endif
            <div>
                {{$title}}
                {{-- <div class="page-title-subheading">Wide icons selection including from flag icons to FontAwesome and other icons libraries.</div> --}}
            </div>
        </div>
        @if (isset($content))
        <div class="page-title-actions">
            @php
                echo $content;
            @endphp
        </div>
        @endif
    </div>
</div>