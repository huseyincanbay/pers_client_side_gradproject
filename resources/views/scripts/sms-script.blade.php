<script>
    $('#getNewCode').click(function (e) {
        var request;
        e.preventDefault();
        request = $.post('/resend-code');
        request.done(function (response){
            console.log(response)
        });
    })
</script>
