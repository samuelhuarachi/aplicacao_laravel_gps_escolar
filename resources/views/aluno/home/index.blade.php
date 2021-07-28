@extends('base.aluno.base')

@section('content')

<div class="col-md-12">
    <style>

    #vanmaps {
        width: 100%;
        max-width: 700px;
        height: 400px;
    }

    </style>
    <center>
            <div id="vanmaps"></div>
    </center>
</div>

@endsection

@section('javascript')
<script src="https://www.gstatic.com/firebasejs/5.0.4/firebase.js"></script>
<script>
    var position;
    var van;
    var latlng

    $(document).ready(function(){
        var divMaps = document.getElementById("vanmaps");
        var mapOptions = {
            zoom: 17,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeControl: false,
            streetViewControl: false,
            fullscreenControl: false
        };
        
        var map = new google.maps.Map(divMaps, mapOptions);
        position = {lat: -22.92914437, lng: -47.04017754};
        van = new google.maps.Marker({
                position: position, 
                map: map,
                icon: 'http://localhost:8000/images/bus.png'
            });
        
        map.setCenter(new google.maps.LatLng(-22.929300, -47.040376));
        map.setZoom(17);
    });

    var config = {
        apiKey: "",
        authDomain: "vectoriza-gps.firebaseapp.com",
        databaseURL: "https://vectoriza-gps.firebaseio.com",
    };
    firebase.initializeApp(config);

    var token = '{{ $token }}';
    firebase
        .auth()
        .signInWithCustomToken(token)
        .then(function(result) {
            initGps();
        })
        .catch(function (error) {

        });
    
    function initGps() {
        firebase.database()
            .ref('gps')
            .child('{{ $vehicle->firebasegps }}')
            .on('value', function(snapshot) {
                latlng = new google.maps.LatLng(snapshot.val().lat, snapshot.val().lng);
                van.setPosition(latlng);
        })
    }
    

</script>
@endsection