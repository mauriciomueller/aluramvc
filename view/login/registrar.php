<?php include __DIR__ . '/../header.php'; ?>

    <form class="form-signin mb-4" action="/realizar-registro" method="post">

        <label for="email" class="sr-only">Endereço de email</label>
        <input type="email" name="email" id="email" class="form-control mb-4" placeholder="Seu email" required="" autofocus="">

        <label for="senha" class="sr-only">Senha</label>
        <input type="password" name="senha" id="senha" class="form-control  mb-4" placeholder="Senha" required="">

        <button class="btn btn-lg btn-primary btn-block" type="submit">Registrar</button>

    </form>


<?php include __DIR__ . '/../footer.php'; ?>