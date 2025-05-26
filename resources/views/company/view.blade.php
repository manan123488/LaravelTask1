<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>update</title>
</head>

<body>



    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5"> 
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">View Company Data</h4>
                </div>
                <div class="card-body" style="padding: 2rem;"> 

                    <form>
                      
                        <div class="mb-4"> 
                            <label class="form-label">Name:</label>
                            <input type="text" class="form-control" name="name" 
                                value="{{$data->name}}" placeholder="Enter company name" readonly>
                        </div>

                        <div class="mb-4"> <!-- Increased spacing -->
                            <label class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" 
                               value="{{$data->email}}" placeholder="Enter email" readonly>
                        </div>

                        <div class="mb-4"> <!-- Increased spacing -->
                            <label for="website" class="form-label">Website:</label>
                            <input type="url" class="form-control" name="website"
                               value="{{$data->website}}" placeholder="Enter website URL" readonly>
                        </div>

                     
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
