<a
    class="text-reset"
    role="button"
    @empty($item['installed'])
        data-control="add-item"
        data-item-code="{{ $item['code'] }}"
        data-item-name="{{ $item['name'] }}"
        data-item-type="{{ $item['type'] }}"
        data-item-version="{{ $item['version'] }}"
        data-item-context='@json($item)'
        data-item-action="install"
    @endempty
>
    <div class="card{{ empty($item['installed']) ? ' bg-light' : '' }} item-extension h-100 shadow-sm">
        <div class="d-flex align-items-center h-100 p-3">
            <div class="pr-3">
                @if (!empty($item['thumb']))
                    <img src="{{ $item['thumb'] }}"
                         class="img-rounded"
                         alt="No Image"
                         style="width: 64px; height: 64px;">
                @else
                    <span
                        class="extension-icon icon-lg rounded"
                        style="{{ $item['icon']['styles'] ?? '' }}"
                    ><i class="{{ $item['icon']['class'] ?? '' }}"></i></span>
                @endif
            </div>
            <div class="flex-grow-1 px-0 ml-auto">
                <b>{{ str_limit($item['name'], 22) }}</b>
                <p class="mb-0">{{ str_limit($item['description'], 128) }}</p>
            </div>
        </div>
    </div>
</a>
