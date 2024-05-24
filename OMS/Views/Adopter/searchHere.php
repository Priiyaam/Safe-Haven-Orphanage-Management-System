<!DOCTYPE html>
<html>

<head>
    <title>Live Search</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        
        #backButton {
            position: absolute;
            top: 10px;
            left: 10px;
        }
    </style>
</head>

<body>
    <div class="container" style="max-width: 50%">
        
        <a href="#" onclick="goBack()" class="btn btn-secondary" id="backButton">Back</a>

        
        <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Search ...">

        
        <div id="searchresult"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#live_search").keyup(function () {
                var input = $(this).val();

                if (input !== "") {
                    $.ajax({
                        url: "livesearch.php",
                        method: "POST",
                        data: { input: input },

                        success: function (data) {
                            $("#searchresult").html(data);
                            $("#searchresult").css("display", "block");
                        }
                    });
                } else {
                    $("#searchresult").css("display", "none");
                }
            });
        });

        
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>