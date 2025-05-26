<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>

    <!-- Toast Container - Centered at Top -->
    @if (session('success'))
        <div aria-live="polite" aria-atomic="true" class="position-relative">
            <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3">
                <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true"
                    style="display: block !important;">
                    <div class="toast-header bg-success text-white">
                        <strong class="me-auto">Create</strong>
                        <small>Just now</small>
                        <a href="{{ url()->current() }}" class="btn-close btn-close-white" aria-label="Close"></a>
                    </div>
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- update toast --}}
    @if (session('Updatesuccess'))
        <div aria-live="polite" aria-atomic="true" class="position-relative">
            <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3">
                <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true"
                    style="display: block !important;">
                    <div class="toast-header bg-success text-white">
                        <strong class="me-auto">Update</strong>
                        <small>Just now</small>
                        <a href="{{ url()->current() }}" class="btn-close btn-close-white" aria-label="Close"></a>
                    </div>
                    <div class="toast-body">
                        {{ session('Updatesuccess') }}
                    </div>
                </div>
            </div>
        </div>
    @endif

     {{-- delete toast --}}
    @if (session('deletesuccess'))
        <div aria-live="polite" aria-atomic="true" class="position-relative">
            <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3">
                <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true"
                    style="display: block !important;">
                    <div class="toast-header bg-success text-white">
                        <strong class="me-auto">Delete</strong>
                        <small>Just now</small>
                        <a href="{{ url()->current() }}" class="btn-close btn-close-white" aria-label="Close"></a>
                    </div>
                    <div class="toast-body">
                        {{ session('deletesuccess') }}
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="mt-3 mb-4">
        <a href="{{ route('createEmployee') }}" class="btn btn-success">
            Create Employee
        </a>
    </div>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">FirstName</th>
                <th scope="col">LastName</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">CompanyName</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th>{{ $item->id }}</th>
                    <td>{{ $item->firstname }}</td>
                    <td>{{ $item->lastname }}</td>
                    <td>{{ $item->email }}</td>
                     <td>{{ $item->phone }}</td>
                      <td>{{ $item->companies->name }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{route('viewEmployee',$item->id)}}" class="btn btn-warning">View</a>
                            <a href="{{route('editEmployee',$item->id)}}" class="btn btn-success">Update</a>
                            <form action="{{route('deleteEmployee',$item->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
