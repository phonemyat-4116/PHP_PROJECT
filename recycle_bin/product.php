<?php
    require_once "../controller/RecycleBinController.php";
    $controller = new RecycleBinController();
    $products = $controller->product();
    // die(json_encode($products))
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recycle Bin</title>
    <!-- bootstrap cdn css1 js1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- bootstrap icon cdn css 1 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <div class="col-10 bg-white shadow rounded p-3 m-auto">
                <div class="col-12 d-flex justify-content-between">
                    <h3>Recycle Bin</h3>
                    <div>
                        <!-- <a href="" class="btn btn-danger"><i class="bi bi-plus"></i>Restore</a> -->
                        <a href="../products/index.php" class="btn btn-primary">Back</a>
                    </div>
                </div>

                <table class="table table-dark table-striped mt-4">
                    <thead>
                        <tr class="text-center">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Description</th>
                            <th>Category-ID</th>
                            <th>Deleted_At</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody class="table-secondary">
                        <?php foreach($products as $product) : ?>
                        <tr class="text-center">
                            <td><?php echo $product->id ?></td>
                            <td><?php echo $product->name ?></td>
                            <td><?php echo $product->price ?></td>
                            <td><?php echo $product->stock ?></td>
                            <td><?php echo $product->description ?></td>
                            <td><?php echo $product->category_id ?></td>
                            <td><?php echo $product->deleted_at ?></td>
                            <td>
                                <a href="#" class="btn btn-success btn-sm">Restore</a>
                                <a href="destroy.php?id=<?php echo $product->id ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- bootstrap cdn css1 js1  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>