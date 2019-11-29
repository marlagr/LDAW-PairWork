 <!-- sidebar nav -->
<div class="row">
    <div class="col-4">
        <div class="list-group" id="list-tab" role="tablist">
            @foreach($permisos as $item)
              <a class="list-group-item list-group-item-action " id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">{{ $item->nombre }}</a>
            @endforeach
        </div>
    </div>
</div>
       