<?php if(!class_exists('Rain\Tpl')){exit;}?><div id="abrirModal" class="modalsb">
    <div class="modaldiv" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Título do modal</h5>
            <a href="#fechar" class="close" title="Fechar" class="fechar" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
            </a>
            </div>
            <div class="modal-body">

                

                <form role="form" action="/admin/item/cadastro/buscar" method="post">
                    <label for="titulo">Título</label><br>
                    <input type="text" class="form-control" style="width:100%;" name="titulo" placeholder="Digite o título">

                    </div>
                    <div class="modal-footer">
                        <div class="box-footer">
                            <button type="submit" id="btn-sb" class="btn btn-primary">Buscar</button>
                            <a href="/admin/cadastro/aluno" id="btn-sb"  class="btn btn-success">Cadastrar</a>
                        </div>
                    </div>
                </form>

        </div>
        </div>
    </div>
</div>