@if ($paginator->hasPages())
    <ul class="uk-pagination text-medium uk-flex-center no-margin-bottom">
        @if ($paginator->onFirstPage())
            <li class="uk-disabled no-padding-left">
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="all-border border-1px border-color-gray-extra-dark text-center width-50px height-50px line-height-50">
                    <span data-uk-pagination-previous></span>
                </a>
            </li>
        @else
            <li class="no-padding-left">
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="all-border border-1px border-color-gray-extra-dark text-center width-50px height-50px line-height-50">
                    <span data-uk-pagination-previous></span>
                </a>
            </li>
        @endif
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="uk-disabled no-padding-left">
                        <span
                            class="all-border border-1px border-color-gray-extra-dark text-center width-50px height-50px line-height-50">...</span>
                </li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="uk-active no-padding-left">
                                <span
                                    class="all-border border-1px border-color-gray-extra-dark text-center width-50px height-50px line-height-50">{{ $page }}</span>
                        </li>
                    @else
                        <li class="no-padding-left">
                            <a href="{{ $url }}"
                               class="all-border border-1px border-color-gray-extra-dark text-center width-50px height-50px line-height-50">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <li class="no-padding-left">
                <a href="{{ $paginator->nextPageUrl() }}">
                    <span data-uk-pagination-next
                          class="all-border border-1px border-color-gray-extra-dark text-center width-50px height-50px line-height-50"></span>
                </a>
            </li>
        @else
            <li class="uk-disabled no-padding-left">
                <a href="{{ $paginator->nextPageUrl() }}">
                    <span data-uk-pagination-next
                          class="all-border border-1px border-color-gray-extra-dark text-center width-50px height-50px line-height-50"></span>
                </a>
            </li>
        @endif
    </ul>
@endif
