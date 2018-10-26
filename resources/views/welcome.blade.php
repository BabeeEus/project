<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>


    @include('user.script') 

    <style>
    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 24px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    </style>
</head>
<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                จัดการข้อมูล
            </div>
            <div class="links">
                <a href="{{route('user.create')}}">เพิ่มข้อมูล</a>
                <a href="{{route('user.index')}}">ดูข้อมูล</a>
            </div>
            <br/>   <br/>
            <div class="row">
               @foreach($users as $row)
               <div class="card">
                   <div class="card-body">
                    <div class="card col-lg-2">
                        <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
                        <h2>{{$row->nname}}</h2>
                        <p>{{$row->fname}}  {{$row->lname}}</p>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

</body>
</html>

