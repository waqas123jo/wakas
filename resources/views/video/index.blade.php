{{-- @extends('template')

@section('content')
<div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Video</h2>
            </div>
            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('video.create') }}"> Input Video</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('succes'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th width="20px"class="text-center">Video</th>
            <th width="20px"class="text-center">Caption</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($videos as $video)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td class="text-center">
                <video width="320" height="240" controls>
                    <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </td>
            <td>{{ $video->caption }}</td>
            <td class="text-center">
                <form action="{{ route('video.destroy',$video->id) }}" method="POST">

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
 --}}

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
        @foreach ($videos as $video)
            <div class="position-relative d-inline-block">
                <video width="640" height="360" controls class="card-img-top">
                    <source src="{{ asset('/storage/'.$video->video)}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
                <div>{{ $video->caption }}</div>
                <div>{{ $video->created_at->format('d F Y') }}</div>
                <form action="{{ route('video.destroy',$video->id) }}" method="POST">

                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin video ini?')">Delete</button>
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
        <a class="btn btn-success" href="{{ route('video.create') }}">Add</a>
        
            </td>
        </tr>
    </div>
</body>
</html>