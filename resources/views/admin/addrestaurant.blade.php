<!DOCTYPE html>
<html lang="en">

<head>
    @extends('admin.layout')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add-Restaurant</title>
    <link href="img/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="admin/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="admin/css/style.css" rel="stylesheet">
    <!-- Sweet Alert -->
    <link rel="admin/stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>

<body>

    @section('header')
        <!-- Sweet alert -->
        @if (session('added'))
            <script>
                swal("Restaurant Added  successfully!", " ", "success");
            </script>
        @endif
        @if (session('error'))
            <script>
                swal("Restaurant Already  Exist!", " ", "error");
            </script>
        @endif
        <div class="content">
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-light rounded h-100 p-4">
                            {{-- <h6 class="mb-4">Basic Form</h6> --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" enctype="multipart/form-data">@csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Select Location</label>

                                    <select class="form-select" name="location_id" aria-label="Default select example">
                                        @foreach ($data as $item)
                                            <option value="{{ $item->location_id }}">{{ $item->location_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Restaurant Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        name="restaurant_name" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Restaurant Type</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        name="restaurant_type" placeholder="Example:Cafe OR Click-Bite OR Restaurant " aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Food-Type</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="food_type"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="address"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="phone"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Restaurant-Timing</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="timing"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Restaurant-Image</label>
                                    <input type="file" class="form-control" id="exampleInputEmail1" multiple
                                        name="restaurant_image[]" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Menu-Image</label>
                                    <input type="file" class="form-control" id="exampleInputEmail1" multiple
                                        name="menu_images[]" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Overview</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="overview"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Payments</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="payments"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Location_link</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        name="location_link" aria-describedby="emailHelp">
                                </div>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
                    <!-- JavaScript Libraries -->
                    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
                    <script src="admin/lib/chart/chart.min.js"></script>
                    <script src="admin/lib/easing/easing.min.js"></script>
                    <script src="admin/lib/waypoints/waypoints.min.js"></script>
                    <script src="admin/lib/owlcarousel/owl.carousel.min.js"></script>
                    <script src="admin/lib/tempusdominus/js/moment.min.js"></script>
                    <script src="admin/lib/tempusdominus/js/moment-timezone.min.js"></script>
                    <script src="admin/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

                    <!-- Template Javascript -->
                    <script src="admin/js/main.js"></script>
            @endsection
</body>

</html>
