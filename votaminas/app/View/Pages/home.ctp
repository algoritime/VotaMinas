         <div class="candidatesbox">
            <header>
               <p class="candidatype">Presidente</p>
            </header>

            <?php foreach ($presidents as $presidente) { ?>
            <div class="content">
               <img src="<?php echo $presidente['Candidate']['image_url'] ?>" />
               <p class="name"><a href="#"><?php echo $presidente['Candidate']['name'] ?></a></p>
               <p class="votes"><?php echo array_values($presidente['PoolsOption'])[0]['votes_qt'] . '% votes' ?></p>
               <p class="entourage"><?php echo 'Partido: ' . $presidente['Candidate']['entourage'] ?> </p>
            </div>
            <?php }?>
			</div>

         <div class="candidatesbox">
            <header>
               <p class="candidatype">Governador</p>
            </header>

            <?php  foreach ($governors as $governor) { ?>
            <div class="content">
               <img src="<?php echo $governor['Candidate']['image_url'] ?>" />
               <p class="name"><a href="#"><?php echo $governor['Candidate']['name'] ?></a></p>
               <p class="votes"><?php echo array_values($governor['PoolsOption'])[0]['votes_qt'] . '% votes' ?></p>
               <p class="entourage"><?php echo 'Partido: ' . $governor['Candidate']['entourage'] ?> </p>
            </div>
            <?php }?>
         </div>

         <div class="candidatesbox">
            <header>
               <p class="candidatype">Senador</p>
            </header>

            <?php  foreach ($senators as $senator) { ?>
            <div class="content">
               <img src="<?php echo $senator['Candidate']['image_url'] ?>" />
               <p class="name"><a href="#"><?php echo $senator['Candidate']['name'] ?></a></p>
               <p class="votes"><?php echo array_values($senator['PoolsOption'])[0]['votes_qt'] . '% votes' ?></p>
               <p class="entourage"><?php echo 'Partido: ' . $senator['Candidate']['entourage'] ?> </p>
            </div>
            <?php }?>
         </div>

         <div class="candidatesbox">
            <header>
               <p class="candidatype">Deputado Federal</p>
            </header>

            <?php  foreach ($congressmen as $congressman) { ?>
            <div class="content">
               <img src="<?php echo $congressman['Candidate']['image_url'] ?>" />
               <p class="name"><a href="#"><?php echo $congressman['Candidate']['name'] ?></a></p>
               <p class="votes"><?php echo array_values($congressman['PoolsOption'])[0]['votes_qt'] . '% votes' ?></p>
               <p class="entourage"><?php echo 'Partido: ' . $congressman['Candidate']['entourage'] ?> </p>
            </div>
            <?php }?>
         </div>

         <div class="candidatesbox">
            <header>
               <p class="candidatype">Deputado Estadual</p>
            </header>

            <?php  foreach ($stateRepresentatives as $stateRepresentative) { ?>
            <div class="content">
               <img src="<?php echo $stateRepresentative['Candidate']['image_url'] ?>" />
               <p class="name"><a href="#"><?php echo $stateRepresentative['Candidate']['name'] ?></a></p>
               <p class="votes"><?php echo array_values($stateRepresentative['PoolsOption'])[0]['votes_qt'] . '% votes' ?></p>
               <p class="entourage"><?php echo 'Partido: ' . $stateRepresentative['Candidate']['entourage'] ?> </p>
            </div>
            <?php }?>
         </div>