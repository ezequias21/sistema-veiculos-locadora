<div class="alert alert-{{ $color }} alert-dismissible " role="alert">
    <i class="fa fa-{{ $icon }} mr-2"></i>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
            aria-hidden="true">×</span>
    </button>
    {{ $slot }}
</div>