<nav class="submenu">
    <ul class="menu">
        <li class="active"><a href="presidents">Presidente</a></li>
        <li><a href="governors">Governador</a></li>
        <li><a href="senators">Senador</a></li>
        <li><a href="depsfed">Deputado Federal</a></li>
        <li><a href="depsest">Deputado Estadual</a></li>
    </ul>
</nav>
<div class="candidates">
    <fieldset>
        <legend>Candidatos a presidência</legend>
    <?php foreach ($presidents as $president): ?>
        <div class="contentList">
            <img src="<?php  echo $this->Html->url('/', true); echo $president['Candidate']['image_url'] ?>" />
            <p class="name"><a href="#"><?php echo $president['Candidate']['name'] ?></a></p>
            <p class="votes"><?php echo array_values($president['PoolsOption'])[0]['votes_qt'] . '% votes' ?></p>
            <p class="entourage"><?php echo 'Partido: ' . $president['Candidate']['entourage'] ?> </p>
            <p class="proposes"><?php echo 'Propostas: ' . $president['Candidate']['propose'] ?></p>
        </div>
    <?php endforeach; ?>
    </fieldset>
</div>