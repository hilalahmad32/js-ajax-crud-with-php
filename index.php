<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Php-ajax-crud</title>
</head>
<style>
.active {
    background-color: lightseagreen;
    color: white;
}

</style>

<body>
    <div class="container-fluid bg-dark">
        <div class="container">
            <h2 class="text-center text-white p-5">Php Crud With Ajax and Vanilla Javascript</h2>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3> Product ( <span id="total"></span> ) </h3>
                    <button class="btn btn-success" data-toggle="modal" data-target="#addproduct">
                        New
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="d-flex justify-content-end my-4">
            <input type="text" name="search" onkeyup="searchData()" id="search" placeholder="Searching Here...."
                class="form-control w-25 form-control-lg">
        </div>
    </div>
    <div class="container my-3">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Product Title</th>
                        <th>Seller</th>
                        <th>Price</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody id="tbody"></tbody>
            </table>
        </div>
    </div>

    <!-- <div class="container my-1">
        <div class="pagination">
            <a href="" class="btn btn-default border active">1</a>
            <a href="" class="btn btn-default border">2</a>
            <a href="" class="btn btn-default border">3</a>
            <a href="" class="btn btn-default border">4</a>
        </div>
    </div> -->
    <div class="modal fade" id="addproduct">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Create Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form action="" id="save-data">

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Enter Product title</label>
                            <input type="text" name="product_title" id="product_title"
                                class="form-control form-control-lg">
                        </div>
                        <div class="form-group">
                            <label for="">Enter price</label>
                            <input type="number" name="price" id="price" class="form-control form-control-lg">
                        </div>
                        <div class="form-group">
                            <label for="">Enter Seller</label>
                            <input type="text" name="seller" id="seller" class="form-control form-control-lg">
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" id="save" class="btn btn-success">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- update model data -->
    <div class="modal fade" id="update-data">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Update Product </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form action="" id="update_data">

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Enter Product title</label>
                            <input type="text" name="edit_product_title" id="edit_product_title"
                                class="form-control form-control-lg">
                            <input type="hidden" name="edit_id" id="edit_id" class="form-control form-control-lg">
                        </div>
                        <div class="form-group">
                            <label for="">Enter price</label>
                            <input type="number" name="edit_price" id="edit_price" class="form-control form-control-lg">
                        </div>
                        <div class="form-group">
                            <label for="">Enter Seller</label>
                            <input type="text" name="edit_seller" id="edit_seller" class="form-control form-control-lg">
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" id="update" class="btn btn-success">update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/app.js"></script>
</body>

</html>
