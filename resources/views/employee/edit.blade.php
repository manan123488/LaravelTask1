<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>create</title>
</head>

<body>



    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">update Employee Data</h4>
                    </div>
                    <div class="card-body" style="padding: 2rem;">

                        <form action="{{route('updateEmployee',$data->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label class="form-label">FirstName:</label>
                                <input type="text" class="form-control  @error('Firstname') is-invalid @enderror" name="Firstname"
                                    value="{{ $data->firstname }}" placeholder="Enter company name">
                           
                            @error('Firstname')
                                    <div class="text-danger fw-bold fst-italic">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>

                            <div class="mb-4">
                                <label class="form-label">LastName:</label>
                                <input type="text" class="form-control  @error('Lastname') is-invalid @enderror" name="Lastname" value="{{ $data->lastname }}"
                                    placeholder="Enter company name">

                                      @error('Lastname')
                                    <div class="text-danger fw-bold fst-italic">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4"> <!-- Increased spacing -->
                                <label class="form-label">Email:</label>
                                <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ $data->email }}"
                                    placeholder="Enter email">

                                      @error('email')
                                    <div class="text-danger fw-bold fst-italic">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Phone Number:</label>
                                <input type="tel" class="form-control  @error('phone') is-invalid @enderror" name="phone" value="{{ $data->phone }}"
                                    placeholder="Enter phone number (e.g. +1234567890)">

                                      @error('phone')
                                    <div class="text-danger fw-bold fst-italic">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="form-label">Company:</label>
                                <select class="form-select  @error('companyId') is-invalid @enderror" name="companyId">
                                   <option value=""> </option>
                                    @foreach ($company as $companies)
                      <option value="{{ $companies->id }}" {{ $data->company_id == $companies->id ? 'selected' : '' }}>
                                            {{ $companies->name }}
                                        </option>
                                    @endforeach
                                </select>

                                  @error('companyId')
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
