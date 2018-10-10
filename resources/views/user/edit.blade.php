<!doctype html>
<html lang="ed">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>แก้ไขข้อมูล</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }
    .content {
        text-align: center;
    }
</style>
</head>
<body>
    <div class="position-ref full-height">
        <div class="">
            <nav class="navbar-dark bg-dark">
              <a class="btn btn-link " href="" role="button" >
               <h1>Back</h1>
           </a>
       </nav>
       <div class="title" align="center">
        <br/>
        <h3 align="center">แก้ไขข้อมูล</h3>
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-4 "></div>
        <div class="col-md-4 ">
          <form method="post" action="{{action('HelloControler@update',$id)}}">{{csrf_field()}}
              <div class="form-group">
                <label for="fname">ชื่อ</label>
                <input type="text" class="form-control" id="fname" name="fname" value="{{$user->fname}}">
            </div>
            <div class="form-group">
                <label for="lmame">นามสกุล</label>
                <input type="text" class="form-control" id="lname" name="lname" value="{{$user->lname}}">
            </div>
            <div class="form-group">
                <label for="nmame">ชื่อเล่น</label>
                <input type="text" class="form-control" id="nname" name="nname" value="{{$user->nname}}">
            </div>
            <div align="center">
                <button type="submit" class="btn btn-success" value="Update">Update</button>
            </div>
            <input type="hidden" name="_method" value="PATCH" />
        </form>
    </div>
    <div class="col-md-4 "></div>
</div>
</div>
</div>
</div>
</body>
</html>
