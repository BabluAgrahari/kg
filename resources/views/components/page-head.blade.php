<div class="card-header py-2 h-body">
    <div class="row">
        <div class="col-md-6 pt-1">
            <h6 class="m-0 font-weight-bold text-primary">{{ ucwords($title) }}</h6>
        </div>
        <div class="col-md-6">
            @switch($type)

            @case('list')
            <a href="{{ url($url) }}" style="float: right;" class="btn btn-outline-success btn-sm"><span class="mdi mdi-plus-circle"></span>&nbsp;Add</a>
            @break
            @case('create')
            <a href="{{ url($url) }}" style="float: right;" class="btn btn-outline-warning btn-sm"><span class="mdi mdi-backburger"></span>&nbsp;Back</a>
            @break

            @endswitch
        </div>
    </div>
</div>