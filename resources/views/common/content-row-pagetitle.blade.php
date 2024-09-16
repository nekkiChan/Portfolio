@if (!empty(config("screens.$config_path.pagetitle.view")))
    <div class="content_header">
        <div class="content_row flex items-center justify-center">
            {{ config("screens.$config_path.pagetitle.view") }}
        </div>
    </div>
    <div class="content_space">
    </div>
@endif
