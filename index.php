<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script cript src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <div class="container">
        <div id="divInfo" class="row">
            <div class="col-12">
                <span id="demo1">
                    
                </span>
                <span id="demo2">

                </span>
            </div>
        </div>
        <div id="divMain" class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Body</th>
                        </tr>
                    </thead>
                    <tbody id="tblData">
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <script>
        function btnInfo_click(id) {
            $("#divInfo").show();
            $("#divMain").hide();
            var url1 = "https://jsonplaceholder.typicode.com/posts/" + id;
            $.getJSON(url1)
                .done((data) => { //data is JSON
                    $("#demo1").text(JSON.stringify(data));
                    var url2 = "https://jsonplaceholder.typicode.com/posts/" + id + "/comments";
                    $.getJSON(url2)
                        .done((data) => {
                            $("#demo2").text(JSON.stringify(data));
                        })
                        .fail((xhr, status, err) => {

                        })

                })
        }

        function loadPosts() {
            var url = "https://jsonplaceholder.typicode.com/posts"
            $.getJSON(url)
                .done((data) => { //data is JSON
                    console.log(data);
                    $.each(data, (k, item) => {
                            console.log(item);
                            var line = "<tr>" +
                                "<td><button onClick = 'btnInfo_click(" + item.id + ")'" + " class='btn-sm btn-primary'><i class='fa fa-folder'></i></button></td>" +
                                "<td>" + item.id + "</td>" +
                                "<td>" + item.title + "</td>" +
                                "<td>" + item.body + "</td>" +
                                "</tr>"
                            $("#tblData").append(line)

                        })
                        .fail((xhr, status, err) => {
                            console.log("error")
                        })
                        .fail((xhr, status, err) => {
                            console.log("error")
                        });
                });




        }
        $(() => {
            $("#divInfo").hide();
            loadPosts()
        });
    </script>

</body>

</html>