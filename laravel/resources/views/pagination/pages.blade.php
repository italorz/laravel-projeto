@if ($paginator->hasPages())
    <nav class="pagination" role="navigation" aria-label="Paginação">
        @if ($paginator->onFirstPage())
            <span class="disabled">Anterior</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev">Anterior</a>
        @endif

        <span class="info">
            Página {{ $paginator->currentPage() }} de {{ $paginator->lastPage() }}
        </span>

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next">Próxima</a>
        @else
            <span class="disabled">Próxima</span>
        @endif
    </nav>
@endif
