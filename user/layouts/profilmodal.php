<div class="modal fade" id="ModalProfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Profil</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="?id=<?= base64_encode($data_id) ?>" method="post">
                    <div class="mb-2">
                        <label for="formFileSm" class="form-label">Username</label>
                        <input disabled class="form-control form-control-sm" value="<?= $data_username ?>" id="formFileSm" type="text">
                    </div>
                    <div class="mb-2">
                        <label for="formFileSm" class="form-label">Name</label>
                        <input class="form-control form-control-sm" name="edit-nama" value="<?= $data_nama ?>" id="formFileSm" type="text">
                    </div>
                    <div class="mb-2">
                        <label for="formFileSm" class="form-label">Kampus</label>
                        <select class="form-select form-control form-control-sm" id="exampleFormControlSelect1" name="edit-kampus">
                            <?php

                            $query1 = mysqli_query($koneksi, "SELECT * from tb_kampus where id = '$data_id_kampus'") or die(mysqli_error($koneksi));
                            $row1 = mysqli_fetch_array($query1);
                            echo "<option value=$row1[id]> $row1[nama]</option>";


                            $query2 = mysqli_query($koneksi, "SELECT * from tb_kampus") or die(mysqli_error($koneksi));
                            while ($row2 = mysqli_fetch_array($query2)) {
                                echo "<option value=$row2[id]> $row2[nama]</option>";
                            }
                            ?>

                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="formFileSm" class="form-label">Email</label>
                        <input class="form-control form-control-sm" name="edit-email" value="<?= $data_email ?>" id="formFileSm" type="email">
                    </div>
                    <div class="mb-2">
                        <label for="formFileSm" class="form-label">Password</label>
                        <input class="form-control form-control-sm" name="edit-password" value='<?= $data_password ?>' id="formFileSm" type="password">
                    </div>
                    <div class="mb-2">
                        <label for="formFileSm" class="form-label">Re-Password</label>
                        <input class="form-control form-control-sm" name="edit-repassword" value='<?= $data_password ?>' id="formFileSm" type="password">
                    </div>
            </div>
            <div class="modal-footer">
                <button name="edit-profil" class="btn btn-success btn-sm">Save</button>
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>