<!DOCTYPE html>
<html lang="pt_BR">
   <head>
      <?php echo $this->Html->charset(); ?>
      <title><?php echo $title_for_layout . ' | Vota Minas'; ?></title>
      <?php
         echo $this->Html->meta('icon');

         echo $this->Html->css('cake.generic');
         // echo $this->fetch('meta');
         
         echo $this->fetch('css');
         echo $this->fetch('script');
      ?>
      <meta name=viewport content="width=device-width, initial-scale=1">
   </head>
   <body class="body">
		<header class="mainHeader">
		 <h1>vota<span>MINAS</span></h1>

		 <nav>
            <div class="wrapMenu">
    		    <ul class="menu">
    		       <li><?php echo $this->Html->link('INÍCIO', array('controller' => 'pages', 'action' => 'index')); ?></li>
    		       <li><?php echo $this->Html->link('CANDIDATOS', array('controller' => 'candidates', 'action' => 'presidents')); ?></li>
    		       <li><?php echo $this->Html->link('VOTE', array('controller' => 'votes', 'action' => 'votationPresident')); ?></li>
    		    </ul>

    		    <ul class="menuRestrict">
              <?php

                if($logged_in):

                    echo '<li class="logout">';
                      echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'));
                    echo '</li>';

                    if($current_user['role'] == 'admin'):
                        echo '<li class="panelAdmin">';
                        echo $this->Html->link('Painel Administrativo', array('controller' => 'users', 'action' => 'index'));
                        echo '</li>';
                      endif;

                    echo '<li class="userName">';
                      echo 'Bem vindo ' . '<span>' . $current_user['username'] . '</span>';
                    echo '</li>';

                else:
                    echo '<li>';
                      echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login'));
                    echo '</li>';
    		            echo '<li class="popup">' . $this->Html->link('CADASTRE-SE', array('controller' => 'users', 'action' => 'add')) . '</li>';

                endif;
            ?>
    		    </ul>
            </div>
		 </nav>
		</header>

		<div class="mainContent">
			<?php echo $this->Session->flash(); ?>

         	<?php echo $this->fetch('content'); ?>
		</div>

      <footer class="mainFooter">
         <h1></h1>
         <?php echo $this->Html->script('jquery-2.1.1.min'); // Include jQuery library ?>
          <!-- scripts_for_layout -->
          <?php echo $scripts_for_layout; ?>
          <!-- Js writeBuffer -->
          <?php
            if (class_exists('JsHelper') && method_exists($this->Js, 'writeBuffer')) echo $this->Js->writeBuffer();
            // Writes cached scripts
          ?>
      </footer>
   </body>
</html>
