  
<!doctype html>
<html lang="ed">
<head>


  @include('user.script') 

</head>
<body>
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
  <h1 align="center">จัดการข้อมูล</h1>
  <br/>
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
        <table id="example"  class="table" >
          <tr align="center">
            <th>First name</th>
            <th>Last name</th>
            <th>Nickname</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
          @foreach($users as $row)
          <tr >
            <td> {{$row->fname}}</td>
            <td> {{$row->lname}} </td>
            <td> {{$row->nname}}</td>

            <td>  <a href="{{action('HelloControler@edit',$row['id'])}}" class="btn btn-warning">Edit</a></td>

            <td>  
              <form method="post" class="delete_form" action="{{action('HelloControler@destroy',$row['id'])}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="DELETE" />
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </table>

        <script src="https://datatables.yajrabox.com/js/jquery.min.js"></script>
        <script src="https://datatables.yajrabox.com/js/bootstrap.min.js"></script>
        <script src="https://datatables.yajrabox.com/js/jquery.dataTables.min.js"></script>
        <script src="https://datatables.yajrabox.com/js/datatables.bootstrap.js"></script>
      </div>
    </div>
    <div class="col-md-2 "></div>
  </div>
</body>

