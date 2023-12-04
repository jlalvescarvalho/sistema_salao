@extends('adminlte::page')

@section('plugins.Fullcalendar', true)
@section('title', 'Home')

@section('content_header')
    <h1>Home</h1>
@stop

@section('content')
    <div class="row pb-3">
        <div class="px-0 col-12 col-lg-4">
            <div class="col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Clientes</span>
                        <span class="info-box-number">
                            {{ $clientes->count() }}
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

            <div class="col-12">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-calendar-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Agentamentos Pendentes</span>
                        <span class="info-box-number">{{ $nAgendamentosPendentes }}</span>
                    </div>

                </div>

            </div>

            <div class="col-12">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-calendar-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Agendamentos Concluidos</span>
                        <span class="info-box-number">{{ $nAgendamentosConcluidos }}</span>
                    </div>

                </div>

            </div>
        </div>
        <div class="card card-primary col-12 col-lg-8">
            <div class="card-body p-0 pb-3">
                <div id="calendar"></div>
            </div>
        </div>
    </div>

    {{-- MODAL --}}
    <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agendar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" class="custom-form" id="form_evento">
                        @csrf
                        <section>
                            {{-- CLIENTE --}}
                            <div class="form-group">
                                <label for="cliente">Selecione o cliente</label>
                                <select class="form-control" name="cliente" id="cliente" required>
                                    @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- SERVIÇO --}}
                            <div class="form-group">
                                <label for="servico">Selecione o serviço</label>
                                <select class="form-control" name="servico" id="servico" required>
                                    @foreach ($servicos as $servico)
                                        <option value="{{ $servico->id }}">{{ $servico->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- DATA INICIO E DATA FIM --}}
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="chegada">Inicio</label>
                                        <input type="datetime-local" id="chegada" name="chegada" class="form-control">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="saida">Termino</label>
                                        <input type="datetime-local" id="saida" name="saida" class="form-control">
                                    </div>
                                </div>
                            </div>
                            {{-- OBSERVAÇÃO --}}
                            <div class="form-group">
                                <label for="observacao">Observação</label>
                                <textarea id="observacao" type="text" name="observacao"
                                    class="form-control @error('observacao') is-invalid @enderror" placeholder="Observação" required></textarea>
                                @error('observacao')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div style="text-align: center;"> <button class="btn btn-success" style="width: 40%;"
                                    type="submit">Salvar</button></div>
                        </section>
                    </form>
                </div>

            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .fc .fc-toolbar.fc-header-toolbar {
            margin-bottom: 0 !important;
        }

        .fc-header-toolbar.fc-toolbar.fc-toolbar-ltr {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
    </style>
@stop

@section('js')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#cliente').select2({
                width: '100%',
                dropdownParent: $('#modalExemplo')
            });

        });


        document.addEventListener('DOMContentLoaded', function() {
            var agenda = @json($agendamentos);

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
                editable: true,
                events: agenda,




            })
            calendar.render();

            calendar.on('dateClick', function(info) {
                $('#modalExemplo').modal();
            });

        });
    </script>

@stop
