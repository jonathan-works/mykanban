<html lang="pt">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="resources/assets/js/components"></script>
    <script src="https://unpkg.com/vue"></script>
    <title>Atividades</title>
</head>

<body class="fixed-nav sticky-footer">
<div class="container-fluid">
    <div class="row flex-xl-nowrap">
        <div class="col-12 col-md-2 bd-sidebar bg-dark">
            <div class="text-white">
                <h1 style="font-family:'Segoe UI Historic'">Atividades</h1>
            </div>
            <form action="/salvaratividades">
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Atividade</span>
                    </div>
                    <input name="iptAtividades" type="text" class="form-control" aria-label="Small"
                           aria-describedby="inputGroup-sizing-sm">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Descrição</span>
                    </div>
                    <input name="iptDescricaoAtividades" type="text" class="form-control" aria-label="Small"
                           aria-describedby="inputGroup-sizing-sm">
                </div>
                <div class="row">

                    <button type="submit" class="btn btn-secondary" style="margin-left: 15px !important;">Enviar
                    </button>

                </div>
            </form>
        </div>

        <div class="col-12 col-md-10 bd-content bg-light">
            <div class="row">

                <div class="col-12 mt-3 mb-3">
                    <div clas="row flex-xl-nowrap">
                        <div class="col-12 col-md-7">
                            <div class="jumbotron">
                                <h1 class="display-4">My Kanban</h1>
                                <p class="lead">Todas as atividades.</p>

                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-12 col-md-3 mt-3 mb-3">
                    <div class="card mb-3 bg-white" style="max-width: 18rem;">
                        <div class="card-header text-center"><h3>ToDo</h3></div>
                    </div>
                    <?php $__currentLoopData = $listas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $atividade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($atividade -> tipo == "ToDo"): ?>
                                <div class="card text-white mb-3 <?php switch($atividade -> tipo):
                                case ("ToDo"): ?>
                                        bg-secondary
<?php break; ?>
                                <?php case ("Doing"): ?>
                                        bg-warning
<?php break; ?>
                                <?php case ("Done"): ?>
                                        bg-success
<?php break; ?>
                                <?php case ("Pending"): ?>
                                        bg-danger
<?php break; ?>
                                <?php endswitch; ?>
                                        bg-secondary " style="max-width: 18rem;">
                                    <form action="/apagaratividade/<?php echo e($atividade->id); ?>">
                                        <input Id="id" value="<?php echo e($atividade->id); ?>" type="hidden">
                                        <div class="row" style="padding: 0 14px 14px ">
                                            <div class="col-7 card-header"
                                                 id="Ativ<?php echo e($atividade->id); ?>"><?php echo e($atividade-> atividade); ?></div>
                                            <div class="col-5 card-header  btn-group dropright ">
                                                <button id="ddlTipo" type="button"
                                                        class="btn btn-secondary dropdown-toggle btn-sm"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <?php echo e($atividade->tipo); ?>

                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                       onclick="tipo( ['<?php echo e($atividade->id); ?>'],'ToDo');">ToDo</a>
                                                    <a class="dropdown-item"
                                                       onclick="tipo(['<?php echo e($atividade->id); ?>'],'Doing');">Doing</a>
                                                    <a class="dropdown-item"
                                                       onclick="tipo(['<?php echo e($atividade->id); ?>'],'Done');">Done</a>
                                                    <a class="dropdown-item"
                                                       onclick="tipo(['<?php echo e($atividade->id); ?>'],'Pending');">Pending</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ml-3 mr-3">
                                            <input id="iptAtiv<?php echo e($atividade->id); ?>" style="position: absolute;"
                                                   type="text"
                                                   class="form-control invisible" aria-label="Small"
                                                   aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="card-body">
                                            <p id="AtivDesc<?php echo e($atividade->id); ?>"
                                               class="card-text"><?php echo e($atividade-> descricaoatividade); ?> </p>
                                            <div class="mb-3">
                                                <input id="iptAtivDesc<?php echo e($atividade->id); ?>" style="position: absolute;"
                                                       type="text" class="form-control invisible" aria-label="Small"
                                                       aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                            <button id="Apagar<?php echo e($atividade->id); ?>" type="submit"
                                                    class="btn btn-outline-light">Apagar
                                            </button>
                                            <button id="Editar<?php echo e($atividade->id); ?>" type="button"
                                                    onclick="editar(<?php echo e($atividade->id); ?>);"
                                                    class="btn btn-outline-light">
                                                Editar
                                            </button>
                                            <button id="Cancelar<?php echo e($atividade->id); ?>" type="button"
                                                    onclick="editar(<?php echo e($atividade->id); ?>);"
                                                    class="btn btn-outline-light invisible">Cancelar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="col-12 col-md-3 mt-4">
                    <div class="card mb-3 bg-white" style="max-width: 18rem;">
                        <div class="card-header text-center"><h3>Doing</h3></div>
                    </div>
                    <?php $__currentLoopData = $listas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $atividade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($atividade -> tipo == "Doing"): ?>
                                <div class="card text-white mb-3 <?php switch($atividade -> tipo):
                                case ("ToDo"): ?>
                                        bg-secondary
<?php break; ?>
                                <?php case ("Doing"): ?>
                                        bg-warning
<?php break; ?>
                                <?php case ("Done"): ?>
                                        bg-success
<?php break; ?>
                                <?php case ("Pending"): ?>
                                        bg-danger
<?php break; ?>
                                <?php endswitch; ?>
                                        bg-secondary " style="max-width: 18rem;">
                                    <form action="/apagaratividade/<?php echo e($atividade->id); ?>">
                                        <input Id="id" value="<?php echo e($atividade->id); ?>" type="hidden">
                                        <div class="row" style="padding: 0 14px 14px ">
                                            <div class="col-7 card-header"
                                                 id="Ativ<?php echo e($atividade->id); ?>"><?php echo e($atividade-> atividade); ?></div>
                                            <div class="col-5 card-header  btn-group dropright ">
                                                <button id="ddlTipo" type="button"
                                                        class="btn btn-secondary dropdown-toggle btn-sm"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <?php echo e($atividade->tipo); ?>

                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                       onclick="tipo( ['<?php echo e($atividade->id); ?>'],'ToDo');">ToDo</a>
                                                    <a class="dropdown-item"
                                                       onclick="tipo(['<?php echo e($atividade->id); ?>'],'Doing');">Doing</a>
                                                    <a class="dropdown-item"
                                                       onclick="tipo(['<?php echo e($atividade->id); ?>'],'Done');">Done</a>
                                                    <a class="dropdown-item"
                                                       onclick="tipo(['<?php echo e($atividade->id); ?>'],'Pending');">Pending</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ml-3 mr-3">
                                            <input id="iptAtiv<?php echo e($atividade->id); ?>" style="position: absolute;"
                                                   type="text"
                                                   class="form-control invisible" aria-label="Small"
                                                   aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="card-body">
                                            <p id="AtivDesc<?php echo e($atividade->id); ?>"
                                               class="card-text"><?php echo e($atividade-> descricaoatividade); ?> </p>
                                            <div class="mb-3">
                                                <input id="iptAtivDesc<?php echo e($atividade->id); ?>" style="position: absolute;"
                                                       type="text" class="form-control invisible" aria-label="Small"
                                                       aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                            <button id="Apagar<?php echo e($atividade->id); ?>" type="submit"
                                                    class="btn btn-outline-light">Apagar
                                            </button>
                                            <button id="Editar<?php echo e($atividade->id); ?>" type="button"
                                                    onclick="editar(<?php echo e($atividade->id); ?>);"
                                                    class="btn btn-outline-light">
                                                Editar
                                            </button>
                                            <button id="Cancelar<?php echo e($atividade->id); ?>" type="button"
                                                    onclick="editar(<?php echo e($atividade->id); ?>);"
                                                    class="btn btn-outline-light invisible">Cancelar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="col-12 col-md-3 mt-4">
                    <div class="card mb-3 bg-white" style="max-width: 18rem;">
                        <div class="card-header text-center"><h3>Done</h3></div>
                    </div>
                    <?php $__currentLoopData = $listas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $atividade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($atividade -> tipo == "Done"): ?>
                                <div class="card text-white mb-3 <?php switch($atividade -> tipo):
                                case ("ToDo"): ?>
                                        bg-secondary
<?php break; ?>
                                <?php case ("Doing"): ?>
                                        bg-warning
<?php break; ?>
                                <?php case ("Done"): ?>
                                        bg-success
<?php break; ?>
                                <?php case ("Pending"): ?>
                                        bg-danger
<?php break; ?>
                                <?php endswitch; ?>
                                        bg-secondary " style="max-width: 18rem;">
                                    <form action="/apagaratividade/<?php echo e($atividade->id); ?>">
                                        <input Id="id" value="<?php echo e($atividade->id); ?>" type="hidden">
                                        <div class="row" style="padding: 0 14px 14px ">
                                            <div class="col-7 card-header"
                                                 id="Ativ<?php echo e($atividade->id); ?>"><?php echo e($atividade-> atividade); ?></div>
                                            <div class="col-5 card-header  btn-group dropright ">
                                                <button id="ddlTipo" type="button"
                                                        class="btn btn-secondary dropdown-toggle btn-sm"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <?php echo e($atividade->tipo); ?>

                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                       onclick="tipo( ['<?php echo e($atividade->id); ?>'],'ToDo');">ToDo</a>
                                                    <a class="dropdown-item"
                                                       onclick="tipo(['<?php echo e($atividade->id); ?>'],'Doing');">Doing</a>
                                                    <a class="dropdown-item"
                                                       onclick="tipo(['<?php echo e($atividade->id); ?>'],'Done');">Done</a>
                                                    <a class="dropdown-item"
                                                       onclick="tipo(['<?php echo e($atividade->id); ?>'],'Pending');">Pending</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ml-3 mr-3">
                                            <input id="iptAtiv<?php echo e($atividade->id); ?>" style="position: absolute;"
                                                   type="text"
                                                   class="form-control invisible" aria-label="Small"
                                                   aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="card-body">
                                            <p id="AtivDesc<?php echo e($atividade->id); ?>"
                                               class="card-text"><?php echo e($atividade-> descricaoatividade); ?> </p>
                                            <div class="mb-3">
                                                <input id="iptAtivDesc<?php echo e($atividade->id); ?>" style="position: absolute;"
                                                       type="text" class="form-control invisible" aria-label="Small"
                                                       aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                            <button id="Apagar<?php echo e($atividade->id); ?>" type="submit"
                                                    class="btn btn-outline-light">Apagar
                                            </button>
                                            <button id="Editar<?php echo e($atividade->id); ?>" type="button"
                                                    onclick="editar(<?php echo e($atividade->id); ?>);"
                                                    class="btn btn-outline-light">
                                                Editar
                                            </button>
                                            <button id="Cancelar<?php echo e($atividade->id); ?>" type="button"
                                                    onclick="editar(<?php echo e($atividade->id); ?>);"
                                                    class="btn btn-outline-light invisible">Cancelar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="col-12 col-md-3 mt-4">
                    <div class="card mb-3 bg-white" style="max-width: 18rem;">
                        <div class="card-header text-center"><h3>Pending</h3></div>
                    </div>
                    <?php $__currentLoopData = $listas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $collection): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $collection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $atividade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($atividade -> tipo == "Pending"): ?>
                                <div class="card text-white mb-3 <?php switch($atividade -> tipo):
                                case ("ToDo"): ?>
                                        bg-secondary
<?php break; ?>
                                <?php case ("Doing"): ?>
                                        bg-warning
<?php break; ?>
                                <?php case ("Done"): ?>
                                        bg-success
<?php break; ?>
                                <?php case ("Pending"): ?>
                                        bg-danger
<?php break; ?>
                                <?php endswitch; ?>
                                        bg-secondary " style="max-width: 18rem;">
                                    <form action="/apagaratividade/<?php echo e($atividade->id); ?>">
                                        <input Id="id" value="<?php echo e($atividade->id); ?>" type="hidden">
                                        <div class="row" style="padding: 0 14px 14px ">
                                            <div class="col-7 card-header"
                                                 id="Ativ<?php echo e($atividade->id); ?>"><?php echo e($atividade-> atividade); ?></div>
                                            <div class="col-5 card-header  btn-group dropright ">
                                                <button id="ddlTipo" type="button"
                                                        class="btn btn-secondary dropdown-toggle btn-sm"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                    <?php echo e($atividade->tipo); ?>

                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                       onclick="tipo( ['<?php echo e($atividade->id); ?>'],'ToDo');">ToDo</a>
                                                    <a class="dropdown-item"
                                                       onclick="tipo(['<?php echo e($atividade->id); ?>'],'Doing');">Doing</a>
                                                    <a class="dropdown-item"
                                                       onclick="tipo(['<?php echo e($atividade->id); ?>'],'Done');">Done</a>
                                                    <a class="dropdown-item"
                                                       onclick="tipo(['<?php echo e($atividade->id); ?>'],'Pending');">Pending</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ml-3 mr-3">
                                            <input id="iptAtiv<?php echo e($atividade->id); ?>" style="position: absolute;"
                                                   type="text"
                                                   class="form-control invisible" aria-label="Small"
                                                   aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="card-body">
                                            <p id="AtivDesc<?php echo e($atividade->id); ?>"
                                               class="card-text"><?php echo e($atividade-> descricaoatividade); ?> </p>
                                            <div class="mb-3">
                                                <input id="iptAtivDesc<?php echo e($atividade->id); ?>" style="position: absolute;"
                                                       type="text" class="form-control invisible" aria-label="Small"
                                                       aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                            <button id="Apagar<?php echo e($atividade->id); ?>" type="submit"
                                                    class="btn btn-outline-light">Apagar
                                            </button>
                                            <button id="Editar<?php echo e($atividade->id); ?>" type="button"
                                                    onclick="editar(<?php echo e($atividade->id); ?>);"
                                                    class="btn btn-outline-light">
                                                Editar
                                            </button>
                                            <button id="Cancelar<?php echo e($atividade->id); ?>" type="button"
                                                    onclick="editar(<?php echo e($atividade->id); ?>);"
                                                    class="btn btn-outline-light invisible">Cancelar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>


            </div>
            <script language="JavaScript">
                function editar(id) {
                    if (document.getElementById("Editar" + id).textContent == "Editar") {
                        document.getElementById("iptAtiv" + id).className = "form-control";
                        document.getElementById("iptAtiv" + id).style = "";
                        document.getElementById("iptAtiv" + id).value = document.getElementById("Ativ" + id).textContent;
                        document.getElementById("iptAtivDesc" + id).className = "form-control";
                        document.getElementById("iptAtivDesc" + id).style = "";
                        document.getElementById("iptAtivDesc" + id).value = document.getElementById("AtivDesc" + id).textContent;
                        document.getElementById("Ativ" + id).className = "card-header invisible";
                        document.getElementById("AtivDesc" + id).className = "card-text invisible";
                        document.getElementById("Editar" + id).textContent = "Salvar";
                        document.getElementById("Cancelar" + id).className = "btn btn-outline-light";
                    }
                    else if (document.getElementById("Editar" + id).textContent == "Salvar") {

                        document.getElementById("iptAtiv" + id).className = "form-control invisible";
                        document.getElementById("iptAtivDesc" + id).className = "form-control invisible";
                        document.getElementById("iptAtiv" + id).style = "position:absolute";
                        document.getElementById("iptAtivDesc" + id).style = "position:absolute";
                        document.getElementById("Ativ" + id).className = "card-header";
                        document.getElementById("AtivDesc" + id).className = "card-text";
                        document.getElementById("Editar" + id).type = "button";
                        document.getElementById("Editar" + id).textContent = "Editar";
                        document.getElementById("Cancelar" + id).className = "btn btn-outline-light invisible";
                        document.location.href = '/editaratividade/' + id + "/" + document.getElementById("iptAtiv" + i1d).value + "/" + document.getElementById("iptAtivDesc" + id).value;
                    }
                    else {
                        document.getElementById("iptAtiv" + id).className = "form-control invisible";
                        document.getElementById("iptAtivDesc" + id).className = "form-control invisible";
                        document.getElementById("iptAtiv" + id).style = "position:absolute";
                        document.getElementById("iptAtivDesc" + id).style = "position:absolute";
                        document.getElementById("Ativ" + id).className = "card-header";
                        document.getElementById("AtivDesc" + id).className = "card-text";
                        document.getElementById("Editar" + id).type = "button";
                        document.getElementById("Editar" + id).textContent = "Editar";
                    }
                }

                function tipo(id, nameTipo) {
                    document.getElementById("ddlTipo").textContent = nameTipo;
                    document.location.href = '/editartipoatividade/' + id + "/" + nameTipo;
                }
            </script>
        </div>
    </div>
    <div class="col-12">
        <blockquote class="blockquote text-right">
            <p class="mb-0">Aprendendo laravel</p>
            <footer class="blockquote-footer">By<cite title="Source Title">Jonathan</cite></footer>
        </blockquote>
    </div>


</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
