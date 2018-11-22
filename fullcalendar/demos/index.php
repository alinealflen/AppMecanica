<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8' />
		
		<link rel='stylesheet' href='fullcalendar/fullcalendar.css' />
		<link href='fullcalendar.print.css' rel='stylesheet' media='print' />
		<script src='fullcalendar/lib/moment.min.js'></script>
		<script src='fullcalendarlib/jquery.min.js'></script>
		<script src='fullcalendar/lib/jquery-ui.custom.min.js'></script>
		<script src='fullcalendar.min.js'></script>
		<script src='fullcalendar/lang/pt-br.js'></script>
		<script src='fullcalendar/lib/jquery.min.js'></script>
		<script src='fullcalendar/fullcalendar.js'></script>
		
	<script>

		$(document).ready(function() {
			
				/* initialize the calendar
		-----------------------------------------------------------------*/

		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			events: 'eventos.php',
			editable: true,
			droppable: true, // this allows things to be dropped onto the calendar
			drop: function() {
				// is the "remove after drop" checkbox checked?
				if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove();
				}
			}
		});
	
		/* initialize the external events
		-----------------------------------------------------------------*/

		$('#external-events .fc-event').each(function() {

			// store data so the calendar knows to render an event upon drop
			$(this).data('event', {
				title: $.trim($(this).text()), // use the element's text as the event title
				stick: true // maintain when user navigates (see docs on the renderEvent method)
			});

			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 999,
				revert: true,      // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});

		});

		
			//CADASTRA NOVO EVENTO
            $('#novo_evento').submit(function(){
                //serialize() junta todos os dados do form e deixa pronto pra ser enviado pelo ajax
                var dados = jQuery(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "cadastrar_evento.php",
                    data: dados,
                    success: function(data)
                    {   
                        if(data == "1"){
                            alert("Cadastrado com sucesso! ");
                            //atualiza a página!
                            location.reload();
                        }else{
                            alert("Houve algum problema.. ");
                        }
                    }
                });                
                return false;
            });	


	});

</script>
<style>

	body {
		margin-top: 40px;
		text-align: center;
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
	}
		
	#wrap {
		width: 1100px;
		margin: 0 auto;
	}
		
	#external-events {
		float: left;
		width: 150px;
		padding: 0 10px;
		border: 1px solid #ccc;
		background: #eee;
		text-align: left;
	}
		
	#external-events h4 {
		font-size: 16px;
		margin-top: 0;
		padding-top: 1em;
	}
		
	#external-events .fc-event {
		margin: 10px 0;
		cursor: pointer;
	}
		
	#external-events p {
		margin: 1.5em 0;
		font-size: 11px;
		color: #666;
	}
		
	#external-events p input {
		margin: 0;
		vertical-align: middle;
	}

	#calendar {
		float: right;
		width: 900px;
	}

</style>
	</head>
	<body>
		<div id='wrap'>

			<div id='external-events'>
				<h4>Draggable Events</h4>
				<div class='fc-event'>My Event 1</div>
				<div class='fc-event'>My Event 2</div>
				<div class='fc-event'>My Event 3</div>
				<div class='fc-event'>My Event 4</div>
				<div class='fc-event'>My Event 5</div>
				<p>
					<input type='checkbox' id='drop-remove' />
					<label for='drop-remove'>remove after drop</label>
				</p>
			</div>

			<div id='calendar'></div>

			<div style='clear:both'></div>

			<div id='calendar'>
				<br/>
				<form id="novo_evento" action="" method="post">
					Nome do Evento: <input type="text" name="nome" required/><br/><br/>            
					Data do Evento: <input type="date" name="data" required/><br/><br/>            
					<button type="submit"> Cadastrar novo evento </button>
				</form>
			</div>
		</div>
	</body>
</html>
