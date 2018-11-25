<?php


include "seguranca.php";

?>


<!DOCTYPE html>


<html>
  <head>

    <meta charset="utf-8">
    <title>World Bikes - Agenda</title>
	
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" > 
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	    <link href="fullcalendar/fullcalendar.css" rel="stylesheet" />
	    <link href="fullcalendar/fullcalendar.print.css" rel='stylesheet' media='print' />
	    <script src="fullcalendar/lib/moment.min.js"></script>
	    <script src="fullcalendar/lib/jquery.min.js"></script>
	    <script src="fullcalendar/lib/jquery-ui.custom.min.js"></script>
	    <script src="fullcalendar/fullcalendar.min.js"></script>
        
	    <link rel="stylesheet" href="css/fundo.css" type="text/css">
        <link rel="stylesheet" href="css/menu.css" type="text/css">
	
	    <!-- script de tradução -->
         <script src='fullcalendar/lang/pt-br.js'></script>
         
        <?php
        
            include "conecta.php";
            
            $sql = "SELECT id, title, start, end FROM servicos";
            
            mysqli_select_db($_SG['link'],"1086027") or die ("Banco de Dados Inexistente!"); 
            
            $resultado_events = mysqli_query($_SG['link'], $sql);
            
        ?>

    	<script>
			$(document).ready(function() { 
            
				$('#calendar').fullCalendar({//função que carrega o calendário
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,agendaWeek,agendaDay'
					},
					defaultDate: Date(),
					navLinks: true, // navegação por dia/semana/mês
					editable: true,
                    entLimit: true, 
					events: [ // carrega os eventos no fullcalendar
						<?php
							while($row_events = mysqli_fetch_array($resultado_events)){ //pega os eventos no banco atraves do php
						?>
								{
                               
								title: '<?php echo "NumOs "; echo $row_events['title']; ?>', 
                                start: '<?php echo $row_events['start']; ?>',
                                end: '<?php echo $row_events['end']; ?>',
                                url: 'buscaOrdem.php?idOrdem=<?php echo $row_events['title'];?>',
                                
								},<?php
							}
						?>
					],
                });
            });
                
                    
		</script>

    </head>
    <body id="fundo">
    
        <nav id="menu">
        <ul>
            <li><a class="active" href="http://www.worldbikesmecanica.tk/agenda.php"><img src="css/img/icons/agenda.png"></a></li>
            <li><a href="http://www.worldbikesmecanica.tk/funcionario.php"><img src="css/img/icons/cracha.png"></a></li>
            <li><a href="http://www.worldbikesmecanica.tk/ordemServico.php"><img src="css/img/icons/ordemOS.png"></a></li>
            <li><a href="http://www.worldbikesmecanica.tk/cliente.php"><img src="css/img/icons/clienteArea.png"></a></li>
            <li><img src="css/img/logo.png" width="20%" id="logo"></li>
        </ul>
    </nav>
    
        <hr style="background-color: #33c208" />

        <div id="wrap"> <!--Div das Ordens de Serviço para agendar-->

            <div id="external-events">
            
                <h4>Ordens de Serviços</h4>
                
                <?php


                    include "conecta.php";

                    $sql = "select idOrdem from ordemServico where statusOrdem like 'Agendar%' ";
                    mysqli_select_db($_SG['link'],"1086027") or die ("Banco de Dados Inexistente!"); 
                    $result = mysqli_query($_SG['link'], $sql);
  
                    while($aux = mysqli_fetch_assoc($result)) { 
                        $arrayOrdens[]=$aux['idOrdem'];
    	            }//fecha while
                
                    $i=0;
                    
	                while($i < count($arrayOrdens)) { 
		 
                ?>
                
                <!-- Botão para acionar modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">
                
                    <?php
                        echo $arrayOrdens[$i];
                    ?>
                    
                </button>
                
                            
                <?php
                
                    $i = $i+1;
				    }//fecha while 
                
                ?>
                
                <!-- Modal -->
        <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        
            <div class="modal-dialog" role="document"><!-- document -->
            
                <div class="modal-content"><!-- modal-content -->
                
                    <div class="modal-header"><!-- modal-header -->
                    
                        <h5 class="modal-title" id="exampleModalLabel">Agendar OS</h5>
                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        
                    </div> <!-- modal-header -->
                    
                    <div class="modal-body"><!-- modal-body -->
                    
                        <form method="post" action="salvaServico.php">
                        
                            <label for="servico" >OS nº:</label>
     
                            <input type="text" name="title" id="numOS" /><br />
                            
                            <label for="servico" >Início: </label>
                            <input type="dateTime-local" name="start" id="numOS"/><br />
                            
                            <label for="servico" >Término: </label>
                            <input type="dateTime-local" name="end" id="numOS"/><br />
                            
                    </div><!-- modal-body -->
                    
                    <div class="modal-footer"> <!-- modal-footer -->
                    
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        
                        <button type="submit" name="salvar"><img src="css/img/icons/Salvar2.png"></button>
                        
                        </form>
                    </div><!-- modal-footer -->
                </div> <!-- modal-content -->
            </div> <!-- document -->
        </div> <!-- Modal -->

                
                 <h4>Orçamentos</h4>
                
                <?php


                    include "conecta.php";

                    $sql = "select idOrdem from ordemServico where statusOrdem like 'Orça%' ";
                    mysqli_select_db($_SG['link'],"1086027") or die ("Banco de Dados Inexistente!"); 
                    $resultOrc = mysqli_query($_SG['link'], $sql);
  
                    while($auxOrc = mysqli_fetch_assoc($resultOrc)) { 
                        $arrayOrc[]=$auxOrc['idOrdem'];
                    }//fecha while
                
                    $i=0;
                    
	                while($i < count($arrayOrc)) { 
                        
		              
                ?>
                
                
               <a href="http://www.worldbikesmecanica.tk/buscaOrdem.php?idOrdem=<?php echo $arrayOrc[$i];?>"> <button type="button" class="btn btn-primary">
                
                    <?php
                        
                        echo $arrayOrc[$i];
                    ?>
                    
                </button></a>
                
                    
                <?php
                
                    $i = $i+1;
    			    }//fecha while 
                
                ?>

      
            </div><!--external-events-->
  
        
               
            
        <div id="calendar">&nbsp;</div> <!-- calendário -->


        <div style="clear:both">&nbsp;</div>
   
        
      </div> <!--wrap-->    
    
    </body>
        <footer class="page-footer font-small elegant-color-dark pt-10" id="rodape">
        
            <div class="footer-copyright text-left py-3" style="background-color: black; color: white">&copy; 2018 World Bikes <a href="https://www.worldbikes.com.br" target="blank"> Worldbikes.com</a>

            <div href="https://web.whatsapp.com/" style="float: right; padding-right: 10px"><a href="https://web.whatsapp.com/" target="blank"><img src="css/img/icons/whats.png" /></a>(47) 99714-5899 | (47) 3273-8431</div>
            </div>
        </footer>
    

</html>
