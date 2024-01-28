<a href="{{ url()->current() }}" class="btn btn-danger">
    <span class="fa-stack" style="font-size: 0.6em">
        <i class="fas fa-filter fa-stack-1x"></i>
        <i class="fas fa-ban fa-stack-2x"></i>
    </span>
    {{ ($with_text ?? false) ? 'Xóa bộ lọc' : '' }}
</a>