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

<!-- Timepicker! -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-timepicker.js"></script>

<!-- BootBox! -->
<script src="<?php echo base_url(); ?>assets/js/bootbox.min.js"></script>

<!--EasyAutocomplete-->
<script src="<?php echo base_url(); ?>assets/js/easyautocomplete/jquery.easy-autocomplete.min.js"></script>

<!-- DataTable -->
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>

<!-- Sweetalert -->
<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>

<!-- Select -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-select.js"></script>


<?php if($this->uri->segment(1) == ''){ ?>
<script src="<?php echo base_url(); ?>assets/login/js/login.js" ></script>
<?php } ?>


<?php if($this->uri->segment(1) == 'empresas' or $this->uri->segment(1) == 'personasnaturales'){ ?>
<script src="<?php echo base_url(); ?>assets/empresa/js/empresa.js"></script>    
<?php } ?>


<?php if($this->uri->segment(1) == 'empresas_registro_online'){ ?>
<script src="<?php echo base_url(); ?>assets/empresa/js/empresa.js"></script>    
<?php } ?>

<?php if($this->uri->segment(1) == 'alumnos'){ ?>
<script src="<?php echo base_url(); ?>assets/alumno/js/alumno.js"></script>    
<?php } ?>

<?php if($this->uri->segment(1) == 'certificados-internacionales'){ ?>
<script src="<?php echo base_url(); ?>assets/certificado/js/certificados-internacional.js"></script>
<?php } ?>


<?php if($this->uri->segment(1) == 'cursos'){ ?>
    <script src="https://cdn.tiny.cloud/1/nk8hyrtbwufu4vj2owfxl9shdmlc48wf8adgpzc9l70bnron/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script src="<?php echo base_url(); ?>assets/curso/js/curso.js" ></script>
<?php } ?>


<?php if($this->uri->segment(1) == 'reservas'){ ?>
<script src="<?php echo base_url(); ?>assets/reserva/js/reserva.js" ></script>
<?php } ?>

<?php if($this->uri->segment(1) == 'grp_em'){ ?>
<script src="<?php echo base_url(); ?>assets/grp/js/grp.js" ></script>
<?php } ?>

<?php if($this->uri->segment(1) == 'grp_em' && $this->uri->segment(2) == 'grupos'){ ?>
<script src="<?php echo base_url(); ?>assets/grp/js/grp_grupos.js" ></script>
<?php } ?>

<?php if($this->uri->segment(1) == 'grp_pn'){ ?>
<script src="<?php echo base_url(); ?>assets/grp/js/grp.js" ></script>
<?php } ?>

<?php if($this->uri->segment(1) == 'grp_cs'){ ?>
<script src="<?php echo base_url(); ?>assets/grp/js/grp_cs.js" ></script>
<?php } ?>

<?php if($this->uri->segment(1) == 'grp_pn' && $this->uri->segment(2) == 'grupos'){ ?>
<script src="<?php echo base_url(); ?>assets/grp/js/grp_grupos.js" ></script>
<?php } ?>

<?php if($this->uri->segment(2) == 'curso'){ ?>
<script src="<?php echo base_url(); ?>assets/grp/js/grp_cs_curso.js" ></script>
<?php } ?>

<?php if($this->uri->segment(1) == 'crear_reserva'){ ?>
<script src="<?php echo base_url(); ?>assets/reserva/js/crear_reserva.js" ></script>
<?php } ?>


<?php if($this->uri->segment(1) == 'bancos'){ ?>
<script src="<?php echo base_url(); ?>assets/banco/js/banco.js" ></script>
<?php } ?>


<?php if($this->uri->segment(1) == 'capacitadores'){ ?>
<script src="<?php echo base_url(); ?>assets/capacitador/js/capacitador.js" ></script>
<?php } ?>

<?php if($this->uri->segment(1) == 'settings'){ ?>
<script src="<?php echo base_url(); ?>assets/setting/js/setting.js" ></script>
<?php } ?>

<?php if($this->uri->segment(1) == 'perfil'){ ?>
<script src="<?php echo base_url(); ?>assets/perfil/js/perfil.js" ></script>
<?php } ?>

<?php if($this->uri->segment(2) == 'alumcurs'){ ?>
<script src="<?php echo base_url(); ?>assets/rpt/js/alumcurs.js" ></script>
<?php } ?>

<?php if($this->uri->segment(2) == 'alumcurs' && $this->uri->segment(3) == 'curso' ){ ?>
<script src="<?php echo base_url(); ?>assets/rpt/js/alumcurs_curso.js" ></script>
<?php } ?>

<?php if($this->uri->segment(2) == 'alumcert'){ ?>
<script src="<?php echo base_url(); ?>assets/rpt/js/alumcert.js" ></script>
<?php } ?>

<?php if($this->uri->segment(2) == 'pagos_empresas'){ ?>
<script src="<?php echo base_url(); ?>assets/rpt/js/pagos_empresas.js" ></script>
<?php } ?>

<?php if($this->uri->segment(2) == 'pagos_personas_natural'){ ?>
<script src="<?php echo base_url(); ?>assets/rpt/js/pagos_personas_natural.js" ></script>
<?php } ?>

</html>