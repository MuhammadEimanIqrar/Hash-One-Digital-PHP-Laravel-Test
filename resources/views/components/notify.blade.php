<script type="text/javascript">
    @if (Session::has('success'))
    notifyToastr('success', '{{Session::get('success')}}');
    @endif

    @if (Session::has('error'))
    notifyToastr('error', '{{Session::get('error')}}');
    @endif

    @if (Session::has('info'))
    notifyToastr('info', '{{Session::get('info')}}');
    @endif

    @if (Session::has('warning'))
    notifyToastr('warning', '{{Session::get('warning')}}');
    @endif

    @if (Session::has('question'))
    notifyToastr('question', '{{Session::get('question')}}');
    @endif
    
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    notifyToastr('error', '{{$error}}');
    @endforeach
    @endif
</script>