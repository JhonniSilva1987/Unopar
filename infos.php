<?php
    if (isset($_REQUEST['txtNasc'])){
        echo '<h3>Sua data de Nascimento: '.date('d/m/Y',strtotime($_REQUEST['txtNasc'])).'</h3>';
        $xml = simplexml_load_file('signos.xml');
        $signo = '';
        foreach($xml->signo as $dados){
            if ( (substr(date('d/m',strtotime($_REQUEST['txtNasc'])),3,2) == substr($dados->dataFim,3,2)) && 
                 ( substr(date('d/m',strtotime($_REQUEST['txtNasc'])),0,2) <= substr($dados->dataFim,0,2) ) ){
                    $signo = $dados->signoNome;
            } else {
                if ( (substr(date('d/m',strtotime($_REQUEST['txtNasc'])),3,2) == substr($dados->dataInicio,3,2) ) &&
                     (substr(date('d/m',strtotime($_REQUEST['txtNasc'])),0,2) >= substr($dados->dataInicio,0,2))  )
                        $signo = $dados->signoNome;
            }
        }
        echo '<h3>Seu Signo: ' . $signo.'</h3><hr />';
        foreach($xml->signo as $dados){
            if ( (substr(date('d/m',strtotime($_REQUEST['txtNasc'])),3,2) == substr($dados->dataFim,3,2)) && 
            ( substr(date('d/m',strtotime($_REQUEST['txtNasc'])),0,2) <= substr($dados->dataFim,0,2) ) ){
                echo '<font color="#00F">';
                echo '<br /><strong>Data Início:</strong> ' . $dados->dataInicio.' | <strong>Data Fim:</strong> ' . $dados->dataFim.'<br />';
                echo '<strong>Signo:</strong> ' . $dados->signoNome.'<br />';
                echo '<strong>Descrição:</strong><br /> ' . $dados->descricao.'</font><br />';
            } else {
                if ( (substr(date('d/m',strtotime($_REQUEST['txtNasc'])),3,2) == substr($dados->dataInicio,3,2) ) &&
                (substr(date('d/m',strtotime($_REQUEST['txtNasc'])),0,2) >= substr($dados->dataInicio,0,2))  ){
                        echo '<font color="#00F">';
                        echo '<br /><strong>Data Início:</strong> ' . $dados->dataInicio.' | <strong>Data Fim:</strong> ' . $dados->dataFim.'<br />';
                        echo '<strong>Signo:</strong> ' . $dados->signoNome.'<br />';
                        echo '<strong>Descrição:</strong><br /> ' . $dados->descricao.'</font><br />';
                    } else {
                         echo '<br /><strong>Data Início:</strong> ' . $dados->dataInicio.' | <strong>Data Fim:</strong> ' . $dados->dataFim.'<br />';
                         echo '<strong>Signo:</strong> ' . $dados->signoNome.'<br />';
                         echo '<strong>Descrição:</strong><br /> ' . $dados->descricao.'<br />';
                     }
            }
        }
    } else {
        echo 'Necessário informar uma data válida!';
    }
?>