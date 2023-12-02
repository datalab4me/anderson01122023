@extends('adminlte::page')

@section('title', "Contrato")

@section('content_header')
    <h1>Gerar Contrato</h1>
@stop



@section('content')
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif
            
            

            <form action="{{route('contracts.generate')}}" class="form" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="gender">Contrato:</label>
                        <select class="custom-select rounded-0" id="contract" name="contract" required>
                            @foreach($contracts as $contract)
                            <option value='{{$contract->id}}'>{{$contract->name}} ({{$contract->package->name}} - {{$contract->date}})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <hr>

                <div class="callout callout-info">
                  <h5>Variáveis do contrato</h5>

                  <p>Selecione o contrato e utilize as varáveis abaixo para puxar os dados do contrato selecionado</p>
                  
                  <p>
                      [!CODIGO!] -  
                      [!NOME!] -  
                      [!NASCIMENTO!] -  
                      [!EVENTO_DATA!] - 
                      [!EVENTO_INICIO!] - 
                      [!EVENTO_FINAL!] - 
                      [!RESPONSAVEL_NOME!] - 
                      [!RESPONSAVEL_CELULAR!] - 
                      [!RESPONSAVEL_EMAIL!] - 
                      [!EVENTO_VALOR!] - 
                      [!EVENTO_SINAL!] - 
                      [!EVENTO_NOME!] - 
                      [!EVENTO_CONVIDADOS!]
                  </p>
                </div>
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Modelo:</label>
                            <textarea class="form-control" name="model" id="summernote" rows="5">Modelo</textarea>

                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-success">Gerar</button>
                </div>
            </form>

        </div>
    </div>
@endsection


@section('js')
<script src="{{ asset('vendor/summernote/summernote-bs4.min.js') }}"></script>

<script>
  $(function () {
    // Summernote
    $('#summernote').summernote(
            {
  height: 500,
  focus: true
}
                );
  })
</script>
@stop