### Esse docker-compose.yml:

   
##### Depois de rodar 
    
    docker-compose up -d
    
acesse: 

📌 Jellyseerr → http://localhost:5055 

📌 Jellyfin → http://localhost:8096

### Para configurar o servidor






Agora, o servidor Nginx será iniciado junto com os outros serviços e atuará como um proxy reverso para `jellyfin` e `jellyseerr`. Você poderá acessá-los via `http://localhost/jellyfin` e `http://localhost/jellyseerr`.