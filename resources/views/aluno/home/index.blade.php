@extends('base.aluno.base')

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
<script src="https://www.gstatic.com/firebasejs/5.0.4/firebase.js"></script>
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

    var config = {
        apiKey: "AIzaSyAKsja8iAWYk3GSWNRRwCJKGZSrLRlJaeI",
        authDomain: "vectoriza-gps.firebaseapp.com",
        databaseURL: "https://vectoriza-gps.firebaseio.com",
        // projectId: "<PROJECT_ID>",
        // storageBucket: "<BUCKET>.appspot.com",
        // messagingSenderId: "<SENDER_ID>",
    };
    firebase.initializeApp(config);

    // firebase
    //     .auth()
    //     .createUserWithEmailAndPassword("samuel@gmail.com", "abc1234")
    //     .then(function() {
    //         console.log("criado");
    //     })
    //     .catch(function (error) {
    //         console.log(error.code);
    //         console.log(error.message);
    //     });

    var token = '{{ $token }}';
    firebase
        .auth()
        .signInWithCustomToken(token)
        .then(function(result) {
            console.log(result);
            console.log("logado");

            getGpsData();
        })
        .catch(function (error) {
            console.log(error.code);
            console.log(error.message);
        });
    
    function getGpsData() {
        firebase.database().ref('gps').on('value', function(snapshot) {
            snapshot.forEach(function(item) {
                console.log(item.val().lat);
                console.log(item.val().lng);
                console.log("-----");
            });
        })
    }
    

</script>
@endsection