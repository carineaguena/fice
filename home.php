

        <?php 
           // require_once("verifica.php");
            include_once("header.php"); 
        ?>

        <div class="card text-center">
            <div class="card-header"></div>
            <div class="card-body">
                <h5 class="card-title">Sistema de Avaliação de Trabalhos da FICE</h5>
                <p class="card-text">Coordenação Geral de Informática do IFC campus Camboriú</p>

        <div class="row justify-content-center">


        <!-- Menu Administrador -->
        <?php if($_SESSION["status"] == "A"): ?>

            <div class="col-md-auto">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Gerenciar Usuários
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <a href="usuarios/buscarUsuarios.php" class="btn btn-primary">Buscar usuários</a></li>
                        <li class="list-group-item"> <a href="usuarios/adicionarUsuarios.php" class="btn btn-primary">Adicionar usuários</a></li>
                        <li class="list-group-item"> <a href="usuarios/removerUsuarios.php" class="btn btn-primary">Remover usuários</a></li>
                    </ul>   
                </div>
            
            </div>
        

            <div class="col-md-auto">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Gerenciar Avaliações
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <a href="avaliacao/buscarAvaliacao.php" class="btn btn-primary">Buscar Avaliação</a></li>
                        <li class="list-group-item"> <a href="avaliacao/atribuirAvaliacao.php" class="btn btn-primary">Adicionar Avaliação</a></li>
                        <li class="list-group-item"> <a href="avaliacao/editarAvaliacao.php" class="btn btn-primary">Editar Avaliação</a></li>
                        <li class="list-group-item"> <a href="avaliacao/removerAvaliacao.php" class="btn btn-primary">Remover Avaliação</a></li>
                        <li class="list-group-item"> <a href="avaliacao/aprovarAvaliacao.php" class="btn btn-primary">Aprovar Avaliação</a></li>
                    </ul>   
                </div>
            
            
            </div>


        <?php elseif($_SESSION["status"] == "S"): ?>       

            <!-- Menu Supervisor-->

            <div class="col-md-auto">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Gerenciar Avaliações
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <a href="avaliacao/buscarAvaliacao.php" class="btn btn-primary">Buscar Avaliação</a></li>
                        <li class="list-group-item"> <a href="avaliacao/atribuirAvaliacao.php" class="btn btn-primary">Adicionar Avaliação</a></li>
                        <li class="list-group-item"> <a href="avaliacao/removerAvaliacao.php" class="btn btn-primary">Remover Avaliação</a></li>
                        <li class="list-group-item"> <a href="avaliacao/aprovarAvaliacao.php" class="btn btn-primary">Aprovar Avaliação</a></li>
                    </ul>   
                </div>
            
            
            </div>



        <?php else: ?>

            <!-- Menu Avaliador-->

            <div class="col-md-auto">
                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Avaliar Trabalhos
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> <a href="avaliadores/buscarAvaliacoes.php" class="btn btn-primary">Buscar Avaliações</a></li>
                        <li class="list-group-item"> <a href="avaliadores/avaliarTrabalhos.php" class="btn btn-primary">Avaliar Trabalhos</a></li>
                        <li class="list-group-item"> <a href="avaliadores/editarAvaliacao.php" class="btn btn-primary">Editar Avaliação</a></li>
                        <li class="list-group-item"> <a href="avaliadores/removerAvaliacao.php" class="btn btn-primary">Remover Avaliação</a></li>
                    </ul>   
                </div>
            
            
            </div>

        <?php endif; ?>
        
        </div>

               
<?php include_once("footer.php"); ?>