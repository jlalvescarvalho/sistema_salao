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
                            {{ $totalClientes }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-crosshairs"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Contratos ativos</span>
                        <span class="info-box-number">{{ $totalContratosAtivos }}</span>
                    </div>
                </div>

            </div>

            <div class="col-12">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-calendar-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Agendamentos Pendentes</span>
                        <span class="info-box-number">{{ $totalAgendamentosPendentes }}</span>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-calendar-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Agendamentos Concluidos</span>
                        <span class="info-box-number">{{ $totalAgendamentosConcluidos }}</span>
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

    <div class="modal fade" id="modal-evento-comum" aria-hidden="true">
        <div class="modal-dialog modal-evento-comum">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="form-evento-comum" class="modal-body">
                    <p class="nome-servico"></p>
                    <p class="data-hora"></p>
                    <p class="duracao-estimada"></p>
                    <p class="mb-0"><strong>Observação: </strong></p>
                    <p class="observacao"></p>
                </form>
                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary enviar-mensagem" href="" target="_blank">Enviar mensagem</a>
                    <button type="submit" for="form-evento-comum" class="btn btn-primary">Concluir</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-evento-pacote" aria-hidden="true">
        <div class="modal-dialog modal-evento-pacote">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form id="form-evento-pacote" class="modal-body">
                    <p class="nome-pacote"></p>
                    <p class="data-hora"></p>
                    <p class="duracao-estimada"></p>
                    <p class="sessoes-restantes"></p>
                    <p class="mb-0"><strong>Observação: </strong></p>
                    <p class="observacao"></p>
                </form>
                <div class="modal-footer">
                    <a type="button" class="btn btn-secondary enviar-mensagem" href="" target="_blank">Enviar mensagem</a>
                    <button type="submit" for="form-evento-pacote" class="btn btn-primary">Concluir</button>
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
    <script>
        const state = {
            eventSelected: null
        };

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                themeSystem: 'bootstrap',
                headerToolbar: {
                    left: '',
                    center: 'dayGridMonth,timeGridWeek,timeGridDay',
                    right: '',
                },
                locale: 'pt-br',
                initialView: 'dayGridMonth',
                nowIndicator: true,
                buttonText: {
                    today: 'Hoje',
                    month: 'mês',
                    week: 'semana',
                    day: 'dia',
                    list: 'lista'
                },
                editable: true,
                events: [],
                eventClick: function(info) {
                    state.eventSelected = info.event;
                    const dados = state.eventSelected.extendedProps;
                    let btnEnviarMsg;
                    switch(dados.tipo) {
                        case 'comum':
                            document.querySelector('#modal-evento-comum .modal-title').innerHTML = dados.cliente.nome;
                            document.querySelector('#modal-evento-comum .nome-servico').innerHTML = `<strong>Serviço: </strong>${dados.servico.nome}`;
                            document.querySelector('#modal-evento-comum .data-hora').innerHTML = `<strong>Horário: </strong>${dados.data_hora}`;
                            document.querySelector('#modal-evento-comum .duracao-estimada').innerHTML = `<strong>Duração estimada: </strong>${dados.duracao}`;
                            document.querySelector('#modal-evento-comum .observacao').innerHTML = dados.observacao;
                            $('#modal-evento-comum').modal('show');
                            btnEnviarMsg = document.querySelector('#modal-evento-comum .enviar-mensagem')
                            break;
                        case 'pacote':
                            document.querySelector('#modal-evento-pacote .modal-title').innerHTML = dados.cliente.nome;
                            document.querySelector('#modal-evento-pacote .nome-pacote').innerHTML = `<strong>Pacote: </strong>${dados.pacote.nome}`;
                            document.querySelector('#modal-evento-pacote .data-hora').innerHTML = `<strong>Horário: </strong>${dados.data_hora}`;
                            document.querySelector('#modal-evento-pacote .duracao-estimada').innerHTML = `<strong>Duração estimada: </strong>${dados.duracao}`;
                            document.querySelector('#modal-evento-pacote .sessoes-restantes').innerHTML = `<strong>Sessões restantes: </strong>${dados.contrato.qtd_sessoes_restantes - 1}`;
                            document.querySelector('#modal-evento-pacote .observacao').innerHTML = dados.observacao;
                            btnEnviarMsg = document.querySelector('#modal-evento-pacote .enviar-mensagem')
                            $('#modal-evento-pacote').modal('show');
                            break;
                    }

                    if (dados.cliente.telefone) {
                        btnEnviarMsg.classList.remove('d-none');
                        btnEnviarMsg.href = `https://api.whatsapp.com/send?phone=${dados.cliente.telefone}&text=Olá ${dados.cliente.nome.split(" ")[0]}, tudo bem? Vi que você tem uma sessão marcada para ${dateFormatted(dados.data_hora)}, espero que esteja tudo certo. Qualquer coisa, pode me chamar aqui. Até mais!`;
                        return;
                    }
                    btnEnviarMsg.classList.add('d-none');
                }
            });

            calendar.render();

            const params = new URLSearchParams();
            params.append('ano', new Date().getFullYear());
            params.append('mes', new Date().getMonth() + 1);
            params.append('status', 'pendente')

            const urlComum = new URL(window.location.origin + '/api/agendamentos/buscar');
            urlComum.search = params.toString();
            fetch(urlComum).then(response => response.json()).then(data => {
                data.data.forEach(agendamento => {
                    calendar.addEvent({
                        title: agendamento.servico.nome,
                        start: agendamento.data_hora,
                        ...agendamento,
                        tipo: "comum",
                    });
                });
            });

            const urlPacotes = new URL(window.location.origin + '/api/pacotes/agendamentos/buscar');
            urlPacotes.search = params.toString();
            fetch(urlPacotes).then(response => response.json()).then(data => {
                data.data.forEach(agendamento => {
                    calendar.addEvent({
                        title: agendamento.pacote.nome,
                        start: agendamento.data_hora,
                        ...agendamento,
                        tipo: "pacote",
                        color: 'purple'
                    });
                });
            });
        });

        function dateFormatted(dateString) {
            const date = new Date(dateString);
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric' };
            return date.toLocaleDateString('pt-BR', options).replace(`de ${date.getFullYear()}`, "às");
        }

        document.querySelector("#modal-evento-comum button[type='submit']").addEventListener('click', function() {
            const form = document.querySelector("#form-evento-comum");
            fetch(`/api/agendamentos/${state.eventSelected.id}/concluir`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                }
            }).then(async response => {
                if (response.status === 200) {
                    state.eventSelected.remove();
                    $('#modal-evento-comum').modal('hide');
                }
                const data = await response.json();
                alert(data?.message ?? 'Erro ao concluir agendamento');
            });
        });

        document.querySelector("#modal-evento-pacote button[type='submit']").addEventListener('click', function() {
            const form = document.querySelector("#form-evento-pacote");
            fetch(`/api/pacotes/agendamentos/${state.eventSelected.id}/concluir`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                }
            }).then(async response => {
                if (response.status === 200) {
                    state.eventSelected.remove();
                    $('#modal-evento-pacote').modal('hide');
                }
                const data = await response.json();
                alert(data?.message ?? 'Erro ao concluir agendamento');
            });
        });
    </script>
@stop
