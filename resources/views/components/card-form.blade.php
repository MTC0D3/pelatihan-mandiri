<div class="card card-dark">
    <div class="card-header">
        <h3 class="card-title">{{ $title }}</h3>
    </div>
    <div class="card-body">
        {{ $slot }}
    </div>
    <div class="card-footer">
        <a href="{{ $url }}" class="btn btn-danger">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
        <button type="submit" class="btn btn-success">
            <i class="mr-1 fas fa-check"></i> {{ $titleBtn }}
        </button>
    </div>
</div>
