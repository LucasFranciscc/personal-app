<?php $v->layout("_theme"); ?>

<div class="card">
    <div class="card-body py-2 my-25">
        <!-- header section -->

        <!--/ header section -->

        <!-- form -->
        <form class="validate-form mt-2 pt-50" action="<?= url("editUser"); ?>">



            <div class="d-flex">
                <a href="#" class="me-25">
                  <?php if ($student->photo != null): ?>
                      <img src="<?= urlExterna("/storage/$student->photo"); ?>" id="account-upload-img"
                           class="uploadedAvatar rounded me-50" alt="profile image" height="100" width="100"/>
                  <?php endif; ?>
                </a>
                <!-- upload and reset button -->
                <div class="d-flex align-items-end mt-75 ms-1">
                    <div>
                        <label for="photo" class="btn btn-sm btn-primary mb-75 me-75">Enviar foto</label>
                        <input type="file" id="photo" name="photo" hidden accept="image/*"/>
                    </div>
                </div>
                <!--/ upload and reset button -->
            </div>

            <div class="row">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="user_id" value="<?= $student->id ?>">
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="name">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $student->name ?>"/>
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="birth">Data de Nascimento</label>
                    <input type="text" class="form-control mask-date" id="birth" name="birth"
                           value="<?= date_fmt($student->birth, "d/m/Y") ?>"/>
                </div>
                <div class=" col-12 col-sm-6 mb-1">
                    <label class="form-label" for="phone">Telefone</label>
                    <input type="text" class="form-control mask-phone" id="phone" name="phone"
                           value="<?= $student->phone ?>"/>
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="sex">Sexo</label>
                    <select id="sex" name="sex" class="select2 form-select">
                        <option <?= $student->sex == "Masculino" ? "selected" : "" ?> value="Masculino">Masculino
                        </option>
                        <option <?= $student->sex == "Feminino" ? "selected" : "" ?> value="Feminino">Feminino</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="cpf" for="accountPhoneNumber">CPF</label>
                    <input type="text" class="form-control account-number-mask" id="cpf" name="cpf"
                           value="<?= $student->cpf ?>"/>
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="form-label" for="profession">Profissão</label>
                    <input type="text" class="form-control" id="profession" name="profession"
                           value="<?= $student->profession ?>"/>
                </div>
                <div class="col-12 col-sm-6 mb-1">
                    <label class="password" for="accountPhoneNumber">Senha</label>
                    <input type="password" class="form-control account-number-mask" id="password" name="password"/>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary mt-1 me-1">Salvar</button>
                </div>
            </div>
        </form>
        <!--/ form -->
    </div>
</div>