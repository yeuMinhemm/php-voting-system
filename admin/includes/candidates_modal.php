<!-- Add -->
<div
    class="modal fade"
    id="addnew"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Thêm ứng cử viên mới</b></h4>
            </div>
            <div class="modal-body">
                <form
                    class="form-horizontal"
                    method="POST"
                    action="candidates_add.php"
                    enctype="multipart/form-data"
                >
                    <div class="form-group">
                        <label
                            for="firstname"
                            class="col-sm-3 control-label"
                        >Họ</label>

                        <div class="col-sm-9">
                            <input
                                type="text"
                                class="form-control"
                                id="firstname"
                                name="firstname"
                                required
                            >
                        </div>
                    </div>
                    <div class="form-group">
                        <label
                            for="lastname"
                            class="col-sm-3 control-label"
                        >Tên</label>

                        <div class="col-sm-9">
                            <input
                                type="text"
                                class="form-control"
                                id="lastname"
                                name="lastname"
                                required
                            >
                        </div>
                    </div>
                    <div class="form-group">
                        <label
                            for="position"
                            class="col-sm-3 control-label"
                        >Vị trí ứng cử</label>

                        <div class="col-sm-9">
                            <select
                                class="form-control"
                                id="position"
                                name="position"
                                required
                            >
                                <option
                                    value=""
                                    selected
                                >- Select -</option>
                                <?php
                          $sql = "SELECT * FROM positions";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_assoc()){
                            echo "
                              <option value='".$row['id']."'>".$row['description']."</option>
                            ";
                          }
                        ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label
                            for="photo"
                            class="col-sm-3 control-label"
                        >Ảnh</label>

                        <div class="col-sm-9">
                            <input
                                type="file"
                                id="photo"
                                name="photo"
                            >
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-default btn-flat pull-left"
                    data-dismiss="modal"
                ><i class="fa fa-close"></i> Close</button>
                <button
                    type="submit"
                    class="btn btn-primary btn-flat"
                    name="add"
                ><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div
    class="modal fade"
    id="edit"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Edit Voter</b></h4>
            </div>
            <div class="modal-body">
                <form
                    class="form-horizontal"
                    method="POST"
                    action="candidates_edit.php"
                >
                    <input
                        type="hidden"
                        class="id"
                        name="id"
                    >
                    <div class="form-group">
                        <label
                            for="edit_firstname"
                            class="col-sm-3 control-label"
                        >Họ</label>

                        <div class="col-sm-9">
                            <input
                                type="text"
                                class="form-control"
                                id="edit_firstname"
                                name="firstname"
                                required
                            >
                        </div>
                    </div>
                    <div class="form-group">
                        <label
                            for="edit_lastname"
                            class="col-sm-3 control-label"
                        >Tên</label>

                        <div class="col-sm-9">
                            <input
                                type="text"
                                class="form-control"
                                id="edit_lastname"
                                name="lastname"
                                required
                            >
                        </div>
                    </div>
                    <div class="form-group">
                        <label
                            for="edit_position"
                            class="col-sm-3 control-label"
                        >Vị trí ứng cử</label>

                        <div class="col-sm-9">
                            <select
                                class="form-control"
                                id="edit_position"
                                name="position"
                                required
                            >
                                <option
                                    value=""
                                    selected
                                    id="posselect"
                                ></option>
                                <?php
                          $sql = "SELECT * FROM positions";
                          $query = $conn->query($sql);
                          while($row = $query->fetch_assoc()){
                            echo "
                              <option value='".$row['id']."'>".$row['description']."</option>
                            ";
                          }
                        ?>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-default btn-flat pull-left"
                    data-dismiss="modal"
                ><i class="fa fa-close"></i> Đóng</button>
                <button
                    type="submit"
                    class="btn btn-success btn-flat"
                    name="edit"
                ><i class="fa fa-check-square-o"></i> Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div
    class="modal fade"
    id="delete"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Đang xóa...</b></h4>
            </div>
            <div class="modal-body">
                <form
                    class="form-horizontal"
                    method="POST"
                    action="candidates_delete.php"
                >
                    <input
                        type="hidden"
                        class="id"
                        name="id"
                    >
                    <div class="text-center">
                        <p>XÓA ỨNG CỬ VIÊN</p>
                        <h2 class="bold fullname"></h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-default btn-flat pull-left"
                    data-dismiss="modal"
                ><i class="fa fa-close"></i> Đóng</button>
                <button
                    type="submit"
                    class="btn btn-danger btn-flat"
                    name="delete"
                ><i class="fa fa-trash"></i> Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Photo -->
<div
    class="modal fade"
    id="edit_photo"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="fullname"></span></b></h4>
            </div>
            <div class="modal-body">
                <form
                    class="form-horizontal"
                    method="POST"
                    action="candidates_photo.php"
                    enctype="multipart/form-data"
                >
                    <input
                        type="hidden"
                        class="id"
                        name="id"
                    >
                    <div class="form-group">
                        <label
                            for="photo"
                            class="col-sm-3 control-label"
                        >Ảnh</label>

                        <div class="col-sm-9">
                            <input
                                type="file"
                                id="photo"
                                name="photo"
                                required
                            >
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-default btn-flat pull-left"
                    data-dismiss="modal"
                ><i class="fa fa-close"></i> Đóng</button>
                <button
                    type="submit"
                    class="btn btn-success btn-flat"
                    name="upload"
                ><i class="fa fa-check-square-o"></i> Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>