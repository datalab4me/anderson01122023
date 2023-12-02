@extends('adminlte::page')

@section('title', 'Contratos')

@section('content_header')
    <h1>Contratos</h1>
@stop




@section('content')
    <div class="card">
        <div class="card-header">
            Contrato
        </div>

        <div class="card-body">
            
            <div class="col-md-12 text-right">
            <a href="{{route('contracts.calendar')}}" class="btn btn-info pull-right">Calendário</a>
            </div>
                 
            <hr>
            
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Aniversariante</th>
                        <th>Pacote</th>
                        <th>Dia da festa</th>
                        <th>Hora da festa</th>
                        <th>Nome do responsável</th>
                        <th>Telefone do responsável</th>

                        <th style="width: 50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contracts as $contract)
                        <tr>
                            <td>
                                {{$contract->cod}}
                            </td>
                            <td>
                                {{$contract->name}}
                            </td>
                            <td>
                                {{$contract->package->name}}
                            </td>
                            <td>
                                {{ date('d/m/Y', strtotime($contract->date)) . " ($contract->dayOfWeek)" }}
                            </td>
                            <td>
                                {{ date('H:i', strtotime($contract->inittime)) }} às {{ date('H:i', strtotime($contract->endtime)) }}
                            </td>
                            <td>
                                {{$contract->frespname}}
                            </td>
                            <td>
                                {{$contract->frespcel}}
                            </td>
                            <td>
                                <a href="{{route('contracts.show', $contract->id)}}" class="btn btn-success">Ver</a>
                                <a href="{{route('contracts.edit', $contract->id)}}" class="btn btn-warning">Editar</a>
                                @if(!empty($contract->contract_finish))
                                <a href="{{route('contracts.generated', $contract->id)}}" class="btn btn-info" target="_blank">Contrato</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <hr>
            <a href="{{route('contracts.create')}}" class="btn btn-dark">Novo Contrato</a>
        </div>
    </div>
@stop
