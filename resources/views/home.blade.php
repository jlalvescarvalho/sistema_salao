@extends('adminlte::page')

@section('plugins.Fullcalendar', true)
@section('title', 'Home')

@section('content_header')
    <h1>Home</h1>
@stop

@section('content')
    <div class="d-flex justify-content-end pb-3">
        <div class="col-12 col-lg-4">
            <div class="col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Clientes</span>
                        <span class="info-box-number">
                            {{ $nClientes}}
                        </span>
                    </div>

                </div>

            </div>

            <div class="col-12">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-crosshairs"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Contratos ativos</span>
                        <span class="info-box-number">{{ $nContratos }}</span>
                    </div>

                </div>

            </div>


            <div class="clearfix hidden-md-up"></div>
            <div class="col-12">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Agentamentos Pendentes</span>
                        <span class="info-box-number">{{ $nAgendamentosPendentes }}</span>
                    </div>

                </div>

            </div>

            <div class="col-12">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Agendamentos Concluidos</span>
                        <span class="info-box-number">{{ $nAgendamentosConcluidos }}</span>
                    </div>

                </div>

            </div>
        </div>
        <div class="card card-primary col-12 col-lg-8">
            <div class="card-body p-0 pb-2">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .fc .fc-toolbar.fc-header-toolbar {
            margin-bottom: 0 !important;
            padding-left: 0;
            padding-right: 2px;
        }
    </style>
@stop

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                themeSystem: 'bootstrap',
                headerToolbar: {
                    start: 'title', 
                    center: '',
                    end: 'today prev,next', 
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'

                },
                nowIndicator: true,

                locale: 'pt-br',
                initialView: 'dayGridMonth',
                showNonCurrentDates: false,
                buttonText: {
                    today: 'Hoje',
                    month: 'mês',
                    week: 'semana',
                    day: 'dia',
                    list: 'lista'
                },

                initialView: 'dayGridMonth',

                
            })
            calendar.render();

            const url = new URL(window.location.origin + '/api/agendamentos/buscar');
            const params = new URLSearchParams();
            params.append('ano', new Date().getFullYear());
            params.append('mes', new Date().getMonth() + 1);
            params.append('status', 'pendente')
            url.search = params.toString();
            fetch(url).then(response => response.json()).then(data => {
                data.agendamentos.forEach(agendamento => {
                    calendar.addEvent({
                        title: agendamento.servico.nome,
                        start: agendamento.data_hora,
                        data: agendamento,
                        // end: agendamento.end,
                        // allDay: agendamento.allDay,
                        // backgroundColor: agendamento.backgroundColor,
                        // borderColor: agendamento.borderColor
                    });
                });
            });
            // calendar.addEvent(
            // {
            //     title          : 'Lunch',
            //     start          : "2023-11-05 12:00:00",
            //     end            : "2023-11-05 13:00:00",
            //     allDay         : false,
            //     backgroundColor: '#00c0ef', //Info (aqua)
            //     borderColor    : '#00c0ef' //Info (aqua)
            // })

        });
    </script>
@stop
