#!/bin/bash
docker-compose up -d servico1 servico2 servico3
docker-compose logs -f servico1 servico2 servico3
