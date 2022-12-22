<div align="center">
    <h1 align="center">MVC Docker<br><img src="https://www.alura.com.br/assets/img/home/alura-logo.1647533643.svg" alt="Logo Alura" /></h1>
    <p>Repositório Docker para rodar o curso MVC da Alura</p>
</div>


## Como utilizar

### Buildar containers (apenas primeira vez)
```
docker-compose up -d --build
```

### Rode o composer install através do container
```
docker exec mvc-php-app bash -c 'composer install'
```

### Para trocar o grupo da vendor após rodar o composer install
```
sudo -R chown $USER:$USER /vendor
```

### Parar containers
```
docker-compose stop
```

### Iniciar containers
```
docker-compose start
```

### Reiniciar containers
```
docker-compose start
```

### Abrir projeto:
```
open http://localhost:8000/
```