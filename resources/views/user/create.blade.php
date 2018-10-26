<!doctype html>
<html lang="ed">
<head>
   @include('user.script') 
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
            <header>
               <nav class="navbar navbar-inverse">
                  <div class="container-fluid">
                    <div class="navbar-header">
                      <a class="navbar-brand" href="javascript:history.back()">
                        Back
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <div class="title" align="center">
        <br/>
        <h3 align="center">เพิ่มข้อมูล</h3>
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(\Session :: has('success'))
        <div class="alert alert-success">
            <p>{{\Session::get('success')}}</p>

        </div>
        @endif
    </div>
    <div class="row">
        <div class="col-md-4 "></div>
        <div class="col-md-4 ">
          <form method="post" action="{{url('user')}}">{{csrf_field()}}
              <div class="form-group">
                <label for="fname">ชื่อ</label>
                <input type="text" class="form-control" id="fname" name="fname" placeholder="ป้อนชื่อ">
            </div>
            <div class="form-group">
                <label for="lmame">นามสกุล</label>
                <input type="text" class="form-control" id="lname" name="lname" placeholder="ป้อนนามสุกล">
            </div>
            <div class="form-group">
                <label for="nmame">ชื่อเล่น</label>
                <input type="text" class="form-control" id="nname" name="nname" placeholder="ป้อนชื่อเล่น">
            </div>
            <div align="center">
                <button type="submit" class="btn btn-success" value="บันทึก">บันทึก</button></div>
            </form>

        </div>
        <div class="col-md-4 "></div>
    </div>
</div>
</div>
</div>
</body>
</html>
