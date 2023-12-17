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
        <h1 class="text-muted">Reservations.</h1>

        <div class="w-50" style="position: relative; top:100px;">
            <table class="table table-hover text-light text-center">
                <thead>
                    <tr>
                        <th class="text-light" scope="col">Name</th>
                        <th class="text-light" scope="col">Email</th>
                        <th class="text-light" scope="col">Phone</th>
                        <th class="text-light" scope="col">Date</th>
                        <th class="text-light" scope="col">Time</th>
                        <th class="text-light" scope="col">Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        <tr>
                            <th class="text-light" scope="row">{{ $reservation->name }}</th>
                            <td class="text-light">{{ $reservation->email }}</td>
                            <td class="text-light">{{ $reservation->phone }}</td>
                            <td class="text-light">{{ $reservation->date }}</td>
                            <td class="text-light">{{ $reservation->time }}</td>
                            <td class="text-light">{{ $reservation->message }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('Admin.script')

</body>

</html>
