<div class="card{{ empty($item['installed']) ? ' bg-light' : '' }} item-theme shadow-sm">
    <img
        src="{{ $item['icon'] }}"
        class="img-responsive img-rounded"
        alt="No Image"
        style="height: 200px"
    >
    <div class="panel-body">
        <b>{{ str_limit($item['name'], 22) }}</b>
        <p class="text-muted mb-0">{{ str_limit($item['description'], 72) }}</p>
    </div>
    <div class="d-flex p-3">
        @if (!empty($item['installed']))
            <button class="btn btn-outline-default btn-block disabled" title="Added">
                <i class="fa fa-cloud-download"></i>
            </button>
        @else
            <button
                class="btn btn-outline-success btn-block btn-install"
                data-title="Add {{ $item['name'] }}"
                data-control="add-item"
                data-item-code="{{ $item['code'] }}"
                data-item-name="{{ $item['name'] }}"
                data-item-type="{{ $item['type'] }}"
                data-item-version="{{ $item['version'] }}"
                data-item-context='@json($item)'
                data-item-action="install">
                <i class="fa fa-cloud-download"></i>
            </button>
        @endif
    </div>
</div>
