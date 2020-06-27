<?php ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h3 align="center">Make Skleton Loader with Ajax PHP and using Bootstrap</h3>
        <br />
        <div class="card">
            <div class="card-header">Dynamic data</div>
            <div class="card-body" id="dynamic-content"></div>
        </div>
    </div>

    <script>
        $(document).ready(function () {

            $('#dynamic-content').html(make_skeleton());

            setTimeout(function () {
                load_content(5)
            }, 5000);

            function make_skeleton() {
                var output = '';
                for (var count = 0; count < 5; count++) {
                    output += '<div class="ph-item">';
                    output += '<div class="ph-col-4">';
                    output += '<div class="ph-picture"></div>';
                    output += '</div>';
                    output += '<div>';
                    output += '<div class="ph-row">';
                    output += '<div class="ph-col-12 big"></div>';
                    output += '<div class="ph-col-12"></div>';
                    output += '<div class="ph-col-12"></div>';
                    output += '<div class="ph-col-12"></div>';
                    output += '<div class="ph-col-12"></div>';

                    output += '</div>';
                    output += '</div>';
                    output += '</div>';
                }
                return output;
            }
            
            function load_content(limit)
            {
                $.ajax({
                    url: "fetch.php",
                    method: "POST",
                    data: {limit:limit},
                    success:function(data)
                    {
                        $('#dynamic-content').html(data);
                    }
                })
            }
        });
    </script>
</body>
</html>
