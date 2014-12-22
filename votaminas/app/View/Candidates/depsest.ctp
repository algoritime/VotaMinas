<nav class="submenu">
    <ul class="menu">
        <li><a href="presidents">Presidente</a></li>
        <li><a href="governors">Governador</a></li>
        <li><a href="senators">Senador</a></li>
        <li><a href="depsfed">Deputado Federal</a></li>
        <li class="active"><a href="depsest">Deputado Estadual</a></li>
    </ul>
</nav>
<div class="candidates">
    <fieldset>
        <legend>Candidatos a deputado estadual</legend>
    <?php foreach ($depsest as $depest): ?>
        <div class="contentList">
            <img src="<?php  echo $this->Html->url('/', true); echo $depest['Candidate']['image_url'] ?>" />
            <p class="name"><a href="#"><?php echo $depest['Candidate']['name'] ?></a></p>
            <p class="votes"><?php echo array_values($depest['PoolsOption'])[0]['votes_qt'] . '% votes' ?></p>
            <p class="entourage"><?php echo 'Partido: ' . $depest['Candidate']['entourage'] ?> </p>
            <p class="proposes"><?php echo 'Propostas: ' . $depest['Candidate']['propose'] ?></p>
        </div>
    <?php endforeach; ?>
    </fieldset>
</div>