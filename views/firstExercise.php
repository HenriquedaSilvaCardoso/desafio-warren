<table class="table table-bordered table-sm text-center table-responsive-md">
    <!-- Título da Tabela -->
    <thead class="thead-dark">
            <tr>
                <th colspan="17">Lista de Números reversíveis de 1 à 1000000</th>
            </tr>
        </thead>
        <!-- Total de Números -->
        <tr>
            <td colspan="17">Total: <span class="badge badge-primary"><?=$resultSet["quantidade"]?></span></td>
        </tr>
        <?
        
        $count = 0;  # Váriavel usada para controlar a quantidade de elementos por linha da tabela
        foreach ($resultSet['numeros'] as $numero) {  # passa pelo array retornado pela controller
            # gera a tabela
            $estrutura = 
            "<td>
            {$numero}
            </td>";
            if($count % 17 == 0) {
                $estrutura = "<tr>".$estrutura;
            }
            $count++;
            echo $estrutura;
        }
        ?>
</table>