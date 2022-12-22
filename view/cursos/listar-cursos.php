<?php include __DIR__ . '/../header.php'; ?>
    <a href="/novo-curso" class="btn btn-primary mb-2">Criar novo curso</a>

    <ul class="list-group col-12">
        <?php foreach ($cursos as $curso): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?= $curso->getDescricao(); ?>
                <span>
                    <a href="/alterar-curso?id=<?= $curso->getId(); ?>" class="btn btn-info btn-sm">Alterar</a>
                    <a href="/excluir-curso?id=<?= $curso->getId(); ?>" class="btn btn-danger btn-sm">Delete</a>
                </span>
            </li>
        <?php endforeach; ?>
    </ul>
<?php include __DIR__ . '/../footer.php'; ?>