<h3>Fornecedor</h3>

{{-- Comentário --}}

@php
    
@endphp

@isset ($fornecedores)
    @forelse ($fornecedores as $indice => $fornecedor)
        Iteração atual: {{ $loop->iteration }}
        <br>
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status']}}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'Dado não preenchido' }}
        <br>
        Telefone: ({{ $fornecedor['ddd'] ?? '' }} {{ $fornecedor['telefone'] ?? '' }}) 
        <br>
        @if ($loop->first)
            Primeira iteração
        @endif
        <hr>    
    @empty
        Não existem fornecedores cadastrados   
    @endforelse
        

@endisset





