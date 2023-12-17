<x-app-layout>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
    @include('Admin.css')
    <style>
        #name {
            color: white;
        }

        #speciality {
            color: white;
        }
    </style>
</head>

<body>

    <div class="container-scroller" style="margin-bottom: 200px; height:1200px;">

        @include('Admin.navbar')

        <div class="w-50" style="position: relative; top:100px; right: -200px;">

            <form action="{{ url('upload_chef') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" required class="form-control" id="name"
                        placeholder="Enter Your Name">
                </div>

                <div class="form-group">
                    <label for="speciality">Speciality</label>
                    <input type="text" name="speciality" required class="form-control" id="speciality"
                        placeholder="Enter The Speciality">
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control-file" id="image">
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>

            <h1 class="text-center text-muted mt-5">Chefes.</h1>

            <table class="table table-hover table-dark text-light text-center" style="margin-top: 70px; height:50%">
                <thead>
                    <tr>
                        <th class="text-light" scope="col">Chef Name</th>
                        <th class="text-light" scope="col">Speciality</th>
                        <th class="text-light" scope="col">Image</th>
                        <th class="text-success" scope="col">Action</th>
                        <th class="text-danger" scope="col">Action 2</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chefes as $chefe)
                        <tr align="center">
                            <th scope="row">{{ $chefe->name }}</th>
                            <td>{{ $chefe->speciality }}</td>
                            <td><img style="width: 100px; height:100px;" src="/Chefes_Image/{{ $chefe->image }}"
                                    alt="chef"></td>
                            <td><a href="{{ url('update_chef', $chefe->id) }}" class="btn btn-outline-success">Update</a>
                            </td>
                            <td><a href="{{ url('delete_chef', $chefe->id) }}" class="btn btn-outline-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    @include('Admin.script')

</body>

</html>
