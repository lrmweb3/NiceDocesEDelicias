<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
switch ($tela) {
    case 'gerenciar' :
        ?>
        <script type="text/javascript">
            $(function () {
                $('.deletareg').click(function () {
                    if (confirm("deseja realmente excluir este registro?\nEsta operação não poderá ser desfeita!"))
                        return true;
                    else
                        return false;
                });
            });
        </script>

        <div class="twelve columns">
            <?php
            echo breadcrumb();
            get_msg('msgerro');
            get_msg('msgok');
            $modo = $this->uri->segment(3);
            if ($modo == 'all') {
                $limit = 0;
            } else {
                $limit = 10;
                echo '<p>Mostrando os últimos 50 registros, para ver todo histórico ' . anchor('auditoria/gerenciar/all', 'Clique aqui', 'class=""') . '</p>';
            }
            ?>

            <table class="twelve data-table">
                <thead>
                    <tr>
                        <th>Usuário</th>
                        <th>Data e hora</th>
                        <th>Operação</th>
                        <th class="text-center">Observação</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = $this->auditoria->get_all($limit)->result();
                    foreach ($query as $linha) {
                        echo '<tr>';
                        printf('<td>%s</td>', $linha->usuario);
                        printf('<td>%s</td>', date('d/m/Y H:m:i', strtotime($linha->dataCad)));
                        printf('<td>%s</td>', '<span class="has-tip tip-top" title="' . $linha->query . '">' . $linha->operacao . '</span');
                        printf('<td>%s</td>', $linha->observacao);
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <?php
        break;

    default :
        echo '<div class="alert-box alert"><p>A tela solicitada não existe</p>/div>';
        break;
}
