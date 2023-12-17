<x-app-layout>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">

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

    <div class="container-scroller" style="height:1000px;">

        @include('Admin.navbar')


        <div class="w-50" style="position: relative; top:100px; right: -200px;">

            <form action="{{ url('update', $food->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" required value="{{ $food->title }}" name="title" class="form-control"
                        id="title">
                </div>
                <div class="form-group">
                    <label for="title">Price</label>
                    <input type="number" required value="{{ $food->price }}" min="0" name="price"
                        class="form-control" id="price">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" required value="{{ $food->description }}" name="description"
                        class="form-control" id="description">
                </div>

                <div class="form-group">
                    <label>Old Image</label>
                    <img height="250px;" width="250px;" src="Food_Images/{{ $food->image }}" alt="">
                </div>

                <div class="form-group">
                    <label for="image">Upload Image</label>
                    <input type="file" required name="file" class="form-control-file" id="image">
                </div>
                <button type="submit" class="btn btn-outline-success w-100">Update</button>
            </form>


        </div>
    </div>

    @include('Admin.script')

</body>

</html>
