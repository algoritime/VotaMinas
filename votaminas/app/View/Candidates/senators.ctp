<nav class="submenu">
    <ul class="menu">
        <li><a href="presidents">Presidente</a></li>
        <li><a href="governors">Governador</a></li>
        <li class="active"><a href="senators">Senador</a></li>
        <li><a href="depsfed">Deputado Federal</a></li>
        <li><a href="depsest">Deputado Estadual</a></li>
    </ul>
</nav>
<div class="candidates">
    <fieldset>
        <legend>Candidatos ao senado</legend>
    <?php foreach ($senators as $senator): ?>
        <div class="contentList">
            <img src="<?php  echo $this->Html->url('/', true); echo $senator['Candidate']['image_url'] ?>" />
            <p class="name"><a href="#"><?php echo $senator['Candidate']['name'] ?></a></p>
            <p class="votes"><?php echo array_values($senator['PoolsOption'])[0]['votes_qt'] . '% votes' ?></p>
            <p class="entourage"><?php echo 'Partido: ' . $senator['Candidate']['entourage'] ?> </p>
            <p class="proposes"><?php echo 'Propostas: ' . $senator['Candidate']['propose'] ?></p>
        </div>
    <?php endforeach; ?>
    </fieldset>
</div>