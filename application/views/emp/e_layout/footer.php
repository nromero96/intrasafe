<footer class="footer">

                <div class="container-fluid">

                    <p class="copyright pull-right">

                        &copy;

                        <script>

                            document.write(new Date().getFullYear())

                        </script>

                        <a href="https://safesi.com">SAFESI </a>

                    </p>

                </div>
            </footer>
        </div>
    </div>
</body>

<script>
    baseUrl = "<?php echo base_url(); ?>";
</script>

<!--   Core JS Files   -->
<script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/js/material.min.js" type="text/javascript"></script>

<!--  Charts Plugin -->
<script src="<?php echo base_url(); ?>assets/js/chartist.min.js"></script>

<!--  Dynamic Elements plugin -->
<script src="<?php echo base_url(); ?>assets/js/arrive.min.js"></script>

<!--  PerfectScrollbar Library -->
<script src="<?php echo base_url(); ?>assets/js/perfect-scrollbar.jquery.min.js"></script>

<!--  Notifications Plugin    -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.js"></script>

<!-- Material Dashboard javascript methods -->
<script src="<?php echo base_url(); ?>assets/js/material-dashboard.js?v=1.2.0"></script>

<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="<?php echo base_url(); ?>assets/js/demo.js"></script>

<!-- Datapicker! -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>

<!--EasyAutocomplete-->
<script src="<?php echo base_url(); ?>assets/js/easyautocomplete/jquery.easy-autocomplete.min.js"></script>

<!-- BootBox! -->
<script src="<?php echo base_url(); ?>assets/js/bootbox.min.js"></script>

<!-- DataTable -->
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>

<!-- Sweetalert -->
<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>





<?php if($this->uri->segment(1) == 'emp' && $this->uri->segment(2) == 'e_alumnos'){ ?>
<script src="<?php echo base_url(); ?>assets/alumno/js/alumnoEmpresa.js"></script> 
<?php } ?>

<?php if($this->uri->segment(1) == 'emp' && $this->uri->segment(2) == 'e_cursos'){ ?>
<script src="<?php echo base_url(); ?>assets/curso/js/cursoEmpresa.js" ></script>
<?php } ?>

<?php if($this->uri->segment(1) == 'emp' && $this->uri->segment(2) == 'e_grupos' ){ ?>
<script src="<?php echo base_url(); ?>assets/grupo/js/grupoEmpresa.js"></script>    
<?php } ?>

<?php if($this->uri->segment(1) == 'emp' && $this->uri->segment(2) == 'e_perfil' ){ ?>
<script src="<?php echo base_url(); ?>assets/perfil/js/perfil_empresa.js"></script>    
<?php } ?>

<?php if($this->uri->segment(1) == 'emp' && $this->uri->segment(2) == ''){ ?>
<script src="<?php echo base_url(); ?>assets/login/js/loginEmpresa.js"></script>    
<?php } ?>

<?php if($this->uri->segment(2) == 'e_rpt' && $this->uri->segment(3) == 'listacursos' && $this->uri->segment(4) == '' ){ ?>
<script src="<?php echo base_url(); ?>assets/rpt/js/emp_listacursos.js"></script>    
<?php } ?>

<?php if($this->uri->segment(2) == 'e_rpt' && $this->uri->segment(3) == 'listacursos' && $this->uri->segment(4) == 'curso' ){ ?>
<script src="<?php echo base_url(); ?>assets/rpt/js/emp_listacursos_curso.js"></script>    
<?php } ?>

</html>