<form action="index.php?controller=registerController&action=check" method="post">
<div class="modal fade" id="modal" tabindex="-1" role="dialog" style="color: black; text-shadow: none;">
    <div class="modal-dialog modal-dialog-centered" role="document ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginLabel">Register</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-2 txt-dark m-t-10" field="Email">
                            <div class="input-group-prepend">
                                <div class="input-group-text radius-50 bg-none border-none"><label class="fas fa-user flat-icon"></label></div>
                            </div>
                            <input type="text" class="form-control radius-0 bg-none border-none border-bottom focused validate"
                                id="user-email" name="user-email" placeholder="Email">
                            <!-- invalid to display wrong data input -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-2 txt-dark m-t-10" field="Password">
                            <div class="input-group-prepend">
                                <div class="input-group-text radius-50 bg-none border-none"><label class="fas fa-key flat-icon"></label></div>
                            </div>
                            <input type="password" class="form-control radius-0 bg-none border-none border-bottom focused validate"
                                id="user-password" name="user-password" placeholder="Password">
                            <!-- invalid to display wrong data input -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-2 txt-dark m-t-10" field="Username">
                            <div class="input-group-prepend">
                                <div class="input-group-text radius-50 bg-none border-none"><label class="fas fa-key flat-icon"></label></div>
                            </div>
                            <input type="text" class="form-control radius-0 bg-none border-none border-bottom focused validate"
                                id="user-Username" name="user-Username" placeholder="Username">
                            <!-- invalid to display wrong data input -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-2 txt-dark m-t-10" field="Nome">
                            <div class="input-group-prepend">
                                <div class="input-group-text radius-50 bg-none border-none"><label class="fas fa-key flat-icon"></label></div>
                            </div>
                            <input type="text" class="form-control radius-0 bg-none border-none border-bottom focused validate"
                                id="user-Nome" name="user-Nome" placeholder="Nome">
                            <!-- invalid to display wrong data input -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-2 txt-dark m-t-10" field="Cognome">
                            <div class="input-group-prepend">
                                <div class="input-group-text radius-50 bg-none border-none"><label class="fas fa-key flat-icon"></label></div>
                            </div>
                            <input type="text" class="form-control radius-0 bg-none border-none border-bottom focused validate"
                                id="user-Cognome" name="user-Cognome" placeholder="Cognome">
                            <!-- invalid to display wrong data input -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-2 txt-dark m-t-10" field="DocumentoIdentita">
                            <div class="input-group-prepend">
                                <div class="input-group-text radius-50 bg-none border-none"><label class="fas fa-key flat-icon"></label></div>
                            </div>
                            <input type="text" class="form-control radius-0 bg-none border-none border-bottom focused validate"
                                id="user-DocumentoIdentita" name="user-DocumentoIdentita" placeholder="DocumentoIdentita">
                            <!-- invalid to display wrong data input -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-2 txt-dark m-t-10" field="Fotografia">
                            <div class="input-group-prepend">
                                <div class="input-group-text radius-50 bg-none border-none"><label class="fas fa-key flat-icon"></label></div>
                            </div>
                            <input type="text" class="form-control radius-0 bg-none border-none border-bottom focused validate"
                                id="user-Fotografia" name="user-Fotografia" placeholder="Fotografia">
                            <!-- invalid to display wrong data input -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-2 txt-dark m-t-10" field="Telefono">
                            <div class="input-group-prepend">
                                <div class="input-group-text radius-50 bg-none border-none"><label class="fas fa-key flat-icon"></label></div>
                            </div>
                            <input type="text" class="form-control radius-0 bg-none border-none border-bottom focused validate"
                                id="user-Telefono" name="user-Telefono" placeholder="Telefono">
                            <!-- invalid to display wrong data input -->
                        </div>
                    </div>
                </div>
                
                <div class="row btn-color-cyan btn-txt-color-light btn-txt-color-light-hover">
                    <button type="submit" name="submit" class="mx-auto btn waves-button waves-float waves-teal radius-50"
                        id="startValidate">Log in</button>
                </div>
            </div>
            <!--<div class="modal-footer ">
                <button type="button " class="btn btn-secondary " data-dismiss="modal ">Close</button>
                <button type="button " class="btn btn-primary ">Save changes</button>
            </div>-->
        </div>
    </div>
</div>
</form>
<script type="text/javascript">
    $("form").submit(function( event ) {
    $(".validate").each(function(){ validateField($(this)); });
    });
</script>