<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="theme-color" content="#000000" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="shortcut icon" href="{{ asset('front-end/assets/img/favicon.ico') }}" />
        <link rel="apple-touch-icon"  sizes="76x76" href="{{ asset('front-end/assets/img/apple-icon.png') }} "/>
        <!-- <link rel="stylesheet" href="{{ asset('front-end://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css') }}"/> -->
        <link rel="stylesheet" href="{{ asset('front-end/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }} " />
        <link rel="stylesheet" href="{{ asset('front-end/assets/styles/tailwind.css') }} " />
        <!-- Fonts -->
        <link rel="<stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

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

        <!-- apex chart -->
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

        <title>LMS | GPC </title>
        <style>
            .sk-chase {
            width: 25px;
            height: 25px;
            position: absolute;
            margin-top: 10px;
            margin-left: 155px;
            
            animation: sk-chase 2.5s infinite linear both;
            }

            .sk-chase-dot {
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0; 
            animation: sk-chase-dot 2.0s infinite ease-in-out both; 
            }

            .sk-chase-dot:before {
            content: '';
            display: block;
            width: 25%;
            height: 25%;
            background-color: #f5428a;
            border-radius: 100%;
            animation: sk-chase-dot-before 2.0s infinite ease-in-out both; 
            }

            .sk-chase-dot:nth-child(1) { animation-delay: -1.1s; }
            .sk-chase-dot:nth-child(2) { animation-delay: -1.0s; }
            .sk-chase-dot:nth-child(3) { animation-delay: -0.9s; }
            .sk-chase-dot:nth-child(4) { animation-delay: -0.8s; }
            .sk-chase-dot:nth-child(5) { animation-delay: -0.7s; }
            .sk-chase-dot:nth-child(6) { animation-delay: -0.6s; }
            .sk-chase-dot:nth-child(1):before { animation-delay: -1.1s; }
            .sk-chase-dot:nth-child(2):before { animation-delay: -1.0s; }
            .sk-chase-dot:nth-child(3):before { animation-delay: -0.9s; }
            .sk-chase-dot:nth-child(4):before { animation-delay: -0.8s; }
            .sk-chase-dot:nth-child(5):before { animation-delay: -0.7s; }
            .sk-chase-dot:nth-child(6):before { animation-delay: -0.6s; }

            @keyframes sk-chase {
            100% { transform: rotate(360deg); } 
            }

            @keyframes sk-chase-dot {
            80%, 100% { transform: rotate(360deg); } 
            }

            @keyframes sk-chase-dot-before {
            50% {
                transform: scale(0.4); 
            } 100%, 0% {
                transform: scale(1.0); 
            } 
            }
            </style>

        @livewireStyles
    </head>
    <body class="text-blueGray-700 antialiased system-ui ">
        <div class="min-h-screen h-full md:h-full ">
            @include('layouts.front-end.sidebar')
            <!-- Page Content -->
                <!-- <main class="md:w-3/4 mx-4 md:mx-4 md:ml-72 py-6 px-4 sm:px-6"> -->
                <main class="relative md:ml-64 bg-blueGray-50 ">
                    {{$slot}}
                   
                </main>

        </div>
        @livewireScripts
        @livewireChartsScripts
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

            window.addEventListener('showForm', event =>{
                document.getElementById("popup").classList.remove("hidden");
            })

            window.addEventListener('hideForm', event =>{
                document.getElementById("popup").classList.add("hidden");
            })

            // Full Calendar 
            
            $(document).ready(function () {

            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendar = $('#calendar').fullCalendar({
                editable:false,
                // header:{
                //     left:'prev,next today',
                //     center:'title',
                //     right:'month,agendaWeek,agendaDay'
                // },
                events:'/dashboard',
                selectable:true,
                selectHelper: true,

                @if(Auth::user()->hasRole('admin'))
                select:function(start, end, allDay)
                {
                    
                    var title = prompt('Title:');

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
                })
                    
                }
                @endif
            });

            });
    </script>

    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script>
    <script type="text/javascript">
      /* Make dynamic date appear */
      (function () {
        if (document.getElementById("get-current-year")) {
          document.getElementById(
            "get-current-year"
          ).innerHTML = new Date().getFullYear();
        }
      })();
      /* Sidebar - Side navigation menu on mobile/responsive mode */
      function toggleNavbar(collapseID) {
        document.getElementById(collapseID).classList.toggle("hidden");
        document.getElementById(collapseID).classList.toggle("bg-white");
        document.getElementById(collapseID).classList.toggle("m-2");
        document.getElementById(collapseID).classList.toggle("py-3");
        document.getElementById(collapseID).classList.toggle("px-6");
      }
      /* Function for dropdowns */
      function openDropdown(event, dropdownID) {
        let element = event.target;
        while (element.nodeName !== "A") {
          element = element.parentNode;
        }
        Popper.createPopper(element, document.getElementById(dropdownID), {
          placement: "bottom-start",
        });
        document.getElementById(dropdownID).classList.toggle("hidden");
        document.getElementById(dropdownID).classList.toggle("block");
      }
    </script>
  
</html>
