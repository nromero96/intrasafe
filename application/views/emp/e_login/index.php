            <div class="content">

                <div class="container-fluid">

                    <div class="row">

                        <br><br>

                        <div class="col-sm-4"></div>

                        <div class="col-sm-4">

                            <div class="card">

                                <div class="card-header" data-background-color="blue">

                                    <h3 class="title text-center text-bold">ACCESO</h3>

                                </div>

                                <div class="card-content">

                                    <form id="logForm">

                                        <div class="row">

                                            <div class="col-sm-4"></div>

                                            <div class="col-sm-4">

                                                <div class="text-center">

                                                   <img src="<?php echo base_url(); ?>assets/img/user.png" style="max-width: 96px"> 

                                                </div>

                                            </div>

                                            <div class="col-sm-4"></div>

                                        </div>



                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="form-group label-floating">

                                                    <label class="control-label">Usuario</label>

                                                    <input type="text" class="form-control" name="txtusuario">

                                                </div>

                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="form-group label-floating">

                                                    <label class="control-label">Contraseña</label>

                                                    <input type="password" class="form-control" name="txtpassword" autocomplete="off">

                                                </div>

                                            </div>

                                        </div>

                                        <button type="submit" class="btn btn-success form-control"><span id="logText"></span></button>



                                        <!-- <p class="text-right"><a href="#">¿Olvido su contraseña?</a></p> -->

                                        <div class="clearfix"></div>

                                    </form>

                                </div>

                                <div id="responseDiv" class="alert text-center" style="margin-top:20px; display:none;">

                                    <button type="button" class="close" id="clearMsg"><span aria-hidden="true">&times;</span></button>

                                    <span id="message"></span>

                                </div> 
                            </div>

                                <diV>
                                    <p class="text-center" style="font-size:13px;">Compatible con cualquiera de los siguientes navegadores:<br>
                                        <img style="max-width: 155px;" src="<?php echo base_url(); ?>/assets/img/navegadores-compatibles.png">
                                    </p>
                                </diV>

                        </div>

                        <div class="col-sm-4"></div>

                    </div>

                </div>

            </div>