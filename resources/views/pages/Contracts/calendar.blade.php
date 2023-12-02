@extends('adminlte::page')

@section('title', 'Contratos - Calendário')

@section('content_header')
    <h1>Calendário</h1>
@stop




@section('content')
    <div class="card">
        <div class="card-header">
            Calendário
        </div>

        <div class="card-body">
            
            <div id="calendar"></div>
            
        </div>
    </div>
@stop


@section('js')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
<script src="{{ asset('vendor/fullcalendar/locales/pt-br') }}"></script>

<script>
        document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');
          var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'pt-br',
            buttonText: {
                today: 'hoje',
                month: 'mes',
                    week: 'semana',
                    day: 'dia'
            },
            headerToolbar: {
            left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: [
                    @foreach($contracts as $contract)
            {
            title: '<a href=\'{{route('contracts.show', $contract->id)}}\' target=\'blank\' style=\'text-decoration: none; color: #ffffff;\'><b>{{ $contract->name }}</b></a> <br>{{ $contract->package->name }} <br>Convidados: {{ $contract->package->guests }}',
                    start: '{{ $contract->date }}',
                    end: '{{ $contract->date }}',
                    textEscape: false,
                    color: '#000000'
            },
                    @endforeach
            ],
            eventContent: function(info) {
            return {html: info.event.title};
            },
            editable: false,
            droppable: false
    });
    calendar.render();
    });
</script>
@stop