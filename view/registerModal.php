<form id="validated" action="success.php" method="post"></form><!-- viene utilizzato se il login è avvenuto correttamente -->
<div id="registerModal">
<div class="modal fade" id="modal" tabindex="-1" role="dialog" style="color: black; text-shadow: none;">
    <div class="modal-dialog modal-dialog-centered" role="document ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginLabel">Register</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-2 txt-dark m-t-10" field="Email">
                            <div class="input-group-prepend">
                                <div class="input-group-text radius-50 bg-none border-none"><label class="fas fa-at flat-icon"></label></div>
                            </div>
                            <input type="text" class="form-control radius-0 bg-none border-none border-bottom focused validate"
                                id="user_email" placeholder="Email">
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
                                id="user_password" placeholder="Password">
                            <!-- invalid to display wrong data input -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-2 txt-dark m-t-10" field="Username">
                            <div class="input-group-prepend">
                                <div class="input-group-text radius-50 bg-none border-none"><label class="fas fa-user flat-icon"></label></div>
                            </div>
                            <input type="text" class="form-control radius-0 bg-none border-none border-bottom focused validate"
                                id="user_username" placeholder="Username">
                            <!-- invalid to display wrong data input -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-2 txt-dark m-t-10" field="Nome">
                            <div class="input-group-prepend">
                                <div class="input-group-text radius-50 bg-none border-none"><label class="fas fa-signature flat-icon"></label></div>
                            </div>
                            <input type="text" class="form-control radius-0 bg-none border-none border-bottom focused validate"
                                id="user_name" placeholder="Nome">
                            <!-- invalid to display wrong data input -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-2 txt-dark m-t-10" field="Cognome">
                            <div class="input-group-prepend">
                                <div class="input-group-text radius-50 bg-none border-none"><label class="fas fa-signature flat-icon"></label></div>
                            </div>
                            <input type="text" class="form-control radius-0 bg-none border-none border-bottom focused validate"
                                id="user_surname" placeholder="Cognome">
                            <!-- invalid to display wrong data input -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-2 txt-dark m-t-10" field="DocumentoIdentita">
                            <div class="input-group-prepend">
                                <div class="input-group-text radius-50 bg-none border-none"><label class="fas fa-id-card flat-icon"></label></div>
                            </div>
                            <input type="text" class="form-control radius-0 bg-none border-none border-bottom focused validate"
                                id="user_DocumentoIdentita" placeholder="DocumentoIdentita">
                            <!-- invalid to display wrong data input -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-2 txt-dark m-t-10" field="Fotografia">
                            <div class="input-group-prepend">
                                <div class="input-group-text radius-50 bg-none border-none"><label class="fas fa-file-image flat-icon"></label></div>
                            </div>
                            <input type="text" class="form-control radius-0 bg-none border-none border-bottom focused validate"
                                id="user_photo" placeholder="Fotografia">
                            <!-- invalid to display wrong data input -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-2 txt-dark m-t-10" field="Telefono">
                            <div class="input-group-prepend">
                                <div class="input-group-text radius-50 bg-none border-none"><label class="fas fa-phone flat-icon"></label></div>
                            </div>
                            <input type="text" class="form-control radius-0 bg-none border-none border-bottom focused validate"
                                id="user_phonenumber" placeholder="Telefono">
                            <!-- invalid to display wrong data input -->
                        </div>
                    </div>
                </div>
                
                <div class="row btn-color-cyan btn-txt-color-light btn-txt-color-light-hover">
                    <button class="mx-auto btn waves-button waves-float waves-teal radius-50"
                        id="startValidate">Register</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#startValidate").click(function () {
            var validated = true;//controllo se i campi sono validi secondo gli standard nel client
            $(".validate").each(function(){
                if(validateField($(this))===false && validated === true){validated=false}
            });
            
            if(validated){
                $(this).prepend("<span class='spinner-border spinner-border-sm spinner_loader'></span>");
                $(this).attr("disabled", "disabled");//disabling button prevent double press

                $.post("index.php?controller=registerController&action=check",
                    {
                        user_email: $("#user_email").val(),
                        user_password: $("#user_password").val(),
                        user_username: $("#user_username").val(),
                        user_name: $("#user_name").val(),
                        user_surname: $("#user_surname").val(),
                        user_DocumentoIdentita: $("#user_DocumentoIdentita").val(),
                        user_photo: $("#user_photo").val(),
                        user_phonenumber: $("#user_phonenumber").val(),
                        submit: "true"
                    },
                    function (data, status) {
                        // da trasformare data in formato json
                        let temp = data.match(new RegExp("registerController(.*)registerController"));
                        data = temp!==null?temp[1]:null;//data viene persa con l'override

                        if(data!==null){
                            var status = JSON.parse(data);
                            if(status.status===true){
                                //faccio il submit del form che mi porta a success.php
                                $("#validated").submit();
                            }
                        }

                        //load the error pupup
                        loadPopup();
                        //reset the fields
                        $("#user_email").val(""),
                        $("#user_password").val(""),
                        $("#user_username").val(""),
                        $("#user_name").val(""),
                        $("#user_surname").val(""),
                        $("#user_DocumentoIdentita").val(""),
                        $("#user_photo").val(""),
                        $("#user_phonenumber").val(""),

                        $("#startValidate").children(".spinner_loader").remove();
                        $("#startValidate").removeAttr("disabled");
                    });
            }
        });
            
    });
</script>
