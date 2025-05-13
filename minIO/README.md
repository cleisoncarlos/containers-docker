##### Imagem: 
Estamos usando quay.io/minio/minio, que é a versão oficial do MinIO.

##### Portas: 
O MinIO usa a porta 9000 para a API S3 e 9001 para o console web.

##### Credenciais: 
Configuramos um usuário admin e uma senha admin123 (você pode alterá-los para maior segurança).

##### Volumes: 
Define um volume persistente chamado minio_data para armazenar os dados.

##### Comando: 
Executa o MinIO no modo de servidor, com acesso ao console na porta 9001.