<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>


        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/patients_register.css">
        <div class="patient-register-form-container">
            <form class="patient-register-form" action="patients-register-action" method="POST" enctype="multipart/form-data">
                <div class="text-center">
                    <img src="<?php echo base_url();?>assets/images/generic.png" class="rounded photo" alt="..." onclick="uploadPhoto();">
                    <input type="file" name="photo" onchange="previewPhoto();" >
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputName">Nome</label>
                        <input type="text" class="form-control" id="inputName" placeholder="Nome completo" name="name" equired>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputBirth">Nascimento</label>
                        <input type="date" class="form-control" id="inputBirth" placeholder="Data de Nascimento" name="birthday" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCPF">CPF</label>
                        <input type="text" class="form-control" id="inputCPF" \
                            onkeydown="javascript: fMasc(this, mCPF);" maxlength="14"\
                            placeholder="EX: 000.000.000-00" name="cpf" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPhone">Telefone</label>
                        <input type="text" class="form-control" id="inputPhone" \
                            onkeydown="javascript: fMasc(this, mPhone);" maxlength="14"\
                            placeholder="Ex: (00) 00000-0000" name="phone_number" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputMotherName">Mãe</label>
                        <input type="text" class="form-control" id="inputMotherName" placeholder="Nome da Mãe" name="mother_name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputFatherName">Pai</label>
                        <input type="text" class="form-control" id="inputFatherName" placeholder="Nome do Pai" name="father_name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputNeighborhood">Bairro</label>
                    <input type="text" class="form-control" id="inputNeighborhood" placeholder="Bairro" name="neighborhood"  required>
                </div>
                <div class="form-group">
                    <label for="inputStreet">Rua</label>
                    <input type="text" class="form-control" id="inputStreet" placeholder="Rua" name="street"  required>
                </div>
                <div class="form-group">
                    <label for="inputHouseNumber">Numero</label>
                    <input type="number" class="form-control" id="inputHouseNumber" placeholder="Número" name="house_number" required>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">Cidade</label>
                        <input type="text" class="form-control" id="inputCity" name="city" equired>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">Estado</label>
                        <select id="inputState" class="form-control" name="state" required>
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
                        <input type="text" class="form-control" id="inputCep" onkeydown="javascript: fMasc(this, mCEP);" maxlength="9" name="cep" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputGender">Sexo</label>
                        <select id="inputGender" class="form-control" name="gender"  required>
                            <option selected>Homem</option>
                            <option>Mulher</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" >Salvar Paciente</button>
            </form>
        </div>


        <script type="text/javascript" src="<?php echo base_url();?>assets/js/patients_register.js"></script>
