<script type="text/javascript">
    @if (Session::has('success'))
    notifySwal('success', '{{Session::get('success')}}');
    @endif

    @if (Session::has('error'))
    notifySwal('error', '{{Session::get('error')}}');
    @endif

    @if (Session::has('info'))
    notifySwal('info', '{{Session::get('info')}}');
    @endif

    @if (Session::has('warning'))
    notifySwal('warning', '{{Session::get('warning')}}');
    @endif

    @if (Session::has('question'))
    notifySwal('question', '{{Session::get('question')}}');
    @endif

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    notifyToastr('error', '{{$error}}');
    @endforeach
    @endif
</script>
