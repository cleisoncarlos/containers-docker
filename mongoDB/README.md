# MongoDB Local Setup with Docker Compose

## Start MongoDB
```bash
cd mongoDB
docker compose up -d
```

## Verify
```bash
docker compose ps
docker compose logs mongodb
```

## Access

### Connection String
```
mongodb://root:example@localhost:27017/?authSource=admin
```

- **Beekeeper Studio** or **MongoDB Compass**:
  - Host: `localhost`
  - Port: `27017`
  - Username: `root`
  - Password: `example`
  - Auth DB: `admin`

- **mongosh**:
  ```bash
  docker exec -it mongodb mongosh -u root -p example --authenticationDatabase admin
  ```


## Stop
```bash
docker compose down
```

Data persists in `./data`.

## Customize
Edit `docker-compose.yml` for password/version/networks.



