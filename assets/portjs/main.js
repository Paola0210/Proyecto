var calendario;
$(function(){

$.removeCookie('tecnico');
   
    var currentDate; // Holds the day clicked when adding a new event
    var currentEvent; // Holds the event object when editing an event

    $('#color').colorpicker(); // Colopicker
    

    var base_url=baseurl; // Here i define the base_url

    // Fullcalendar
    $('#calendar').fullCalendar({
        header: {
            left: 'prev, next, hoy',
            center: 'title',
             right: 'month, basicWeek, basicDay'
        },

        // Get all events stored in database
        eventLimit: true, // allow "more" link when too many events
        events: base_url+'events/getEvents',
        selectable: true,
        selectHelper: true,
        lang: 'es',
        editable: true, // Make the event resizable true           
            select: function(start, end) {
                
                $('#start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
                $('#end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
                 // Open modal to add event
            modal({
                // Available buttons when adding
                buttons: {
                    add: {
                        id: 'add-event', // Buttons id
                        css: 'btn-success', // Buttons class
                        label: 'Add' // Buttons label
                    }
                },
                title: 'Add Event' // Modal title
            });
            }, 
           
         eventDrop: function(event, delta, revertFunc,start,end) {  
            
            start = event.start.format('YYYY-MM-DD HH:mm:ss');
            if(event.end){
                end = event.end.format('YYYY-MM-DD HH:mm:ss');
            }else{
                end = start;
            }         
                       
               $.post(base_url+'events/dragUpdateEvent',{                            
                id:event.id,
                start : start,
                end :end
            }, function(result){
                $('.alert').addClass('alert-success').text('Event updated successfuly');
                hide_notify();


            });



          },
          loading:function(isLoading){
            if (isLoading == true) {
    
              } else {
                 $(".fc-more").each(function (index){
                    $(this).text($(this).text().replace("more","mas"));
                });
              }
               
          },
          eventResize: function(event,dayDelta,minuteDelta,revertFunc) { 
                    
                start = event.start.format('YYYY-MM-DD HH:mm:ss');
            if(event.end){
                end = event.end.format('YYYY-MM-DD HH:mm:ss');
            }else{
                end = start;
            }         
                       
               $.post(base_url+'events/dragUpdateEvent',{                            
                id:event.id,
                start : start,
                end :end
            }, function(result){
                $('.alert').addClass('alert-success').text('Event updated successfuly');
                hide_notify();

            });
            },
          
        // Event Mouseover
        eventMouseover: function(calEvent, jsEvent, view){

            var tooltip = '<div class="event-tooltip">' + calEvent.description + '</div>';
            $("body").append(tooltip);

            $(this).mouseover(function(e) {
                $(this).css('z-index', 10000);
                $('.event-tooltip').fadeIn('500');
                $('.event-tooltip').fadeTo('10', 1.9);
            }).mousemove(function(e) {
                $('.event-tooltip').css('top', e.pageY + 10);
                $('.event-tooltip').css('left', e.pageX + 20);
            });
        },
        eventMouseout: function(calEvent, jsEvent) {
            $(this).css('z-index', 8);
            $('.event-tooltip').remove();
        },
        // Handle Existing Event Click
        eventClick: function(calEvent, jsEvent, view) {
            // Set currentEvent variable according to the event clicked in the calendar
            currentEvent = calEvent;

            // Open modal to edit or delete event
            modal({
                // Available buttons when editing
                buttons: {
                    delete: {
                        id: 'delete-event',
                        css: 'btn-danger',
                        label: 'Borrar'
                    },
                    update: {
                        id: 'update-event',
                        css: 'btn-success',
                        label: 'Actualizar'
                    }
                },
                title: 'Editar Evento "' + calEvent.title + '"',
                event: calEvent
            });
        }

    });
$(".fc-month-button").text("Mes");
$(".fc-basicWeek-button").text("Semana");
$(".fc-basicDay-button").text("Dia");


    // Prepares the modal window according to data passed
    function modal(data) {
        // Set modal title
        $('.modal-title').html(data.title);
        // Clear buttons except Cancel
        $('.modal-footer button:not(".btn-default")').remove();
        // Set input values
        try {
            $("#ver_orden_id").attr("href",baseurl+"tickets/thread/?id="+data.event.idt);
        }
        catch (e) {
       
        }

        
        
		$('#idorden').val(data.event ? data.event.idorden : '');
        $('#title').val(data.event ? data.event.title : '');        
        $('#description').val(data.event ? data.event.description : '');
		$('#rol').val(data.event ? data.event.rol : '');
        $('#color').val(data.event ? data.event.color : '#3a87ad');		
        if(typeof data.event!="undefined"){
                if(data.event.asignacion_movil!=null && data.event.asignacion_movil!="0"){
                    $.post(baseurl+"Events/get_nombre_movil",{id:data.event.asignacion_movil},function(data){
                           $('#rol').val(data);
                    });    
                }    
        }
        
        // Create Butttons
        $.each(data.buttons, function(index, button){
            $('.modal-footer').prepend('<button type="button" id="' + button.id  + '" class="btn ' + button.css + '">' + button.label + '</button>')
        })
        //Show Modal
        $('.modal').not("#modal_sede").modal('show');

    }

    // Handle Click on Add Button
    $('.modal').on('click', '#add-event',  function(e){
        if(validator(['idorden', 'title', 'description', 'rol'])) {
            $.post(base_url+'events/addEvent', {
				idorden: $('#idorden').val(),
                title: $('#title').val(),
                description: $('#description').val(),
                color: $('#color').val(),
				rol: $('#rol').val(),
                start: $('#start').val(),
                end: $('#end').val()
            }, function(result){
                $('.alert').addClass('alert-success').text('Event added successfuly');
                $('.modal').modal('hide');
                $('#calendar').fullCalendar("refetchEvents");
                hide_notify();
            });
        }
    });


    // Handle click on Update Button
    $('.modal').on('click', '#update-event',  function(e){
        if(validator(['idorden', 'title', 'description', 'rol'])) {
            $.post(base_url+'events/updateEvent', {
                id: currentEvent._id,
				idorden: $('#idorden').val(),
                title: $('#title').val(),
                description: $('#description').val(),
                color: $('#color').val(),
				rol: $('#rol').val()
            }, function(result){
                $('.alert').addClass('alert-success').text('Event updated successfuly');
                $('.modal').modal('hide');
                $('#calendar').fullCalendar("refetchEvents");
                hide_notify();
                
            });
        }
    });
//hide color
    $("#link_to_cal").change(function ()
{
      
            $('#hidden_div').show();
          
        
    });


    // Handle Click on Delete Button

    $('.modal').on('click', '#delete-event',  function(e){
        $.get(base_url+'events/deleteEvent?id=' + currentEvent._id, function(result){
            $('.alert').addClass('alert-success').text('Event deleted successfully !');
            $('.modal').modal('hide');
            $('#calendar').fullCalendar("refetchEvents");
            hide_notify();
        });
    });

    function hide_notify()
    {
        setTimeout(function() {
                    $('.alert').removeClass('alert-success').text('');
                }, 2000);
    }


    // Dead Basic Validation For Inputs
    function validator(elements) {
        var errors = 0;
        $.each(elements, function(index, element){
            if($.trim($('#' + element).val()) == '') errors++;
        });
        if(errors) {
            $('.error').html('Please insert title and description');
            return false;
        }
        return true;
    }
});