<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>

<body>

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

            <h1 class="text-muted">Users.</h1>

            <div class="w-50" style="position: relative; top:100px; right: -100px;">
                <table class="table table-dark text-light text-center">
                    <thead>
                        <tr>
                            <th class="text-light" scope="col">Name</th>
                            <th class="text-light" scope="col">Email</th>
                            <th class="text-danger" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->name }}</th>
                                <td>{{ $user->email }}</td>
                                @if ($user->user_type == '0')
                                    <td><a href="{{ url('delete_user', $user->id) }}"
                                            class="btn btn-outline-danger">Delete</a></td>
                                @else
                                    <td><a href="" class="btn btn-outline-primary">Not Allwoed</a></td>
                                @endif

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @include('Admin.script')

    </body>

    </html>


</body>

</html>
