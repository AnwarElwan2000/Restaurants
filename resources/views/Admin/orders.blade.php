<x-app-layout>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
    @include('Admin.css')
</head>

<body>

    <div class="container-scroller">

        @include('Admin.navbar')
        <h1 class="text-muted">Customer Orders.</h1>
        <div class="w-50" style="position: relative; top:100px; left: -88px;">

            <form action="{{ url('search') }}" method="POST" class="mb-5">
                @csrf
                @method('POST')
                <input type="search" name="search" placeholder="Search..." class="bg-dark text-light ">
                <input type="submit" value="Search" class="btn btn-outline-success mt-2">
            </form>

            <table class="table table-hover table-dark text-light text-center">
                <thead>
                    <tr>
                        <th class="text-dark bg-light" scope="col">Name</th>
                        <th class="text-dark bg-light" scope="col">Phone</th>
                        <th class="text-dark bg-light" scope="col">Address</th>
                        <th class="text-dark bg-light" scope="col">Food Name</th>
                        <th class="text-dark bg-light" scope="col">Price</th>
                        <th class="text-dark bg-light" scope="col">quantity</th>
                        <th class="text-dark bg-light" scope="col">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Orders as $Order)
                        <tr align="center">
                            <th scope="row">{{ $Order->user_name }}</th>
                            <td>{{ $Order->phone }}</td>
                            <td>{{ $Order->address }}</td>
                            <td>{{ $Order->food_name }}</td>
                            <td>{{ $Order->price }}</td>
                            <td>{{ $Order->quantity }}</td>
                            <td>{{ $Order->price * $Order->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    @include('Admin.script')

</body>

</html>
