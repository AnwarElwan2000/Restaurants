<x-app-layout>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
    @include('Admin.css')
    <style>
        #title {
            color: white;
        }

        #price {
            color: white;
        }

        #description {
            color: white;
        }
    </style>
</head>

<body>
    <div class="container-scroller" style="margin-bottom: 200px;">

        @include('Admin.navbar')

        <div class="w-50" style="position: relative; top:100px; right: -200px;">

            <form action="{{ url('upload_food') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" required class="form-control" id="title"
                        placeholder="Wrtie a Title">
                </div>
                <div class="form-group">
                    <label for="title">Price</label>
                    <input type="number" min="0" name="price" required class="form-control" id="price"
                        placeholder="Wrtie a price">
                </div>

                <div class="form-group">
                    <label for="image">Upload Image</label>
                    <input type="file" required name="file" class="form-control-file" id="image">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" required class="form-control" id="description"
                        placeholder="Description">
                </div>

                <button type="submit" class="btn btn-outline-light">Save</button>
            </form>
            <h1 class="text-center text-muted mt-3">Foods.</h1>

            <table class="table table-bordered table-dark text-center text-light"
                style="margin-top: 70px; margin-bottom:250px;">
                <thead>
                    <tr>
                        <th class="text-light" scope="col">Food Name</th>
                        <th class="text-light" scope="col">Price</th>
                        <th class="text-light" scope="col">Description</th>
                        <th class="text-light" scope="col">Image</th>
                        <th class="text-danger" scope="col">Action</th>
                        <th class="text-success" scope="col">Action 2</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($foods as $food)
                        <tr align="center">
                            <th scope="row">{{ $food->title }}</th>
                            <td>{{ $food->price }}</td>
                            <td>{{ $food->description }}</td>
                            <td>
                                <img style="width: 70px; height:70px;" src="Food_Images/{{ $food->image }}"
                                    alt="food">
                            </td>
                            <td><a onclick="return confirm('Are you sure to delete the food?')"
                                    href="{{ url('delete_menu', $food->id) }}" class="btn btn-outline-danger">Delete</a>
                            </td>
                            <td><a href="{{ url('update_view', $food->id) }}" class="btn btn-outline-success">Update</a>
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
