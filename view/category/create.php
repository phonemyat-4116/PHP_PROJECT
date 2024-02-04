<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Products</title>
    <!-- bootstrap cdn css1 js1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-5 m-auto shadow rounded p-4" style="background-color: #fff;">
                <h3 class="text-center">Create Category</h3>
                <p class="text-center text-muted lead">Let's welcome to new prodcuts</p>
            
                <!-- form start  -->
                <form action="store.php" method="POST">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <label for="name" class="text-uppercase my-2" style="font-weight: bold;">Name</label>
                            <input type="text" id="name" name="name" class="form-control form-control-sm" autocomplete="off"/>
                        </div>

                        <div class="d-flex">
                            <button class="btn btn-primary btn-sm w-100 mt-3 me-2 p-2">Save</button>
                            <button class="btn btn-dark btn-sm w-100 mt-3 ms-2"><a href="./index.php" class="text-white" style="text-decoration: none;">Back</a></button>
                        </div>
                    </div>
                </form>
                <!-- form end -->
            </div>
        </div>
    </div>

    <!-- bootstrap cdn css1 js1  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>