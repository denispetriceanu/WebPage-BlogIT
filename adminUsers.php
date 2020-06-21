<div id="container_admin_user">
    <table class="blueTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nume</th>
                <th>Email</th>
                <th>Rol</th>
                <th class="colWidth"></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="5">
                    <button href="#" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="float: right;">Adaugă</button>
                </td>
            </tr>
        </tfoot>
        <tbody>
            <?php
            include('php/get_users.php');
            ?>
        </tbody>
    </table>
</div>

<!-- Modal pentru adaugare utilizator -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="text-align: center">
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
                <h5 class="modal-title" id="exampleModalLabel" style="font-size: 20px;margin-left: 16%;">Adaugă utilizator</h5>
            </div>
            <div class="row" id="rowRegister">
                <div class="col-md-8 center">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nume" id="nameInputRegisterModal" value="" style="font-size: 12px;" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email" id="emailInputRegisterModal" value="" style="font-size: 12px;" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Rol" id="rolInputRegisterModal" value="" style="font-size: 12px;" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Parolă" id="parolaInputRegisterModal" value="" style="font-size: 12px!important;" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Confirmă parola" id="confirmPasswordModal" value="" style="font-size: 12px!important;" />
                    </div>
                    <div class="alert alert-danger" id="showErrorRegModal" style="display: none"></div>
                    <div class="alert alert-success" id="showSuccessRegModal" style="display: none"></div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary buttonModalRegAdmin" data-dismiss="modal" onclick="refreshPage()">Close</button>
                <button type="button" class="btn btn-primary buttonModalRegAdmin" onclick="registerByAdmin()">Save changes</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal change pass -->
<div id="modalChangePass" class="modal" style="display: none">
    <div class="modal-content-changepass">
        <span onclick="closeModalChangePass()" class="close">&times;</span>
        <h5 style="margin-left: 18%; margin-top: 20px; font-size: 20px;">Schimba parola</h5>
        <hr>
        <div class="row" style="display: flex; justify-content: space-around;">
            <div class="col-md-8">
                <label style="font-size: 15px">Parolă veche</label>
                <input class="form-control" type="password" id='inputPassVecheChange' style="height: 31px; width: 100%">
                <label style="font-size: 15px">Parolă nouă</label>
                <input class="form-control" type="password" id='inputPassNouChange' style="height: 31px; width: 100%">
                <label style="font-size: 15px">Confirmă parola nouă</label>
                <input class="form-control" type="password" id='inputPassConfirmChange' style="height: 31px; width: 100%">
            </div>
        </div>
        <div class="row" style="display: flex; justify-content: space-around; margin-top: 20px;">
            <button class="btn btn-secondary" onclick="closeModalChangePass()">Renunță</button>
            <button class="btn btn-warning" onclick="sendChangePass()">Schimbă</button>
        </div>
        <div class="row" style="display: flex; justify-content: space-around; margin-top: 20px;">
            <div class="alert alert-success" id="showSuccessChangePass" style="display: none"></div>
            <div class="alert alert-danger" id="showErrorChangePass" style="display: none"></div>
        </div>
    </div>
</div>

<!-- Modal delete user -->
<div id="modalDeleteUser" class="modal" style="display: none">
    <div class="modal-content-changepass">
        <span onclick="closeModalDeleteUser()" class="close">&times;</span>
        <h5 style="margin-left: 10%; margin-top: 20px; font-size: 20px;">Ești sigur că dorești să ștergi utilizatorul?</h5>
        <hr>
        <div class="row" style="display: flex; justify-content: space-around;">
            <div id="infoDeleteUser" style="line-height: 65px; margin-top: -31px; width: 67%;"></div>
        </div>
        <div class="row" style="display: flex; justify-content: space-around; margin-top: 20px;">
            <button class="btn btn-secondary" onclick="closeModalDeleteUser()" style="width: 20%;">Renunță</button>
            <button class="btn btn-danger" onclick="delete_user()" style="width: 20%;">Sterge</button>
        </div>
        <div class="row" style="display: flex; justify-content: space-around; margin-top: 20px;">
            <div class="alert alert-success" id="showSuccessChangePass" style="display: none"></div>
            <div class="alert alert-danger" id="showErrorChangePass" style="display: none"></div>
        </div>
    </div>
</div>

<!-- ModalEditUser -->
<div id="modalEditUser" class="modal" style="display: none">
    <div class="modal-content-changepass">
        <span onclick="closeModalEditUser()" class="close">&times;</span>
        <h5 style="margin-left: 10%; margin-top: 20px; font-size: 20px;">Ești sigur că dorești să ștergi utilizatorul?</h5>
        <hr>
        <div id="formEditUser"></div>
        <!-- <div id='errorOnEdit' class="alert alert-danger"></div> -->
    </div>
</div>