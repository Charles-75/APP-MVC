

<form>

    <input type="search" name="searchbyname" id="search">

    <ul id="users"></ul>


</form>


<script>
    var users = [];
    $('#search').keyup(function() {
        var term = $('#search').val();
        $.get('/searchuser/'+term, function(data) {
            users = JSON.parse(data);
            $('#users').empty();
            for(var i = 0 ; i < users.length ; i++) {
                $('#users').append('<li>'+users[i]['firstName']+'</li>');
            }
        });
    });
</script>