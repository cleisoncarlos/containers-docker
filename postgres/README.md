# PostgreSQL com Docker Compose

## Como rodar

1. Entre na pasta postgres:
   ```
   cd postgres
   ```

2. Suba o serviço:
   ```
   docker compose up -d
   ```

3. Verifique os logs:
   ```
   docker compose logs postgres
   ```

## Connection String
```
postgresql://postgres:postgres@localhost:5432/database
```

## Acessar com Beekeeper Studio

- **Host:** localhost
- **Port:** 5432
- **Database:** database
- **Username:** postgres
- **Password:** postgres


## Volume de dados

Os dados são persistidos em `./data/`. Para parar:
```
docker compose down
```

Qualquer alteração nas credenciais, edite o docker-compose.yml e rode `docker compose down && docker compose up -d`.
