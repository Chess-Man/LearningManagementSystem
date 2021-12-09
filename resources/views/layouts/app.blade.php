<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Alphine -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Full Calendar -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
        
        <!-- Google Chart -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Content -->
                <main class="md:w-3/4 mx-4 md:mx-4 md:ml-72 py-6 px-4 sm:px-6">
                    {{$slot}}
                </main>

        </div>
        @livewireScripts
    </body>
    {{--sweet alert--}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
            /** Delete Confirmation */
            window.addEventListener('show-delete-confirmation', event =>{
                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete'
                }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('deleteConfirmed')
                }
                })
            })

            window.addEventListener('deleted', event=> {
                Swal.fire(
                'Deleted!',
                    event.detail.message,
                'success'
                )
            }) 

            window.addEventListener('showmessage', event=> {
                Swal.fire(
                'Good job!',
                    event.detail.message,
                'success'
                )
            }) 

            window.addEventListener('message', event=> {
            
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text:   event.detail.message,
                })
            }) 


            // Full Calendar 

            $(document).ready(function () {

            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendar = $('#calendar').fullCalendar({
                editable:true,
                header:{
                    left:'prev,next today',
                    center:'title',
                    right:'month,agendaWeek,agendaDay'
                },
                events:'/dashboard',
                selectable:true,
                selectHelper: true,
                select:function(start, end, allDay)
                {
                    var title = prompt('Event Title:');

                    if(title)
                    {
                        var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');

                        var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

                        $.ajax({
                            url:"/dashboard/action",
                            type:"POST",
                            data:{
                                title: title,
                                start: start,
                                end: end,
                                type: 'add'
                            },
                            success:function(data)
                            {
                                calendar.fullCalendar('refetchEvents');
                                Swal.fire(
                                    'Good job!',
                                    'Event Added Successfully!',
                                    'success'
                                )
                            }
                        })
                    }
                },
                editable:true,
                eventResize: function(event, delta)
                {
                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url:"/dashboard/action",
                        type:"POST",
                        data:{
                            title: title,
                            start: start,
                            end: end,
                            id: id,
                            type: 'update'
                        },
                        success:function(response)
                        {
                            calendar.fullCalendar('refetchEvents');
                            Swal.fire(
                                    'Good job!',
                                    'Event Updated Successfully!',
                                    'success'
                            )
                        }
                    })
                },
                eventDrop: function(event, delta)
                {
                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                    var title = event.title;
                    var id = event.id;
                    $.ajax({
                        url:"/dashboard/action",
                        type:"POST",
                        data:{
                            title: title,
                            start: start,
                            end: end,
                            id: id,
                            type: 'update'
                        },
                        success:function(response)
                        {
                            calendar.fullCalendar('refetchEvents');
                            Swal.fire(
                                    'Good job!',
                                    'Event Updated Successfully!',
                                    'success'
                            )
                        }
                    })
                },

                eventClick:function(event)
                {
                    if(confirm("Are you sure you want to remove it?"))
                    {
                        var id = event.id;
                        $.ajax({
                            url:"/dashboard/action",
                            type:"POST",
                            data:{
                                id:id,
                                type:"delete"
                            },
                            success:function(response)
                            {
                                calendar.fullCalendar('refetchEvents');
                                Swal.fire(
                                    'Good job!',
                                    'Event Deleted Successfully!',
                                    'success'
                                )
                            }
                        })
                    }
                }
            });

            });
    </script>
   
            
</html>
