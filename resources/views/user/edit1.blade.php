      <div id="myModal1" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" align="center">แก้ไขข้อมูล</h4>
            </div>
            <div class="modal-body">

             <form method="post" action="{{ URL::to('update2') }}">{{csrf_field()}}
                <input type="hidden"  id="id"  name="id"/>
                <div class="form-group">
                    <label for="fname">ชื่อ</label>
                    <input type="text" class="form-control" id="fnames" name="fname" value="">
                </div>
                <div class="form-group">
                    <label for="lmame">นามสกุล</label>
                    <input type="text" class="form-control" id="lnames" name="lname" value="">
                </div>
                <div class="form-group">
                    <label for="nmame">ชื่อเล่น</label>
                    <input type="text" class="form-control" id="nnames" name="nname" value="">
                </div>
                <div align="center">
                    <button type="submit" class="btn btn-success" value="Update">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>