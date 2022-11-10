<script type="text/javascript">
    window.onload = function () {
        var startPos;
        var geoSuccess = function (position) {
            startPos = position;
            console.log(startPos.coords.latitude)
            console.log(startPos.coords.longitude)
            $('#eventReport #longitude').val(startPos.coords.longitude);
            $('#eventReport #latitude').val(startPos.coords.latitude);
        };
        var geoError = function (error) {
            console.log('Error occurred. Error code: ' + error.code);
            // error.code can be:
            //   0: unknown error
            //   1: permission denied
            //   2: position unavailable (error response from location provider)
            //   3: timed out
        };
        navigator.geolocation.getCurrentPosition(geoSuccess, geoError);
    };
</script>
