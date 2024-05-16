{{ $slot }}
</form action="{{ route('site.contato') }}" method="post">
@csrf
<input name="nome" type="text" placeholder="Nome" class="{{ $classe }}">
<br>
<input name="telefone" type="text" placeholder="Telefone" class="{{ $classe }}">
<br>
<input name="email" type="text" placeholder="E-mail" class="{{ $classe }}">
<br>
<select name="motivo_contato" class="{{ $classe }}">
    <option value="1">Qual o motivo do contato?</option>
    <option value="2">Dúvida</option>
    <option value="3">Elogio</option>
    <option value="4">Reclamação</option>
</select>
<br>
<textarea placeholder="Preencha aqui a sua mensagem" name="mensagem" class="{{ $classe }}"></textarea>
<br>
<button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>