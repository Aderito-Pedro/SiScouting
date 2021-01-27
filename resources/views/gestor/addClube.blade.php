@extends('layouts.main')

@section('admin', $user->name)
@section('conteudo')

<div id="page-content">
    <!-- Wizard Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-magic"></i>Form Wizard<br><small>Break easily your forms into steps!</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Forms</li>
        <li><a href="">Wizard</a></li>
    </ul>
    <!-- END Wizard Header -->

    <!-- Progress Bar Wizard Block -->

    <!-- Wizards Row -->
    <div class="row">
        <div class="col">
            <!-- Wizard with Validation Block -->
            <div class="block">
                <!-- Wizard with Validation Title -->
                <div class="block-title">
                    <h2><strong>Validation</strong> Wizard</h2>
                </div>
                <!-- END Wizard with Validation Title -->

                <!-- Wizard with Validation Content -->
                <form id="advanced-wizard" action="page_forms_wizard.php" method="post" class="form-horizontal form-bordered">
                    <!-- First Step -->
                    <div id="advanced-first" class="step">
                        <!-- Step Info -->
                        <div class="wizard-steps">
                            <div class="row">
                                <div class="col-xs-6 active">
                                    <span>1º Passo</span>
                                </div>
                                <div class="col-xs-6">
                                    <span>2º Passe</span>
                                </div>
                            </div>
                        </div>
                        <!-- END Step Info -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_username">Nome do Clube <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="val_username" name="clube" class="form-control" placeholder="Nome do Clube.." required>
                                    <span class="input-group-addon"><i class="fa fa-shirtsinbulk"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_email">Email <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="val_email" name="email" class="form-control" placeholder="test@example.com" required>
                                    <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_username">Fundador do Clube <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="val_username" name="fundador" class="form-control" placeholder="Nome do Fundador.." required>
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-file-input">Emblema</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="file" id="example-file-input" name="emplema">

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-file-input">Data de Fundação <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="example-datepicker3" name="data_fundacao" class="form-control input-datepicker" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
                                    <span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_skill">Localização <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select id="val_skill" name="val_skill" class="form-control">
                                    <option value="">Escolha Provincia</option>
                                    <option value="html">HTML</option>
                                    <option value="css">CSS</option>
                                    <option value="javascript">Javascript</option>
                                    <option value="php">PHP</option>
                                    <option value="mysql">MySQL</option>
                                </select>
                                <select id="val_skill" name="val_skill" class="form-control">
                                    <option value="">Escolha Municipio</option>
                                    <option value="html">HTML</option>
                                    <option value="css">CSS</option>
                                    <option value="javascript">Javascript</option>
                                    <option value="php">PHP</option>
                                    <option value="mysql">MySQL</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- END First Step -->

                    <!-- Second Step -->
                    <div id="advanced-second" class="step">
                        <!-- Step Info -->
                        <div class="wizard-steps">
                            <div class="row">
                                <div class="col-xs-6 done">
                                    <span>1º Passo</span>
                                </div>
                                <div class="col-xs-6 active">
                                    <span>2º Passo</span>
                                </div>
                            </div>
                        </div>
                        <!-- END Step Info -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_username">Escalão <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="val_username" name="escalao" class="form-control" placeholder="Escalão.." required>
                                    <span class="input-group-addon"><i class="fa fa-circle-o-notchr"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_username">Epoca <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="val_username" name="epoca" class="form-control" placeholder="Epoca.." required>
                                    <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_username">Estadio <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="val_username" name="estadio" class="form-control" placeholder="Estadio.." required>
                                    <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-advanced-bio">Descrição</label>
                            <div class="col-md-8">
                                <textarea id="example-advanced-bio" name="example-advanced-bio" rows="6" class="form-control" placeholder="Tell us your story.."></textarea>
                            </div>
                        </div>

                    </div>
                    <!-- END Second Step -->

                    <!-- Form Buttons -->
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-4">
                            <input type="reset" class="btn btn-sm btn-warning" id="back2" value="">
                            <input type="submit" class="btn btn-sm btn-primary" id="next2" value="Seguite">
                        </div>
                    </div>
                    <!-- END Form Buttons -->
                </form>
                <!-- END Wizard with Validation Content -->
            </div>
            <!-- END Wizard with Validation Block -->
        </div>
    </div>
    <!-- END Wizards Row -->

    <!-- Clickable Wizard Block -->


</div>

@endsection
