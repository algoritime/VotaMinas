<nav class="submenu">
    <ul class="menu">
        <li><a href="presidents">Presidente</a></li>
        <li class="active"><a href="governors">Governador</a></li>
        <li><a href="senators">Senador</a></li>
        <li><a href="depsfed">Deputado Federal</a></li>
        <li><a href="depsest">Deputado Estadual</a></li>
    </ul>
</nav>
<div class="candidates">
    <fieldset>
        <legend>Candidatos a governador</legend>
    <?php foreach ($governors as $governor): ?>
        <div class="contentList">
            <img src="<?php  echo $this->Html->url('/', true); echo $governor['Candidate']['image_url'] ?>" />
            <p class="name"><a href="#"><?php echo $governor['Candidate']['name'] ?></a></p>
            <p class="votes"><?php echo array_values($governor['PoolsOption'])[0]['votes_qt'] . '% votes' ?></p>
            <p class="entourage"><?php echo 'Partido: ' . $governor['Candidate']['entourage'] ?> </p>
            <p class="proposes"><?php echo 'Propostas: ' . $governor['Candidate']['propose'] ?></p>
        </div>
    <?php endforeach; ?>
    </fieldset>
</div>