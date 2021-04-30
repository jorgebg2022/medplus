

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" \
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" \
    crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url('assets/css/patients_register.css'); ?>">

<?php 
    $base = base_url();
    echo '<div class="patient-register-form-container" data-id="'.$doctor['id'].'">
            <form class="patient-register-form" action="patients-register-action" \
                method="POST" enctype="multipart/form-data">
                <div class="text-center">
                    <img src="'.$base.'/assets/images/generic.png" \
                        class="rounded photo" alt="..." onclick="uploadPhoto();">
                    <input type="file" name="photo" onchange="previewPhoto();">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputName">Nome</label>
                        <input type="text" class="form-control" id="inputName" \
                            placeholder="Nome completo" name="name" value="'.$doctor['name'].'" equired>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCPF">CPF</label>
                        <input type="text" class="form-control" id="inputCPF" \
                            onkeydown="javascript: fMasc(this, mCPF);" maxlength="14"\
                            placeholder="EX: 000.000.000-00" name="cpf" value="'.$doctor['cpf'].'" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" >Salvar Edição</button>
            </form>
        </div>'
?>

<script type="text/javascript" src="<?php echo base_url('assets/js/cpf_mask.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/photo_handle.js');?>"></script>