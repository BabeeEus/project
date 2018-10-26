
                    <div id="myModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" align="center">เพิ่มข้อมูล</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="post" action="{{url('user')}}">{{csrf_field()}}
                              <div class="form-group">
                                <label for="fname" class="col-sm-2 control-label">ชื่อ</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="fname"  name="fname" placeholder="ป้อนชื่อ">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lmame" class="col-sm-2 control-label">นามสกุล</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="lname"  name="lname" placeholder="ป้อนนามสุกล">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nname" class="col-sm-2 control-label">ชื่อเล่น</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nname"  name="nname" placeholder="ป้อนชื่อเล่น">
                                </div>
                            </div>
                            <div align="center">
                                <button type="submit" class="btn btn-success" value="บันทึก">บันทึก</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
