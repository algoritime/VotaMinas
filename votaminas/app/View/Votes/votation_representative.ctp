<nav class="submenu">
    <ul id="typesPools" class="menu">
        <li><a href="votationPresident">Presidente</a></li>
        <li><a href="votationGovernor">Governador</a></li>
        <li><a href="votationSenator">Senador</a></li>
        <li><a href="votationCongressman">Deputado Federal</a></li>
        <li class="active"><a href="votationRepresentative">Deputado Estadual</a></li>
    </ul>
</nav>
<div class="candidates">
    <fieldset>
            <legend>Candidatos a deputado estadual</legend>
        <?php  if($pool_id != -99): ?>
            <div class="contentList">
            <?php if($has_candidates != -99): ?>
                <?php echo $this->Form->create('Vote'); ?>
                <fieldset>
                    <?php
                        if(!$already_voted): ?>
                          <legend><?php echo __('Escolha um candidato'); ?></legend>
                        <?php
                            echo $this->Form->hidden('user_id', array('value' => $user_id));
                            echo $this->Form->hidden('pool_id', array('value' => $pool_id));
                            echo $this->Votation->makeCustomRadios($candidates);
                            echo $this->Form->end(__('Enviar'));
                        else:
                            echo '<div class="already_voted">';
                            echo 'Você já votou nessa enquete!<br />';
                            echo 'Confira o resultado parcial ';
                            echo $this->Html->link('aqui', array('controller' => 'candidates', 'action' => 'depsest'));
                            echo '!';
                            echo '</div>';
                        endif;
                    ?>
                </fieldset>
            <?php else:
                echo '<div class="no_candidates">';
                echo 'Não há candidatos cadastrados para esta enquete.<br />';
                if(strcmp($user['role'], 'admin') == 0):
                    echo 'Cadastre candidatos clicando ';
                    echo $this->Html->link('aqui', array('controller' => 'candidates', 'action' => 'add'));
                    echo '!';
                endif;
                    echo '</div>';
                  endif;
            ?>
            </div>
        <?php
            else:
                echo '<div class="no_pool">';
                echo 'Não há enquete cadastrada para este tipo de candidato.<br />';
                if(strcmp($user['role'], 'admin') == 0):
                    echo 'Cadastre uma enquete clicando ';
                    echo $this->Html->link('aqui', array('controller' => 'pools', 'action' => 'add'));
                    echo '!';
                endif;
                    echo '</div>';
            endif;
        ?>
    </fieldset>
</div>