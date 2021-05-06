<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" \
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" \
    crossorigin="anonymous">

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/form.css">

<?php 
    $photo = base_url('assets/images/generic.png');
    if($patient['photo'] !== null)
    {
        $photo = base_url('uploads/'.$patient['photo']);
    }
    echo '<div class="patient-register-form-container">
            <form class="patient-register-form" action="'.base_url('patients-update-action').'" \
            method="POST" enctype="multipart/form-data">
                <div class="text-center">
                    <img src="'.$photo.'" class="rounded photo" alt="..." onclick="uploadPhoto();">
                    <input type="file" name="photo" onchange="previewPhoto();" >
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputName">Nome</label>
                        <input type="text" class="form-control" id="inputName" \
                            placeholder="Nome completo" name="name" value="'.$patient['name'].'" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputBirth">Nascimento</label>
                        <input type="date" class="form-control" id="inputBirth" \
                            placeholder="Data de Nascimento" name="birthday" value="'.$patient['birthday'].'" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCPF">CPF</label>
                        <input type="text" class="form-control" id="inputCPF" \
                            onkeydown="javascript: fMasc(this, mCPF);" maxlength="14"\
                            placeholder="EX: 000.000.000-00" name="cpf" value="'.$patient['cpf'].'" readonly required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPhone">Telefone</label>
                        <input type="text" class="form-control" id="inputPhone" \
                            onkeydown="javascript: fMasc(this, mPhone);" maxlength="14"\
                            placeholder="Ex: (00) 00000-0000" name="phone_number" \
                                value="'.$patient['phone_number'].'" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputMotherName">Mãe</label>
                        <input type="text" class="form-control" id="inputMotherName" placeholder="Nome da Mãe" \
                            name="mother_name" value="'.$patient['mother_name'].'">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputFatherName">Pai</label>
                        <input type="text" class="form-control" id="inputFatherName" placeholder="Nome do Pai" \
                            name="father_name" value="'.$patient['father_name'].'">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNeighborhood">Bairro</label>
                    <input type="text" class="form-control" id="inputNeighborhood" placeholder="Bairro" \
                        name="neighborhood" value="'.$patient['neighborhood'].'" required>
                </div>
                <div class="form-group">
                    <label for="inputStreet">Rua</label>
                    <input type="text" class="form-control" id="inputStreet" placeholder="Rua" \
                        name="street" value="'.$patient['street'].'" required>
                </div>
                <div class="form-group">
                    <label for="inputHouseNumber">Numero</label>
                    <input type="number" class="form-control" id="inputHouseNumber" \
                        placeholder="Número" name="house_number" \
                        value="'.$patient['house_number'].'" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Cidade</label>
                        <input type="text" class="form-control" id="inputCity" name="city" \
                            value="'.$patient['city'].'" equired>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Estado</label>
                        <select id="inputState" class="form-control" name="state" \
                            value="'.$patient['state'].'" required>
                            <option value="AC">Acre</option>
                            <option value="AL">Alagoas</option>
                            <option value="AP">Amapá</option>
                            <option value="AM">Amazonas</option>
                            <option value="BA">Bahia</option>
                            <option value="CE">Ceará</option>
                            <option value="DF">Distrito Federal</option>
                            <option value="ES">Espírito Santo</option>
                            <option value="GO">Goiás</option>
                            <option value="MA">Maranhão</option>
                            <option value="MT">Mato Grosso</option>
                            <option value="MS">Mato Grosso do Sul</option>
                            <option value="MG">Minas Gerais</option>
                            <option value="PA">Pará</option>
                            <option value="PB">Paraíba</option>
                            <option value="PR">Paraná</option>
                            <option value="PE">Pernambuco</option>
                            <option value="PI">Piauí</option>
                            <option value="RJ">Rio de Janeiro</option>
                            <option value="RN">Rio Grande do Norte</option>
                            <option value="RS">Rio Grande do Sul</option>
                            <option value="RO">Rondônia</option>
                            <option value="RR">Roraima</option>
                            <option value="SC">Santa Catarina</option>
                            <option value="SP">São Paulo</option>
                            <option value="SE">Sergipe</option>
                            <option value="TO">Tocantins</option>
                            <option value="EX">Estrangeiro</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputCep">CEP</label>
                        <input type="text" class="form-control" id="inputCep" \
                            onkeydown="javascript: fMasc(this, mCEP);" maxlength="9" \
                            name="cep" value="'.$patient['cep'].'" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputGender">Sexo</label>
                        <select id="inputGender" class="form-control" name="gender" \
                            value="'.$patient['gender'].'" required>
                            <option selected>Homem</option>
                            <option>Mulher</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary" >Salvar edição</button>
                    </div>
                    <div class="form-group col-md-6">
                        <a href="'.base_url('/patients').'">
                            <button type="button" class="btn btn-danger" >Cancelar</button>
                        </a>        
                    </div> 
                </div>
            </form>
        </div> ';
?>

<script type="text/javascript" src="<?php echo base_url('assets/js/form.js');?>"></script>