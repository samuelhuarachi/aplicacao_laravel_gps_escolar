@extends('base.cliente.base-cliente')

@section('content')

<div class="col-md-12">
    <style>

    #vanmaps {
        width: 100%;
        height: 400px;
    }

    </style>
    <div id="vanmaps"></div>
</div>

@endsection

@section('javascript')
<script>

    var divMaps = document.getElementById("vanmaps");

    var mapOptions = {
        zoom: 17,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        mapTypeControl: false,
        streetViewControl: false,
        fullscreenControl: false
      };

     var map = new google.maps.Map(divMaps, mapOptions);
     
     let latLng = new google.maps.LatLng(-22.929300, -47.040376);
     map.setCenter(latLng);
     map.setZoom(17);

</script>
@endsection