@if ($paginator->hasPages())
    <nav aria-label="Paginação">
        <ul class="pagination justify-content-center mb-0">
            <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                @if ($paginator->onFirstPage())
                    <span class="page-link">Anterior</span>
                @else
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">Anterior</a>
                @endif
            </li>

            <li class="page-item disabled">
                <span class="page-link">
                    Página {{ $paginator->currentPage() }} de {{ $paginator->lastPage() }}
                </span>
            </li>

            <li class="page-item {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
                @if ($paginator->hasMorePages())
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Próxima</a>
                @else
                    <span class="page-link">Próxima</span>
                @endif
            </li>
        </ul>
    </nav>
@endif

