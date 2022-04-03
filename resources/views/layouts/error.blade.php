@foreach(['danger', 'warning', 'success', 'info'] as $msg)
    @if(session('alert-'.$msg))
        <div class="alert alert-{{ $msg }} alert-dismissible fade show">{{ session('alert-'.$msg) }}  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
    @endif
@endforeach
