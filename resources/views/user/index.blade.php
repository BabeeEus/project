<!doctype html>
<html lang="ed">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>จัดการข้อมูล</title>
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
              <a class="icon glyphicon glyphicon-remove " href="javascript:history.back()" role="button" >
               <h1>Back</h1>
           </a>
       </nav>
       <div class="title" align="center">
        <br/>
        <h3 align="center">จัดการข้อมูล</h3>
    </div>
    <div class="row">
        <div class="col-md-2 "></div>
        <div class="col-md-8 ">
            <div align="center">
                <div align="right">
                    <a href="{{route('user.create')}}" class="btn btn-success" >เพิ่มข้อมูล</a></div>
                    <br/>
                    @if(\Session :: has('success'))
                    <div class="alert alert-success">
                        <p>{{\Session::get('success')}}</p>

                    </div>
                    @endif
                    <table class="table table-bordered table-striped">
                        <tr align="center">
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Nickname</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($users as $row)
                        <tr>
                            <td> {{$row['fname']}}</td>
                            <td> {{$row['lname']}} </td>
                            <td> {{$row['nname']}}</td>

                            <td align="center">  <a href="{{action('HelloControler@edit',$row['id'])}}" class="btn btn-warning">Edit</a></td>

                            <td align="center">  
                                <form method="post" class="delete_form" action="{{action('HelloControler@destroy',$row['id'])}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="col-md-2 "></div>
        </div>
    </div>
</div>

</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){$('.delete_form').on('submit',function(){
        if(confirm("คุณต้องการลบข้อมูลหรือไม่ (?-?)")){
            return true;
        }else{
            return false;
        }
    });
});
</script>
