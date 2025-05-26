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
                    <h4 class="mb-0">Update Company Data</h4>
                </div>
                <div class="card-body" style="padding: 2rem;"> 

                    <form action="{{route('updateCompany',$data->id)}}"  method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4"> 
                            <label class="form-label">Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" 
                                value="{{$data->name}}" placeholder="Enter company name">
                                  @error('name')
                                    <div class="text-danger fw-bold fst-italic">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>

                        <div class="mb-4"> <!-- Increased spacing -->
                            <label class="form-label">Email:</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" 
                               value="{{$data->email}}" placeholder="Enter email">

                                 @error('email')
                                    <div class="text-danger fw-bold fst-italic">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>

                        <div class="mb-4"> <!-- Increased spacing -->
                            <label for="website" class="form-label">Website:</label>
                            <input type="url" class="form-control @error('website') is-invalid @enderror" name="website"
                               value="{{$data->website}}" placeholder="Enter website URL">

                                 @error('website')
                                    <div class="text-danger fw-bold fst-italic">
                                        {{ $message }}
                                    </div>
                                @enderror
                        </div>

                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-success py-2">Submit</button>
                            
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
