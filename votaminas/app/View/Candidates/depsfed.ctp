<nav class="submenu">
    <ul class="menu">
        <li><a href="presidents">Presidente</a></li>
        <li><a href="governors">Governador</a></li>
        <li><a href="senators">Senador</a></li>
        <li class="active"><a href="depsfed">Deputado Federal</a></li>
        <li><a href="depsest">Deputado Estadual</a></li>
    </ul>
</nav>
<div class="candidates">
    <fieldset>
        <legend>Candidatos a deputado federal</legend>
    <?php foreach ($depsfed as $depfed): ?>
        <div class="contentList">
            <img src="<?php  echo $this->Html->url('/', true); echo $depfed['Candidate']['image_url'] ?>" />
            <p class="name"><a href="#"><?php echo $depfed['Candidate']['name'] ?></a></p>
            <p class="votes"><?php echo array_values($depfed['PoolsOption'])[0]['votes_qt'] . '% votes' ?></p>
            <p class="entourage"><?php echo 'Partido: ' . $depfed['Candidate']['entourage'] ?> </p>
            <p class="proposes"><?php echo 'Propostas: ' . $depfed['Candidate']['propose'] ?></p>
        </div>
    <?php endforeach; ?>
    </fieldset>
</div>