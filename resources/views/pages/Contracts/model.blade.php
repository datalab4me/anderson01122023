@extends('adminlte::page')

@section('title', "Contrato")

@section('content_header')
<h1>Salvar modelo de contrato padrão</h1>
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
            
            

            <form action="{{route('contracts.model')}}" class="form" method="POST">
                @csrf

                <div class="callout callout-info">
                  <h5>Variáveis do contrato</h5>

                  <p>Edite o modelo de contrato que será utilizado como padrão na geração do contrato dos clientes.<br> 
                      Uilize as variáveis abaixo para serem substituídas pelos dados do contrato relacionado ao cliente.</p>
                  
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
                            <label>Contrato padrao:</label>
                            <textarea class="form-control" name="conteudo" id="summernote" rows="5">{!!$contract->conteudo!!}</textarea>

                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-success">Salvar</button>
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