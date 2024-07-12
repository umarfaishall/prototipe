<nav class="flex-column flex flex-wrap items-center justify-between p-4 md:flex-row" aria-label="Table navigation">
  <span class="mb-4 block w-full text-sm font-normal text-gray-500 md:mb-0 md:inline md:w-auto">
    Showing <span class="font-semibold text-gray-900">{{ $paginator->firstItem() }}-{{ $paginator->lastItem() }}</span>
    of
    <span class="font-semibold text-gray-900">{{ $paginator->total() }}</span>
  </span>
  <ul class="inline-flex h-8 -space-x-px text-sm rtl:space-x-reverse">
    @if ($paginator->onFirstPage())
      <li aria-disabled="true" aria-label="Previous">
        <span
          class="ms-0 flex h-8 cursor-not-allowed items-center justify-center rounded-s-lg border border-gray-300 bg-white px-3 leading-tight text-gray-500">
          <i class="fas fa-chevron-left"></i>
        </span>
      </li>
    @else
      <li>
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
          class="ms-0 flex h-8 items-center justify-center rounded-s-lg border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700"
          aria-label="Previous">
          <i class="fas fa-chevron-left"></i>
        </a>
      </li>
    @endif
    @foreach ($paginator->links()->elements[0] as $page => $url)
      @if ($page == $paginator->currentPage())
        <li aria-current="page">
          <span
            class="flex h-8 items-center justify-center border border-gray-300 bg-orange-50 px-3 text-orange-600">{{ $page }}</span>
        </li>
      @else
        <li>
          <a href="{{ $url }}"
            class="flex h-8 items-center justify-center border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700">{{ $page }}</a>
        </li>
      @endif
    @endforeach
    @if ($paginator->hasMorePages())
      <li>
        <a href="{{ $paginator->nextPageUrl() }}" rel="next"
          class="flex h-8 items-center justify-center rounded-e-lg border border-gray-300 bg-white px-3 leading-tight text-gray-500 hover:bg-gray-100 hover:text-gray-700"
          aria-label="Next">
          <i class="fas fa-chevron-right"></i>
        </a>
      </li>
    @else
      <li aria-disabled="true" aria-label="Next">
        <span
          class="flex h-8 cursor-not-allowed items-center justify-center rounded-e-lg border border-gray-300 bg-white px-3 leading-tight text-gray-500">
          <i class="fas fa-chevron-right"></i>
        </span>
      </li>
    @endif
  </ul>
</nav>
