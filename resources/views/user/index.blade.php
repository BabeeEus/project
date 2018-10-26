
<!doctype html>
<html lang="ed">
<head>
    @include('user.script') 
    <style>
    .content {
        text-align: center;
    }
</style>
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
<div class="position-ref full-height">
    <div class="">
        <div class="title" align="center">
            <br/>
            <h1 align="center">จัดการข้อมูล</h1>
            <br/>
        </div>
        <div class="row">
            <div class="col-md-1 "></div>
            <div class="col-md-10 ">
                <div align="center">
                    <div align="right">
                        <button class="btn btn-success" data-toggle="modal" data-target="#myModal">เพิ่มข้อมูล</button> 
                        <a href="{{ URL::to('export') }}" class="btn btn-success" >Emport To Excel</a>
                    </div>
                    <br/>
                    @if(\Session :: has('success'))
                    <div class="alert alert-success">
                        <p>{{\Session::get('success')}}</p>
                    </div>
                    @endif
                </div>
                <form method="POST" id="search-form" class="form-inline" role="form">

                    <div class="form-group">
                        <label for="fname">First name</label>
                        <input type="text" class="form-control" name="fname" id="fname" placeholder="Search First name">
                    </div>
                    <div class="form-group">
                        <label for="fname">Last name</label>
                        <input type="text" class="form-control" name="lname" id="lname" placeholder="Search Last name">
                    </div>
                    <div class="form-group">
                        <label for="nname">Nickname</label>
                        <input type="text" class="form-control" name="nname" id="nname" placeholder="search Nickname">
                    </div>

                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
                <br/><br/>
                <form method="POST" enctype="multipart/form-data" id="import-form" action="{{ URL::to('import') }}"class="form-inline" role="form">{{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputFile">File import</label>
                        <input type="file" id="file" name="file">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <br/>
                <table id="users-table" class="table table-striped">
                    <thead>
                        <div class="row" >
                            <tr >
                             <th class=".col-md-1">No</th>
                             <th>First name</th>
                             <th>Last name</th>
                             <th>Nick name</th>
                             <th>Action</th>
                         </tr>
                     </div>
                 </thead>
             </table>
             @include('user.add') 
             @include('user.edit1') 
         </div>
     </div>
 </div>
</div>
</body>
<script type="text/javascript">

    function btn_edit(id)
    { 
        $.ajax({
            url:"{{ URL::to('et') }}"+'/'+id,
            method:'get',
            success:function(data){
                console.log(data.result)
                $('#id').val(data.result.id);
                $('#fnames').val(data.result.fname);
                $('#lnames').val(data.result.lname);
                $('#nnames').val(data.result.nname);

            }
        })
    }
    var oTable = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        "searching": false, // ลบปุ่ม search ออกจาก Datable
        ajax:{
          url: 'http://localhost:8000/select/get_datatable',

          data: function (d) {
            d.fname = $('input[name=fname]').val();
            d.lname = $('input[name=lname]').val();
            d.nname = $('input[name=nname]').val();
        }
    },
    columns: [
    {data: 'id', name: 'id'},
    {data: 'fname', name: 'fname'},
    {data: 'lname', name: 'lname'},
    {data: 'nname', name: 'nname'},
        {data: 'action', name: 'action'}//,"searchable": false
        ]
    });
    $('#search-form').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
    });

</script>
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
