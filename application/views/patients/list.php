<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>


        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/patients_list.css">

        <div class="patients-list-container">
            <ul class="list-group list-group-flush patients-list">
                <?php 
                    foreach($patients_list as $patient)
                    {
                        echo '<li class="list-group-item form-row item" data-id="'.$patient->id.'">
                                <div class="form-row infs" data-toggle="modal" data-target="#patient-info" \
                                    type="button" data-backdrop="static" keyboard="false" onclick="javascript: requestPatientData(this);">
                                    <div class="info">
                                        <label for="name-info">Nome:</label>
                                        <span id="name-info">'.$patient->name.'</span>
                                    </div>
                                    <div class="info">
                                        <label for="cpf-info">CPF:</label>
                                        <span id="cpf-info">'.$patient->cpf.'</span>
                                    </div>
                                </div>
                                <div class="form-row opts">
                                    <div>
                                        <i class="fas fa-user-edit icon edit light-shadow"\
                                            onclick="javascript: editOption(this);"></i>
                                    </div>
                                    <div>
                                        <i class="fas fa-trash-alt icon delete light-shadow"\
                                            onclick="javascript: deleteOption(this);"></i>
                                    </div>
                                </div>
                            </li>';
                    }
                ?>
            </ul>
        </div>


        <div id="patient-info" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title">Paciente</h6>
                    </div>
                    <div class="modal-body" id="data-modal-body"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" \
                            onclick="javascript: closeOption(this, '#data-modal-body');">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <div id="patient-photo" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                        <h6 class="modal-title">Foto</h6>
                    </div>
                    <div class="modal-body" id="photo-modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" \
                            onclick="javascript: closeOption(this, '#photo-modal-body');">Close</button>
                    </div>
                </div>
            </div>
        </div>


        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script> 
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" \
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
        </script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/nav.js" ></script>

        <script>
            
            function requestPatientData(element){
                let uri = "<?php echo base_url('patient');?>";
                let id = element.parentElement.dataset.id;            
                $.post(uri, {id: id}, function(response){
                    let patientDataItem = window.document.createElement('ul');
                    patientDataItem.setAttribute('class', 'list-group  ppt');
                    patientDataItem.setAttribute('data-id', response.id);
                    patientDataItem.innerHTML = `
                        <li class="list-group-item see-photo" data-has="${response.photo}"\
                            data-toggle="modal" data-target="#patient-photo"\
                            onclick="javascript: requestPatientPhoto(this);">Ver foto</li>
                        <li class="list-group-item title">Pessoais</li>
                        <li class="list-group-item">Nome: ${response.name}</li>
                        <li class="list-group-item">Nascimento: ${response.birthday}</li>
                        <li class="list-group-item">CPF: ${response.cpf}</li>
                        <li class="list-group-item">Sexo: ${response.gender}</li>
                        <li class="list-group-item">Telefone: ${response.phone_number}</li>
                        <li class="list-group-item title">Parentais</li>
                        <li class="list-group-item">Nome da Mãe: ${response.mother_name}</li>
                        <li class="list-group-item">Nome do Pai: ${response.father_name}</li>
                        <li class="list-group-item title">Endereço</li>
                        <li class="list-group-item">CEP: ${response.cep}</li>
                        <li class="list-group-item">Bairro: ${response.neighborhood}</li>
                        <li class="list-group-item">Rua: ${response.street} - Número: ${response.house_number}</li>
                        <li class="list-group-item">Cidade: ${response.city}</li>
                        <li class="list-group-item">Estado: ${response.state}</li>`;
                    let modalBody = window.document.querySelector('.modal-body');
                    modalBody.appendChild(patientDataItem);
                    let seePhotoOption = window.document.querySelector('.see-photo');
                    if(seePhotoOption.dataset.has === 'false'){
                        let data = window.document.querySelector('.ppt');
                        data.removeChild(seePhotoOption);
                    }       
                }, 'json');
            }

            function closeOption(element, selector)
            {
                let modalBodyRemovel = window.document.querySelector(selector);
                let dataView = window.document.querySelector('.ppt');
                if(dataView){
                    modalBodyRemovel.removeChild(dataView);
                }
            }

            function editOption(element)
            {
                let id = element.parentElement.parentElement.parentElement.dataset.id;
                console.log(id)
            }

            function deleteOption(element)
            {
                let id = element.parentElement.parentElement.parentElement.dataset.id;
                let uri = "<?php echo base_url('delete-patient');?>";
                $.post(uri, {id: id}, function(response)
                {
                    response = JSON.parse(response);
                    if(response.status == 'ok')
                    {
                        let list = window.document.querySelector('.patients-list');
                        let item = window.document.querySelector('.item');
                        list.removeChild(item);
                    }
                })
            }

            function requestPatientPhoto(element)
            {
                let uri = "<?php echo base_url('patient-photo');?>";
                let id = element.parentElement.dataset.id;
                console.log(id);
                $.post(uri, {id: id}, function(response) {
                    console.log(response);
                }, 'json');
                let closeBtnInfo = window.document.querySelector('.btn-danger');
                closeBtnInfo.click();
            }
        </script>
