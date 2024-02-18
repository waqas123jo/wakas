<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container text-center">
        <h2 class="text-center">Feed</h2>
        @foreach ($images as $image)
        <div class="position-relative d-inline-block">
            @if (Str::endsWith($image->image, ['.png', '.jpg', '.jpeg', '.gif']))
                <img src="{{ asset('/image/'.$image->image) }}" width="640" height="360" class="card-img-top" alt="Image">
            @elseif (Str::endsWith($image->image, ['.mp4', '.avi', '.mov', '.wmv']))
                <video width="640" height="360" controls class="card-img-top">
                    <source src="{{ asset('/storage/'.$image->image) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            @else
                Unsupported file format.
            @endif
        </div>
        
                <div>{{ $image->caption }}</div>
                <div>{{ $image->created_at->format('d F Y') }}</div>
                <form action="{{ route('images.destroy',$image->id) }}" method="POST">

                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin foto ini?')">Delete</button>
                </form>
            <br>
        @endforeach
        <a class="btn btn-warning" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <a class="btn btn-success" href="{{ route('images.create') }}">Add</a>
        
            </td>
        </tr>
    </div>
</body>
</html>