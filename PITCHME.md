# Demo

## Clean up

### Local

```powershell
docker container ls
docker container stop <id>
docker system prune -af
```

### Docker Hub

Remove demo repo on [Docker Hub](https://hub.docker.com/)

---

## Explain source

- Show `src` folder
  - Show `index.php`
  - Show `test.php`
- Show `Dockerfile`

---

## Build image

```powershell
docker build -t demo .
docker image ls
```

---

## Run container from image

```powershell
docker run -d -p 80:80 demo
```

- Browse to [http://localhost](http://localhost)
- Browse to [http://localhost/test.php](http://localhost/test.php)

---

## Tag image with version and upload

Login to [Docker Hub](https://hub.docker.com/), show repo or create repo

```powershell
docker login
docker tag demo svendewindt/demo:0.1
docker push svendewindt/demo:0.1
```

Show upload on Docker Hub

---

## Modify index.php

Modify the message, ie change `Hello world!` to `Hello dear product managers!` **and update the version**.

## Build image

```powershell
docker container ls
docker container stop <id>
docker build -t demo .
```

---

## Run container from image local

```powershell
docker run -d -p 80:80 demo
```

## Run container from play with docker instance or other instance

[Play with docker](https://labs.play-with-docker.com/)

## Tag image with version and upload

```powershell
docker login
docker tag demo svendewindt/demo:0.2
docker push svendewindt/demo:0.2
```

---

## Docker swarm

Start de 3 servers

```powershell
# Create swarm
docker swarm init
docker swarm init --advertise-addr 192.168.0.11
# Join other servers to the swarm
docker swarm join --token SWMTKN-1-1434t6xgbbi0fy9czzvfioqxq868pb61ihcnouqd07rrw5d8gy-326qxp51c1m5axpll21ms45jt 192.168.1.77:2377
docker swarm join-token manager
docker swarm join-token worker
docker node ls
# Create overlay network
docker network create -d overlay overnet
# Create new container on the overlay network
docker service create -d -p 80:80 --name demosite --replicas 2 --network overnet svendewindt/demo:0.2
# toont services
docker service ls
# toont waar de containers draaien voor de service pinger
docker service ps demosite
# scale
docker service scale demosite=3
# Remove all services
docker service rm $(docker service ls -q)
```
