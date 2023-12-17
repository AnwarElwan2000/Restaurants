<x-app-layout>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
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

    <div class="container-scroller">

        @include('Admin.navbar')


        <div class="w-50" style="position: relative; top:100px; right: -200px;">

            <form action="{{ url('edit_chef', $chef->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" value="{{ $chef->name }}" name="name" required class="form-control"
                        id="name">
                </div>

                <div class="form-group">
                    <label for="speciality">Speciality</label>
                    <input type="text" value="{{ $chef->speciality }}" name="speciality" required
                        class="form-control" id="speciality">
                </div>

                <div class="form-group">
                    <label>Old Image</label>
                    <img style="width: 250px; height:250px;" src="/Chefes_Image/{{ $chef->image }}" alt="">
                </div>

                <div class="form-group">
                    <label for="image">New Image</label>
                    <input type="file" required name="image" class="form-control-file" id="image">
                </div>

                <button type="submit" class="btn btn-outline-success mb-5 w-100">Update</button>
            </form>

        </div>
    </div>
    @include('Admin.script')

</body>

</html>
