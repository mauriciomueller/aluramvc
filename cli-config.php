<?php

use Alura\Cursos\Infra\EntityManagerCreator as EntityManagerCreatorCli;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__ . '/vendor/autoload.php';

return ConsoleRunner::createHelperSet(
    (new EntityManagerCreatorCli())->getEntityManager()
);
